<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uszkodzenie extends Model
{
    protected $fillable = ['id', 'id_wypozyczenia', 'id_pojazdu', 'name'];
    protected $table = 'uszkodzenia';
    use HasFactory;


}
