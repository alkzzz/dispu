<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    # Frontend
    public function frontend_index()
    {
        $posts = Post::with('categories')->where('hidden', false)->latest()->paginate(3);
        return view('frontend.post.index', compact('posts'));
    }

    public function getPost($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $view_count = views($post)->record();

        return view('frontend.post.show', compact('post', 'view_count'));
    }

    # Backend
    public function index()
    {
        $bidang_user = optional(\Auth::user()->bidang)->title;
        $role = \Auth::user()->roles[0];
        if ($role->name != 'Super Admin') {
            $posts = Post::with('categories')
                ->where('hidden', false)
                ->whereHas('categories', function ($query) use ($bidang_user) {
                    $query->where('title', $bidang_user);
                })
                ->latest()
                ->get();
        } else {
            $posts = Post::with('categories')
                ->where('hidden', false)
                ->latest()
                ->get();
        }
        return view('backend.post.index', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('backend.post.show', compact('post'));
    }

    public function create()
    {
        $bidang_user = optional(\Auth::user()->bidang)->title;
        $kategori_user = Category::where('title', $bidang_user)->pluck('id');

        $categories = Category::where('id', '>', 6)->orderBy('title')->get();
        return view('backend.post.create', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();

        $request->validate([
            'content' => ['required']
        ]);

        $bidang_user = optional(\Auth::user()->bidang)->title;
        $kategori_id = Category::where('title', $bidang_user)->first()->id;
        array_unshift($input['category_id'], $kategori_id);;

        $post = new Post();
        $post->title = $input['title'];
        $post->content = $input['content'];
        if ($request->has('featured')) {
            $post->featured = true;
        }
        $post->save();
        $post->categories()->sync($input['category_id']);
        if ($request->hasFile('gambar')) {
            $post->addMediaFromRequest('gambar')->usingName(substr($post->title, 0, 10))->toMediaCollection('berita');
        }
        session()->flash('message', 'Berita baru telah ditambahkan.');
        return redirect()->route('dashboard.berita.index');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $post_categories = [];
        foreach ($post->categories as $value) {
            $post_categories[] = $value->pivot->category_id;
        }
        return view('backend.post.edit', compact('categories', 'post', 'post_categories'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $input = $request->all();
        $post = Post::find($id);
        $post->title = $input['title'];
        $post->content = $input['content'];
        if ($request->has('featured')) {
            $post->featured = true;
        } else {
            $post->featured = false;
        }
        $post->save();
        $post->categories()->sync($input['category_id']);
        if ($request->hasFile('gambar')) {
            $post->clearMediaCollection('berita');
            $post->addMediaFromRequest('gambar')->usingName(substr($post->title, 0, 10))->toMediaCollection('berita');
        }
        session()->flash('message', 'Berita telah diupdate.');
        return redirect()->route('dashboard.berita.index');
    }

    public function delete($id): RedirectResponse
    {
        $post = Post::find($id);
        $post->delete();
        session()->flash('message', 'Berita telah dihapus.');
        return redirect()->route('dashboard.berita.index');
    }
}
