<?php

namespace App\Http\Controllers;
use App\Models\Pojazd;
use App\Models\Rezerwacja;
use App\Models\S_marka;
use App\Models\S_model;
use App\Models\S_typ_pojazdu;
use Illuminate\Http\Request;
use Response;


class AjaxController extends Controller
{


    public function getAjax(Request $request)
    {
        if($request->type == 'typ_pojazdu'){
            $id_typ_pojazdu = $request->typ_pojazdu;
            $cena = S_typ_pojazdu::where('id', $id_typ_pojazdu)->get('cena');
            $marka = S_marka::where('id_typ_pojazdu', $id_typ_pojazdu)->get();
            $jsresponse = [$cena, $marka];


        }elseif($request->type == 'marka'){
            $id_marka = $request->marka;
            $jsresponse = S_model::where('id_marka', $id_marka)->get();


        }elseif($request->type == 'pojazdy'){
            $id_typ_pojazdu = $request->typ_pojazdu;
            $id_marka = $request->marka;
            $id_model = $request->model;

            $rezerwacje = Rezerwacja::all();
            $zarezerwowane = [];
            foreach($rezerwacje as $rz){
                $zarezerwowane[] = $rz['id_pojazdu'];
            }


            $pojazdy = Pojazd::where('typ_pojazdu', $id_typ_pojazdu)->where('marka', $id_marka)->where('model', $id_model)->whereNotIn('id', $zarezerwowane)->get();

            $jsresponse = $pojazdy;


        }elseif($request->type == 'cena_koncowa'){
            $id_typ_pojazdu = $request->typ_pojazdu;
            $l_dni = $request->l_dni;
            $cena = S_typ_pojazdu::where('id', $id_typ_pojazdu)->get('cena');


            $cena_koncowa = ($l_dni*$cena[0]['cena']);

            $jsresponse = $cena_koncowa;
        }


        return Response::json($jsresponse);
    }

}
