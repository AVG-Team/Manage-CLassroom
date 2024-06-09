<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Trang chủ
Breadcrumbs::for('admin.home', function (BreadcrumbTrail $trail) {
    $trail->push('Trang Chủ', route('admin.home'));
});

// Trang chủ > Quản Lý Người Dùng
Breadcrumbs::for('admin.users', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.home');
    $trail->push('Quản Lý Người Dùng', route('admin.users.index'));
});

// Trang Chủ > Quản Lý Người Dùng > Thêm Người Dùng
Breadcrumbs::for('admin.users.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.users');
    $trail->push('Thêm Người Dùng', route('admin.users.create'));
});

// Trang Chủ > Quản Lý Người Dùng > Chỉnh Sửa Người Dùng
Breadcrumbs::for('admin.users.edit', function (BreadcrumbTrail $trail, $users) {
    $trail->parent('admin.users');
    $trail->push('Chỉnh Sửa Người Dùng', route('admin.users.edit', $users));
});

// Trang chủ > Quản Lý Người Dùng
Breadcrumbs::for('admin.exercises', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.home');
    $trail->push('Quản Lý Bài Tập', route('admin.exercises.index'));
});

// Trang Chủ > Quản Lý Người Dùng > Xem Chi Tiết Bài Tập
Breadcrumbs::for('admin.exercises.edit', function (BreadcrumbTrail $trail, $exercise) {
    $trail->parent('admin.exercises');
    $trail->push('Xem Bài Tập', route('admin.exercises.edit', $exercise));
});

// Trang chủ > Quản Lý Lớp Học
Breadcrumbs::for('admin.classrooms', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.home');
    $trail->push('Quản Lý Lớp Học', route('admin.classrooms.index'));
});

// Trang Chủ > Quản Lý Lớp Học > Thêm Lớp Học
Breadcrumbs::for('admin.classrooms.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.classrooms');
    $trail->push('Thêm Lớp học', route('admin.classrooms.create'));
});

// Trang Chủ > Quản Lý Lớp Học > Chỉnh Sửa Lớp Học
Breadcrumbs::for('admin.classrooms.edit', function (BreadcrumbTrail $trail, $classroom) {
    $trail->parent('admin.classrooms');
    $trail->push('Chỉnh Sửa Lớp Học', route('admin.classrooms.edit', $classroom));
});

// Trang chủ > Danh Sách Học Viên Đã Đăng Ký
Breadcrumbs::for('admin.users-subscribed', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.home');
    $trail->push('Danh Sách Học Viên Đã Đăng Ký', route('admin.users-subscribed.index'));
});

// Trang chủ > Danh Sách Học Viên Đã Đăng Ký > Thêm Học Viên
Breadcrumbs::for('admin.users-subscribed.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.users-subscribed');
    $trail->push('Thêm Học Viên', route('admin.users-subscribed.create'));
});

// Trang chủ > Danh Sách Học Viên Đã Đăng Ký > Chỉnh Sửa Học Viên
Breadcrumbs::for('admin.users-subscribed.edit', function (BreadcrumbTrail $trail, $users) {
    $trail->parent('admin.users-subscribed');
    $trail->push('Chỉnh Sửa Học Viên', route('admin.users-subscribed.edit', $users));
});

// Trang Chủ > Quản Lý Đơn Hàng
Breadcrumbs::for('admin.orders', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.home');
    $trail->push('Quản Lý Đơn Hàng', route('admin.orders.index'));
});

// Trang Chủ > Quản Lý Đơn Hàng > Chi Tiết Đơn Hàng
Breadcrumbs::for('admin.orders.edit', function (BreadcrumbTrail $trail, $order) {
    $trail->parent('admin.orders');
    $trail->push('Xem Chi Tiết Đơn Hàng', route('admin.orders.edit', $order));
});
