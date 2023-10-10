<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayerAnimal extends Model {

    use HasFactory;

    public $fillable = [
        'animal_id',
        'player_id',
        'name',
        'power',
        'status',
        'created_at',
        'updated_at'
    ];

}
