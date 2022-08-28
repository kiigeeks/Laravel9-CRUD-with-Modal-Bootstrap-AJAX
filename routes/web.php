<?php

use Illuminate\Support\Facades\Route;
use Monolog\Handler\RotatingFileHandler;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::controller(DashboardController::class)->group(function(){
//     Route::get('/', 'index')->name('dashboard');
//     Route::get('/fetch', 'fetch')->name('fetch.data');
//     Route::get('/create', 'create')->name('add.data');
//     Route::post('/store', 'store')->name('save.plants');
// });

// Route::resource('/', DashboardController::class);
// Route::get('/', [DashboardController::class, 'index']);
// Route::get('/fetch', [DashboardController::class, 'fetch']);
// Route::get('/create', [DashboardController::class, 'create'])->name('add.data');
// Route::post('/store', [DashboardController::class, 'store'])->name('save.plants');
// Route::resource('/category', CategoryController::class);


Route::get('/', [DashboardController::class, 'index'])->name('plants');
Route::get('/fetch', [DashboardController::class, 'fetch'])->name('getall.plants');
Route::get('/show', [DashboardController::class, 'show'])->name('detail.plants');
Route::post('/store', [DashboardController::class, 'store'])->name('save.plants');
Route::delete('/delete', [DashboardController::class, 'destroy'])->name('delete.plants');
Route::get('/edit', [DashboardController::class, 'edit'])->name('edit.plants');
Route::post('/update', [DashboardController::class, 'update'])->name('update.plants');

Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::get('/category/fetch', [CategoryController::class, 'fetch'])->name('fetch.category');
Route::post('/category/store', [CategoryController::class, 'store'])->name('save.category');
Route::delete('/category/delete', [CategoryController::class, 'destroy'])->name('delete.category');
Route::get('/category/edit', [CategoryController::class, 'edit'])->name('edit.category');
Route::post('/category/update', [CategoryController::class, 'update'])->name('update.category');

