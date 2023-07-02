<?php

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

Route::get('/', function () {
    return view('frontend.index');
})->name('index');

Route::get('/berita', function () {
    return view('frontend.berita');
})->name('berita');

Route::get('/galeri', function () {
    return view('frontend.galeri');
})->name('galeri');

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
  ]);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    #Kategori
    Route::get('/dashboard/kategori', [App\Http\Controllers\CategoryController::class, 'index'])->name('dashboard.kategori');
    #Berita
    Route::get('/dashboard/berita', [App\Http\Controllers\PostController::class, 'index'])->name('dashboard.berita.index');
    Route::get('/dashboard/berita/show/{id}', [App\Http\Controllers\PostController::class, 'show'])->name('dashboard.berita.show');
    Route::get('/dashboard/berita/create', [App\Http\Controllers\PostController::class, 'create'])->name('dashboard.berita.create');
    Route::post('/dashboard/berita/store', [App\Http\Controllers\PostController::class, 'store'])->name('dashboard.berita.store');
    Route::get('/dashboard/berita/edit/{id}', [App\Http\Controllers\PostController::class, 'edit'])->name('dashboard.berita.edit');
    Route::put('/dashboard/berita/update/{id}', [App\Http\Controllers\PostController::class, 'update'])->name('dashboard.berita.update');
    Route::delete('/dashboard/berita/delete/{id}', [App\Http\Controllers\PostController::class, 'delete'])->name('dashboard.berita.delete');
});

