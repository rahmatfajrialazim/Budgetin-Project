<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\FinancialRecordController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [FinancialRecordController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/admin/bendahara', [UserController::class, 'index'])->name('admin.bendahara.index');
    Route::get('/admin/bendahara/create', [UserController::class, 'create'])->name('admin.bendahara.create');
    Route::post('/admin/bendahara/store', [UserController::class, 'store'])->name('admin.bendahara.store');
    Route::post('/financial/store', [FinancialRecordController::class, 'store'])->name('financial.store');
});

require __DIR__.'/auth.php';