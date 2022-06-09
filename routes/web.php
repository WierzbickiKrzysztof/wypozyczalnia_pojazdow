<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\PojazdController;
use App\Http\Controllers\RezerwacjaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KlientController;
use App\Http\Controllers\WypozyczeniaController;
use App\Http\Controllers\OpcjeController;
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

//Opisy

// Sprawdzanie czy użytkownik jest zalogowany i czy posiada odpowiednią rolę
middleware('auth', 'can:admin')
middleware('auth', 'can:pracownik')
middleware('auth', 'can:klient')

*/

Route::get('/', function () {
    return view('index');
})->name('index');


// Użytkownicy //
// SHOW: Formularz Rejestracji
Route::get('/register', [UserController::class, 'create'])->middleware('guest')->name('user.register');
// STORE: Zapisanie nowego Użytkownika
Route::post('/users', [UserController::class, 'store'])->name('user.store');

// Wylogowanie
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth')->name('user.logout');

// SHOW: Formularz Logowanie
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
// AUTHENTICATE: Logowanie
Route::post('/users/authenticate', [UserController::class, 'authenticate'])->name('user.authenticate');


// Pracownicy //
// SHOW: Lista pracowników
Route::get('/users/manage_show', [UserController::class, 'index'])->name('pracownicy.index')->middleware('auth', 'can:pracownik');


Route::get('/users/manage', [UserController::class, 'manage'])->name('pracownicy.manage')->middleware('auth', 'can:pracownik');
Route::post('/users/manage/add', [UserController::class, 'manage_store'])->name('pracownicy.add')->middleware('auth', 'can:pracownik');

Route::get('/users/manage_edit/{user}', [UserController::class, 'edit'])->name('pracownicy.edit')->middleware('auth', 'can:pracownik');
//Route::post('/users', [UserController::class, 'store_edit']);

Route::put('/users/{user}', [UserController::class, 'update'])->name('pracownicy.update');
Route::delete('/users/manage_show/{user}', [UserController::class, 'destroy'])->name('pracownicy.destroy')->middleware('auth', 'can:pracownik');

// Klienci //
// SHOW: Lista Klienci
Route::get('/klient/client_show', [KlientController::class, 'index'])->name('klient.index')->middleware('auth', 'can:pracownik');


Route::get('/klient/client', [KlientController::class, 'manage_client'])->name('klient.manage')->middleware('auth', 'can:pracownik');
Route::post('/klient/client/add', [KlientController::class, 'manage_client_store'])->name('klient.add')->middleware('auth', 'can:pracownik');

Route::get('/klient/client_edit/{user}', [KlientController::class, 'edit'])->name('klient.edit')->middleware('auth', 'can:pracownik');
Route::post('/klient', [KlientController::class, 'store_client_edit']);

Route::put('/klient/{user}', [KlientController::class, 'update'])->name('klient.update');
Route::delete('/klient/client_show/{user}', [KlientController::class, 'destroy'])->name('klient.destroy')->middleware('auth', 'can:pracownik');


// Pojazdy //
// SHOW: Wszystkie pojazdy
Route::get('/pojazdy', [PojazdController::class, 'index'])->name('pojazdy.index');

// SHOW: Formularz dodawania pojazdu
Route::get('/pojazdy/create', [PojazdController::class, 'create'])->name('pojazdy.create')->middleware('auth', 'can:pracownik');
// STORE: Zapisanie nowego pojazdu
Route::post('/pojazdy', [PojazdController::class, 'store'])->name('pojazdy.store');

// SHOW: Formularz edytowania pojazdu
Route::get('/pojazdy/{pojazd}/edit', [PojazdController::class, 'edit'])->name('pojazdy.edit')->middleware('auth', 'can:pracownik');
// UPDATE: Aktualizacja pojazdu
Route::put('/pojazdy/{pojazd}', [PojazdController::class, 'update'])->name('pojazdy.update');

// DESTROY: Usunięcie pojazdu
Route::delete('/pojazdy/{pojazd}', [PojazdController::class, 'destroy'])->name('pojazdy.destroy')->middleware('auth', 'can:pracownik');

