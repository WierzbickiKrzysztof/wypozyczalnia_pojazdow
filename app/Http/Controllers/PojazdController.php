<?php

namespace App\Http\Controllers;

use App\Models\Pojazd;
use App\Models\S_marka;
use App\Models\S_model;
use App\Models\S_typ_pojazdu;
use App\Models\Wypozyczenie;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

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
        $typ_pojazdu = S_typ_pojazdu::all();

        return view('pojazdy.create', ['typ_pojazdu' => $typ_pojazdu]);
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'nr_pojazdu' => ['required', Rule::unique('pojazdy', 'nr_pojazdu')],
            'typ_pojazdu' => 'required',
            'marka' => 'required',
            'model' => 'required',
            'wersja' => 'required',
            'stan' => 'required',
            'przebieg' => 'required',
            'pojemnosc_baku' => 'required'

        ]);

        Pojazd::create($formFields);

        return redirect('/pojazdy')->with('message', 'Pojazd utworzony pomyślnie!');
    }

    public function edit(Pojazd $pojazd) {
        $typ_pojazdu = S_typ_pojazdu::all();
        $marka = S_marka::all();
        $model = S_model::all();

        return view('pojazdy.edit', ['pojazd' => $pojazd, 'typ_pojazdu' => $typ_pojazdu, 'marka' => $marka, 'model' => $model]);
    }

    public function update(Request $request, Pojazd $pojazd) {
        $formFields = $request->validate([
            'typ_pojazdu' => 'required',
            'marka' => 'required',
            'model' => 'required',
            'wersja' => 'required',
            'stan' => 'required',
            'przebieg' => 'required',
            'pojemnosc_baku' => 'required'
        ]);

        $pojazd->update($formFields);

        return redirect('/pojazdy/'.$pojazd->id)->with('message', 'Pojazd zaktualizowany pomyślnie!');
    }

    public function destroy(Pojazd $pojazd) {
        $pojazd->delete();
        return redirect('/pojazdy')->with('message', 'Pojazd usunięty pomyślnie!');
    }

    public function cennik(){
        $s_typ_pojazdu= S_typ_pojazdu::all();
        return view('cennik.index', ['s_typ_pojazdu' =>$s_typ_pojazdu]);
    }

    public function show_wypozyczenia_pojazdu($id){

        $wypozyczenia = Wypozyczenie::where('id_pojazdu', $id)->get();
        $pojazd = Pojazd::find($id);

        $marka_index = DB::table('pojazdy')->where('id', $id)->first()->marka;
        $model_index = DB::table('pojazdy')->where('id', $id)->first()->model;

        $marka = DB::table('s_marka')->where('id', $marka_index)->first()->name;                     //Marka
        $model =  DB::table('s_model')->where('id', $model_index)->first()->name;                    //Model
        $wersja = DB::table('pojazdy')->where('id', $id)->first()->wersja;                           //Wersja

        return view('pojazdy.history', compact('pojazd', 'wypozyczenia', 'marka' , 'model', 'wersja'));
    }

}
