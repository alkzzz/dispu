<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Post;
use App\Models\Gallery;
use App\Models\LinkIcon;

class HomePageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $home = Post::where('title', 'Home')->first();
        $sambutan = Page::where('slug', 'sambutan-kepala-dinas')->first();
        $featured = Post::where('hidden', false)->where('featured', true)->latest()->get();
        $latest = Post::where('hidden', false)->latest()->take(3)->get();
        $galleries = Gallery::latest()->take(6)->get();
        $linkicons = LinkIcon::orderBy('title')->get();

        views($home)->record();

        return view('frontend.index', compact('sambutan', 'featured', 'latest', 'galleries', 'linkicons'));
    }
}
