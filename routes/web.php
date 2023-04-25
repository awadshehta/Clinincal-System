<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Mail\Test;
use Illuminate\Support\Facades\Mail;
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

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/home', [HomeController::class, 'redirect'])->middleware('auth', 'verified'); //prevent normal operation
Route::get('/add_doctor_view', [AdminController::class, 'add_view']);
Route::post('/upload_doctor', [AdminController::class, 'upload']);
Route::get('/find_doctor', [HomeController::class, 'find_doctor']);
Route::get('/doctor_speciality/{speciality}', [HomeController::class, 'doctor_speciality'])->name('doctor_speciality');
Route::get('/doctor_details/{id}', [HomeController::class, 'doctor_details'])->name('doctor_details');
Route::post('/appointment', [HomeController::class, 'appointment']);
Route::get('/myappointments', [HomeController::class, 'myappointments']);
Route::get('/cancel_appointment/{id}', [HomeController::class, 'cancel_appointment']);
Route::get('/show_appointments', [AdminController::class, 'show_appointments']);
Route::get('/search', [AdminController::class, 'search']);
Route::post('/search_result', [AdminController::class, 'search_result']);
Route::get('/approve/{id}', [AdminController::class, 'approve']);
Route::get('/cancel/{id}', [AdminController::class, 'cancel']);
Route::get('/show_doctors', [AdminController::class, 'show_doctors']);
Route::get('/update_doctor/{id}', [AdminController::class, 'update_doctor']);
Route::get('/delete_doctor/{id}', [AdminController::class, 'delete_doctor']);
Route::post('/doctor_edit/{id}', [AdminController::class, 'doctor_edit']);

//mail
Route::get('/send', function () {
    Mail::to('awad.shehta933@gmail.com')->send(new Test);
    if (Mail::failures() != 0) {
        return "Email has been sent successfully.";
    }
    return "Oops! There was some error sending the email.";
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
