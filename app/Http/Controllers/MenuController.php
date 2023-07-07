<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Spatie\Navigation\Navigation;
use Spatie\Navigation\Section;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::orderBy('order')->get();
        return view('backend.menu.index', compact('menus'));
    }
}
