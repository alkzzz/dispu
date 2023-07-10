<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomePageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $socmeds = \DB::table('socmeds')->orderBy('name')->get();
        return view('frontend.index', compact('socmeds'));
    }
}
