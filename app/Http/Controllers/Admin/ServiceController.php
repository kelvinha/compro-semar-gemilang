<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('order')->paginate(10);
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'short_description' => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'order' => 'nullable|integer',
            'status' => 'required|in:active,inactive',
            'featured' => 'nullable|boolean',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('icon')) {
            $iconPath = $request->file('icon')->store('services', 'public');
            $validated['icon'] = $iconPath;
        }

        Service::create($validated);

        Alert::success('Success', 'Service created successfully.');
        return redirect()->route('admin.services.index');
    }

    public function show(Service $service)
    {
        return view('admin.services.show', compact('service'));
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'short_description' => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'order' => 'nullable|integer',
            'status' => 'required|in:active,inactive',
            'featured' => 'nullable|boolean',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('icon')) {
            // Delete old icon if exists
            if ($service->icon) {
                Storage::disk('public')->delete($service->icon);
            }
            
            $iconPath = $request->file('icon')->store('services', 'public');
            $validated['icon'] = $iconPath;
        }

        $service->update($validated);

        Alert::success('Success', 'Service updated successfully.');
        return redirect()->route('admin.services.index');
    }

    public function destroy(Service $service)
    {
        // Delete icon if exists
        if ($service->icon) {
            Storage::disk('public')->delete($service->icon);
        }
        
        $service->delete();

        Alert::success('Success', 'Service deleted successfully.');
        return redirect()->route('admin.services.index');
    }
}
