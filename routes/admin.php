<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\LogoutController;
use App\Http\Controllers\Admin\ClassroomController;
use App\Http\Controllers\Admin\ExerciseController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\SalaryController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Middleware\CheckAnonymousAdminMiddleware;
use App\Http\Middleware\CheckLoginAdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::group([
    "middleware" => CheckAnonymousAdminMiddleware::class,
], function () {
    Route::get('/login', [LoginController::class, "index"])->name('login');
    Route::post('login', [LoginController::class, "login"])->name('login.process');
});

Route::group([
    "middleware" => CheckLoginAdminMiddleware::class,
], function () {
    Route::get('/logout', [LogoutController::class, "__invoke"])->name('logout');
    Route::get('/', [HomeController::class, "__invoke"])->name('home');
    Route::get('/salary', [SalaryController::class, "index"])->name('salary');

    Route::get('users', [UsersController::class, "index"])->name('users.index');
    Route::get('users/get-table', [UsersController::class, "getTableUsers"])->name('users.table');
    Route::get('users/create', [UsersController::class, "create"])->name('users.create');
    Route::post('users/store', [UsersController::class, "store"])->name('users.store');
    Route::get('users/edit/{user:uuid}', [UsersController::class, "edit"])->name('users.edit');
    Route::post('users/update/{user:uuid}', [UsersController::class, "update"])->name('users.update');
    Route::delete('users/delete/{user:uuid}', [UsersController::class, "delete"])->name('users.delete');
    Route::delete('users/force-delete/{user:uuid}', [UsersController::class, "__forceDelete"])->name('users.force-delete');

    Route::get('classrooms/subscribed', [ClassroomController::class, "usersSubscribed"])->name('users.subscribed');

    Route::get('exercises', [ExerciseController::class, "index"])->name('exercises.index');
    Route::get('exercises/get-table', [ExerciseController::class, "getTableExercise"])->name('exercises.table');
    Route::get('exercises/edit/{exercise:id}', [ExerciseController::class, "edit"])->name('exercises.edit');
});

