<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomePageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

#Homepage
Route::get('/', HomePageController::class)->name('index');
#Berita
Route::get('/berita', [App\Http\Controllers\PostController::class, 'frontend_index'])->name('frontend.berita.index');
#Galeri
Route::get('/galeri', [App\Http\Controllers\GalleryController::class, 'frontend_index'])->name('frontend.galeri.index');
#Saran
Route::post('/saran/kirim', [App\Http\Controllers\SaranController::class, 'kirim'])->name('frontend.kirim.saran');
#Dokumen
Route::get('/daftar-dokumen', [App\Http\Controllers\DocumentController::class, 'frontend_index'])->name('dokumen');
Route::get('/dokumen/download/{id}', [App\Http\Controllers\DocumentController::class, 'download'])->name('dokumen.download');
#Konsultasi Jasa Konstruksi
Route::get('/konsultasi-jasa-konstruksi', function () {
    return view('frontend.konsultasi');
})->name('konsultasi-jasa-konstruksi');
#Kontak
Route::get('/kontak', function () {
    return view('frontend.kontak');
})->name('kontak');
#Search
Route::get('/search', function (Request $request) {
    $query = $request->q;
    $results = \App\Models\Post::search($query)->paginate(3)->appends(['q' => $query]);;
    return view('frontend.search-results', compact('query', 'results'));
})->name('search');

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

Route::group(['middleware' => ['role:Super Admin|Admin Bidang']], function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    #Kategori
    Route::get('/dashboard/kategori', [App\Http\Controllers\CategoryController::class, 'index'])->name('dashboard.kategori');
    #Custom Link
    Route::get('/dashboard/link', [App\Http\Controllers\LinkController::class, 'index'])->name('dashboard.link');
    #HalamanStatis
    Route::get('/dashboard/halaman', [App\Http\Controllers\PageController::class, 'index'])->name('dashboard.halaman.index');
    Route::get('/dashboard/halaman/show/{id}', [App\Http\Controllers\PageController::class, 'show'])->name('dashboard.halaman.show');
    Route::get('/dashboard/halaman/create', [App\Http\Controllers\PageController::class, 'create'])->name('dashboard.halaman.create');
    Route::post('/dashboard/halaman/store', [App\Http\Controllers\PageController::class, 'store'])->name('dashboard.halaman.store');
    Route::get('/dashboard/halaman/edit/{id}', [App\Http\Controllers\PageController::class, 'edit'])->name('dashboard.halaman.edit');
    Route::put('/dashboard/halaman/update/{id}', [App\Http\Controllers\PageController::class, 'update'])->name('dashboard.halaman.update');
    Route::delete('/dashboard/halaman/delete/{id}', [App\Http\Controllers\PageController::class, 'delete'])->name('dashboard.halaman.delete');
    #Berita
    Route::get('/dashboard/berita', [App\Http\Controllers\PostController::class, 'index'])->name('dashboard.berita.index');
    Route::get('/dashboard/berita/show/{id}', [App\Http\Controllers\PostController::class, 'show'])->name('dashboard.berita.show');
    Route::get('/dashboard/berita/create', [App\Http\Controllers\PostController::class, 'create'])->name('dashboard.berita.create');
    Route::post('/dashboard/berita/store', [App\Http\Controllers\PostController::class, 'store'])->name('dashboard.berita.store');
    Route::get('/dashboard/berita/edit/{id}', [App\Http\Controllers\PostController::class, 'edit'])->name('dashboard.berita.edit');
    Route::put('/dashboard/berita/update/{id}', [App\Http\Controllers\PostController::class, 'update'])->name('dashboard.berita.update');
    Route::delete('/dashboard/berita/delete/{id}', [App\Http\Controllers\PostController::class, 'delete'])->name('dashboard.berita.delete');
    #Galeri
    Route::get('/dashboard/galeri', [App\Http\Controllers\GalleryController::class, 'index'])->name('dashboard.galeri.index');
    Route::get('/dashboard/galeri/create', [App\Http\Controllers\GalleryController::class, 'create'])->name('dashboard.galeri.create');
    Route::post('/dashboard/galeri/store', [App\Http\Controllers\GalleryController::class, 'store'])->name('dashboard.galeri.store');
    Route::get('/dashboard/galeri/edit/{id}', [App\Http\Controllers\GalleryController::class, 'edit'])->name('dashboard.galeri.edit');
    Route::put('/dashboard/galeri/update/{id}', [App\Http\Controllers\GalleryController::class, 'update'])->name('dashboard.galeri.update');
    Route::delete('/dashboard/galeri/delete/{id}', [App\Http\Controllers\GalleryController::class, 'delete'])->name('dashboard.galeri.delete');
    #Sosial Media
    Route::get('/dashboard/sosial-media', [App\Http\Controllers\SocmedController::class, 'index'])->name('dashboard.sosial-media');
    Route::post('/dashboard/sosial-media/update', [App\Http\Controllers\SocmedController::class, 'update'])->name('dashboard.sosial-media.update');
    #Link Terkait
    Route::get('/dashboard/link-terkait', function () {
        return view('backend.footerlink');
    })->name('dashboard.link-terkait');
    #Ubah Password
    Route::post('/ubah-password', [App\Http\Controllers\UserController::class, 'update_password'])->name('dashboard.update.password');
    #Dokumen
    Route::get('/dashboard/dokumen', [App\Http\Controllers\DocumentController::class, 'index'])->name('dashboard.dokumen.index');
    Route::get('/dashboard/dokumen/create', [App\Http\Controllers\DocumentController::class, 'create'])->name('dashboard.dokumen.create');
    Route::post('/dashboard/dokumen/store', [App\Http\Controllers\DocumentController::class, 'store'])->name('dashboard.dokumen.store');
    Route::get('/dashboard/dokumen/edit/{id}', [App\Http\Controllers\DocumentController::class, 'edit'])->name('dashboard.dokumen.edit');
    Route::put('/dashboard/dokumen/update/{id}', [App\Http\Controllers\DocumentController::class, 'update'])->name('dashboard.dokumen.update');
    Route::delete('/dashboard/dokumen/delete/{id}', [App\Http\Controllers\DocumentController::class, 'delete'])->name('dashboard.dokumen.delete');
});

