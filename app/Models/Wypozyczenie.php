<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wypozyczenie extends Model
{
    protected $fillable = ['id_klienta', 'id_pojazdu', 'kowta_wypozyczenia_dzien', 'data_rozpoczecia', 'data_zakonczenia', 'dod_ubezpieczenie', 'skan_umowy'];
    protected $table = 'wypozyczenia';
    use HasFactory;
}
