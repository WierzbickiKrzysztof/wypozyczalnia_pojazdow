<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wypozyczenie extends Model
{
    protected $fillable = ['id_klienta', 'id_pojazdu', 'kowta_wypozyczenia_dzien', 'data_rozpoczecia', 'data_zakonczenia', 'data_zwrotu', 'id_zwrotu', 'dod_ubezpieczenie', 'skan_umowy'];
    protected $table = 'wypozyczenia';
    use HasFactory;


    public function pojazd() {
        return $this->hasOne(Pojazd::class, 'id_pojazdu');
    }

    public function klient() {
        return $this->hasOne(Klient::class, 'id_klient');
    }
    public function  zwroty()
    {
        return $this->hasOne(Zwroty::class, 'id_zwrotu');
    }
}
