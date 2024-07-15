@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="card mt-3">
                <div class="card-header">Animais</div>
                <img src="{{ asset($playerAnimal->Animal->image_path) }}" class="img-fluid" alt="{{ $playerAnimal->Animal->name }}"  style="width: 18rem;">
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-2">
                            <label for="name">{{ __('messages.name') }}</label>
                            <input class="form-control" type="text" name="name" value="{{ $playerAnimal->name }}" disabled>
                        </div>

                        <div class="col-md-2">
                            <label for="animal_especie_id">Especie</label>
                            <input class="form-control" type="text" name="especie" value="{{ $playerAnimal->Animal->AnimalEspecie->name }}" disabled>
                        </div>
                        <div class="col-md-2">
                            <label for="animal_family_id">Familia</label>
                            <input class="form-control" type="text" name="family" value="{{ $playerAnimal->Animal->AnimalFamily->name }}" disabled>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label for="min_hp">{{ __('messages.hp') }}</label>
                            <input class="form-control" type="number" name="hp" value="{{ $playerAnimal->hp }}" disabled>
                        </div>

                        <div class="col-md-2">
                            <label for="min_attack">{{ __('messages.attack') }}</label>
                            <input class="form-control" type="number" name="attack" value="{{ $playerAnimal->attack }}" disabled>
                        </div>
                        <div class="col-md-2">
                            <label for="min_defense">{{ __('messages.defense') }}</label>
                            <input class="form-control" type="number" name="defense" value="{{ $playerAnimal->defense }}" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection