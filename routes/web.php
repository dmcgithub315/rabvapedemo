<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::any('/', [HomeController::class, 'latestPosts'])->name('home');
Route::any('/about', [\App\Http\Controllers\AboutController::class, 'viewAboutPage'])->name('about');
Route::any('/contact', [\App\Http\Controllers\ContactController::class, 'viewContactPage'])->name('contact');
Route::any('/category', [\App\Http\Controllers\CategoryController::class, 'listCategories'])->name('category');
Route::post('/listItems', [\App\Http\Controllers\CategoryController::class, 'listItems'])->name('list_items');
Route::any('/sanpham/{productId?}', [\App\Http\Controllers\SingleController::class, 'loadSinglePage'])->name('load_single_page');

