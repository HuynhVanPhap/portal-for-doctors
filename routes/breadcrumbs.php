<?php

use App\Models\Appointment;
use App\Models\Doctor;
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

Breadcrumbs::for('doctors.edit', function ($trail, Doctor $doctor) {
    $trail->parent('doctors.index');
    $trail->push($doctor->name, route('doctors.edit', $doctor->id));
});

/**
 * Trang chủ / Cuộc hẹn
 */
Breadcrumbs::for('appointments', function ($trail) {
    $trail->parent('home');
    $trail->push('Cuộc hẹn', route('home'));
});

/**
 * Trang chủ / Cuộc hẹn / Danh sách
 */
Breadcrumbs::for('appointments.index', function ($trail) {
    $trail->parent('appointments');
    $trail->push('Danh sách', route('appointments.index'));
});

/**
 * Trang chủ / Cuộc hẹn / [Appointment]
 */
Breadcrumbs::for('appointments.edit', function ($trail, Appointment $appointment) {
    $trail->parent('appointments');
    $trail->push($appointment->name, route('appointments.edit', $appointment->id));
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


