<?php

namespace App\Http\Controllers;


use App\Models\Klient;
use App\Models\Pojazd;
use App\Models\Zwroty;
use Illuminate\Http\Request;
use App\Models\Wypozyczenie;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;



class WypozyczeniaController extends Controller
{
    //funkcja 1 działająca
    public function index(){
        $nazwa = 'aktualne';
        $wypozyczenia = Wypozyczenie::all()->whereNull('data_zwrotu');
        $zwrot = Zwroty::all();
        $sum = DB::table('wypozyczenia')->sum('kowta_wypozyczenia_dzien');     //dochod z wypozyczen
        // zakladam, ze to bedzie zmienione i bedzie liczylo kwote za wszystkie dni, w ktore klient wynajmuje auto

         return view('wypozyczenia.index',  compact('zwrot', 'nazwa', 'wypozyczenia', 'sum'));
    }

    public function indexAll(){
        $nazwa = 'wszystkie';
        $wypozyczenia = Wypozyczenie::all();
        $zwrot = Zwroty::all();
        $sum = DB::table('wypozyczenia')->sum('kowta_wypozyczenia_dzien');     //dochod z wypozyczen
        // zakladam, ze to bedzie zmienione i bedzie liczylo kwote za wszystkie dni, w ktore klient wynajmuje auto

        return view('wypozyczenia.index',  compact('zwrot', 'nazwa', 'wypozyczenia', 'sum'));
    }

    public function indexZwrocone(){
        $nazwa = 'zwrócone';
        $wypozyczenia = Wypozyczenie::all()->whereNotNull('data_zwrotu');
        $zwrot = Zwroty::all();
        $sum = DB::table('wypozyczenia')->sum('kowta_wypozyczenia_dzien');     //dochod z wypozyczen
        // zakladam, ze to bedzie zmienione i bedzie liczylo kwote za wszystkie dni, w ktore klient wynajmuje auto

        return view('wypozyczenia.index',  compact('zwrot', 'nazwa', 'wypozyczenia', 'sum'));
    }

    public function create() {
        $pojazd = Pojazd::all();
        $klient = Klient::all();
        return view('wypozyczenia.createWypozyczenie', ['pojazd' => $pojazd, 'klient' => $klient]);
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
    public function klientReportGenrate() {

        $klient = Klient::all();
        return view('wypozyczenia.generate_klient_report', [ 'klient' => $klient]);
    }
    public function klientreport(Request $request) {
        $wypozyczenia= Wypozyczenie::where('id_klienta', '=', $request->id_klienta )->get();
        return view('wypozyczenia.klient_report',['wypozyczenia' =>$wypozyczenia]);
    }
}
