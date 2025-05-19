<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $projects = Project::orderBy('order')->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'project_name' => 'required|string|max:255',
            'client_name' => 'nullable|string|max:255',
            'project_description' => 'nullable|string',
            'project_main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'project_gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'completion_date' => 'nullable|date',
            'location' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'status' => 'required|in:active,inactive',
            'featured' => 'nullable|boolean',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('project_main_image')) {
            $imagePath = $request->file('project_main_image')->store('projects', 'public');
            $validated['project_main_image'] = $imagePath;
        }

        $gallery = [];
        if ($request->hasFile('project_gallery_images')) {
            foreach ($request->file('project_gallery_images') as $file) {
                $galleryPath = $file->store('projects/gallery', 'public');
                $gallery[] = $galleryPath;
            }
            $validated['project_gallery_images'] = $gallery;
        }

        $project = Project::create($validated);

        // Create SEO settings
        $project->seo()->create([
            'title' => $validated['meta_title'] ?? $validated['project_name'],
            'description' => $validated['meta_description'] ?? substr(strip_tags($validated['project_description'] ?? ''), 0, 160),
            'keywords' => $validated['meta_keywords'] ?? '',
            'og_title' => $validated['meta_title'] ?? $validated['project_name'],
            'og_description' => $validated['meta_description'] ?? substr(strip_tags($validated['project_description'] ?? ''), 0, 160),
            'og_image' => $validated['project_main_image'] ?? null
        ]);

        Alert::success('Success', 'Project created successfully.');
        return redirect()->route('admin.projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\View\View
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\View\View
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'project_name' => 'required|string|max:255',
            'client_name' => 'nullable|string|max:255',
            'project_description' => 'nullable|string',
            'project_main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'project_gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'completion_date' => 'nullable|date',
            'location' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'status' => 'required|in:active,inactive',
            'featured' => 'nullable|boolean',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('project_main_image')) {
            // Delete old image if exists
            if ($project->project_main_image) {
                Storage::disk('public')->delete($project->project_main_image);
            }
            
            $imagePath = $request->file('project_main_image')->store('projects', 'public');
            $validated['project_main_image'] = $imagePath;
        }

        if ($request->hasFile('project_gallery_images')) {
            $gallery = $project->project_gallery_images ?? [];
            
            foreach ($request->file('project_gallery_images') as $file) {
                $galleryPath = $file->store('projects/gallery', 'public');
                $gallery[] = $galleryPath;
            }
            
            $validated['project_gallery_images'] = $gallery;
        }

        // Handle gallery deletions
        if ($request->has('delete_gallery')) {
            $gallery = $project->project_gallery_images ?? [];
            $toDelete = $request->input('delete_gallery');
            
            foreach ($toDelete as $path) {
                Storage::disk('public')->delete($path);
                $gallery = array_filter($gallery, function($item) use ($path) {
                    return $item !== $path;
                });
            }
            
            $validated['project_gallery_images'] = array_values($gallery);
        }

        $project->update($validated);

        // Update SEO settings
        $project->seo()->updateOrCreate(
            ['seoable_id' => $project->id, 'seoable_type' => get_class($project)],
            [
                'title' => $validated['meta_title'] ?? $validated['project_name'],
                'description' => $validated['meta_description'] ?? substr(strip_tags($validated['project_description'] ?? ''), 0, 160),
                'keywords' => $validated['meta_keywords'] ?? '',
                'og_title' => $validated['meta_title'] ?? $validated['project_name'],
                'og_description' => $validated['meta_description'] ?? substr(strip_tags($validated['project_description'] ?? ''), 0, 160),
                'og_image' => $validated['project_main_image'] ?? $project->project_main_image
            ]
        );

        Alert::success('Success', 'Project updated successfully.');
        return redirect()->route('admin.projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Project $project)
    {
        // Delete main image if exists
        if ($project->project_main_image) {
            Storage::disk('public')->delete($project->project_main_image);
        }
        
        // Delete gallery images if exists
        if (!empty($project->project_gallery_images)) {
            foreach ($project->project_gallery_images as $galleryImage) {
                Storage::disk('public')->delete($galleryImage);
            }
        }
        
        // Delete SEO settings
        if ($project->seo) {
            $project->seo->delete();
        }
        
        $project->delete();

        Alert::success('Success', 'Project deleted successfully.');
        return redirect()->route('admin.projects.index');
    }
}
