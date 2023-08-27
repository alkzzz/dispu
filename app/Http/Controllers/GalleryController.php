<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Validation\Rule;
use Illuminate\Http\RedirectResponse;

class GalleryController extends Controller
{
    public function frontend_index()
    {
        $galleries = Gallery::latest()->paginate(9);
        return view('frontend.galeri', compact('galleries'));
    }

    public function index()
    {
        $galleries = Gallery::latest()->get();
        return view('backend.galeri.index', compact('galleries'));
    }

    public function create()
    {
        return view('backend.galeri.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        $request->validate([
            'title' => [
                'required',
                Rule::unique('galleries'),
            ]
        ]);
        $galeri = new Gallery();
        $galeri->title = $input['title'];
        $galeri->location = $input['location'];
        if ($request->hasFile('gambar')) {
            $galeri->addMediaFromRequest('gambar')->usingName(substr($galeri->title, 0, 10))->toMediaCollection('galeri');
        }
        $galeri->save();
        session()->flash('message', 'Galeri baru telah ditambahkan.');
        return redirect()->route('dashboard.galeri.index');
    }

    public function edit($id)
    {
        $galeri = Gallery::find($id);
        return view('backend.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $input = $request->all();
        $galeri = Gallery::find($id);
        $request->validate([
            'title' => [
                'required',
                Rule::unique('galleries')->ignore($galeri->id),
            ]
        ]);
        $galeri->title = $input['title'];
        $galeri->location = $input['location'];
        if ($request->hasFile('gambar')) {
            $galeri->clearMediaCollection('galeri');
            $galeri->addMediaFromRequest('gambar')->usingName($galeri->title)->toMediaCollection('galeri');
        }
        $galeri->save();

        session()->flash('message', 'Galeri telah diupdate.');
        return redirect()->route('dashboard.galeri.index');
    }

    public function delete($id): RedirectResponse
    {
        $galeri = Gallery::find($id);
        $galeri->delete();
        session()->flash('message', 'Galeri telah dihapus.');
        return redirect()->route('dashboard.galeri.index');
    }
}
