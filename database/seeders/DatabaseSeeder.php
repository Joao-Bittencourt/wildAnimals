<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    public function run(): void {
        
        \App\Models\User::factory(10)->has(
                \App\Models\Player::factory()->count(1)
                )->create();
        
        \App\Models\AnimalEspecie::factory(10)->create();
        \App\Models\AnimalFamily::factory(10)->create();
        \App\Models\Animal::factory(20)->create();
        
        \App\Models\PlayerAnimal::factory(20)->create();
 
    }

}
