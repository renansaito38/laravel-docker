<?php

use App\Http\Controllers\Auth\ContatoController;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\Auth\RegisterController; 
use App\Http\Controllers\Auth\LoginController;
use App\Http\Middleware\LogAcessoMiddleware;
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

Route::get('/', [ContatoController::class, 'index'])->name('contato');

Route::get('login', [LoginController::class, 'index'])->name('login');

Route::post('login', [LoginController::class, 'postLogin'])->name('login.post');

Route::get('register', [RegisterController::class, 'index'])->name('auth.register');

Route::post('register', [RegisterController::class, 'postRegister'])->name('register.user'); 

Route::middleware('LogAcesso')
      ->get('dashboard', [DashboardController::class, 'index'])
      ->name('dashboard');


