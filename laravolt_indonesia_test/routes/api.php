<?php

use Illuminate\Http\Request;
use Laravel\Sanctum\Sanctum;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelurahanController;


Route::get('/desa', [KelurahanController::class, 'index']);
Route::post('/desa', [KelurahanController::class, 'store']);
Route::get('/desa/{id}', [KelurahanController::class, 'show']);
Route::put('/desa/{id}', [KelurahanController::class, 'update']);
Route::delete('/desa/{id}', [KelurahanController::class, 'destroy']);

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/