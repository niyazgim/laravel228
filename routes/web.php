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
    return redirect('/zapis');
})->name('home');

Route::controller(\App\Http\Controllers\RegLogController::class)->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/register', 'create')->name('register');
        Route::post('/register', 'register');

        Route::get('/login', 'edit')->name('login');
        Route::post('/login', 'login');
    });
    Route::middleware('auth')->group(function () {
        Route::post('/logout', 'logout');
    });
});

Route::middleware('auth')->group(function () {
    Route::controller(\App\Http\Controllers\ZapisController::class)->group(function () {
        Route::get('/zapis', 'index');
        Route::middleware('client')->group(function () {
            Route::get('/zapis/create', 'create');
            Route::post('/zapis/store', 'store');
        });
        Route::middleware('admin')->group(function () {
            Route::post('/zapis/{id}/update', 'update');
        });
    });
});
