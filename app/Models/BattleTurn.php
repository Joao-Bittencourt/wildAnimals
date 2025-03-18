<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BattleTurn extends Model
{
    use HasFactory;

    public function battle(): BelongsTo
    {
        return $this->belongsTo(Battle::class);
    }

    public function animal(): BelongsTo
    {
        return $this->belongsTo(PlayerAnimal::class);
    }

    public function b_animal(): BelongsTo
    {
        return $this->belongsTo(PlayerAnimal::class, 'b_animal_id');
    }
}
