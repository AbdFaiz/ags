<?php

use App\Http\Controllers\ContactController;
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

Route::get('/', action: function () {
    return view('landing');
});

// Route::get('/about', action: function () {
//     return view('about');
// });

// Route::get('/microchip', action: function () {
//     return view('microchip');
// });

// Route::get('/product', function(){
//     return view('product');
// });

// Route::get('/pricing', function(){
//     return view('pricing');
// });

// Route::get('/contact', function(){
//     return view('contact');
// });

// Post Mail
Route::post('/mail/send', [ContactController::class, 'send'])->name('mail.send');
