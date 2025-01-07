<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ProfileController;

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
Route::get('/lapor', [DashboardController::class, 'lapor'])->name('lapor');
Route::get('/histori', [DashboardController::class, 'histori'])->name('histori');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/lapor', [ReportController::class, 'store'])->name('lapor.store');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
