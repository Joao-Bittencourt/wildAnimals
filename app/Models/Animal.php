<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AnimalFamily;
use App\Models\AnimalEspecie;

class Animal extends Model {

    use HasFactory;

    public $fillable = [
        'animal_family_id',
        'animal_especie_id',
        'name',
        'description',
        'min_hp',
        'max_hp',
        'min_attack',
        'max_attack',
        'min_defense',
        'max_defense',
        'status',
        'created_at',
        'updated_at'
    ];

    public function animalFamily() {
        return $this->belongsTo(AnimalFamily::class);
    }
    
    public function animalEspecie() {
        return $this->belongsTo(AnimalEspecie::class);
    }
}
