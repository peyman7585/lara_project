<?php

use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\ProfileController;
use App\Mail\TopicCraeted;
use App\Mail\TopicCreate;

use App\Models\User;
use App\Services\notifications\Notification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
// $notification= resolve(Notification::class);
// $notification->sendSms(User::find(1), "سلام");
    return view('home');
});
Route::get('/notification/send-email',[NotificationsController::class,'email'])->name('notifications.form.email');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
