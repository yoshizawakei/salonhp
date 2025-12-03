<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalonController;

Route::middleware("auth")->group(function () {
    Route::get("/booking", [SalonController::class, "booking"]);
});

Route::get("/", [SalonController::class, "index"]);
Route::get("/register", [SalonController::class, "register"])->name("register");
Route::get("/login", [SalonController::class, "login"])->name("login");
Route::post("/logout", [SalonController::class, "logout"]);
