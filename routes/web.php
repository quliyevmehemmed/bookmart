<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\OrederController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ProductController as ControllersProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
 

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/product/{slug}', [FrontendController::class, 'show'])->name('show.detail');
Route::get('/products/{slug?}', [ControllersProductController::class, 'index'])->name('products.index');

// 2. İstifadəçi Dashboard (Breeze-in standart paneli)
Route::get('/account', function () {
    return view('profile.account');
})->middleware(['auth', 'verified'])->name('account');

Route::get('/panel', function () {
    $user = auth()->user();

    if ($user && $user->role === 'admin') {
        return view('layouts.admin');
    }

    return redirect('/')->with('error', 'Sizin admin icazəniz yoxdur!');
})->middleware(['auth']);

// 4. Məhsulların (Kitabların) İdarə Edilməsi
Route::get('admin/products/category/{categoryId}', [ProductController::class, 'index'])->name('admin.products.category');
Route::resource('admin/products', ProductController::class)->middleware(['auth']);

// 5. Profil tənzimləmələri (Breeze-in standart marşrutları)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/about-us', [PageController::class, 'about'])->name('about-us');
Route::get('/delivery', [PageController::class, 'delivery'])->name('delivery');
Route::get('/contact-us', [PageController::class, 'contact'])->name('contact-us');
Route::get('/kitabini-sat', [PageController::class, 'sellBook'])->name('sell-book');

Route::post('/contact-submit', [ContactController::class, 'store'])->name('contact.store');
Route::get('/admin/messages', [ContactController::class, 'index'])->name('admin.messages');
Route::delete('admin/messages/{id}', [ContactController::class, 'destroy'])->name('admin.messages.destroy');
Route::patch('/admin/messages/{id}/read', [ContactController::class, 'markAsRead'])->name('admin.messages.read');




Route::get('/admin/orders', [OrederController::class, 'index'])->name('admin.orders');
Route::delete('admin/orders/{id}', [OrederController::class, 'destroy'])->name('admin.orders.destroy');
Route::get('admin/orders/{order}', [OrederController::class, 'show'])->name('admin.orders.show');
Route::put('admin/orders/{order}', [OrederController::class, 'update'])->name('admin.orders.update');

Route::get('/admin/category', [AdminCategoryController::class, 'index'])->name('admin.category');
Route::resource('admin/categories', AdminCategoryController::class);

// Auth (Login, Register, Logout) marşrutlarını yükləyir
require __DIR__.'/auth.php';