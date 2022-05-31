<?php

namespace App\Http\Controllers;
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
        }


        return Response::json($jsresponse);
    }

}
