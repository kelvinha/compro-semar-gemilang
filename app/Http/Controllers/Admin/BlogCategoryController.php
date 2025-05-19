<?php

namespace App\Http\Controllers\Admin;

use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BlogCategoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $categories = BlogCategory::withCount('blogs')->orderBy('order')->get();

        return view('admin.blog-categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $parents = BlogCategory::whereNull('parent_id')->pluck('name', 'id');

        return view('admin.blog-categories.create', compact('parents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'active' => 'boolean',
            'order' => 'nullable|integer',
            'parent_id' => 'nullable|exists:blog_categories,id',
        ]);

        $category = new BlogCategory();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->description = $request->description;
        $category->active = $request->has('active');
        $category->order = $request->order ?? 0;
        $category->parent_id = $request->parent_id;

        // Handle image
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'category_' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/blog-categories', $filename);
            $category->image = 'blog-categories/' . $filename;
        }

        $category->save();

        $this->success('Blog category created successfully');

        return redirect()->route('admin.blog-categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return \Illuminate\View\View
     */
    public function show(BlogCategory $blogCategory)
    {
        $blogCategory->load(['parent', 'children', 'blogs']);

        return view('admin.blog-categories.show', compact('blogCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return \Illuminate\View\View
     */
    public function edit(BlogCategory $blogCategory)
    {
        $parents = BlogCategory::where('id', '!=', $blogCategory->id)
            ->whereNull('parent_id')
            ->pluck('name', 'id');

        return view('admin.blog-categories.edit', compact('blogCategory', 'parents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, BlogCategory $blogCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'active' => 'boolean',
            'order' => 'nullable|integer',
            'parent_id' => 'nullable|exists:blog_categories,id',
        ]);

        // Check if parent_id is not the category itself
        if ($request->parent_id == $blogCategory->id) {
            $this->error('Category cannot be its own parent');
            return redirect()->route('admin.blog-categories.edit', $blogCategory);
        }

        $blogCategory->name = $request->name;

        // Only update slug if name has changed
        if ($blogCategory->name != $request->name) {
            $blogCategory->slug = Str::slug($request->name);
        }

        $blogCategory->description = $request->description;
        $blogCategory->active = $request->has('active');
        $blogCategory->order = $request->order ?? 0;
        $blogCategory->parent_id = $request->parent_id;

        // Handle image
        if ($request->hasFile('image')) {
            // Delete old image
            if ($blogCategory->image) {
                Storage::delete('public/' . $blogCategory->image);
            }

            $file = $request->file('image');
            $filename = 'category_' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/blog-categories', $filename);
            $blogCategory->image = 'blog-categories/' . $filename;
        }

        $blogCategory->save();

        $this->success('Blog category updated successfully');

        return redirect()->route('admin.blog-categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(BlogCategory $blogCategory)
    {
        // Check if category has children
        if ($blogCategory->children()->count() > 0) {
            $this->error('Cannot delete category with children');
            return redirect()->route('admin.blog-categories.index');
        }

        // Check if category has blogs
        if ($blogCategory->blogs()->count() > 0) {
            $this->error('Cannot delete category with blogs');
            return redirect()->route('admin.blog-categories.index');
        }

        // Delete image
        if ($blogCategory->image) {
            Storage::delete('public/' . $blogCategory->image);
        }

        $blogCategory->delete();

        $this->success('Blog category deleted successfully');

        return redirect()->route('admin.blog-categories.index');
    }
}
