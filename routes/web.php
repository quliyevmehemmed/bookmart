<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 1. Ana Səhifə (Bokmartin görünəcəyi yer)
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [FrontendController::class, 'index'])->name('home');

// 2. İstifadəçi Dashboard (Breeze-in standart paneli)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/panel', function () {
    $user = auth()->user();

    if ($user && $user->role === 'admin') {
        return view('layouts.admin');
    }

    return redirect('/')->with('error', 'Sizin admin icazəniz yoxdur!');
})->middleware(['auth']);

// 4. Məhsulların (Kitabların) İdarə Edilməsi
Route::resource('admin/products', ProductController::class)->middleware(['auth']);

// 5. Profil tənzimləmələri (Breeze-in standart marşrutları)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth (Login, Register, Logout) marşrutlarını yükləyir
require __DIR__.'/auth.php';