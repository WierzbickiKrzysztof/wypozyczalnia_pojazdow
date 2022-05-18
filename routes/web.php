<?php

use App\Http\Controllers\UserController;
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
    return view('index');
});

// Wyświetlenie formularza Rejestracji
Route::get('/register', [UserController::class, 'create'])->middleware('guest');;

// Tworzenie nowego Użytkownika
Route::post('/users', [UserController::class, 'store']);

// Wylogowanie
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Logowanie
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');;

// Zaloguj
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
