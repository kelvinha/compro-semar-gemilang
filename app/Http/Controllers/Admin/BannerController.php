<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use App\Models\WebsiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BannerController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $banners = Banner::orderBy('order')->orderBy('created_at', 'desc')->get();
        return view('admin.banners.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Get multilingual setting
        $multilingual = WebsiteSetting::where('key', 'multilingual_enabled')->first();
        $isMultilingual = $multilingual && $multilingual->value == '1';

        $types = [
            'homepage' => 'Homepage',
            'category' => 'Category Page',
            'product' => 'Product Page',
            'about' => 'About Page',
            'contact' => 'Contact Page',
        ];

        $targets = [
            '_self' => 'Same Window',
            '_blank' => 'New Window',
        ];

        return view('admin.banners.create', compact('isMultilingual', 'types', 'targets'));
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

        // Base validation rules
        $rules = [
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'mobile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'button_text' => 'nullable|string|max:255',
            'button_url' => 'nullable|url',
            'button_target' => 'required|in:_self,_blank',
            'active' => 'boolean',
            'order' => 'nullable|integer|min:0',
            'type' => 'required|string|max:255',
        ];

        // Add multilingual validation rules if needed
        if ($isMultilingual) {
            $rules['title_id'] = 'nullable|string|max:255';
            $rules['subtitle_id'] = 'nullable|string';
            $rules['description_id'] = 'nullable|string';
            $rules['button_text_id'] = 'nullable|string|max:255';
        }

        $request->validate($rules);

        $banner = new Banner();
        $banner->title = $request->title;
        $banner->subtitle = $request->subtitle;
        $banner->description = $request->description;
        $banner->button_text = $request->button_text;
        $banner->button_url = $request->button_url;
        $banner->button_target = $request->button_target;
        $banner->active = $request->has('active');
        $banner->order = $request->order ?? 0;
        $banner->type = $request->type;

        // Add multilingual content if needed
        if ($isMultilingual) {
            $banner->title_id = $request->title_id;
            $banner->subtitle_id = $request->subtitle_id;
            $banner->description_id = $request->description_id;
            $banner->button_text_id = $request->button_text_id;
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'banner_' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/banners', $filename);
            $banner->image = 'banners/' . $filename;
        }

        // Handle mobile image upload
        if ($request->hasFile('mobile_image')) {
            $file = $request->file('mobile_image');
            $filename = 'banner_mobile_' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/banners', $filename);
            $banner->mobile_image = 'banners/' . $filename;
        }

        $banner->save();

        $this->success('Banner created successfully');

        return redirect()->route('admin.banners.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\View\View
     */
    public function show(Banner $banner)
    {
        return view('admin.banners.show', compact('banner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\View\View
     */
    public function edit(Banner $banner)
    {
        // Get multilingual setting
        $multilingual = WebsiteSetting::where('key', 'multilingual_enabled')->first();
        $isMultilingual = $multilingual && $multilingual->value == '1';

        $types = [
            'homepage' => 'Homepage',
            'category' => 'Category Page',
            'product' => 'Product Page',
            'about' => 'About Page',
            'contact' => 'Contact Page',
        ];

        $targets = [
            '_self' => 'Same Window',
            '_blank' => 'New Window',
        ];

        return view('admin.banners.edit', compact('banner', 'isMultilingual', 'types', 'targets'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Banner $banner)
    {
        // Get multilingual setting
        $multilingual = WebsiteSetting::where('key', 'multilingual_enabled')->first();
        $isMultilingual = $multilingual && $multilingual->value == '1';

        // Base validation rules
        $rules = [
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'mobile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'button_text' => 'nullable|string|max:255',
            'button_url' => 'nullable|url',
            'button_target' => 'required|in:_self,_blank',
            'active' => 'boolean',
            'order' => 'nullable|integer|min:0',
            'type' => 'required|string|max:255',
        ];

        // Add multilingual validation rules if needed
        if ($isMultilingual) {
            $rules['title_id'] = 'nullable|string|max:255';
            $rules['subtitle_id'] = 'nullable|string';
            $rules['description_id'] = 'nullable|string';
            $rules['button_text_id'] = 'nullable|string|max:255';
        }

        $request->validate($rules);

        $banner->title = $request->title;
        $banner->subtitle = $request->subtitle;
        $banner->description = $request->description;
        $banner->button_text = $request->button_text;
        $banner->button_url = $request->button_url;
        $banner->button_target = $request->button_target;
        $banner->active = $request->has('active');
        $banner->order = $request->order ?? 0;
        $banner->type = $request->type;

        // Add multilingual content if needed
        if ($isMultilingual) {
            $banner->title_id = $request->title_id;
            $banner->subtitle_id = $request->subtitle_id;
            $banner->description_id = $request->description_id;
            $banner->button_text_id = $request->button_text_id;
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($banner->image) {
                Storage::delete('public/' . $banner->image);
            }

            $file = $request->file('image');
            $filename = 'banner_' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/banners', $filename);
            $banner->image = 'banners/' . $filename;
        }

        // Handle mobile image upload
        if ($request->hasFile('mobile_image')) {
            // Delete old mobile image
            if ($banner->mobile_image) {
                Storage::delete('public/' . $banner->mobile_image);
            }

            $file = $request->file('mobile_image');
            $filename = 'banner_mobile_' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/banners', $filename);
            $banner->mobile_image = 'banners/' . $filename;
        }

        $banner->save();

        $this->success('Banner updated successfully');

        return redirect()->route('admin.banners.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Banner $banner)
    {
        // Delete images
        if ($banner->image) {
            Storage::delete('public/' . $banner->image);
        }
        if ($banner->mobile_image) {
            Storage::delete('public/' . $banner->mobile_image);
        }

        $banner->delete();

        $this->success('Banner deleted successfully');

        return redirect()->route('admin.banners.index');
    }
}
