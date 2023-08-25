<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Http\RedirectResponse;

class DocumentController extends Controller
{
    public function frontend_index()
    {
        $documents = DB::table('documents')->orderBy('created_at')->get();
        return view('frontend.dokumen', compact('documents'));
    }

    public function index()
    {
        $documents = DB::table('documents')->orderBy('created_at')->get();
        return view('backend.dokumen.index', compact('documents'));
    }

    public function create()
    {
        return view('backend.dokumen.create');
    }

    public function store(Request $request)
    {
        $title = $request->title;
        $file = $request->file('dokumen');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('dokumen'), $fileName);
        $file_path = 'dokumen/' . $fileName;
        \DB::table('documents')->insert([
            'title' => $title,
            'path' => $file_path,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        session()->flash('message', 'Dokumen baru telah ditambahkan.');
        return redirect()->route('dashboard.dokumen.index');
    }

    public function edit($id)
    {
        $document = DB::table('documents')->where('id', $id)->first();
        return view('backend.dokumen.edit', compact('document'));
    }

    public function update(Request $request, $id)
    {
        $title = $request->title;
        if ($request->has('dokumen')) {
            $file = $request->file('dokumen');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('dokumen'), $fileName);
            $file_path = 'dokumen/' . $fileName;
            DB::table('documents')
                ->where('id', $id)
                ->update([
                    'title' => $title,
                    'path' => $file_path,
                    'updated_at' => now(),
                ]);
        } else {
            DB::table('documents')
                ->where('id', $id)
                ->update([
                    'title' => $title,
                    'updated_at' => now(),
                ]);
        }

        session()->flash('message', 'Dokumen telah diupdate.');
        return redirect()->route('dashboard.dokumen.index');
    }

    public function delete($id): RedirectResponse
    {
        DB::table('documents')->where('id', $id)->delete();
        session()->flash('message', 'Dokumen telah dihapus.');
        return redirect()->route('dashboard.dokumen.index');
    }

    public function download($id)
    {
        $document = DB::table('documents')->where('id', $id)->first();

        if ($document) {
            $filePath = public_path($document->path);
            $extension = pathinfo($filePath, PATHINFO_EXTENSION);
            DB::table('documents')->where('id', $id)->increment('downloads');

            return response()->download($filePath, $document->title . '.' . $extension);
        } else {
            return abort(404); // Document not found
        }
    }
}
