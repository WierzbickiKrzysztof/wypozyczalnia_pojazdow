<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use function MongoDB\Driver\Monitoring\removeSubscriber;

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
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);

        // Hash hasła
        $formFields['password'] = bcrypt($formFields['password']);

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
}
