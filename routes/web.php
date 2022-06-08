<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
})->name('/');

Route::get('/mapa', function () {
    return view('admin.maps');
})->name('mapa');

Route::post('/login', [App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'session'], function () {
    Route::get('/inicio', [App\Http\Controllers\HomeController::class, 'index'])->name('inicio');
    Route::post('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');
});
