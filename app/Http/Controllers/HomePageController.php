<?php

namespace App\Http\Controllers;

use App\Models\Menu;

class HomePageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        return view('frontend.index');
    }
}
