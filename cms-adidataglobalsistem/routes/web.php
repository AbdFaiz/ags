<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
    return redirect('/login');
});

// Error routes
Route::view('/404', 'errors.404')->name('404');
Route::view('/500', 'errors.500')->name('500');

// Ganti Password
Route::get('/password/change', [PasswordController::class, 'showResetForm'])->name('password.change.form');
Route::post('/password/change', [PasswordController::class, 'changePassword'])->name('password.change');

Auth::routes();
Route::middleware(['auth', 'must_reset_password', 'active'])->group(function () {
    // Route::middleware('signed')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])
        ->name('dashboard');
        Route::get('/profile', [DashboardController::class, 'profile'])
        ->name('profile');
        Route::put('/profile/update', [DashboardController::class, 'updateProfile'])->name('profile.update');
        Route::get('/transactions', [DashboardController::class, 'transactions'])
        ->name('transactions');
        Route::get('/map', [DashboardController::class, 'map'])
        ->name('map');

        // Role management
        Route::resource('roles', 'App\Http\Controllers\RoleController');
        // User management
        Route::resource('users', 'App\Http\Controllers\UserController')->except(['index']);
        // Task management
        Route::resource('tasks', 'App\Http\Controllers\TaskController')->except((['show', 'edit', 'create']));
        Route::post('/tasks/{task}/status', [TaskController::class, 'updateStatus'])->name('tasks.status');
        // Event management
        Route::get('/calendar', [EventController::class, 'index'])
        ->name('calendar');
        Route::resource('events', EventController::class)->except(['index', 'show', 'edit', 'create']);
        Route::get('/events/fetch', [EventController::class, 'fetchEvents']);
        // Reset account password
    Route::put('/users/{user}/reset-password', [UserController::class, 'resetAccount'])->name('users.reset-password');
    // });

    Route::get('/users', [UserController::class, 'index'])->name('users.index');

    Route::prefix('emails')->group(function () {
        Route::get('/', [EmailController::class, 'index'])
        ->name('email.index');
        Route::get('/compose', [EmailController::class, 'showComposeForm'])->name('email.compose');
        Route::post('/compose/send', [EmailController::class, 'composeSend'])->name('email.send');

        // Toggle Star (Bintang)
    Route::post('/emails/{id}/star', [EmailController::class, 'toggleStar'])->name('email.toggleStar');

    // Update/Tambah Label ke Email
    Route::post('/emails/{id}/label', [EmailController::class, 'updateLabel'])->name('email.updateLabel');
        
        // Single email actions
        Route::post('/{id}/read', [EmailController::class, 'markAsRead'])->name('emails.mark-read');
        Route::post('/{id}/unread', [EmailController::class, 'markAsUnread'])->name('emails.mark-unread');
        Route::delete('/{id}/delete', [EmailController::class, 'deletePermanently'])->name('emails.force-delete');
        Route::post('/{id}/trash', [EmailController::class, 'moveToTrash'])->name('emails.trash');
        Route::post('/emails/{id}/restore', [EmailController::class, 'restoreFromTrash'])->name('emails.restore');
        Route::post('/{id}/flag', [EmailController::class, 'toggleFlag'])->name('emails.flag');
        
        // Bulk actions
        Route::post('/bulk', [EmailController::class, 'bulkAction'])->name('emails.bulk');
        
        // Folder actions
        Route::post('/mark-all-read', [EmailController::class, 'markAllAsRead'])->name('emails.mark-all-read');
        Route::post('/empty-trash', [EmailController::class, 'emptyTrash'])->name('emails.empty-trash');
        Route::post('/restore-all', [EmailController::class, 'restoreAllFromTrash'])->name('emails.restore-all');

        // Other action
        Route::get('/{ticketNumber}', [EmailController::class, 'showReplyForm'])->name(name: 'email.detail');
        Route::post('/{ticketNumber}/reply', [EmailController::class, 'reply'])->name('email.reply');
        Route::get('/attachments/download/{attachment}', [EmailController::class, 'downloadAttachment'])
        ->name('email.attachment.download');
    });
});

// Fallback untuk route yang tidak ditemukan
// Route::fallback(function () {
//     return response()->view('errors.404', [], 404);
// });
