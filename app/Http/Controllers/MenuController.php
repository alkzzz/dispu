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
        $categories = Category::whereNotIn('id', $category_menu_list)->orderBy('title')->get();
        $links = Link::whereNotIn('id', $link_menu_list)->orderBy('title')->get();
        $menus = Menu::orderBy('order')->get();
        return view('backend.menu.index', compact('pages', 'categories', 'links', 'menus'));
    }

    public function sort (Request $request): RedirectResponse {
        $input = $request->all();
        if($request->has('order')) {
            foreach ($input['order'] as $index => $id) {
                $menu = Menu::where('id', '!=', 1)->find($id);
                if ($menu) {
                    $menu->order = $index + 2;
                    $menu->save();
                }
            }
        }
        if($request->has('child_order')) {
            $parent = Menu::find($input['parent_id']);
            $parent->child = $input['child_order'];
            $parent->save();
        }
        session()->flash('message', 'Menu telah berhasil diurutkan.');
        return redirect()->route('dashboard.menu');
    }

    public function store (Request $request): RedirectResponse {
        $input = $request->all();
        if($request->has('menu')) {
            if(!empty($input['page_menu'])) {
                $pages = Page::whereIn('id', $input['page_menu'])->get();
                foreach ($pages as $page) {
                    Menu::create([
                        'title' => $page->title,
                        'type' => 'page',
                        'type_id' => $page->id,
                        'url' => $page->url
                    ]);
                }
            }
            elseif(!empty($input['category_menu'])) {
                $categories = Category::whereIn('id', $input['category_menu'])->get();
                foreach ($categories as $category) {
                    Menu::create([
                        'title' => $category->title,
                        'type' => 'category',
                        'type_id' => $category->id,
                        'url' => $category->url
                    ]);
                }
            }
            elseif(!empty($input['link_menu'])) {
                $links = Link::whereIn('id', $input['link_menu'])->get();
                foreach ($links as $link) {
                    Menu::create([
                        'title' => $link->title,
                        'type' => 'link',
                        'type_id' => $link->id,
                        'url' => $link->url
                    ]);
                }

            }
        } elseif ($request->has('submenu')) {
            if($input['type'] == 'page') {
                $parent = Menu::find($input['parent_id']);
                $childArray = $input['selected'] ?? [];
                $pages = Page::whereIn('id', $input['selected'])->get();
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
            }
            else if($input['type'] == 'category') {
                $parent = Menu::find($input['parent_id']);
                $childArray = $input['selected'] ?? [];
                $categories = Category::whereIn('id', $input['selected'])->get();
                foreach ($categories as $category) {
                    $child = new Menu;
                    $child->title = $category->title;
                    $child->type = 'category';
                    $child->type_id = $category->id;
                    $child->url = $category->url;
                    $child->parent_id = $input['parent_id'];
                    $child->save();
                    $childArray[] = $child->id;
                }
                $parent->has_child = true;
                $parent->child = $childArray;
                $parent->save();
            }
            else if($input['type'] == 'link') {
                $parent = Menu::find($input['parent_id']);
                $childArray = $input['selected'] ?? [];
                $categories = Link::whereIn('id', $input['selected'])->get();
                foreach ($categories as $link) {
                    $child = new Menu;
                    $child->title = $link->title;
                    $child->type = 'link';
                    $child->type_id = $link->id;
                    $child->url = $link->url;
                    $child->parent_id = $input['parent_id'];
                    $child->save();
                    $childArray[] = $child->id;
                }
                $parent->has_child = true;
                $parent->child = $childArray;
                $parent->save();
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
        if (!$menu->parent_id && $menu->has_child) {
            foreach ($menu->child as $id) {
                $child = Menu::find($id);
                $child->delete();
            }
        }
        $menu->delete();

        session()->flash('message', 'Menu telah dihapus.');
        return redirect()->route('dashboard.menu');
    }
}
