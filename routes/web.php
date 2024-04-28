<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\IndexController;
use App\Http\Controllers\Dashboard\SettingsController;
use App\Http\Controllers\Dashboard\UsersController;
use App\Http\Middleware\CheckAdmin;


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



Route::get('/', [IndexController::class, 'index'])->name('dashboard.index');



Route::group(["as" => "dashboard." , 'middleware'=>'auth'], function () {


    // settings
    Route::get('/settings' ,[SettingsController::class , 'index'])->name('settings.index');
    Route::put("settings/update/{setting}", [SettingsController::class, "update"])->name("settings.update");


    // users
    Route::get('/users/ajax' , [UsersController::class , 'getAllData'])->name('users.getAllData');
    Route::delete('/users/delete' , [UsersController::class , 'delete'])->name('users.delete');

    Route::resource('/users' , UsersController::class);





});

Auth::routes();


