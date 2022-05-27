<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Opcje;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class OpcjeController extends Controller
{
    public function index(){
        $opcje = Opcje::all();
        return view('opcje.dodatkowe_opcje', ['opcje' => $opcje]);
    }
    public function create(Request $request) {
        $formFields = $request->validate([

            'name' => 'required',
            'opis' => 'required',
            'cena' => 'required',

        ]);

        Opcje::create($formFields);

        return redirect('opcje/dodatkowe_opcje')->with('message', 'Wyposażenie utworzeno pomyślnie!');
    }
    public function edit(Opcje $opcje) {
        return view('opcje.edytuj_opcje', ['opcje' => $opcje]);
    }

    public function update(Request $request, Opcje $opcje) {
        $formFields = $request->validate([
            'name' => 'required',
            'opis' => 'required',
            'cena' => 'required',


        ]);

        $opcje->update($formFields);

        //return redirect('opcje/edytuj_opcje/');
        return redirect('/klient/dodatkowe_opcje/')->with('message', 'Zaktualizowane Dane Klienta!');
    }

     public function store_opcje_edit(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'opis' => 'required',
            'cena' => 'required'
        ]);
        //return redirect('/opcje/edytuj_opcje'.$opcje->id)->with();
    }
   //public function edit(Opcje $opcje) {
        //return view('opcje.edit', ['wyposazenie' => $opcje]);

   // }

}
