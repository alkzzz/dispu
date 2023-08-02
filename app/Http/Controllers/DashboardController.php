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
        $total_pages = \App\Models\Page::count();
        $total_categories = \App\Models\Category::count();
        $total_posts = \App\Models\Post::count();
        $total_links = \App\Models\Link::count();
        $total_galleries = \App\Models\Gallery::count();
        $total_related_links = \DB::table('footer_links')->count();
        $total_menus = \App\Models\Menu::count();
        $total_users = \App\Models\User::count();
        $date_backup = now()->subDays(1);
        $day_backup = $date_backup->day;
        $month_backup = $date_backup->locale('id')->monthName;
        $year_backup = $date_backup->year;
        return view('dashboard', compact('total_pages', 'total_categories', 'total_posts', 'total_links', 'total_galleries', 'total_related_links', 'total_menus', 'total_users', 'day_backup', 'month_backup', 'year_backup'));
    }
}
