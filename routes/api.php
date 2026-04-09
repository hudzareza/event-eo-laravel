<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\CheckinController;

Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

Route::get('/events',[EventController::class,'index']);

Route::middleware('auth:sanctum')->group(function(){

    Route::post('/events/{id}/register',[EventController::class,'register']);

    Route::post('/checkin',[CheckinController::class,'scan']);

});

Route::get('/login', function () {
    return response()->json([
        'message' => 'Unauthenticated'
    ], 401);
})->name('login');