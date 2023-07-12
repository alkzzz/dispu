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

Route::get('/berita', function () {
    return view('frontend.berita');
})->name('berita');

Route::get('/galeri', function () {
    return view('frontend.galeri');
})->name('galeri');

Route::get('/menu', [App\Http\Controllers\MenuController::class, 'index'])->name('menu');

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
    #Berita
    Route::get('/dashboard/berita', [App\Http\Controllers\PostController::class, 'index'])->name('dashboard.berita.index');
    Route::get('/dashboard/berita/show/{id}', [App\Http\Controllers\PostController::class, 'show'])->name('dashboard.berita.show');
    Route::get('/dashboard/berita/create', [App\Http\Controllers\PostController::class, 'create'])->name('dashboard.berita.create');
    Route::post('/dashboard/berita/store', [App\Http\Controllers\PostController::class, 'store'])->name('dashboard.berita.store');
    Route::get('/dashboard/berita/edit/{id}', [App\Http\Controllers\PostController::class, 'edit'])->name('dashboard.berita.edit');
    Route::put('/dashboard/berita/update/{id}', [App\Http\Controllers\PostController::class, 'update'])->name('dashboard.berita.update');
    Route::delete('/dashboard/berita/delete/{id}', [App\Http\Controllers\PostController::class, 'delete'])->name('dashboard.berita.delete');
    #Sosial Media
    Route::get('/dashboard/sosial-media', [App\Http\Controllers\SocmedController::class, 'index'])->name('dashboard.sosial-media.index');
    Route::post('/dashboard/sosial-media/update', [App\Http\Controllers\SocmedController::class, 'update'])->name('dashboard.sosial-media.update');
});

Route::get('{slug}', [App\Http\Controllers\PageController::class, 'getPage']);

