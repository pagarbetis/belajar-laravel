<?php

use App\Http\Controllers\BelajarController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('belajar', [BelajarController::class, 'index']);
Route::get('tambah', [BelajarController::class, 'tambah'])->name('tambah');
Route::post('actionTambah', [BelajarController::class, 'actionTambah'])->name('actionTambah');
Route::get('pengurangan', [BelajarController::class, 'pengurangan'])->name('pengurangan');
Route::post('actionPengurangan', [BelajarController::class, 'actionPengurangan'])->name('actionPengurangan');
Route::get('bagi', [BelajarController::class, 'bagi'])->name('bagi');
Route::post('actionBagi', [BelajarController::class, 'actionBagi'])->name('actionBagi');
Route::get('perkalian', [BelajarController::class, 'perkalian'])->name('perkalian');
Route::post('actionPerkalian', [BelajarController::class, 'actionPerkalian'])->name('actionPerkalian');
