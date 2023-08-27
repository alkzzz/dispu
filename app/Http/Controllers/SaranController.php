<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class SaranController extends Controller
{
    public function index()
    {
        $daftar_saran = \DB::table('saran')->orderBy('created_at')->get();
        return view('backend.saran', compact('daftar_saran'));
    }

    public function kirim(Request $request): RedirectResponse
    {
        $input = $request->all();
        // dd($input);
        \DB::table('saran')->insert([
            'nama' => $input['nama'],
            'isi' => $input['isi']
        ]);
        session()->flash('message', 'Saran anda telah berhasil dikirim.');
        return redirect()->back();
    }
}
