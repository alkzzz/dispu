<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bidang;
use App\Models\Category;
use App\Models\PuprInstagram;
use Illuminate\Validation\Rule;
use Illuminate\Http\RedirectResponse;

class BidangController extends Controller
{
    public function getBidang($slug)
    {
        $bidang = Bidang::where('slug', $slug)->first();
        $category = Category::where('slug', $slug)->first();
        $instagramPosts = '';
        $posts = '';

        if ($category != null) {
            $posts = $category->posts()->paginate(3);
            if (! empty($bidang->instagram)) $instagramPosts = PuprInstagram::where('username', $bidang->instagram)->orderBy('created_at', 'DESC')->take(6)->get();
        }

        return view('frontend.bidang', compact('bidang', 'category', 'posts', 'instagramPosts'));
    }

    public function index()
    {
        $bidangs = Bidang::orderBy('title')->get();
        return view('backend.bidang.index', compact('bidangs'));
    }

    public function create()
    {
        return view('backend.bidang.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        $request->validate([
            'title' => [
                'required',
                Rule::unique('bidang'),
            ]
        ]);
        $bidang = new Bidang();
        $bidang->title = $input['title'];
        $bidang->description = $input['description'];
        $bidang->url = route('frontend.getBidang', \Str::slug($input['title']));
        if ($request->hasFile('gambar')) {
            $bidang->addMediaFromRequest('gambar')->usingName(substr($bidang->title, 0, 10))->toMediaCollection('bidang');
        }
        $bidang->save();
        session()->flash('message', 'Bidang baru telah ditambahkan.');
        return redirect()->route('dashboard.bidang');
    }

    public function edit($id)
    {
        $bidang = Bidang::find($id);
        return view('backend.bidang.edit', compact('bidang'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $input = $request->all();
        $bidang = Bidang::find($id);
        $request->validate([
            'title' => [
                'required',
                Rule::unique('bidang')->ignore($bidang->id),
            ]
        ]);
        $bidang->title = $input['title'];
        $bidang->description = $input['description'];
        $bidang->url = route('frontend.getBidang', \Str::slug($input['title']));
        if ($request->hasFile('gambar')) {
            $bidang->clearMediaCollection('bidang');
            $bidang->addMediaFromRequest('gambar')->usingName($bidang->title)->toMediaCollection('bidang');
        }
        $bidang->save();
        session()->flash('message', 'Bidang telah diupdate.');
        return redirect()->route('dashboard.bidang');
    }

    public function delete($id): RedirectResponse
    {
        $bidang = Bidang::find($id);
        $bidang->delete();
        session()->flash('message', 'Bidang telah dihapus.');
        return redirect()->route('dashboard.bidang');
    }
}
