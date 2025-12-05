<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SalonController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsController;

// Admin Controllers
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminBookingController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminCourseController;
use App\Http\Controllers\Admin\AdminNewsController;
use App\Http\Controllers\Admin\AdminSalesController;
use App\Http\Controllers\Admin\Auth\AdminLoginController;

use App\Http\Controllers\SitemapController;

// ----------------------
// Public Routes
// ----------------------

// TOP
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

// User Auth（必要に応じて中身は AuthController などへ）
Route::get('/login', [SalonController::class, 'login'])->name('login');
Route::get('/register', [SalonController::class, 'register'])->name('register');
Route::post('/logout', [SalonController::class, 'logout'])->name('logout');

// ----------------------
// Admin Routes
// ----------------------

// 管理者ログイン
Route::get('/admin/login', [AdminLoginController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

// 管理画面本体（admin ガードで保護）
Route::prefix('admin')
    ->middleware('auth:admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

        // 予約管理
        Route::resource('bookings', AdminBookingController::class);

        // 顧客管理（カルテ）
        Route::resource('users', AdminUserController::class);

        // コース管理
        Route::resource('courses', AdminCourseController::class);

        // NEWS 管理
        Route::resource('news', AdminNewsController::class);

        // 売上管理
        Route::get('sales', [AdminSalesController::class, 'index'])->name('sales.index');
        Route::get('sales/export', [AdminSalesController::class, 'export'])->name('sales.export');
    });

Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');