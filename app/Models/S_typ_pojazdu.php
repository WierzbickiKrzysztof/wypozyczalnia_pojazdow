<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class S_typ_pojazdu extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    protected $table = 'S_typ_pojazdu';

    public function pojazdy() {
        return $this->hasMany(Pojazd::class, 'typ_pojazdu');
    }

}
