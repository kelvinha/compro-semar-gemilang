<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\MenuHelper;
use App\Models\Menu;
use App\Models\Submenu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubmenuController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $submenus = Submenu::with(['menu', 'parent'])->orderBy('menu_id')->orderBy('order')->get();
        
        return view('admin.submenus.index', compact('submenus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $menus = Menu::pluck('name', 'id');
        $parents = Submenu::whereNull('parent_id')->pluck('name', 'id');
        $types = [
            'page' => 'Page',
            'link' => 'External Link',
        ];
        
        return view('admin.submenus.create', compact('menus', 'parents', 'types'));
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
            'menu_id' => 'required|exists:menus,id',
            'name' => 'required|string|max:255',
            'url' => 'nullable|string|max:255',
            'type' => 'required|string|in:page,link',
            'active' => 'boolean',
            'order' => 'nullable|integer',
            'parent_id' => 'nullable|exists:submenus,id',
        ]);
        
        $submenu = new Submenu();
        $submenu->menu_id = $request->menu_id;
        $submenu->name = $request->name;
        $submenu->slug = Str::slug($request->name);
        $submenu->url = $request->url;
        $submenu->type = $request->type;
        $submenu->active = $request->has('active');
        $submenu->order = $request->order ?? 0;
        $submenu->parent_id = $request->parent_id;
        $submenu->save();
        
        // Clear menu cache
        $menu = Menu::find($request->menu_id);
        MenuHelper::clearCache($menu);
        
        $this->success('Submenu created successfully');
        
        return redirect()->route('admin.submenus.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Submenu  $submenu
     * @return \Illuminate\View\View
     */
    public function show(Submenu $submenu)
    {
        $submenu->load(['menu', 'parent', 'children', 'sections']);
        
        return view('admin.submenus.show', compact('submenu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Submenu  $submenu
     * @return \Illuminate\View\View
     */
    public function edit(Submenu $submenu)
    {
        $menus = Menu::pluck('name', 'id');
        $parents = Submenu::where('id', '!=', $submenu->id)
            ->whereNull('parent_id')
            ->pluck('name', 'id');
        $types = [
            'page' => 'Page',
            'link' => 'External Link',
        ];
        
        return view('admin.submenus.edit', compact('submenu', 'menus', 'parents', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Submenu  $submenu
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Submenu $submenu)
    {
        $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'name' => 'required|string|max:255',
            'url' => 'nullable|string|max:255',
            'type' => 'required|string|in:page,link',
            'active' => 'boolean',
            'order' => 'nullable|integer',
            'parent_id' => 'nullable|exists:submenus,id',
        ]);
        
        // Check if parent_id is not the submenu itself
        if ($request->parent_id == $submenu->id) {
            $this->error('Submenu cannot be its own parent');
            return redirect()->route('submenus.edit', $submenu);
        }
        
        $submenu->menu_id = $request->menu_id;
        $submenu->name = $request->name;
        $submenu->slug = Str::slug($request->name);
        $submenu->url = $request->url;
        $submenu->type = $request->type;
        $submenu->active = $request->has('active');
        $submenu->order = $request->order ?? 0;
        $submenu->parent_id = $request->parent_id;
        $submenu->save();
        
        // Clear menu cache
        $menu = Menu::find($request->menu_id);
        MenuHelper::clearCache($menu);
        
        $this->success('Submenu updated successfully');
        
        return redirect()->route('admin.submenus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Submenu  $submenu
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Submenu $submenu)
    {
        // Check if submenu has children
        if ($submenu->children()->count() > 0) {
            $this->error('Cannot delete submenu with children');
            return redirect()->route('submenus.index');
        }
        
        // Check if submenu has sections
        if ($submenu->sections()->count() > 0) {
            $this->error('Cannot delete submenu with sections');
            return redirect()->route('submenus.index');
        }
        
        $menu = $submenu->menu;
        $submenu->delete();
        
        // Clear menu cache
        MenuHelper::clearCache($menu);
        
        $this->success('Submenu deleted successfully');
        
        return redirect()->route('submenus.index');
    }
}
