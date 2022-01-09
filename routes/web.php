<?php

use App\Http\Controllers\JokeController;
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

Auth::routes();

// Route::get('/', [App\Http\Controllers\JokeController::class, 'index'])->name('jokes.index');
// Route::get('/jokes/create', [App\Http\Controllers\JokeController::class, 'create'])->name('jokes.create');
// Route::post('/jokes', [App\Http\Controllers\JokeController::class, 'store'])->name('jokes.store');
// Route::get('/jokes/{joke}', [App\Http\Controllers\JokeController::class, 'show'])->name('jokes.show');
// Route::get('/jokes/{joke}/edit', [App\Http\Controllers\JokeController::class, 'edit'])->name('jokes.edit');

Route::resource('jokes', JokeController::class)->except(
    ['create']
);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
