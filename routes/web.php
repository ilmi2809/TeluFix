<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AspirasiController;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/histori', [HistoryController::class, 'index'])->name('histori')->middleware('auth');
Route::delete('/laporan/{report}', [HistoryController::class, 'destroy'])->name('laporan.delete');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/berita', [DashboardController::class, 'berita'])->name('berita');
Route::get('/lapor/edit/{id}', [ReportController::class, 'edit'])->name('lapor.update');
Route::get('/lapor', [DashboardController::class, 'lapor'])->name('lapor');
Route::delete('/lapor/{id}', [ReportController::class, 'destroy'])->name('lapor.edit');
Route::put('/lapor/{id}', [ReportController::class, 'update'])->name('lapor.destroy');
Route::get('/histori', [DashboardController::class, 'histori'])->name('histori');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/lapor', [ReportController::class, 'store'])->name('lapor.store');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::post('/aspirasi', [AspirasiController::class, 'store'])->name('aspirasi.store');
Route::put('/aspirasi/{id}', [AspirasiController::class, 'update'])->name('aspirasi.destroy');
Route::get('/aspirasi', [DashboardController::class, 'aspirasi'])->name('aspirasi');
Route::get('/aspirasi/edit/{id}', [AspirasiController::class, 'edit'])->name('aspirasi.update');
Route::get('/aspirasi', [DashboardController::class, 'aspirasi'])->name('aspirasi');
Route::post('/aspirasi', [AspirasiController::class, 'store'])->name('aspirasi.store');
Route::get('/aspirasi/edit/{id}', [AspirasiController::class, 'edit'])->name('aspirasi.update');
Route::put('/aspirasi/{id}', [AspirasiController::class, 'update'])->name('aspirasi.update');
Route::delete('/aspirasi/{id}', [AspirasiController::class, 'destroy'])->name('aspirasi.destroy');
Route::get('/histori_aspirasi', [DashboardController::class, 'histori_aspirasi'])->name('histori_aspirasi');
Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications');
Route::post('/notifications/{id}/mark-as-read', [NotificationController::class, 'markAsRead']);
Route::get('/notifications/unread-count', [NotificationController::class, 'getUnreadCount']);
