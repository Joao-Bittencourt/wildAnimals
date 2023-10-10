<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AnimalFamily;
use App\Models\AnimalEspecie;

class Animal extends Model {

    use HasFactory;

    public $fillable = [
        'name',
        'description',
        'min_power',
        'max_power',
        'animal_family_id',
        'animal_especie_id',
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
