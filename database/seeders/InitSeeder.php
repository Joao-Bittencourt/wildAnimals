<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InitSeeder extends Seeder
{
    public function run(): void
    {

        DB::table('animal_especies')
            ->insert($this->animal_especies());

        DB::table('animal_families')
            ->insert($this->animal_families());

        DB::table('animals')
            ->insert($this->animals());
    }

    private function animal_especies(): array
    {
        return [
            [
                'name' => 'Cachorro',
                'description' => 'Também chamado de cão, é um mamífero carnívoro da família dos canídeos, subespécie do lobo, e talvez o mais antigo animal domesticado pelo ser humano.',
                'image_path' => 'uploads/animals/cachorro.png',
                'status' => 1,
            ],
            [
                'name' => 'Gato',
                'description' => 'Gato é um mamífero carnívoro da família dos felídeos, muito popular como animal de estimação. Ocupando o topo da cadeia alimentar, é predador natural de diversos animais, como roedores, pássaros, lagartixas e alguns insetos.',
                'image_path' => 'uploads/animals/gato.png',
                'status' => 1,
            ],
            [
                'name' => 'Cavalo',
                'description' => 'O cavalo é uma das duas subespécies existentes de Equus ferus. É um mamífero perissodáctilo pertencente à família taxonômica Equidae. O cavalo evoluiu há entre 45 milhões a 55 milhões de anos, desde uma pequena criatura com vários dedos, o Eohippus, até o animal grande e com um único dedo de hoje.',
                'image_path' => 'uploads/animals/cavalo.png',
                'status' => 1,
            ],
        ];
    }

    private function animal_families(): array
    {
        return [
            [
                'name' => 'Canídeos',
                'description' => ' Os canídeos têm uma cauda longa e dentes molares adaptados para esmagar ossos.',
                'status' => 1,
            ],
            [
                'name' => 'Felídeos',
                'description' => 'Felídeos são uma família de animais mamíferos digitígrados, da ordem dos carnívoros.',
                'status' => 1,
            ],
            [
                'name' => 'Equidae',
                'description' => 'Os equinos constituem uma família de mamíferos perissodáctilos. Esta família abarca apenas o género Equus, onde se classificam o cavalo e o burro, além da zebra.',
                'status' => 1,
            ],
        ];
    }

    private function animals(): array
    {
        return [
            [
                'animal_especie_id' => 1,
                'animal_family_id' => 1,
                'name' => 'Cachorro',
                'description' => 'Cachorro',
                'min_hp' => 1,
                'max_hp' => 10,
                'min_attack' => 1,
                'max_attack' => 10,
                'min_defense' => 1,
                'max_defense' => 10,
            ],
            [
                'animal_especie_id' => 2,
                'animal_family_id' => 2,
                'name' => 'Gato',
                'description' => 'Gato',
                'min_hp' => 1,
                'max_hp' => 10,
                'min_attack' => 1,
                'max_attack' => 10,
                'min_defense' => 1,
                'max_defense' => 10,
            ],
            [
                'animal_especie_id' => 3,
                'animal_family_id' => 3,
                'name' => 'Cavalo',
                'description' => 'Cavalo',
                'min_hp' => 1,
                'max_hp' => 10,
                'min_attack' => 1,
                'max_attack' => 10,
                'min_defense' => 1,
                'max_defense' => 10,
            ],
        ];
    }
}
