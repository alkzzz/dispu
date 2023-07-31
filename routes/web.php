<?php

use App\Http\Controllers\HomePageController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', HomePageController::class)->name('index');

Route::get('/berita', [App\Http\Controllers\PostController::class, 'frontend_index'])->name('frontend.berita.index');

Route::get('/galeri', [App\Http\Controllers\GalleryController::class, 'frontend_index'])->name('frontend.galeri.index');

Route::get('/kontak', function () {
    return view('frontend.kontak');
})->name('kontak');

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

Route::middleware(['auth'])->group(function () {
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
    #Menu
    Route::get('/dashboard/menu', [App\Http\Controllers\MenuController::class, 'index'])->name('dashboard.menu');
    Route::post('/dashboard/menu/store', [App\Http\Controllers\MenuController::class, 'store'])->name('dashboard.menu.store');
    Route::post('/dashboard/menu/sort', [App\Http\Controllers\MenuController::class, 'sort'])->name('dashboard.menu.sort');
    Route::delete('/dashboard/menu/delete/{id}', [App\Http\Controllers\MenuController::class, 'delete'])->name('dashboard.menu.delete');
    #User
    Route::get('/dashboard/user', [App\Http\Controllers\UserController::class, 'index'])->name('dashboard.user');
    Route::put('/dashboard/user/reset-password/{id}', [App\Http\Controllers\UserController::class, 'reset'])->name('dashboard.reset.password');
    Route::delete('/dashboard/user/delete/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('dashboard.user.delete');
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
    #Backup
    Route::get('/dashboard/backup', function () {
        return view('backend.backup');
    })->name('dashboard.backup');
});

Route::get('/kategori/{slug}', [App\Http\Controllers\CategoryController::class, 'getCategory'])->name('frontend.getCategory');
Route::get('/berita/{slug}', [App\Http\Controllers\PostController::class, 'getPost'])->name('frontend.getPost');
Route::get('{slug}', [App\Http\Controllers\PageController::class, 'getPage'])->name('frontend.getPage');
