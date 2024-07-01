<?php

namespace Tests\Unit\Models;

use App\Models\Animal;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tests\TestCase;

class AnimalTest extends TestCase
{
    public $animal;

    public function setUp(): void
    {
        parent::setUp();
        $this->animal = new Animal();
    }

    public function test_animal_belongs_to_animal_family(): void
    {
        $this->assertInstanceOf(BelongsTo::class, $this->animal->animalFamily());
    }

    public function test_animal_belongs_to_animal_especie(): void
    {
        $this->assertInstanceOf(BelongsTo::class, $this->animal->animalEspecie());
    }
}
