<?php

namespace App\Livewire;

use App\Models\Animal;
use Livewire\Component;
use Livewire\WithPagination;

class AnimalList extends Component
{
    use WithPagination;
    
    public function render()
    {
        $animals = Animal::paginate(10);
        return view('livewire.animal-list', [
            'animals' => $animals
        ]);
    }
}
