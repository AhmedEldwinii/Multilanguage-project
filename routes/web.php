<?php

use App\Http\Controllers\Dashboard\IndexController;
use App\Http\Controllers\Dashboard\SettingsController;
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

Route::get('/', [IndexController::class, 'index'])->name('dashboard.index');


Route::group(["as" => "dashboard."], function () {

    Route::get('/settings' ,[SettingsController::class , 'index'])->name('settings.index');
    Route::put("settings/update/{setting}", [SettingsController::class, "update"])->name("settings.update");



});
