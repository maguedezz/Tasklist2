<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});



// Route::resource('tasks', TaskController::class);


Route::get('/tasks', [App\Http\Controllers\TaskController::class, 'index'])->name('index');

Route::post('/task', [App\Http\Controllers\TaskController::class, 'store'])->name('store');

Route::delete('/task/{task}', [App\Http\Controllers\TaskController::class, 'destroy'])->name('destroy');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');