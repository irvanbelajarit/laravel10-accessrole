<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Dashboard
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard'));
});

// Roles
Breadcrumbs::for('roles', function (BreadcrumbTrail $trail) {

    $trail->push('roles', route('roles.index'));
});

//users
Breadcrumbs::for('users', function (BreadcrumbTrail $trail) {


    $trail->push('users', route('users.index'));
});

//user create
Breadcrumbs::for('user-create', function (BreadcrumbTrail $trail) {

    $trail->parent('users');
    $trail->push('create', route('users.create'));
});

//user edit
Breadcrumbs::for('user-edit', function (BreadcrumbTrail $trail) {
    $trail->parent('users');
    $trail->push('edit');
});

// // Home > Blog
// Breadcrumbs::for('blog', function (BreadcrumbTrail $trail) {
//     $trail->parent('home');
//     $trail->push('Blog', route('blog'));
// });

// // Home > Blog > [Category]
// Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $category) {
//     $trail->parent('blog');
//     $trail->push($category->title, route('category', $category));
// });
