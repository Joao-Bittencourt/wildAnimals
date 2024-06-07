<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimalEspecie extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'description',
        'status',
        'created_at',
        'updated_at',
    ];
}
