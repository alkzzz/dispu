<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $bidang_user = optional(\Auth::user()->bidang)->title;
        $role = \Auth::user()->roles[0];
        if ($role->name == 'Super Admin') {
            $total_posts = \App\Models\Post::count();
        } else {
            $total_posts = \App\Models\Post::with('categories')
                ->where('hidden', false)
                ->whereHas('categories', function ($query) use ($bidang_user) {
                    $query->where('title', $bidang_user);
                })
                ->count();
        }

        $total_pages = \App\Models\Page::count();
        $total_categories = \App\Models\Category::count();

        $total_links = \App\Models\Link::count();
        $total_galleries = \App\Models\Gallery::count();
        $total_related_links = \DB::table('footer_links')->count();
        $total_menus = \App\Models\Menu::count();
        $total_users = \App\Models\User::count();
        $total_documents = \DB::table('documents')->count();
        return view('dashboard', compact('total_pages', 'total_categories', 'total_posts', 'total_links', 'total_galleries', 'total_related_links', 'total_menus', 'total_users', 'total_documents'));
    }
}
