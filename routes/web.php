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

Route::get('/aboutpage', [App\Http\Controllers\web\AboutController::class, 'index'])->name('aboutpage');

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

    // Route::get('/skills', [App\Http\Controllers\SkillsController::class, 'index'])->name('skills');
    Route::post('/skills', [App\Http\Controllers\SkillsController::class, 'store'])->name('skills.store');
    Route::get('/skills', [App\Http\Controllers\SkillsController::class, 'index'])->name('skills_list');
    Route::get('/skills/skills_add', [App\Http\Controllers\SkillsController::class, 'create'])->name('skills_add');
    Route::get('/skills/edit/{id}', [App\Http\Controllers\SkillsController::class, 'edit'])->name('skills.edit');
    Route::post('/skills/update/{id}', [App\Http\Controllers\SkillsController::class, 'update'])->name('skills.update');
    Route::get('/skills/delete/{id}', [App\Http\Controllers\SkillsController::class, 'destroy'])->name('skills.delete');
    // Route::post('/skills/store', [App\Http\Controllers\SkillsController::class, 'store'])->name('skills_store');

    Route::get('/testimonials', [App\Http\Controllers\TestimonialsController::class, 'index'])->name('testimonials');
    Route::get('/testimonials/add', [App\Http\Controllers\TestimonialsController::class, 'create'])->name('testimonials.add');
    Route::post('/testimonials', [App\Http\Controllers\TestimonialsController::class, 'store'])->name('testimonials.store');
    Route::get('/testimonials/edit/{id}', [App\Http\Controllers\TestimonialsController::class, 'edit'])->name('testimonials.edit');
    Route::post('/testimonials/update/{id}', [App\Http\Controllers\TestimonialsController::class, 'update'])->name('testimonials.update');
    Route::get('/testimonials/delete/{id}', [App\Http\Controllers\TestimonialsController::class, 'delete'])->name('testimonials.delete');

    // Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
    Route::get('/contact', [App\Http\Controllers\ContactController::class, 'create'])->name('contact');
    Route::post('/contact/store', [App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');
    Route::get('/contact/add', [App\Http\Controllers\ContactController::class, 'create'])->name('contact.add');
});