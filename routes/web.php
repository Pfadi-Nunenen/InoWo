<?php

use App\Http\Controllers\OverwatchController;
use App\Http\Controllers\UsersController;
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

Route::redirect('/', '/overwatch', 301);

Auth::routes();

Route::group(['middleware' => ['auth']], function(){
    Route::any('/overwatch', [OverwatchController::class, 'index'])->name('overwatch');

    Route::any('/users', [UsersController::class, 'index'])->name('users');
    Route::get('/users/add', [UsersController::class, 'create'])->name('add-users');
    Route::post('/users/store', [UsersController::class, 'store'])->name('store-users');
    Route::get('/users/edit/{uid}', [UsersController::class, 'edit'])->name('edit-users');
    Route::post('/users/update/{uid}', [UsersController::class, 'update'])->name('update-users');
    Route::get('/users/destroy/{uid}', [UsersController::class, 'destroy'])->name('destroy-users');
});
