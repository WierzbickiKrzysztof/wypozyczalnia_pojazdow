<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class S_model extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    protected $table = 'S_model';

    public function pojazdy() {
        return $this->hasMany(Pojazd::class, 'model');
    }
}
