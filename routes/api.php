<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;


//registr
Route::post("register",[App\Http\Controllers\Api\ApiController::class,"register"]);

//Login

Route::post("login",[App\Http\Controllers\Api\ApiController::class,"login"]);

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
