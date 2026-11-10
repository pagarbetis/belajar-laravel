<?php

use App\Http\Controllers\BelajarController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\CategoryBlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

    Route::middleware(['auth'])->group(function () {

        Route::resource('dashboard', DashboardController::class);
        Route::resource('user', UserController::class);
        Route::resource('category', CategoryController::class);
        Route::resource('product', ProductController::class);
        Route::resource('category_blog', CategoryBlogController::class);
        Route::resource('blog', BlogController::class);

        Route::get('/settings', [SettingController::class, 'index'])->name('settings');
        Route::post('/settings', [SettingController::class, 'store'])->name('settings.store');

        Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    });
});

Route::get('/', [HomeController::class, 'index']);
Route::get('/category/{slug}', [CatalogController::class, 'category'])->name('category.show');
Route::get('product', [CatalogController::class, 'listing'])->name('product.index');
Route::get('/product/{slug}', [CatalogController::class, 'product'])->name('product.show');
Route::get('faq', [PageController::class, 'faq'])->name('faq.index');
Route::get('contact', [PageController::class, 'contact'])->name('contact.index');
Route::get('blog', [PageController::class, 'blog'])->name('blog.index');
