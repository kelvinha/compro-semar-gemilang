<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\SeoSetting;
use App\Models\WebsiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $blogs = Blog::with(['user', 'category'])->orderBy('created_at', 'desc')->get();

        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        $categories = BlogCategory::where('active', true)->pluck('name', 'id');
        $statuses = [
            'draft' => 'Draft',
            'published' => 'Published',
            'scheduled' => 'Scheduled',
        ];

        // Get multilingual setting
        $multilingual = WebsiteSetting::where('key', 'multilingual_enabled')->first();
        $isMultilingual = $multilingual && $multilingual->value == '1';
        $language = $request->query('lang', 'en');

        return view('admin.blogs.create', compact('categories', 'statuses', 'isMultilingual', 'language'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Get multilingual setting
        $multilingual = WebsiteSetting::where('key', 'multilingual_enabled')->first();
        $isMultilingual = $multilingual && $multilingual->value == '1';
        $language = $request->input('lang', 'en');

        // Base validation rules
        $rules = [
            'title' => 'required|string|max:255',
            'category_id' => 'nullable|exists:blog_categories,id',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|string|in:draft,published,scheduled',
            'published_at' => 'nullable|date',
            'featured' => 'boolean',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'og_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        // Add multilingual validation rules if needed
        if ($isMultilingual) {
            $rules['title_id'] = 'nullable|string|max:255';
            $rules['excerpt_id'] = 'nullable|string';
            $rules['content_id'] = 'nullable|string';
        }

        $request->validate($rules);

        $blog = new Blog();
        $blog->user_id = Auth::id();
        $blog->category_id = $request->category_id;
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->excerpt = $request->excerpt;
        $blog->content = $request->content;
        $blog->status = $request->status;
        $blog->published_at = $request->status == 'published' ? now() : $request->published_at;
        $blog->featured = $request->has('featured');

        // Add multilingual content if needed
        if ($isMultilingual) {
            $blog->title_id = $request->title_id;
            $blog->excerpt_id = $request->excerpt_id;
            $blog->content_id = $request->content_id;
        }

        // Handle featured image
        if ($request->hasFile('featured_image')) {
            $file = $request->file('featured_image');
            $filename = 'blog_' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/blogs', $filename);
            $blog->featured_image = 'blogs/' . $filename;
        }

        $blog->save();

        // Handle SEO settings
        if ($request->filled('meta_title') || $request->filled('meta_description') || $request->filled('meta_keywords') || $request->hasFile('og_image')) {
            $seo = new SeoSetting();
            $seo->title = $request->meta_title ?? $request->title;
            $seo->description = $request->meta_description ?? $request->excerpt;
            $seo->keywords = $request->meta_keywords;

            // Handle OG image
            if ($request->hasFile('og_image')) {
                $file = $request->file('og_image');
                $filename = 'og_' . time() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/seo', $filename);
                $seo->og_image = 'seo/' . $filename;
            } elseif ($blog->featured_image) {
                $seo->og_image = $blog->featured_image;
            }

            $blog->seo()->save($seo);
        }

        $this->success('Blog post created successfully');

        return redirect()->route('admin.blogs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\View\View
     */
    public function show(Blog $blog)
    {
        $blog->load(['user', 'category', 'seo']);

        return view('admin.blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\View\View
     */
    public function edit(Request $request, Blog $blog)
    {
        $blog->load('seo');
        $categories = BlogCategory::where('active', true)->pluck('name', 'id');
        $statuses = [
            'draft' => 'Draft',
            'published' => 'Published',
            'scheduled' => 'Scheduled',
        ];

        // Get multilingual setting
        $multilingual = WebsiteSetting::where('key', 'multilingual_enabled')->first();
        $isMultilingual = $multilingual && $multilingual->value == '1';
        $language = $request->query('lang', 'en');

        return view('admin.blogs.edit', compact('blog', 'categories', 'statuses', 'isMultilingual', 'language'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Blog $blog)
    {
        // Get multilingual setting
        $multilingual = WebsiteSetting::where('key', 'multilingual_enabled')->first();
        $isMultilingual = $multilingual && $multilingual->value == '1';
        $language = $request->input('lang', 'en');

        // Base validation rules
        $rules = [
            'title' => 'required|string|max:255',
            'category_id' => 'nullable|exists:blog_categories,id',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|string|in:draft,published,scheduled',
            'published_at' => 'nullable|date',
            'featured' => 'boolean',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'og_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        // Add multilingual validation rules if needed
        if ($isMultilingual) {
            $rules['title_id'] = 'nullable|string|max:255';
            $rules['excerpt_id'] = 'nullable|string';
            $rules['content_id'] = 'nullable|string';
        }

        $request->validate($rules);

        $blog->category_id = $request->category_id;
        $blog->title = $request->title;

        // Only update slug if title has changed
        if ($blog->title != $request->title) {
            $blog->slug = Str::slug($request->title);
        }

        $blog->excerpt = $request->excerpt;
        $blog->content = $request->content;

        // Store the original status before updating
        $originalStatus = $blog->status;
        $blog->status = $request->status;

        // Update published_at if status is changed to published
        if ($originalStatus != 'published' && $request->status == 'published') {
            $blog->published_at = now();
        } elseif ($request->status == 'scheduled') {
            $blog->published_at = $request->published_at;
        } elseif ($request->status == 'draft') {
            // Reset published_at when changing back to draft
            $blog->published_at = null;
        }

        $blog->featured = $request->has('featured');

        // Add multilingual content if needed
        if ($isMultilingual) {
            $blog->title_id = $request->title_id;
            $blog->excerpt_id = $request->excerpt_id;
            $blog->content_id = $request->content_id;
        }

        // Handle featured image
        if ($request->hasFile('featured_image')) {
            // Delete old image
            if ($blog->featured_image) {
                Storage::delete('public/' . $blog->featured_image);
            }

            $file = $request->file('featured_image');
            $filename = 'blog_' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/blogs', $filename);
            $blog->featured_image = 'blogs/' . $filename;
        }

        $blog->save();

        // Handle SEO settings
        $seo = $blog->seo ?? new SeoSetting();
        $seo->title = $request->meta_title ?? $request->title;
        $seo->description = $request->meta_description ?? $request->excerpt;
        $seo->keywords = $request->meta_keywords;

        // Handle OG image
        if ($request->hasFile('og_image')) {
            // Delete old image
            if ($seo->og_image && $seo->og_image != $blog->featured_image) {
                Storage::delete('public/' . $seo->og_image);
            }

            $file = $request->file('og_image');
            $filename = 'og_' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/seo', $filename);
            $seo->og_image = 'seo/' . $filename;
        } elseif (!$seo->og_image && $blog->featured_image) {
            $seo->og_image = $blog->featured_image;
        }

        $blog->seo()->save($seo);

        $this->success('Blog post updated successfully');

        return redirect()->route('admin.blogs.edit', ['blog' => $blog, 'lang' => $language]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Blog $blog)
    {
        // Delete featured image
        if ($blog->featured_image) {
            Storage::delete('public/' . $blog->featured_image);
        }

        // Delete SEO settings
        if ($blog->seo) {
            // Delete OG image if it's not the same as featured image
            if ($blog->seo->og_image && $blog->seo->og_image != $blog->featured_image) {
                Storage::delete('public/' . $blog->seo->og_image);
            }

            $blog->seo->delete();
        }

        $blog->delete();

        $this->success('Blog post deleted successfully');

        return redirect()->route('admin.blogs.index');
    }
}
