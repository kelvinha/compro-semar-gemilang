<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\MenuHelper;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $menus = Menu::orderBy('order')->paginate(10);
        
        return view('admin.menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $locations = [
            'header' => 'Header',
            'footer' => 'Footer',
            'sidebar' => 'Sidebar',
        ];
        
        return view('admin.menus.create', compact('locations'));
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
            'location' => 'nullable|string|max:255',
            'active' => 'boolean',
            'order' => 'nullable|integer',
        ]);
        
        $menu = new Menu();
        $menu->name = $request->name;
        $menu->slug = Str::slug($request->name);
        $menu->location = $request->location;
        $menu->active = $request->has('active');
        $menu->order = $request->order ?? 0;
        $menu->save();
        
        // Clear menu cache
        MenuHelper::clearCache();
        
        $this->success('Menu created successfully');
        
        return redirect()->route('menus.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\View\View
     */
    public function show(Menu $menu)
    {
        $menu->load('submenus');
        
        return view('admin.menus.show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\View\View
     */
    public function edit(Menu $menu)
    {
        $locations = [
            'header' => 'Header',
            'footer' => 'Footer',
            'sidebar' => 'Sidebar',
        ];
        
        return view('admin.menus.edit', compact('menu', 'locations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'active' => 'boolean',
            'order' => 'nullable|integer',
        ]);
        
        $menu->name = $request->name;
        $menu->slug = Str::slug($request->name);
        $menu->location = $request->location;
        $menu->active = $request->has('active');
        $menu->order = $request->order ?? 0;
        $menu->save();
        
        // Clear menu cache
        MenuHelper::clearCache($menu);
        
        $this->success('Menu updated successfully');
        
        return redirect()->route('menus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Menu $menu)
    {
        // Check if menu has submenus
        if ($menu->submenus()->count() > 0) {
            $this->error('Cannot delete menu with submenus');
            return redirect()->route('menus.index');
        }
        
        $menu->delete();
        
        // Clear menu cache
        MenuHelper::clearCache();
        
        $this->success('Menu deleted successfully');
        
        return redirect()->route('menus.index');
    }
}
