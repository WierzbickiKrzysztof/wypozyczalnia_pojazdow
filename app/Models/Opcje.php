<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opcje extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name', 'opis', 'cena'];

    protected $table = 'wyposazenie';


}
