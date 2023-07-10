<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SocmedController extends Controller
{
    public function index() {
        $socmeds = \DB::table('socmeds')->orderBy('name')->get();
        return view('backend.socmed', compact('socmeds'));
    }

    public function update(Request $request)
    {
        if ($request->ajax()) {
            \DB::table('socmeds')
            ->where('id', $request->pk)
            ->update([
                $request->name => $request->value
            ]);
            return response()->json(['success' => true]);
        }
    }
}
