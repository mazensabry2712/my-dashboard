<?php

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\BrandController;
use App\Http\Controllers\Dashboard\DashboardController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::controller(DashboardController::class)->group(function () {

   Route::any('/admin-login', 'admin_login')->name('admin.login');
    Route::any('/admin-forget-password', 'admin_forget_password')->name('admin.forget.password');
    Route::get('/admin-reset-password/{id}', 'admin_reset_password')->name('admin.reset.password');
    Route::any('/admin-update-password', 'admin_update_password')->name('admin.forget.update');


    });

 Route::get('/', function () {
     return view('dashboard');
 })->middleware(['auth', 'verified'])->name('dashboard');



        //  Brands
Route::middleware(['auth', 'verified','role:admin'])->group(function () {
    Route::get('/brands', [BrandController::class, 'index'])->name('brands.index');
    Route::get('/brands/create', [BrandController::class, 'create'])->name('brands.create');
    // Route::post('/brands', [BrandController::class, 'store'])->name('brands.store');
    // Route::get('/brands/{brand}', [BrandController::class, 'show'])->name('brands.show');
    // Route::get('/brands/{brand}/edit', [BrandController::class, 'edit'])->name('brands.edit');
    // Route::put('/brands/{brand}', [BrandController::class, 'update'])->name('brands.update');
    // Route::delete('/brands/{brand}', [BrandController::class, 'destroy'])->name('brands.destroy');
});






Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
