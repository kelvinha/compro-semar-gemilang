<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageSection;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageSectionController extends Controller
{
    public function create($pageId)
    {
        $page = Page::findOrFail($pageId);
        $media = Media::all();
        return view('admin.pages.sections.create', compact('page', 'media'));
    }

    public function store(Request $request, $pageId)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'type' => 'required|string',
            'order' => 'required|integer',
            'active' => 'required|boolean',
        ];

        $validated = $request->validate($rules);

        $section = new PageSection();
        $section->page_id = $pageId;
        $section->name = $validated['name'];
        $section->type = $validated['type'];
        $section->order = $validated['order'];
        $section->active = $validated['active'];

        // Handle type-specific data
        switch ($validated['type']) {
            case 'slider':
            case 'gallery':
                $section->media_ids = $request->input('media_ids', []);
                break;
            case 'text':
                $section->content = $request->input('content');
                break;
            case 'video':
                $section->video_url = $request->input('video_url');
                break;
            case 'image':
                $section->image_id = $request->input('image_id');
                break;
        }

        $section->save();

        return redirect()->route('admin.pages.sections.index', $pageId)
            ->with('success', 'Section created successfully.');
    }

    public function edit($pageId, $sectionId)
    {
        $page = Page::findOrFail($pageId);
        $section = PageSection::findOrFail($sectionId);
        $media = Media::all();
        return view('admin.pages.sections.edit', compact('page', 'section', 'media'));
    }

    public function update(Request $request, $pageId, $sectionId)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'type' => 'required|string',
            'order' => 'required|integer',
            'active' => 'required|boolean',
        ];

        $validated = $request->validate($rules);

        $section = PageSection::findOrFail($sectionId);
        $section->name = $validated['name'];
        $section->type = $validated['type'];
        $section->order = $validated['order'];
        $section->active = $validated['active'];

        // Handle type-specific data
        switch ($validated['type']) {
            case 'slider':
            case 'gallery':
                $section->media_ids = $request->input('media_ids', []);
                break;
            case 'text':
                $section->content = $request->input('content');
                break;
            case 'video':
                $section->video_url = $request->input('video_url');
                break;
            case 'image':
                $section->image_id = $request->input('image_id');
                break;
        }

        $section->save();

        return redirect()->route('admin.pages.sections.index', $pageId)
            ->with('success', 'Section updated successfully.');
    }

    public function destroy($pageId, $sectionId)
    {
        $section = PageSection::findOrFail($sectionId);
        $section->delete();

        return redirect()->route('admin.pages.sections.index', $pageId)
            ->with('success', 'Section deleted successfully.');
    }
}