// SHOW: Wyświetlenie wybranego pojazdu
Route::get('/pojazdy/{pojazd}', [PojazdController::class, 'show'])->name('pojazdy.show'); //->middleware('auth');

// SHOW: Wyświetlenie historii wypożyczeń konkretnego pojazdu
Route::get('/pojazdy/history/{id}', [PojazdController::class, 'show_wypozyczenia_pojazdu'])->name('pojazd.history');


// Wypożyczenia //
// SHOW: aktualne wypożyczenia
Route::get('/wypozyczenia', [WypozyczeniaController::class, 'index'])->name('wypozyczenia.index')->middleware('auth', 'can:pracownik');
// SHOW: Wszystkie wypożyczenia
Route::get('/wypozyczenia/indexAll', [WypozyczeniaController::class, 'indexAll'])->name('wypozyczenia.indexAll')->middleware('auth', 'can:pracownik');
// SHOW: zwrócone wypożyczenia
Route::get('/wypozyczenia/indexZwrocone', [WypozyczeniaController::class, 'indexZwrocone'])->name('wypozyczenia.indexZwrocone')->middleware('auth', 'can:pracownik');

// SHOW: Formularz dodawania wypożyczenia
Route::get('/wypozyczenia/create', [WypozyczeniaController::class, 'create'])->name('wypozyczenia.create')->middleware('auth', 'can:pracownik');
// STORE: Zapisanie nowego wypożyczenia
Route::post('/wypozyczenia', [WypozyczeniaController::class, 'store'])->name('wypozyczenia.store');

Route::get('wypozyczenia/generate', function (){
    return view('wypozyczenia.generate');
})->name('wypozyczenia.generate')->middleware('auth');

//Wybieranie wyświetlania raportu dla poszczególnych klientów
Route::get('/wypozyczenia/generate_klient_report', [WypozyczeniaController::class, 'klientReportGenrate'])->name('wypozyczenia.klientReportGenrate')->middleware('auth', 'can:pracownik');
//Wyświetlanie raportu dla klienta
Route::get('wypozyczenia/klient_report/', [WypozyczeniaController::class, 'klientreport']) ->name('wypozyczenia.klientreport');

Route::post('wypozyczenia/report', [WypozyczeniaController::class, 'showReport']) ->name('wypozyczenia.report');
Route::get('/latereturn', [WypozyczeniaController::class, 'latereturn'])->name('wypozyczenia.latereturn')->middleware('auth', 'can:pracownik');
// UPDATE: Aktualizacja wypożyczenia
Route::get('/wypozyczenia/{wypozyczenia}', [WypozyczeniaController::class, 'update'])->name('wypozyczenia.update')->middleware('auth', 'can:pracownik');


// DESTROY: Usunięcie wypożyczenia
//Route::delete('/wypozyczenia/{wypozyczenie}', [WypozyczeniaController::class, 'destroy']); //->middleware('auth');

// SHOW: Wyświetlenie wybranego wypożyczenia
//Route::get('/wypozyczenia/{wypozyczenie}', [WypozyczeniaController::class, 'show']); //->middleware('auth');
// SHOW: Formularz edytowania wypożyczenia
//Route::get('/wypozyczenia/{wypozyczenie}/edit', [WypozyczeniaController::class, 'edit']); //->middleware('auth');
// lista dodatkowych opcji
Route::get('/opcje/dodatkowe_opcje', [OpcjeController::class, 'index'])->name('opcje.index');

//Wyświetlanie formularza dodawani wyposażenia
Route::get('/opcje', function () {
    return view('opcje.dodaj_opcje');
})->name('opcje.dodaj_opcje') ;



// SHOW: Formularz dodawania dodatkowego wyposzazenia
Route::get('/opcje/dodaj_opcje', [OpcjeController::class, 'create'])->name('opcje.create')->middleware('auth', 'can:pracownik');
Route::get('/opcje/edytuj_opcje/{opcje}', [OpcjeController::class, 'edit'])->name('opcje.edytuj_opcje')->middleware('auth', 'can:pracownik');
Route::post('/opcje/edytuj_opcje/{opcje}', [PojazdController::class, 'update'])->name('opcje.update')->middleware('auth', 'can:pracownik');
Route::post('/opcje', [KlientController::class, 'store_opcje_edit']);


