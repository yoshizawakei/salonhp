<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalonController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware("auth")->group(function () {
    Route::get("/booking", [SalonController::class, "booking"]);
});
Route::get("/", [SalonController::class, "index"]);
Route::get("/register", [SalonController::class, "register"])->name("register");
Route::get("/login", [SalonController::class, "login"])->name("login");
Route::post("/logout", [SalonController::class, "logout"]);
