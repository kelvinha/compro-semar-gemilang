<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Media;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Get counts for dashboard widgets
        $userCount = User::count();
        $mediaCount = Media::count();
        $menuCount = Menu::count();
        $blogCount = Blog::count();

        // Get latest blogs
        $latestBlogs = Blog::with('user')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // Get latest users
        $latestUsers = User::with('role')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact(
            'userCount',
            'mediaCount',
            'menuCount',
            'blogCount',
            'latestBlogs',
            'latestUsers'
        ));
    }
}
