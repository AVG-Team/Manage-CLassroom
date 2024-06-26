<?php

use App\Http\Controllers\Auth\EmailVerifiedController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use App\Http\Middleware\CheckAnonymousMiddleware;
use App\Http\Middleware\CheckLoginMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SalaryController;

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
    "middleware" => CheckAnonymousMiddleware::class,
], function () {
    Route::get("/login", [LoginController::class, "index"])->name("login");
    Route::post("/login", [LoginController::class, "login"])->name("login.process");
    Route::get("/register", [RegisterController::class, "index"])->name("register");
    Route::post("/register", [RegisterController::class, "register"])->name("register.process");
    Route::get("/email/verify", [EmailVerifiedController::class, "__invoke"])->name("email.verified");
    Route::get("forgot-password", [ForgotPasswordController::class, "index"])->name("forgot-password");
});

Route::group([
    "middleware" => CheckLoginMiddleware::class,
], function () {
    Route::get("/logout", [LogoutController::class, "__invoke"])->name("logout");
    Route::get("profile", [ProfileController::class, "index"])->name("profile");
    Route::post("profile", [ProfileController::class, "process"])->name("profile.process");
    Route::get('/checkout/{classroom}', [PaymentController::class, "checkout"])->name('checkout');
    Route::post('/checkout/success', [PaymentController::class, "success"])->name('checkout.success');
    Route::get('/classroom/ex/{exercise}', [ExerciseController::class, "index"])->name('exercise');
    Route::get('/classroom', [ClassroomController::class, "index"])->name('classroom');
    Route::get('/classroom/participate', [ClassroomController::class, "participate"])->name('participate');
    Route::get('/classroom/detail/{classroom}', [ClassroomController::class, "detail"])->name('classroom.detail');
    Route::post('/classroom/detail/{classroom}/exercise', [ExerciseController::class, "store"])->name('exercise.store');
    Route::patch('/classroom/ex/{exercise}', [ExerciseController::class, 'update'])->name('exercise.update');
    Route::post('/classroom/detail/{classroom}', [NotificationController::class, "store"])->name('notification.store');
    Route::get('/classroom/all-exercises', [ExerciseController::class, "showAll"])->name('all-exercises');
    Route::get('/list-classroom', [ClassroomController::class, "showAll"])->name('list-classroom');
    Route::get('/salary/{user}', [SalaryController::class, "showSalary"])->name('salary');
});


//test
Route::get('/test', [TestController::class, "__invoke"])->name('test');





