<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.category');
    }

    public function getCategory($slug)
    {
        $category = Category::where('slug', $slug)->first();
        if ($category != null) {
            $posts = $category->posts()->paginate(3);
            // dd($posts);
            return view('frontend.category', compact('category', 'posts'));
        } else {
            abort(404);
        }
    }
}
