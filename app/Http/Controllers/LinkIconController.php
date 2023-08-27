<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LinkIcon;
use Illuminate\Validation\Rule;
use Illuminate\Http\RedirectResponse;

class LinkIconController extends Controller
{
    public function index()
    {
        $linkicons = LinkIcon::orderBy('title')->get();
        return view('backend.linkicon.index', compact('linkicons'));
    }

    public function create()
    {
        return view('backend.linkicon.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        $request->validate([
            'title' => [
                'required',
                Rule::unique('link_icons'),
            ]
        ]);
        $linkicon = new LinkIcon();
        $linkicon->title = $input['title'];
        $linkicon->url = $input['url'];
        if ($request->hasFile('gambar')) {
            $linkicon->addMediaFromRequest('gambar')->usingName(substr($linkicon->title, 0, 10))->toMediaCollection('link-icon');
        }
        $linkicon->save();
        session()->flash('message', 'Link Icon baru telah ditambahkan.');
        return redirect()->route('dashboard.link-icon.index');
    }

    public function edit($id)
    {
        $linkicon = LinkIcon::find($id);
        return view('backend.linkicon.edit', compact('linkicon'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $input = $request->all();
        $linkicon = LinkIcon::find($id);
        $request->validate([
            'title' => [
                'required',
                Rule::unique('link_icons')->ignore($linkicon->id),
            ]
        ]);
        $linkicon->title = $input['title'];
        $linkicon->url = $input['url'];
        if ($request->hasFile('gambar')) {
            $linkicon->clearMediaCollection('link-icon');
            $linkicon->addMediaFromRequest('gambar')->usingName(substr($linkicon->title, 0, 10))->toMediaCollection('link-icon');
        }
        $linkicon->save();

        session()->flash('message', 'Link Icon telah diupdate.');
        return redirect()->route('dashboard.link-icon.index');
    }

    public function delete($id): RedirectResponse
    {
        $linkicon = LinkIcon::find($id);
        $linkicon->delete();
        session()->flash('message', 'Link Icon telah dihapus.');
        return redirect()->route('dashboard.link-icon.index');
    }
}
