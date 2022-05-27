<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wypozyczenie;
use App\Models\Zwroty;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use function MongoDB\Driver\Monitoring\removeSubscriber;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Wyświetlenie formularza Rejestracji
    public function create(){
        return view('users.register');
    }

    // Utworzenie nowego Użytkownika
    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'telefon' => [ 'min:9'],
            'typ_konta' => [],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);

        // Hash hasła
        $formFields['password'] = bcrypt($formFields['password']);

        $formFields['typ_konta'] = "klient";

        $user = User::create($formFields);


        // Login
        auth()->login($user);

        return redirect('/')->with('message', 'Użytkownik stworzony i zalogowany');
    }

    // Wylogowanie
    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'Wylogowano pomyślnie');
    }

    // Logowanie
    public function login() {
        return view('users.login');
    }
//zarzadzanie osobami//
    public function manage() {
        return view('users.manage');
    }

    public function show(User $user) {
        return view('users.show', [
            'users' => $user
        ]);
    }
    public function edit(User $user) {
        return view('users.manage_edit', ['user' => $user]);
    }
    public function index(){
        return view('users.manage_show', [

            'users' => User::where('typ_konta' ,'pracownik')->get()

        ]);
    }

    public function destroy(User $user) {
        $user->delete();
        return redirect('/users/manage_show/')->with('message', 'Usunięto Pracownika!');
    }
    public function update(Request $request, User $user) {
        $formFields = $request->validate([

            'name' => 'required',
            'telefon' => 'required',
            'email' => 'required'
        ]);

        $user->update($formFields);

        return redirect('/users/manage_show/')->with('message', 'Zaktualizowane Dane Pracownika!');
    }

    public function store_edit(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'telefon' => 'required',
            'email' => 'required'
        ]);

    }



    public function manage_store(Request $request,) {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'typ_konta' => [],
            'telefon' => [ 'min:9'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6',
        ]);



        // Hash hasła
        $formFields['password'] = bcrypt($formFields['password']);
        $formFields['typ_konta'] = "pracownik";

        $user = User::create($formFields);



        return redirect('/users/manage_show/')->with('message', 'Użytkownik stworzony');
    }



    // Autoryzacja użytkownika
    public function authenticate(Request $request) {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'Zalogowano pomyślnie');
        }

        return back()->withErrors(['email' => 'Niepoprawne dane logowania'])->onlyInput('email');
    }

    //wyswietlenie panelu klienta
    public function index_panelu_klienta(){
        return view('users.panel_klienta');
    }

    //metoda do wyswietlenia historii wypozyczen danego klienta
    public function show_history(){
        return view('users.history', [

            'wypozyczenia' => Wypozyczenie::where('id_klienta' ,Auth::id())->get(),
            'zwrot' => Zwroty::where('id', '1')
            // ^
            // |
            // |
            // tutaj trzeba pomyslec jak to zrobic jeszcze bo jest problem w history.blade.php

        ]);
    }

}
