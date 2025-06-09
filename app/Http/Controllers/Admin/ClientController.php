<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use App\Models\WebsiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ClientController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $clients = Client::orderBy('order')->orderBy('created_at', 'desc')->get();
        return view('admin.clients.index', compact('clients'));
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

        $industries = [
            'Oil & Gas' => 'Oil & Gas',
            'Manufacturing' => 'Manufacturing',
            'Construction' => 'Construction',
            'Mining' => 'Mining',
            'Energy' => 'Energy',
            'Chemical' => 'Chemical',
            'Automotive' => 'Automotive',
            'Technology' => 'Technology',
            'Healthcare' => 'Healthcare',
            'Other' => 'Other',
        ];

        return view('admin.clients.create', compact('isMultilingual', 'industries'));
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
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'website_url' => 'nullable|string',
            'industry' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'partnership_start' => 'nullable|date',
            'order' => 'nullable|integer|min:0',
        ];

        // Add multilingual validation rules if needed
        if ($isMultilingual) {
            $rules['description_id'] = 'nullable|string';
        }

        $validated = $request->validate($rules);

        $client = new Client();
        $client->name = $request->name;
        $client->slug = Str::slug($request->name);
        $client->description = $request->description;
        $client->website_url = $request->website_url;
        $client->industry = $request->industry;
        $client->location = $request->location;
        $client->partnership_start = $request->partnership_start;
        $client->featured = $request->has('featured');
        $client->active = $request->has('active');
        $client->order = $request->order ?? 0;

        // Add multilingual content if needed
        if ($isMultilingual) {
            $client->description_id = $request->description_id;
        }

        // Handle logo upload
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = 'client_' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/clients', $filename);
            $client->logo = 'clients/' . $filename;
        }

        $client->save();

        $this->success('Client created successfully');

        return redirect()->route('admin.clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\View\View
     */
    public function show(Client $client)
    {
        return view('admin.clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\View\View
     */
    public function edit(Client $client)
    {
        // Get multilingual setting
        $multilingual = WebsiteSetting::where('key', 'multilingual_enabled')->first();
        $isMultilingual = $multilingual && $multilingual->value == '1';

        $industries = [
            'Oil & Gas' => 'Oil & Gas',
            'Manufacturing' => 'Manufacturing',
            'Construction' => 'Construction',
            'Mining' => 'Mining',
            'Energy' => 'Energy',
            'Chemical' => 'Chemical',
            'Automotive' => 'Automotive',
            'Technology' => 'Technology',
            'Healthcare' => 'Healthcare',
            'Other' => 'Other',
        ];

        return view('admin.clients.edit', compact('client', 'isMultilingual', 'industries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Client $client)
    {
        // Get multilingual setting
        $multilingual = WebsiteSetting::where('key', 'multilingual_enabled')->first();
        $isMultilingual = $multilingual && $multilingual->value == '1';

        // Base validation rules
        $rules = [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'website_url' => 'nullable|string',
            'industry' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'partnership_start' => 'nullable|date',
            'order' => 'nullable|integer|min:0',
        ];

        // Add multilingual validation rules if needed
        if ($isMultilingual) {
            $rules['description_id'] = 'nullable|string';
        }

        $validated = $request->validate($rules);

        $client->name = $request->name;

        // Only update slug if name has changed
        if ($client->name != $request->name) {
            $client->slug = Str::slug($request->name);
        }

        $client->description = $request->description;
        $client->website_url = $request->website_url;
        $client->industry = $request->industry;
        $client->location = $request->location;
        $client->partnership_start = $request->partnership_start;
        $client->featured = $request->has('featured');
        $client->active = $request->has('active');
        $client->order = $request->order ?? 0;

        // Add multilingual content if needed
        if ($isMultilingual) {
            $client->description_id = $request->description_id;
        }

        // Handle logo upload
        if ($request->hasFile('logo')) {
            // Delete old logo
            if ($client->logo) {
                Storage::delete('public/' . $client->logo);
            }

            $file = $request->file('logo');
            $filename = 'client_' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/clients', $filename);
            $client->logo = 'clients/' . $filename;
        }

        $client->save();

        $this->success('Client updated successfully');

        return redirect()->route('admin.clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Client $client)
    {
        // Delete logo
        if ($client->logo) {
            Storage::delete('public/' . $client->logo);
        }

        $client->delete();

        $this->success('Client deleted successfully');

        return redirect()->route('admin.clients.index');
    }
}
