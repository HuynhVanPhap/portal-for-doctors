<?php

use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::resource('/appointments', AppointmentController::class)->only(['store']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::middleware('is.admin.manager')->group(function () {
        Route::resource('/doctors', DoctorController::class);
        Route::resource('/appointments', AppointmentController::class)->only(['index', 'edit']);
    });
    Route::get('/home', [HomeController::class, 'redirect'])->name('home');
    Route::resource('/appointments', AppointmentController::class)->only(['destroy']);
    Route::get('/my-appointment', [HomeController::class, 'myAppointmentPage'])->name('my.appointment');
});
