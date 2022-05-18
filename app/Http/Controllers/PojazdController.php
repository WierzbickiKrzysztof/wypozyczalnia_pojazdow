<?php

namespace App\Http\Controllers;

use App\Models\Pojazd;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PojazdController extends Controller
{
    public function index(){
        return view('pojazdy.index', [
            //'pojazdy' => Pojazd::latest()->filter(request(['marka']))->simplePaginate(2)->fragment('main-s')
            'pojazdy' => Pojazd::latest()->filter(request(['marka']))->get()
        ]);
    }

    public function show(Pojazd $pojazd) {
        return view('pojazdy.show', [
            'pojazdy' => $pojazd
        ]);
    }

    public function create() {
        return view('pojazdy.create');
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'unikatowy_id_pojazdu' => ['required', Rule::unique('pojazdy', 'unikatowy_id_pojazdu')],
            'marka' => 'required',
            'model' => 'required',
            'wersja' => 'required',
            'przebieg' => 'required',
            'stan' => 'required',
            'paliwo' => 'required',
            'id_wyp' => 'required',
            'data_wypozyczenia' => ['required', 'date'],
            'data_zwrotu' => ['required', 'date']
        ]);

        Pojazd::create($formFields);

        return redirect('/')->with('message', 'Pojazd utworzony pomyślnie!');
    }

    public function edit(Pojazd $pojazd) {
        return view('pojazdy.edit', ['pojazd' => $pojazd]);
    }

    public function update(Request $request, Pojazd $pojazd) {
        $formFields = $request->validate([

            'marka' => 'required',
            'model' => 'required',
            'wersja' => 'required',
            'przebieg' => 'required',
            'stan' => 'required',
            'paliwo' => 'required',
            'id_wyp' => 'required',
            'data_wypozyczenia' => ['required', 'date'],
            'data_zwrotu' => ['required', 'date']
        ]);

        $pojazd->update($formFields);

        return redirect('/pojazdy/'.$pojazd->id)->with('message', 'Pojazd zaktualizowany pomyślnie!');
    }

    public function destroy(Pojazd $pojazd) {
        $pojazd->delete();
        return redirect('/pojazdy')->with('message', 'Pojazd usunięty pomyślnie!');
    }
}
