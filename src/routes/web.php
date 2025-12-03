<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalonController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsController;

// Admin
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminBookingController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminCourseController;
use App\Http\Controllers\Admin\AdminNewsController;
use App\Http\Controllers\Admin\AdminSalesController;

Route::get('/', [SalonController::class, 'index'])->name('home');

// News
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');

// Booking
Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');
Route::post('/booking/confirm', [BookingController::class, 'confirm'])->name('booking.confirm');
Route::post('/booking/send', [BookingController::class, 'send'])->name('booking.send');
Route::get('/booking/thanks', [BookingController::class, 'thanks'])->name('booking.thanks');

// Contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');
Route::get('/contact/thanks', [ContactController::class, 'thanks'])->name('contact.thanks');

// Auth
Route::get('/login', [SalonController::class, 'login'])->name('login');
Route::get('/register', [SalonController::class, 'register'])->name('register');
Route::post('/logout', [SalonController::class, 'logout'])->name('logout');

// ----------------
// Admin
// ----------------
Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->name('admin.')
    ->group(function () {

        Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
        // 予約管理
        Route::resource('bookings', AdminBookingController::class);
        // 顧客（カルテ）管理
        Route::resource('users', AdminUserController::class);
        // コース管理
        Route::resource('courses', AdminCourseController::class);
        // News 管理
        Route::resource('news', AdminNewsController::class);
        // 売上管理
        Route::get('sales', [AdminSalesController::class, 'index'])->name('sales.index');
        Route::get('sales/export', [AdminSalesController::class, 'export'])->name('sales.export');
    });

Route::get('/admin/sales/export', [AdminSalesController::class, 'export'])
    ->name('admin.sales.export');