//Route::get('/klient/client_edit/{user}', [KlientController::class, 'edit'])->name('klient.edit')->middleware('auth', 'can:pracownik');
//Route::post('/klient', [KlientController::class, 'store_client_edit']);

//Route::put('/klient/{user}', [KlientController::class, 'update'])->name('klient.update');


//Cennik
Route::get('/cennik', [PojazdController::class, 'cennik'])->name('cennik.index');
//Mapy (lokalizacja)
Route::get('/localisation', function () {
    return view('localisation');
})->name('localisation') ;

//roboczo
Route::get('wypozyczenia/customer/rent', function (){
    return view('wypozyczenia.createWypozyczenieClient');
})->name('wypozyczenia.clientRent') ;


Route::post('api/get/{type}', [AjaxController::class, 'getAjax']);

//Panel klienta
Route::get('/users/panel_klienta', [UserController::class, 'index_panelu_klienta'])->name('panel_klienta')->middleware('auth', 'can:klient');
Route::get('/users/client_data_edit/{users}', [UserController::class, 'index_panel_klienta_edytuj'])->name('users.client_data_edit')->middleware('auth', 'can:klient');
Route::put('/users/panel_klienta/{users}', [UserController::class, 'index_panel_klienta_update'])->name('users.client_data_update');
//Route::put('/users/{user}', [UserController::class, 'update'])->name('client_data_edit');
//Przycisk historia_wypozyczen w panelu_klienta
Route::get('/users/history', [UserController::class, 'show_history'])->name('users.history')->middleware('auth', 'can:klient');     // Tutaj potrzebna autoryzacja?



// Rezerwacja //
// SHOW: Wszystkie rezerwacje
Route::get('/rezerwacja/show/all', [RezerwacjaController::class, 'index'])->name('rezerwacja.index')->middleware('auth', 'can:pracownik');

// SHOW: Formularz dodawania rezerwacji - pracownik
Route::get('/rezerwacja/create', [RezerwacjaController::class, 'create'])->name('rezerwacja.create')->middleware('auth', 'can:pracownik');


// STORE: Zapisanie nowego wypożyczenia
Route::post('/rezerwacja/store', [RezerwacjaController::class, 'store'])->name('rezerwacja.store');

//EDIT: Formularz edytowania rezerwacji
Route::get('/rezerwacja/edit/{rezerwacja}', [RezerwacjaController::class, 'edit'])->name('rezerwacja.edit');

//UPDATE: Zapisanie zmian w rezerwacji
Route::post('/rezerwacja/{rezerwacja}', [RezerwacjaController::class, 'update_edit'])->name('rezerwacja.update_edit');
Route::delete('/rezerwacja/delete/{rezerwacja}', [RezerwacjaController::class, 'destroy'])->name('rezerwacja.destroy')->middleware('auth', 'can:pracownik');

Route::get('wypozyczenia/generate', function (){
    return view('wypozyczenia.generate');
})->name('wypozyczenia.generate')->middleware('auth');

Route::post('wypozyczenia/report', [WypozyczeniaController::class, 'showReport']) ->name('wypozyczenia.report');
Route::get('/latereturn', [WypozyczeniaController::class, 'latereturn'])->name('wypozyczenia.latereturn')->middleware('auth', 'can:pracownik');
// UPDATE: Aktualizacja wypożyczenia
Route::get('/wypozyczenia/{wypozyczenia}', [WypozyczeniaController::class, 'update'])->name('wypozyczenia.update')->middleware('auth', 'can:pracownik');


// DESTROY: Usunięcie wypożyczenia
//Route::delete('/wypozyczenia/{wypozyczenie}', [WypozyczeniaController::class, 'destroy']); //->middleware('auth');

// SHOW: Wyświetlenie wybranego wypożyczenia
//Route::get('/wypozyczenia/{wypozyczenie}', [WypozyczeniaController::class, 'show']); //->middleware('auth');
// SHOW: Formularz edytowania wypożyczenia
//Route::get('/wypozyczenia/{wypozyczenie}/edit', [WypozyczeniaController::class, 'edit']); //->middleware('auth');



