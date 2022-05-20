<?php

use App\Http\Controllers\PojazdController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WypozyczeniaController;
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


// Użytkownicy //
// SHOW: Formularz Rejestracji
Route::get('/register', [UserController::class, 'create'])->middleware('guest')->name('user.register');
// STORE: Zapisanie nowego Użytkownika
Route::post('/users', [UserController::class, 'store']);

// Wylogowanie
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth')->name('user.logout');

// SHOW: Formularz Logowanie
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
// AUTHENTICATE: Logowanie
Route::post('/users/authenticate', [UserController::class, 'authenticate']);


// Pracownicy //
// SHOW: Lista pracowników
Route::get('/users/manage_show', [UserController::class, 'index'])->name('pracownicy.index');


Route::get('/users/manage', [UserController::class, 'manage'])->name('pracownicy.manage'); //->middleware('auth');
Route::post('/users/manage/add', [UserController::class, 'manage_store'])->name('pracownicy.add'); //->middleware('auth');

Route::get('/users/manage_edit/{user}', [UserController::class, 'edit']); //->middleware('auth');
Route::post('/users', [UserController::class, 'store_edit']);

Route::put('/users/{user}', [UserController::class, 'update']);
Route::delete('/users/manage_show/{user}', [UserController::class, 'destroy']); //->middleware('auth');

// Pojazdy //
// SHOW: Wszystkie pojazdy
Route::get('/pojazdy', [PojazdController::class, 'index'])->name('pojazdy.index');

// SHOW: Formularz dodawania pojazdu
Route::get('/pojazdy/create', [PojazdController::class, 'create'])->name('pojazdy.create') ;//->middleware('auth');
// STORE: Zapisanie nowego pojazdu
Route::post('/pojazdy', [PojazdController::class, 'store']);

// SHOW: Formularz edytowania pojazdu
Route::get('/pojazdy/{pojazd}/edit', [PojazdController::class, 'edit']); //->middleware('auth');
// UPDATE: Aktualizacja pojazdu
Route::put('/pojazdy/{pojazd}', [PojazdController::class, 'update']);

// DESTROY: Usunięcie pojazdu
Route::delete('/pojazdy/{pojazd}', [PojazdController::class, 'destroy']); //->middleware('auth');

// SHOW: Wyświetlenie wybranego pojazdu
Route::get('/pojazdy/{pojazd}', [PojazdController::class, 'show']); //->middleware('auth');


// Wypożyczenia //
// SHOW: Wszystkie wypożyczenia
Route::get('/wypozyczenia', [WypozyczeniaController::class, 'index'])->name('wypozyczenia.index');

// SHOW: Formularz dodawania wypożyczenia
Route::get('/wypozyczenia/create', [WypozyczeniaController::class, 'create'])->name('wypozyczenia.create') ;//->middleware('auth');
// STORE: Zapisanie nowego wypożyczenia
Route::post('/wypozyczenia', [WypozyczeniaController::class, 'store']);

// SHOW: Formularz edytowania wypożyczenia
//Route::get('/wypozyczenia/{wypozyczenie}/edit', [WypozyczeniaController::class, 'edit']); //->middleware('auth');
// UPDATE: Aktualizacja wypożyczenia
//Route::put('/wypozyczenia/{wypozyczenie}', [WypozyczeniaController::class, 'update']);

// DESTROY: Usunięcie wypożyczenia
//Route::delete('/wypozyczenia/{wypozyczenie}', [WypozyczeniaController::class, 'destroy']); //->middleware('auth');

// SHOW: Wyświetlenie wybranego wypożyczenia
//Route::get('/wypozyczenia/{wypozyczenie}', [WypozyczeniaController::class, 'show']); //->middleware('auth');

