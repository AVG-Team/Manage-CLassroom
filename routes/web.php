<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Middleware\CheckAnonymousController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, "__invoke"])->name('home');


Route::group([
    "middleware" => CheckAnonymousController::class,
], function () {
    Route::get("/login", [LoginController::class, "login"])->name("login");
});