Route::group(['middleware' => ['role:Super Admin']], function () {
    #Menu
    Route::get('/dashboard/menu', [App\Http\Controllers\MenuController::class, 'index'])->name('dashboard.menu');
    Route::post('/dashboard/menu/store', [App\Http\Controllers\MenuController::class, 'store'])->name('dashboard.menu.store');
    Route::post('/dashboard/menu/sort', [App\Http\Controllers\MenuController::class, 'sort'])->name('dashboard.menu.sort');
    Route::delete('/dashboard/menu/delete/{id}', [App\Http\Controllers\MenuController::class, 'delete'])->name('dashboard.menu.delete');
    #Bidang
    Route::get('/dashboard/bidang', [App\Http\Controllers\BidangController::class, 'index'])->name('dashboard.bidang');
    Route::get('/dashboard/bidang/create', [App\Http\Controllers\BidangController::class, 'create'])->name('dashboard.bidang.create');
    Route::post('/dashboard/bidang/store', [App\Http\Controllers\BidangController::class, 'store'])->name('dashboard.bidang.store');
    Route::get('/dashboard/bidang/edit/{id}', [App\Http\Controllers\BidangController::class, 'edit'])->name('dashboard.bidang.edit');
    Route::put('/dashboard/bidang/update/{id}', [App\Http\Controllers\BidangController::class, 'update'])->name('dashboard.bidang.update');
    Route::delete('/dashboard/bidang/delete/{id}', [App\Http\Controllers\BidangController::class, 'delete'])->name('dashboard.bidang.delete');
    #User
    Route::get('/dashboard/user', [App\Http\Controllers\UserController::class, 'index'])->name('dashboard.user');
    Route::put('/dashboard/user/reset-password/{id}', [App\Http\Controllers\UserController::class, 'reset'])->name('dashboard.reset.password');
    Route::delete('/dashboard/user/delete/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('dashboard.user.delete');
    #Foto Depan
    Route::get('/dashboard/gambar-depan', function () {
        $gambardepan = \DB::table('gambar_depan')->latest()->first();
        return view('backend.gambar-depan', compact('gambardepan'));
    })->name('dashboard.gambar-depan');
    Route::post('/dashboard/gambar-depan/store', function (Request $request): RedirectResponse {
        $nama = $request->nama;
        if ($request->has('gambar')) {
            $file = $request->file('gambar');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img'), $fileName);
            $file_path = 'img/' . $fileName;
            \DB::table('gambar_depan')->insert([
                'nama' => $nama,
                'link' => $file_path,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } else {
            \DB::table('gambar_depan')->updateOrInsert([
                'nama' => $nama,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        return redirect()->route('dashboard');
    })->name('dashboard.gambar-depan.store');
    #Link Icon
    Route::get('/dashboard/link-icon', [App\Http\Controllers\LinkIconController::class, 'index'])->name('dashboard.link-icon.index');
    Route::get('/dashboard/link-icon/create', [App\Http\Controllers\LinkIconController::class, 'create'])->name('dashboard.link-icon.create');
    Route::post('/dashboard/link-icon/store', [App\Http\Controllers\LinkIconController::class, 'store'])->name('dashboard.link-icon.store');
    Route::get('/dashboard/link-icon/edit/{id}', [App\Http\Controllers\LinkIconController::class, 'edit'])->name('dashboard.link-icon.edit');
    Route::put('/dashboard/link-icon/update/{id}', [App\Http\Controllers\LinkIconController::class, 'update'])->name('dashboard.link-icon.update');
    Route::delete('/dashboard/link-icon/delete/{id}', [App\Http\Controllers\LinkIconController::class, 'delete'])->name('dashboard.link-icon.delete');
    #Kotak Saran
    Route::get('/dashboard/saran', [App\Http\Controllers\SaranController::class, 'index'])->name('dashboard.saran.index');
    #Kontak
    Route::resource('/dashboard/kontak', ContactController::class)->only(['index', 'update']);
    #Backup
    Route::get('/dashboard/backup', function () {
        return view('backend.backup');
    })->name('dashboard.backup');
    Route::get('dashboard/backup/download', function () {
        return response()->download(storage_path('app/backup-web-dispu-bjb/webdispubjb-2023-07-30-12-34-00.zip'));
    })->name('dashboard.backup-download');
});

Route::get('/bidang/{slug}', [App\Http\Controllers\BidangController::class, 'getBidang'])->name('frontend.getBidang');
Route::get('/kategori/{slug}', [App\Http\Controllers\CategoryController::class, 'getCategory'])->name('frontend.getCategory');
Route::get('/berita/{slug}', [App\Http\Controllers\PostController::class, 'getPost'])->name('frontend.getPost');
Route::get('{slug}', [App\Http\Controllers\PageController::class, 'getPage'])->name('frontend.getPage');
