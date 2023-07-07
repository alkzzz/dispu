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
}
