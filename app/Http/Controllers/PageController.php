<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Page;
use App\Models\Menu;
use Illuminate\Validation\Rule;

class PageController extends Controller
{
    public function getPage($slug)
    {
        $page = Page::where('slug', $slug)->first();
        if ($page != null) {
            return view('frontend.page', compact('page'));
        } else {
            abort(404);
        }
    }

    public function index()
    {
        $pages = Page::latest()->get();
        return view('backend.page.index', compact('pages'));
    }

    public function show($id)
    {
        $page = Page::find($id);
        return view('backend.page.show', compact('page'));
    }

    public function create()
    {
        return view('backend.page.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        $request->validate([
            'title' => [
                'required',
                Rule::unique('pages'),
            ]
        ]);
        $page = new Page();
        $page->title = $input['title'];
        $page->content = $input['content'];
        $page->url = route('frontend.getPage', \Str::slug($input['title']));
        $page->save();
        session()->flash('message', 'Halaman baru telah ditambahkan.');
        return redirect()->route('dashboard.halaman.index');
    }

    public function edit($id)
    {
        $page = Page::find($id);
        return view('backend.page.edit', compact('page'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $input = $request->all();
        $page = Page::find($id);
        $request->validate([
            'title' => [
                'required',
                Rule::unique('pages')->ignore($page->id),
            ]
        ]);
        $page->title = $input['title'];
        $page->content = $input['content'];
        $page->save();

        $menu_page = Menu::where('type', 'page')->where('type_id', $id)->first();
        if (isset($menu_page)) {
            $menu_page->title = $page->title;
            $menu_page->url = $page->url;
            $menu_page->save();
        }
        session()->flash('message', 'Halaman telah diupdate.');
        return redirect()->route('dashboard.halaman.index');
    }

    public function delete($id): RedirectResponse
    {
        $page = Page::find($id);
        $page->delete();
        session()->flash('message', 'Halaman telah dihapus.');
        return redirect()->route('dashboard.halaman.index');
    }
}
