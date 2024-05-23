<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard'));
});


// Home > Blog > [Category]
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    // $trail->push("Layanan");
});
Breadcrumbs::for('Layanan', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push("Layanan");
});
Breadcrumbs::for('newLayanan', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push("Layanan", route('layanan'));
    $trail->push("Tambah Layanan");
});
