<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\TopController;
use Illuminate\Support\Facades\Route;

Route::get("login", [LoginController::class, "login"])->name("login");
Route::post('login', [LoginController::class, "submit"])->name("submit");

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get("", [TopController::class, "top"])->name("top");
});