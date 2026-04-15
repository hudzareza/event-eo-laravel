<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\EventRegistrationController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend/index');
});

Route::get('/about', function () {
    return view('frontend/about');
});

Route::get('/event', [EventController::class, 'index']);
Route::get('/event/{id}', function ($id) {
    return view('frontend/event/detail', ['eventId' => $id]);
});
Route::post('/event/{id}/register', [EventRegistrationController::class, 'store'])
    ->name('event.register');


// Dashboard / Backend
Route::get('/dashboard', function () {
    return view('backend/dashboard');
});
// ->middleware(['auth'])->name('dashboard');

Route::get('/peserta', function () {
    return view('backend/peserta/index');
});

Route::get('/peserta/{id}', function ($id) {
    return view('backend/peserta/show', ['pesertaId' => $id]);
});