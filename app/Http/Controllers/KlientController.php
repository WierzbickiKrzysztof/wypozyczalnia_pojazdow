<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use App\Models\Klient;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use function MongoDB\Driver\Monitoring\removeSubscriber;

class KlientController extends Controller
{

    // Utworzenie nowego Użytkownika
    public function store_client(Request $request) {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'telefon' => [ 'min:9'],
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



//zarzadzanie osobami//
    public function manage_client() {
        return view('klient.client');
    }

    public function show(User $user) {
        return view('klient.client_show', [
            'users' => $user
        ]);
    }
    public function edit(User $user) {
        return view('klient.client_edit', ['user' => $user]);
    }
    public function index(){
        return view('klient.client_show', [

            'users' => Klient::where('typ_konta' ,'klient')->get()

        ]);
    }



    public function destroy(User $user) {
        $user->delete();
        return redirect('/klient/client_show/')->with('message', 'Usunięto Klienta!');
    }
    public function update(Request $request, User $user) {
        $formFields = $request->validate([

            'name' => 'required',
            'telefon' => 'required',
            'email' => 'required',
            'skan_dowod' => 'required',
            'skan_prawko'=> 'required'
            // 'type' =>
        ]);

        $user->update($formFields);

        return redirect('/klient/client_show/')->with('message', 'Zaktualizowane Dane Klienta!');
    }

    public function store_client_edit(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'telefon' => 'required',
            'email' => 'required',
            'skan_dowod' => 'required',
            'skan_prawko' => 'required'
        ]);

    }



    public function manage_client_store(Request $request) {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'typ_konta' => [],
            'telefon' => [ 'min:9'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6',
        ]);

        // Hash hasła
        $formFields['password'] = bcrypt($formFields['password']);
        $formFields['typ_konta'] = "klient";

        $user = User::create($formFields);


        return redirect('/klient/client_show/')->with('message', 'Użytkownik stworzony');
    }




}
