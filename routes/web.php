<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::post('/login', [App\Http\Controllers\LoginController::class, 'login'])->name('login.check');

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users');
    Route::get('/users/add', [App\Http\Controllers\UserController::class, 'create'])->name('user.add');
    Route::post('users/store', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
    Route::get('/users/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
    Route::post('/users/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
    Route::get('users/delete/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.delete');

    Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('abouts');
    Route::post('/about', [App\Http\Controllers\AboutController::class, 'store'])->name('abouts.store');
});
