<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('frontend/index');
});

Route::get('/about', function () {
    return view('frontend/about');
});

Route::get('/event', function () {
    return view('frontend/event/index');
});

Route::get('/registerevent', function () {
    return view('frontend/event/detail');
});
