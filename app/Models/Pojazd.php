<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pojazd extends Model
{
    use HasFactory;

    protected $fillable = ['nr_pojazdu', 'typ_pojazdu', 'marka', 'model', 'wersja', 'stan', 'przebieg', 'pojemnosc_baku'];

    protected $table = 'pojazdy';

    public function scopeFilter($query, array $filters){
        if($filters ?? false) {
            $query->where('marka', 'like', '%' . request('marka') . '%');
        }
    }
}
