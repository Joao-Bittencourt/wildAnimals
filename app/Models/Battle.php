<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Battle extends Model
{
    use HasFactory;

    public function playerAnimal(): BelongsTo
    {
        return $this->belongsTo(PlayerAnimal::class);
    }

    public function player(): BelongsTo
    {
        return $this->belongsTo(Player::class);
    }

    public function bPlayerAnimal(): BelongsTo
    {
        return $this->belongsTo(PlayerAnimal::class, 'b_player_animal_id');
    }

    public function bPlayer(): BelongsTo
    {
        return $this->belongsTo(Player::class, 'b_player_id');
    }

    public function winnerPlayerAnimal(): BelongsTo
    {
        return $this->belongsTo(PlayerAnimal::class, 'winner_player_animal_id');
    }

    public function battleTurns(): HasMany
    {
        return $this->hasMany(BattleTurn::class);
    }
}
