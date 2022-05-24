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
}
