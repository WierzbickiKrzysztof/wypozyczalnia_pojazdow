<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zwroty extends Model
{
    protected $fillable = ['id', 'name'];
    protected $table = 'zwroty';
    use HasFactory;
    public function wypozyczenie() {
        $zwrot = Zwroty::all();
        return $this->belongsTo(Wypozyczenie::class, 'id_zwrotu', 'id');
    }
}
