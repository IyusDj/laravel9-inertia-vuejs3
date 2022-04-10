<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

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

// Route::get('/', \App\Http\Controllers\DashboardController::class)->middleware('auth');

// Route REGISTER
// Index register
Route::get('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'index']);

// Store register
Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'store']);


// Route LOGIN
// Index login
Route::get('/login', [LoginController::class, 'index']);

// Store login
Route::post('/login', [LoginController::class, 'store']);

// Logout
Route::post('/logout', [LoginController::class, 'destroy'])->middleware('auth');


// Route DASHBOARD
Route::get('/dashboard', \App\Http\Controllers\DashboardController::class)->middleware('auth');