<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opcje extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'nazwa', 'opis', 'cena'];

    protected $table = 'wyposazenie';

    public function scopeFilter($query, array $filters){
        if($filters ?? false) {
            $query->where('name', 'like', '%' . request('name') . '%');
        }
    }
}
