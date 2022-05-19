<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Wypozyczenie;
use Illuminate\Validation\Rule;

class WypozyczeniaController extends Controller
{
    //funkcja 1 działająca
    public function index(){
       // $data = Wypozyczenie::all();
       // return view('wypozyczenia.index', ['wypozyczenia' =>$data]);
        $wypozyczenia = Wypozyczenie::all();
         return view('wypozyczenia.index', ['wypozyczenia' => $wypozyczenia]);
    }

    public function create() {
        return view('wypozyczenia.createWypozyczenie');
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'id_klienta' => ['required', Rule::unique('wypozyczenia', 'id_klienta')],
            'id_pojazdu' => 'required',
            'kowta_wypozyczenia_dzien' => 'required',
            'data_rozpoczecia' => ['required', 'date'],
            'data_zakonczenia' => ['required', 'date'],
            'dod_ubezpieczenie' => ['required', 'boolean'],
            'skan_umowy' => 'required',
        ]);

        Wypozyczenie::create($formFields);

        return redirect('/wypozyczenia')->with('message', 'Wypozyczenie dodane pomyslnie!');
    }
}
