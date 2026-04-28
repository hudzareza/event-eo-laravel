<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventRegistrationController;

use App\Http\Controllers\Backend\ListEventController;

use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index']);

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/about', function () {
    return view('frontend/about');
});

Route::get('/create', function () {
    return view('frontend/create');
});

Route::get('/event', [EventController::class, 'index']);
Route::get('/event/{id}', [EventController::class, 'show']);
Route::post('/event/{id}/register', [EventRegistrationController::class, 'store'])
    ->name('event.register');
Route::get('/event/success/{id}', [EventController::class, 'success'])->name('event.success');
Route::get('/validasi', function () {
    return view('frontend/validasi/index');
});

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

Route::get('/backend/event', [ListEventController::class, 'index']);
Route::get('/backend/event/{id}', [ListEventController::class, 'show']);
Route::get('/backend/event/{id}/export', [ListEventController::class, 'export'])->name('backend.event.export');