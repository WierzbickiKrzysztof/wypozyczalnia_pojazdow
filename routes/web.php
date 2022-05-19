<?php

use App\Http\Controllers\PojazdController;
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


// Pojazdy //
Route::get('/pojazdy', [PojazdController::class, 'index']);

Route::get('/pojazdy/create', [PojazdController::class, 'create'])->middleware('auth');

Route::post('/pojazdy', [PojazdController::class, 'store']);

Route::get('/pojazdy/{pojazd}/edit', [PojazdController::class, 'edit'])->middleware('auth');

Route::put('/pojazdy/{pojazd}', [PojazdController::class, 'update']);

Route::delete('/pojazdy/{pojazd}', [PojazdController::class, 'destroy'])->middleware('auth');

Route::get('/pojazdy/{pojazd}', [PojazdController::class, 'show'])->middleware('auth');
