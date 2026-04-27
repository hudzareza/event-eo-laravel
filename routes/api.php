<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\CheckinController;

/*
|--------------------------------------------------------------------------
| PUBLIC
|--------------------------------------------------------------------------
*/

Route::post('/login',[AuthController::class,'login']);
Route::get('/events',[EventController::class,'index']);

/*
    |--------------------------------------------------------------------------
    | EVENT REGISTRATION
    |--------------------------------------------------------------------------
    */
    Route::post('/events/{id}/register',[EventController::class,'register']);

/*

|--------------------------------------------------------------------------
| AUTH REQUIRED
|--------------------------------------------------------------------------
*/
Route::middleware('auth:sanctum')->group(function(){


    /*
    |--------------------------------------------------------------------------
    | EVENT CRUD (ADMIN ONLY)
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:admin,super_admin')->group(function(){
        Route::post('/users',[AuthController::class,'store']);
        Route::post('/events', [EventController::class, 'store']);
        Route::put('/events/{id}', [EventController::class, 'update']);
        Route::delete('/events/{id}', [EventController::class, 'destroy']);
    });

    /*
    |--------------------------------------------------------------------------
    | CHECK-IN (STAFF)
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:staff,admin,super_admin')->group(function(){
        Route::post('/checkin',[CheckinController::class,'scan']);
    });

});