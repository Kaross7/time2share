<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;  
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UitleenmarktController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/uitleenmarkt', function () {
    return view('uitleenmarkt');
})->name('uitleenmarkt');


Route::get('/leen-jouw-producten', function () {
    return view('leen-jouw-producten');
})->name('leen-jouw-producten');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


    Route::middleware(['auth', 'verified'])->group(function () {
        // Admin dashboard route
        Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    
        // Routes voor het blokkeren/deblokkeren van gebruikers
        Route::get('/admin/block/{id}', [AdminController::class, 'blockUser'])->name('admin.block');
        Route::get('/admin/unblock/{id}', [AdminController::class, 'unblockUser'])->name('admin.unblock');
        
        // Route voor het verwijderen van producten
        Route::delete('/admin/deleteProduct/{productId}', [AdminController::class, 'deleteProduct'])->name('admin.deleteProduct');
    });
    

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');  
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::post('/product/leen/{product}', [ProductController::class, 'lendProduct'])->name('product.lend');
    Route::get('/uitleenmarkt', [UitleenmarktController::class, 'index'])->name('uitleenmarkt');
    Route::get('/jouw-geleende-producten', [ProductController::class, 'geleendeProducten'])->name('geleende-producten');
    Route::post('/teruggeven/{product}', [ProductController::class, 'teruggeven'])->name('product.teruggeven');
    Route::post('/bevestig-teruggeven/{product}', [ProductController::class, 'bevestigTeruggeven'])->name('product.bevestig-teruggeven');
});

require __DIR__.'/auth.php';
