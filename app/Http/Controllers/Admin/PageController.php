<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use App\Models\PageSection;
use App\Models\SeoSetting;
use App\Models\Submenu;
use App\Models\WebsiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PageController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $pages = Page::with('seo')->orderBy('order')->paginate(10);

        return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.pages.create');
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
            'url' => 'required|string|max:255|unique:pages,url',
            'active' => 'boolean',
            'order' => 'integer',
            'options' => 'nullable|array',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
        ]);

        $page = new Page();
        $page->name = $request->name;
        $page->url = $request->url;
        $page->active = $request->has('active');
        $page->order = $request->order;
        $page->options = $request->options;
        $page->save();

        // Create SEO settings
        $seoData = [
            'title' => $request->meta_title ?? $request->name,
            'description' => $request->meta_description ?? "Welcome to {$request->name}. This is a dynamically generated meta description.",
            'keywords' => $request->meta_keywords ?? implode(',', [
                $request->name,
                'page',
                'website',
                'content'
            ]),
            'og_title' => $request->meta_title ?? $request->name,
            'og_description' => $request->meta_description ?? "Welcome to {$request->name}. This is a dynamically generated Open Graph description.",
        ];

        $page->seo()->create($seoData);

        $this->success('Page created successfully');

        return redirect()->route('admin.pages.edit', $page);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\View\View
     */
    public function show(Page $page)
    {
        $page->load(['seo', 'sections']);

        return view('admin.pages.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\View\View
     */
    public function edit(Request $request, Page $page)
    {
        $page->load(['seo', 'sections' => function ($query) {
            $query->orderBy('order');
        }]);

        return view('admin.pages.edit', compact('page'));
    }

    /**
     * Display the sections management page.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\View\View
     */
    public function sections(Page $page)
    {
        $page->load(['sections' => function ($query) {
            $query->orderBy('order');
        }]);

        $sectionTypes = [
            'content' => 'Content',
            'slider' => 'Slider',
            'gallery' => 'Gallery',
            'features' => 'Features',
            'testimonials' => 'Testimonials',
            'contact' => 'Contact Form',
        ];

        // Get multilingual setting
        $multilingual = WebsiteSetting::where('key', 'multilingual_enabled')->first();
        $isMultilingual = $multilingual && $multilingual->value == '1';

        return view('admin.pages.sections', compact('page', 'sectionTypes', 'isMultilingual'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Page $page)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|string|max:255|unique:pages,url,' . $page->id,
            'active' => 'boolean',
            'order' => 'integer',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
        ]);

        $page->update([
            'name' => $request->name,
            'url' => $request->url,
            'active' => $request->has('active'),
            'order' => $request->order,
            'options' => $request->options
        ]);

        // Update SEO settings
        $seoData = [
            'title' => $request->meta_title ?? $request->name,
            'description' => $request->meta_description ?? "Welcome to {$request->name}. This is a dynamically generated meta description.",
            'keywords' => $request->meta_keywords ?? implode(',', [
            $request->name,
            'page',
            'website',
            'content'
            ]),
            'og_title' => $request->meta_title ?? $request->name,
            'og_description' => $request->meta_description ?? "Welcome to {$request->name}. This is a dynamically generated Open Graph description.",
        ];

        if ($request->hasFile('og_image')) {
            $ogImagePath = $request->file('og_image')->store('public/og');
            $seoData['og_image'] = str_replace('public/', '', $ogImagePath);
        }

        $page->seo()->update($seoData);

        $this->success('Page updated successfully');

        return redirect()->route('admin.pages.edit', $page);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Page $page)
    {
        // Check if page has sections
        if ($page->sections()->count() > 0) {
            $this->error('Cannot delete page with sections. Please delete all sections first.');
            return redirect()->back();
        }

        // Delete SEO settings
        $page->seo()->delete();

        $page->delete();

        $this->success('Page deleted successfully');

        return redirect()->route('admin.pages.index');
    }

    /**
     * Add a section to the page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addSection(Request $request, Page $page)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string',
            'order' => 'required|integer',
            'active' => 'required|boolean',
            'content' => 'nullable|string',
            'video_url' => 'nullable|url',
            'media_ids' => 'nullable|array',
            'image_id' => 'nullable|exists:media,id',
            'options' => 'nullable|array',
        ]);

        $section = new PageSection([
            'name' => $request->name,
            'type' => $request->type,
            'order' => $request->order,
            'active' => $request->active,
            'content' => $request->content,
            'video_url' => $request->video_url,
            'media_ids' => $request->media_ids,
            'image_id' => $request->image_id,
            'options' => $request->options
        ]);

        $page->sections()->save($section);

        $this->success('Section added successfully');

        return redirect()->route('admin.pages.edit', $page);
    }

    /**
     * Update a section.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PageSection  $section
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateSection(Request $request, PageSection $section)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string',
            'order' => 'required|integer',
            'active' => 'required|boolean',
            'content' => 'nullable|string',
            'video_url' => 'nullable|url',
            'media_ids' => 'nullable|array',
            'image_id' => 'nullable|exists:media,id',
            'options' => 'nullable|array',
        ]);

        $section->update([
            'name' => $request->name,
            'type' => $request->type,
            'order' => $request->order,
            'active' => $request->active,
            'content' => $request->content,
            'video_url' => $request->video_url,
            'media_ids' => $request->media_ids,
            'image_id' => $request->image_id,
            'options' => $request->options
        ]);

        $this->success('Section updated successfully');

        return redirect()->route('admin.pages.edit', $section->page_id);
    }

    /**
     * Remove a section.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PageSection  $section
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteSection(Request $request, PageSection $section)
    {
        $page = $section->page;
        $language = $request->query('lang', 'en');

        // Delete image
        if ($section->image) {
            Storage::delete('public/' . $section->image);
        }

        $section->delete();

        $this->success('Section deleted successfully');

        return redirect()->route('admin.pages.edit', ['page' => $page, 'lang' => $language]);
    }

    /**
     * Get the section data for editing.
     *
     * @param  \App\Models\PageSection  $section
     * @return \Illuminate\Http\JsonResponse
     */
    public function editSection(PageSection $section)
    {
        // Get multilingual setting
        $multilingual = WebsiteSetting::where('key', 'multilingual_enabled')->first();
        $isMultilingual = $multilingual && isset($multilingual->value) && $multilingual->value == '1';

        return response()->json([
            'success' => true,
            'section' => $section,
            'isMultilingual' => $isMultilingual
        ]);
    }

    /**
     * Update the order of sections.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateSectionOrder(Request $request)
    {
        $orders = $request->input('orders', []);

        foreach ($orders as $id => $order) {
            PageSection::where('id', $id)->update(['order' => $order]);
        }

        return response()->json(['success' => true]);
    }

    /**
     * Update the order of multiple pages.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateOrder(Request $request)
    {
        $validated = $request->validate([
            'orders' => 'required|array',
            'orders.*.id' => 'required|integer|exists:pages,id',
            'orders.*.order' => 'required|integer|min:1',
        ]);

        DB::transaction(function () use ($validated) {
            foreach ($validated['orders'] as $orderData) {
                Page::findOrFail($orderData['id'])->update([
                    'order' => $orderData['order']
                ]);
            }
        });

        return response()->json([
            'success' => true,
            'message' => 'Page order updated successfully'
        ]);
    }
}
