<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function index() {
        $posts = Post::with('categories')->latest()->get();
        return view('backend.post.index', compact('posts'));
    }

    public function show($id) {
        $post = Post::find($id);
        return view('backend.post.show', compact('post'));
    }

    public function create() {
        $categories = Category::orderBy('title')->get();
        return view('backend.post.create', compact('categories'));
    }

    public function store(Request $request): RedirectResponse {
        $input = $request->all();
        $post = new Post();
        $post->title = $input['title'];
        $post->content = $input['content'];
        $post->save();
        $post->categories()->sync($input['category_id']);
        if ($request->hasFile('gambar')) {
            $post->addMediaFromRequest('gambar')->usingName($post->title)->toMediaCollection('berita');
        }
        session()->flash('message', 'Berita baru telah ditambahkan.');
        return redirect()->route('dashboard.berita.index');
    }

    public function edit($id) {
        $post = Post::find($id);
        $categories = Category::all();
        $post_categories = $post->categories()->get();
        return view('backend.post.edit', compact('categories', 'post'));
    }

    public function update(Request $request, $id): RedirectResponse {
        $input = $request->all();
        $post = Post::find($id);
        $post->title = $input['title'];
        $post->content = $input['content'];
        $post->save();
        $post->categories()->sync($input['category_id']);
        if ($request->hasFile('gambar')) {
            $post->clearMediaCollection('berita');
            $post->addMediaFromRequest('gambar')->usingName($post->title)->toMediaCollection('berita');
        }
        session()->flash('message', 'Berita telah diupdate.');
        return redirect()->route('dashboard.berita.index');
    }

    public function delete($id): RedirectResponse {
        $post = Post::find($id);
        $post->delete();
        session()->flash('message', 'Berita telah dihapus.');
        return redirect()->route('dashboard.berita.index');
    }
}
