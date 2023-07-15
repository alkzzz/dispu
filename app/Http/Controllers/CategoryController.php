<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category_ids = Category::pluck('id');
        return view('backend.category', compact('category_ids'));
    }

    public function getCategory($slug) {
        return $slug;
        // $category = Category::where('slug', $slug)->first();
        // if ($category != null)
        // {
        //     return view('frontend.category', compact('category'));
        // }
        // else {
        //     abort(404);
        // }
    }
}
