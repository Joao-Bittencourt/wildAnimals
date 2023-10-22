<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Animal;
use App\Models\Player;

class PlayerAnimal extends Model {

    use HasFactory;

    public $fillable = [
        'animal_id',
        'player_id',
        'name',
        'hp',
        'attack',
        'defense',
        'status',
        'created_at',
        'updated_at'
    ];

    public function animal() {
        return $this->belongsTo(Animal::class);
    }
    
    public function player() {
        return $this->belongsTo(Player::class);
    }
}
