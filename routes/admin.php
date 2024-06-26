<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\LogoutController;
use App\Http\Controllers\Admin\ChartController;
use App\Http\Controllers\Admin\ClassroomController;
use App\Http\Controllers\Admin\DefaultSalaryController;
use App\Http\Controllers\Admin\ExerciseController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\SalaryController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\UsersSubscribedController;
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

    Route::get('users', [UsersController::class, "index"])->name('users.index');
    Route::get('users/get-table', [UsersController::class, "getTableUsers"])->name('users.table');
    Route::get('users/get-teacher', [UsersController::class, "getTeacher"])->name('users.get-teacher');
    Route::get('users/get-student', [UsersController::class, "getStudent"])->name('users.get-student');
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
    Route::delete('exercises/delete/{exercise:id}', [ExerciseController::class, "delete"])->name('exercises.delete');
    Route::delete('exercises/force-delete/{exercise:id}', [ExerciseController::class, "__forceDelete"])->name('exercises.force-delete');

    Route::get('classrooms', [ClassroomController::class, "index"])->name('classrooms.index');
    Route::get('classrooms/get-table', [ClassroomController::class, "getTableClassroom"])->name('classrooms.table');
    Route::get('classrooms/get-classroom', [ClassroomController::class, "getClassroom"])->name('classrooms.get-classroom');
    Route::get('classrooms/create', [ClassroomController::class, "create"])->name('classrooms.create');
    Route::post('classrooms/store', [ClassroomController::class, "store"])->name('classrooms.store');
    Route::get('classrooms/edit/{classroom:id}', [ClassroomController::class, "edit"])->name('classrooms.edit');
    Route::post('classrooms/update/{classroom:id}', [ClassroomController::class, "update"])->name('classrooms.update');
    Route::delete('classrooms/delete/{classroom:id}', [ClassroomController::class, "delete"])->name('classrooms.delete');
    Route::delete('classrooms/force-delete/{classroom:id}', [ClassroomController::class, "__forceDelete"])->name('classrooms.force-delete');

    Route::get('users_subscribed', [UsersSubscribedController::class, "index"])->name('users-subscribed.index');
    Route::get('users_subscribed/get-table', [UsersSubscribedController::class, "getTableUsersSubscribed"])->name('users-subscribed.table');
    Route::post('users_subscribed/approve', [UsersSubscribedController::class, "approve"])->name('users-subscribed.approve');
    Route::get('users_subscribed/create', [UsersSubscribedController::class, "create"])->name('users-subscribed.create');
    Route::post('users_subscribed/store', [UsersSubscribedController::class, "store"])->name('users-subscribed.store');
    Route::get('users_subscribed/edit/{user_subscribed:id}', [UsersSubscribedController::class, "edit"])->name('users-subscribed.edit');
    Route::post('users_subscribed/update/{user_subscribed:id}', [UsersSubscribedController::class, "update"])->name('users-subscribed.update');
    Route::get('users_subscribed/delete/{user_subscribed:id}', [UsersSubscribedController::class, "delete"])->name('users-subscribed.delete');
    Route::get('users_subscribed/force-delete/{user_subscribed:id}', [UsersSubscribedController::class, "__forceDelete"])->name('users-subscribed.force-delete');

    Route::get('orders', [OrderController::class, "index"])->name('orders.index');
    Route::get('orders/get-table', [OrderController::class, "getTableOrder"])->name('orders.table');
    Route::get('orders/edit/{order:id}', [OrderController::class, "edit"])->name('orders.edit');
    Route::post('orders/update/{order:id}', [OrderController::class, "update"])->name('orders.update');
    Route::get('orders/delete/{order:id}', [OrderController::class, "delete"])->name('orders.delete');
    Route::delete('orders/force-delete/{order:id}', [OrderController::class, "__forceDelete"])->name('orders.force-delete');

    Route::get('salaries', [SalaryController::class, "index"])->name('salaries.index');
    Route::get('salaries/get-table', [SalaryController::class, "getTableSalary"])->name('salaries.table');
    Route::get('salaries/create', [SalaryController::class, "create"])->name('salaries.create');
    Route::post('salaries/store', [SalaryController::class, "store"])->name('salaries.store');
    Route::get('salaries/edit/{salary:id}', [SalaryController::class, "edit"])->name('salaries.edit');
    Route::post('salaries/update/{salary:id}', [SalaryController::class, "update"])->name('salaries.update');
    Route::delete('salaries/delete/{salary:id}', [SalaryController::class, "delete"])->name('salaries.delete');
    Route::delete('salaries/force-delete/{salary:id}', [SalaryController::class, "__forceDelete"])->name('salaries.force-delete');

    Route::get('default-salary/get-table', [DefaultSalaryController::class, "getTableDefaultSalary"])->name('default-salary.table');
    Route::resource('default-salary', DefaultSalaryController::class);

    Route::get('subject/get-table', [SubjectController::class, "getTableSubject"])->name('subject.table');
    Route::resource('subject', SubjectController::class);

    Route::get('chart-revenue', [ChartController::class, "chartRevenue"])->name('chart-revenue');
    Route::get('notifications', [NotificationController::class, "index"])->name('notification.index');
});

