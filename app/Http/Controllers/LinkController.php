<?php

namespace App\Http\Controllers;

use App\Models\Link;

class LinkController extends Controller
{
    public function index()
    {
        $link_ids = Link::pluck('id');
        return view('backend.customlink', compact('link_ids'));
    }
}
