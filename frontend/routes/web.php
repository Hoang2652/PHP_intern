<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/login', [HomeController::class, 'login']);
Route::get('/logout', [HomeController::class, 'logout']);
Route::get('/register', [HomeController::class, 'register']);
Route::post('/login-execute', [HomeController::class, 'checkLogin']);
Route::post('/register-Account', [HomeController::class, 'registerAccount']);
Route::get('/actions-funny', [HomeController::class, 'actionsFunny']);
Route::get('/actions-notfunny', [HomeController::class, 'actionsNotFunny']);
