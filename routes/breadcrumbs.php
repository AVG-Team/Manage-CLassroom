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

// Trang Chủ > Quản Lý Người Dùng > Quản lý học sinh
Breadcrumbs::for('admin.users.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.users');
    $trail->push('Quản Lý Người Dùng', route('admin.users.create'));
});
