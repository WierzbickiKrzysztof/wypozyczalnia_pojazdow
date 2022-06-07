<?php

namespace App\Http\Controllers;

use App\Models\Klient;
use App\Models\Pojazd;
use App\Models\Rezerwacja;
use App\Models\S_typ_pojazdu;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RezerwacjaController extends Controller
{
    public function index(){
        $rezerwacje = Rezerwacja::all();

        return view('rezerwacja.index',  ['rezerwacje' => $rezerwacje]);
    }

    public function create() {
        $pojazd = Pojazd::all();
        $klient = Klient::all();
        $typ_pojazdu = S_typ_pojazdu::all();
        return view('rezerwacja.create', ['pojazd' => $pojazd, 'klient' => $klient, 'typ_pojazdu' => $typ_pojazdu]);
    }

    public function store(Request $request) {

        $id_typ_pojazdu = Pojazd::where('id', $request->id_pojazdu)->get('typ_pojazdu');

        $data_rozpoczecia = new DateTime($request->data_rozpoczecia);
        $data_zakonczenia = new DateTime($request->data_zakonczenia);

        $l_dni = $data_zakonczenia->diff($data_rozpoczecia)->format("%a"); //3

        $cena = S_typ_pojazdu::where('id', $id_typ_pojazdu[0]['typ_pojazdu'])->get('cena')[0]['cena'];

        $cena_koncowa = ($l_dni*$cena);

//        $formFields = $request->validate([
//            'id_klienta' => 'required',
//            'id_pojazdu' => 'required',
//            'kwota_wypozyczenia_dzien' => 'required',
//            'data_rozpoczecia' => ['required', 'date'],
//            'data_zakonczenia' => ['required', 'date'],
//            //'dod_ubezpieczenie' => ['required', 'boolean'],
//            //'skan_umowy' => 'required',
//            //'cena_koncowa' => 'required',
//        ]);


        Rezerwacja::create(['id_klienta' => $request->id_klienta, 'id_pojazdu' => $request->id_pojazdu, 'kwota_wypozyczenia_dzien' => $cena, 'data_rozpoczecia' => $request->data_rozpoczecia, 'data_zakonczenia' => $request->data_zakonczenia, 'calkowita_kwota' => $cena_koncowa]);

        return redirect()->route('rezerwacja.index')->with('message', 'Utworzono rezerwacje!');
    }


    public function showReport(Request $request) {
        $data_p = $request->data_rozpoczecia;
        $data_k = $request->data_zakonczenia;
        $wypozyczenia = Wypozyczenie::all();

        $data = Wypozyczenie::whereBetween('data_rozpoczecia', [$data_p, Carbon::parse($data_k)->endOfDay()],)
            ->get(['id_klienta', 'id_pojazdu', 'kowta_wypozyczenia_dzien', 'data_rozpoczecia', 'data_zakonczenia', 'dod_ubezpieczenie', 'skan_umowy']);

        return view('wypozyczenia.report', ['wypozyczenia' => $data])->with(['data_p'=>$data_p, 'data_k'=>$data_k]);
    }
    public function update(Request $request, Wypozyczenie $wypozyczenia)
    {
        $date=date("Y-m-d");
        $index=$wypozyczenia->id;
        $bool = DB::update("UPDATE wypozyczenia SET id_zwrotu = '2', data_zwrotu='$date' where id='$index'");




        return redirect('/wypozyczenia/')->with('message', 'Zwrócono pomyślnie!');
    }
    public function latereturn(){
        $date=date("Y-m-d");
        $wypozyczenia = Wypozyczenie::whereColumn('data_zwrotu' ,'>','data_zakonczenia')->where('data_zakonczenia','<',$date)->get();
        return view('wypozyczenia.indexlate',['wypozyczenia'=>$wypozyczenia]);
    }

    public function edit(Rezerwacja $rezerwacja) {
        $pojazd = Pojazd::all();
        $klient = Klient::all();
        $typ_pojazdu = S_typ_pojazdu::all();
        return view('rezerwacja.edit', ['rezerwacja' => $rezerwacja, 'pojazd' => $pojazd, 'klient' => $klient, 'typ_pojazdu' => $typ_pojazdu]);
    }

    public function update_edit(Request $request, Rezerwacja $rezerwacja) {
        $formFields = $request->validate([

            'id_klienta' => 'required',
            'id_pojazdu' => 'required',
            'kwota_wypozyczenia_dzien' => 'required',
            'data_rozpoczecia' => 'required',
            'data_zakonczenia' => 'required',
            'calkowita_kwota' => 'required'
        ]);

        $rezerwacja->update($formFields);

        return redirect()->route('rezerwacja.index')->with('message', 'Rezerwacja edytowana pomyślnie!');
    }
}
