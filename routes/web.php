<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PdfController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('home');
    Route::resource('clients', ClientController::class);
    Route::resource('bills', BillController::class);
    Route::get('bills/{bill}/invoice', [BillController::class, 'generateInvoice'])->name('bills.invoice'); 
    Route::get('bills/{bill}/kwitansi', [BillController::class, 'generatekwitansi'])->name('bills.kwitansi'); 
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::fallback(function () {
    return response()->view('components.404', [], 404);
});