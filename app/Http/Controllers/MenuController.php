<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Page;
use App\Models\Category;
use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page_menu_list = Menu::where('type', 'page')->pluck('type_id');
        $category_menu_list = Menu::where('type', 'category')->pluck('type_id');
        $link_menu_list = Menu::where('type', 'link')->pluck('type_id');
        $pages = Page::whereNotIn('id', $page_menu_list)->orderBy('title')->get();
        $categories = Category::whereNotIn('id', $category_menu_list)->orderBy('name')->get();
        $links = Link::whereNotIn('id', $link_menu_list)->orderBy('name')->get();
        $menus = Menu::orderBy('order')->get();
        return view('backend.menu.index', compact('pages', 'categories', 'links', 'menus'));
    }

    public function store (Request $request): RedirectResponse {
        $input = $request->all();
        if(!empty($input['page_menu'])) {
            $pages = Page::whereIn('id', $input['page_menu'])->get();
            if(isset($input['submenu'])) {
                $parent = Menu::find($input['parent_id']);
                $childArray = $parent->child ?? [];
                foreach ($pages as $page) {
                    $child = new Menu;
                    $child->title = $page->title;
                    $child->type = 'page';
                    $child->type_id = $page->id;
                    $child->url = $page->url;
                    $child->parent_id = $input['parent_id'];
                    $child->save();
                    $childArray[] = $child->id;
                }
                $parent->has_child = true;
                $parent->child = $childArray;
                $parent->save();
                session()->flash('message', 'Menu baru telah ditambahkan.');
                return redirect()->route('dashboard.menu');
            } else {
                foreach ($pages as $page) {
                    Menu::create([
                        'title' => $page->title,
                        'type' => 'page',
                        'type_id' => $page->id,
                        'url' => $page->url
                    ]);
                }
                session()->flash('message', 'Menu baru telah ditambahkan.');
                return redirect()->route('dashboard.menu');
            }
        }

        session()->flash('message', 'Menu baru telah ditambahkan.');
        return redirect()->route('dashboard.menu');
    }

    public function delete($id): RedirectResponse {
        $menu = Menu::find($id);
        if($menu->parent_id) {
            $parent = Menu::find($menu->parent_id);
            $childArray = $parent->child;
            $index = array_search($menu->id, $childArray);
            if ($index !== false) {
                unset($childArray[$index]);
            }
            if(empty($childArray)) {
                $parent->has_child = false;
                $parent->save();
            } else {
                $parent->has_child = true;
                $parent->child = $childArray;
                $parent->save();
            }
        }
        $menu->delete();

        session()->flash('message', 'Menu telah dihapus.');
        return redirect()->route('dashboard.menu');
    }
}
