<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rezerwacja extends Model
{
    use HasFactory;

    protected $table = 'rezerwacje';

    protected $fillable = [
        'id_klienta',
        'id_pojazdu',
        'kwota_wypozyczenia_dzien',
        'data_rozpoczecia',
        'data_zakonczenia',
        'calkowita_kwota',
        //'status_rezerwacji',
        //'id_ubezpieczenia',
    ];

    protected $attributes = [
        'status_rezerwacji' => 1,
    ];

    public function pojazd() {
        return $this->hasOne(Pojazd::class, 'id_pojazdu');
    }

    public function klient() {
        return $this->hasOne(Klient::class, 'id_klient');
    }
}
