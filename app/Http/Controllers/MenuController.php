<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Page;
use App\Models\Category;
use App\Models\Link;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Page::orderBy('title')->get();
        $categories = Category::orderBy('name')->get();
        $links = Link::orderBy('name')->get();
        $menus = Menu::orderBy('order')->get();
        return view('backend.menu.index', compact('pages', 'categories', 'links', 'menus'));
    }
}
