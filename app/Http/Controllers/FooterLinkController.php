<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FooterLinkController extends Controller
{
    public function index()
    {
        $links = \DB::table('links')->orderBy('title')->get();
    }
}
