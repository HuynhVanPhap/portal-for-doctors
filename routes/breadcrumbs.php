<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('home', function ($trail) {
    $trail->push('Trang chủ', route('home'));
});

Breadcrumbs::for('doctors', function ($trail) {
    $trail->parent('home');
    $trail->push('Bác sĩ', route('home'));
});

Breadcrumbs::for('doctors.index', function ($trail) {
    $trail->parent('doctors');
    $trail->push('Danh sách', route('doctors.index'));
});

Breadcrumbs::for('doctors.create', function ($trail) {
    $trail->parent('doctors');
    $trail->push('Thêm mới', route('doctors.create'));
});

Breadcrumbs::for('doctors.edit', function ($trail, $doctor) {
    $trail->parent('doctors.index');
    $trail->push($doctor->name, route('doctors.edit', $doctor->id));
});

// Home > Blog > [Category]
// Breadcrumbs::for('category', function ($trail, $category) {
//     $trail->parent('blog');
//     $trail->push($category->title, route('category', $category->id));
// });

// Home > Blog > [Category] > [Post]
// Breadcrumbs::for('post', function ($trail, $post) {
//     $trail->parent('category', $post->category);
//     $trail->push($post->title, route('post', $post->id));
// });


