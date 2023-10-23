<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Animal;

class AnimalFamily extends Model {

    use HasFactory;

    public $fillable = [
        'name',
        'description',
        'status',
        'created_at',
        'updated_at'
    ];

    public function animals()
    {
        return $this->hasMany(Animal::class);
    }
}
