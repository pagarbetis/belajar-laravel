<?php

use App\Http\Controllers\BelajarController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('belajar', [BelajarController::class, 'index']);
Route::get('tambah', [BelajarController::class, 'tambah'])->name('tambah');
Route::post('actionTambah', [BelajarController::class, 'actionTambah'])->name('actionTambah');
Route::get('pengurangan', [BelajarController::class, 'pengurangan'])->name('pengurangan');
Route::post('actionPengurangan', [BelajarController::class, 'actionPengurangan'])->name('actionPengurangan');
Route::get('bagi', [BelajarController::class, 'bagi'])->name('bagi');
Route::post('actionBagi', [BelajarController::class, 'actionBagi'])->name('actionBagi');
Route::get('perkalian', [BelajarController::class, 'perkalian'])->name('perkalian');
Route::post('actionPerkalian', [BelajarController::class, 'actionPerkalian'])->name('actionPerkalian');
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [LoginController::class, 'login']);
    Route::post('/actionLogin', [LoginController::class, 'actionLogin'])->name('actionLogin');

    Route::resource('dashboard', DashboardController::class);
    Route::resource('user', UserController::class);
    Route::resource('category', CategoryController::class);

    Route::get('/settings', [SettingController::class, 'index'])->name('settings');
    Route::post('/settings', [SettingController::class, 'store'])->name('settings.store');
});
