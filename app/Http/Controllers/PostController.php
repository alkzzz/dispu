<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();
        return view('backend.post.index', compact('posts'));
    }

    public function create() {
        return view('backend.post.create');
    }
}
