@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="card">
                <div class="card-header">Animais</div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form class="form-horizontal" method="post" action="{{ url('animals/store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-2">
                                <label for="name">{{ __('messages.name') }}</label>
                                <input class="form-control" type="text" name="name" value="{{ old('name') }}">
                            </div>    
                            
                            <div class="col-md-2">
                                <label for="animal_especie_id">Especie</label>
                                <select name="animal_especie_id" class="form-control">
                                    @foreach($animalEspecies as $animalEspecie)
                                    <option value="{{$animalEspecie->id}}">{{$animalEspecie->name}}</option>
                                    @endforeach
                                </select>
                            </div>    
                            <div class="col-md-2">
                                <label for="animal_family_id">Familia</label>
                                <select name="animal_family_id" class="form-control">
                                    @foreach($animalFamilies as $animalFamily)
                                    <option value="{{$animalFamily->id}}">{{$animalFamily->name}}</option>
                                    @endforeach
                                </select>
                            </div>    
                            <div class="col-md-2">
                                <label for="status">status</label>
                                <select name="status" class="form-control">
                                    @foreach($arStatus as $status)
                                    <option value="{{$status->id}}">{{$status->name}}</option>
                                    @endforeach
                                </select>
                            </div>    
                        </div>    
                        <div class="row">
                            <div class="col-md-2">
                                <label for="min_hp">{{ __('messages.min_hp') }}</label>
                                <input class="form-control" type="number" name="min_hp" value="{{ old('min_hp') }}">
                            </div>    
                            <div class="col-md-2">
                                <label for="max_hp">{{ __('messages.max_hp') }}</label>
                                <input class="form-control" type="number" name="max_hp" value="{{ old('max_hp') }}">
                            </div>    
                            <div class="col-md-2">
                                <label for="min_attack">{{ __('messages.min_attack') }}</label>
                                <input class="form-control" type="number" name="min_attack" value="{{ old('min_attack') }}">
                            </div>    
                            <div class="col-md-2">
                                <label for="max_attack">{{ __('messages.max_attack') }}</label>
                                <input class="form-control" type="number" name="max_attack" value="{{ old('max_attack') }}">
                            </div>    
                            <div class="col-md-2">
                                <label for="min_defense">{{ __('messages.min_defense') }}</label>
                                <input class="form-control" type="number" name="min_defense" value="{{ old('min_defense') }}">
                            </div>    
                            <div class="col-md-2">
                                <label for="max_defense">{{ __('messages.max_defense') }}</label>
                                <input class="form-control" type="number" name="max_defense" value="{{ old('max_defense') }}">
                            </div>    
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="description">Descrição</label>
                                <textarea class="form-control" name="description" rows="3" value="{{ old('description') }}">{{ old('description') }}</textarea>      
                            </div>


                        </div>

                        <div class="row">
                            <div class="col-md-6 mt-2">
                                <input type="file" name="image" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mt-2">
                                <button type="submit" class="btn btn-success">Criar</button>   
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
