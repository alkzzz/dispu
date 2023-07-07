<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Page;

class PageController extends Controller
{
    public function getPage($slug)
    {
        $page = Page::where('slug', $slug)->first();
        if ($page != null)
        {
            return view('frontend.page', compact('page'));
        }
        else {
            abort(404);
        }
    }

    public function index() {
        $pages = Page::latest()->get();
        return view('backend.page.index', compact('pages'));
    }

    public function show($id) {
        $page = Page::find($id);
        return view('backend.page.show', compact('page'));
    }

    public function create() {
        return view('backend.page.create');
    }

    public function store(Request $request): RedirectResponse {
        $input = $request->all();
        $page = new page();
        $page->title = $input['title'];
        $page->content = $input['content'];
        $page->save();
        session()->flash('message', 'Halaman baru telah ditambahkan.');
        return redirect()->route('dashboard.halaman.index');
    }

    public function edit($id) {
        $page = Page::find($id);
        return view('backend.page.edit', compact('page'));
    }

    public function update(Request $request, $id): RedirectResponse {
        $input = $request->all();
        $page = Page::find($id);
        $page->title = $input['title'];
        $page->content = $input['content'];
        $page->save();
        session()->flash('message', 'Halaman telah diupdate.');
        return redirect()->route('dashboard.halaman.index');
    }

    public function delete($id): RedirectResponse {
        $page = Page::find($id);
        $page->delete();
        session()->flash('message', 'Halaman telah dihapus.');
        return redirect()->route('dashboard.halaman.index');
    }
}
