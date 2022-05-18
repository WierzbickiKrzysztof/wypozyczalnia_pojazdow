<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pojazd extends Model
{
    use HasFactory;

    protected $fillable = ['unikatowy_id_pojazdu', 'marka', 'model', 'wersja', 'przebieg', 'stan', 'paliwo', 'id_wyp', 'data_wypozyczenia', 'data_zwrotu'];

    protected $table = 'pojazdy';

    public function scopeFilter($query, array $filters){
        if($filters ?? false) {
            $query->where('marka', 'like', '%' . request('marka') . '%');
        }
    }
}
