<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\IndexController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\SettingsController;
use App\Http\Controllers\Dashboard\UsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and assigned to the "web"
| middleware group. Now create something great!
|
*/




Route::get('/' , function(){
    return view('site.layout.layout');
});






// ########    Dashboard    ##############################################################



Route::get('/dashboard', [IndexController::class, 'index'])->name('dashboard.index');

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth'],
    'as' => 'dashboard.',

], function () {


    // Settings
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::put('/settings/update/{setting}', [SettingsController::class, 'update'])->name('settings.update');


    // Users
    Route::get('/users/ajax', [UsersController::class, 'getAllData'])->name('users.getAllData');
    Route::delete('/users/delete', [UsersController::class, 'delete'])->name('users.delete');
    Route::resource('/users', UsersController::class);


    // Categories
    Route::get('/categories/ajax', [CategoryController::class, 'getAllCategory'])->name('categories.getAllCategory');
    Route::delete('/categories/delete', [CategoryController::class, 'delete'])->name('categories.delete');
    Route::resource('/categories', CategoryController::class);


    // Posts
    Route::get('/posts/ajax', [PostController::class, 'getAllPost'])->name('posts.getAllPost');
    Route::delete('/posts/delete', [PostController::class, 'delete'])->name('posts.delete');
    Route::resource('/posts', PostController::class);
});

Auth::routes();
