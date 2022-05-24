<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pojazd extends Model
{
    use HasFactory;

    protected $fillable = ['nr_pojazdu', 'typ_pojazdu', 'marka', 'model', 'wersja', 'stan', 'przebieg', 'pojemnosc_baku', 'cena'];

    protected $table = 'pojazdy';

    public function scopeFilter($query, array $filters){
        if($filters ?? false) {
            $query->where('marka', 'like', '%' . request('marka') . '%');
        }
    }

    public function s_typ_pojazdu() {
        return $this->belongsTo(S_typ_pojazdu::class, 'typ_pojazdu');
    }

    public function s_marka() {
        return $this->belongsTo(S_marka::class, 'marka');
    }

    public function s_model() {
        return $this->belongsTo(S_model::class, 'model');
    }

    public function wypozyczenie() {
        return $this->belongsTo(Wypozyczenie::class, 'id_pojazdu', 'id');
    }
}
