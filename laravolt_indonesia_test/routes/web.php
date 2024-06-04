<?php
use App\Http\Controllers\KelurahanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/desa', [KelurahanController::class, 'viewindex']);
Route::get('/edit/{id}', [KelurahanController::class, 'edit'])->name('villages.edit');
Route::get('/create', [KelurahanController::class, 'create'])->name('villages.create');
Route::get('/show/{id}', [KelurahanController::class, 'lihat'])->name('villages.show');