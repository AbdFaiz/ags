<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
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

// Kirim email dari kontak section
Route::post('/mail/send', [ContactController::class, 'send'])->name('mail.send');

Route::middleware('track.visitors')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
    // Route Publik
    Route::get('/produk', [ProductController::class, 'produk'])->name('public.produk');
    // Blog
    Route::get('/blog', [PostController::class, 'post'])->name('posts.index');
    // Baca detail artikel (menggunakan slug)
    Route::get('/blog/{post}', [PostController::class, 'show'])->name('posts.show');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Produk CRUD
    Route::get('/admin/produk', [ProductController::class, 'index'])->name('admin.produk.index');
    Route::post('/admin/produk', [ProductController::class, 'store'])->name('admin.produk.store');
    Route::put('/admin/produk/{product}', [ProductController::class, 'update'])->name('admin.produk.update');
    Route::delete('/admin/produk/{product}', [ProductController::class, 'destroy'])->name('admin.produk.destroy');

    // Blog
    Route::resource('/admin/posts', PostController::class)
        ->names('admin.posts')
        ->except(['show']);

    // Tag Management
    Route::resource('/admin/tags', TagController::class)->names('admin.tags');
});

require __DIR__.'/auth.php';
