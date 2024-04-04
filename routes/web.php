<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\IsAdmin;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('redirect', [HomeController::class, 'redirect'])->name('redirect');
// Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::controller(ProductController::class)->group(function () {

    Route::middleware(IsAdmin::class)->group(function () {
        Route::get('products', "allProducts");
        Route::get('products/details/{id}', "details")->name('details');

        Route::get('products/create', "create");
        Route::post('products', "store")->name('store');

        Route::get('products/edit/{id}', "edit");
        Route::post('products/{id}', "update")->name('update');

        Route::post('product/delete/{id}', "delete")->name('delete');
    });
});

Route::controller(CategoryController::class)->group(function () {
    Route::middleware(IsAdmin::class)->group(function () {
        Route::get('categories', "allCategories");
        Route::get('categories/details/{id}', "details")->name('category-details');

        Route::get('category/create', "create");
        Route::post('categories', "store")->name('category-store');

        Route::get('categories/edit/{id}', "edit");
        Route::post('categories/{id}', "update")->name('category-update');

        Route::post('category/delete/{id}', "delete")->name('category-delete');
    });
});
