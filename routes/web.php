<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\admin\ContactController as AdminContactController;
use App\Http\Controllers\admin\GalleryController;
use App\Http\Controllers\admin\HomeController as AdminHomeController;
use App\Http\Controllers\admin\MediaController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\TourController as AdminTourController;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\front\BuyController;
use App\Http\Controllers\front\HomeController;
use App\Http\Controllers\front\TourController;
use App\Http\Controllers\LanguageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Auth::routes();

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::put('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/tours', [TourController::class, 'index'])->name('tour.index');
Route::get('/tour/{id}', [TourController::class, 'show'])->name('tour.show');

Route::get('/order/{id}/show', [BuyController::class, 'show'])->name('buy.show');
Route::put('/order/{id}/store', [BuyController::class, 'store'])->name('buy.store');
Route::get('/order/{id}/confirmPay', [BuyController::class, 'confirmPay'])->name('buy.confirmPay');

// Language Switch
Route::get('lang/{locale}', [LanguageController::class, 'swap'])->name("lang");

// Admin panel
Route::prefix('/admin')->group(function () {
    Route::get('/', [AdminHomeController::class, 'index'])->name("admin.home");

    // Contact
    Route::get('/contact', [AdminContactController::class, 'index'])->name("admin.contact.index");
    Route::get('/contact/{id}/delete', [AdminContactController::class, 'destroy'])->name("admin.contact.delete");

    // Order
    Route::get('/order', [OrderController::class, 'index'])->name("admin.order.index");
    Route::get('/order/{id}/', [OrderController::class, 'show'])->name("admin.order.show");
    Route::get('/order/{id}/delete', [OrderController::class, 'destroy'])->name("admin.order.delete");

    // Tour
    Route::get('/tour', [AdminTourController::class, 'index'])->name("admin.tour.index");
    Route::get('/tour/create', [AdminTourController::class, 'create'])->name("admin.tour.create");
    Route::put('/tour/store', [AdminTourController::class, 'store'])->name("admin.tour.store");
    Route::get('/tour/{id}/edit', [AdminTourController::class, 'edit'])->name("admin.tour.edit");
    Route::get('/tour/{id}/show', [AdminTourController::class, 'show'])->name("admin.tour.show");
    Route::put('/tour/{id}/update', [AdminTourController::class, 'update'])->name("admin.tour.update");
    Route::get('/tour/{id}/delete', [AdminTourController::class, 'destroy'])->name("admin.tour.delete");

    // Media
    Route::get('/media/{id}/create', [MediaController::class, 'create'])->name("admin.media.create");
    Route::put('/media/{id}/store', [MediaController::class, 'store'])->name("admin.media.store");
    Route::get('/media/{id}/edit', [MediaController::class, 'edit'])->name("admin.media.edit");
    Route::put('/media/{id}/update', [MediaController::class, 'update'])->name("admin.media.update");
    Route::get('/media/{id}/delete', [MediaController::class, 'destroy'])->name("admin.media.delete");

    // Gallery
    Route::get('/gallery', [GalleryController::class, 'index'])->name("admin.gallery.index");
    Route::get('/gallery/create', [GalleryController::class, 'create'])->name("admin.gallery.create");
    Route::put('/gallery/store', [GalleryController::class, 'store'])->name("admin.gallery.store");
    Route::get('/gallery/{id}/edit', [GalleryController::class, 'edit'])->name("admin.gallery.edit");
    Route::put('/gallery/{id}/update', [GalleryController::class, 'update'])->name("admin.gallery.update");
    Route::get('/gallery/{id}/delete', [GalleryController::class, 'destroy'])->name("admin.gallery.delete");
});
