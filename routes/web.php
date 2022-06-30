<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',  [ProductController::class, 'index']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', App\Http\Controllers\Auth\RegisteredUserController::class);
    Route::get('profile', [UserController::class, 'show']);


    Route::group(['middleware' => 'is_admin'], function () {
        Route::resource('products', ProductController::class);
        Route::resource('users_info', UserController::class);
        Route::get('/products/admin', [ProductController::class, 'admin_products'])->name('products.admin_products');
    });
});



require __DIR__ . '/auth.php';
