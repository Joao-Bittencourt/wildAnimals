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
                    <form class="form-horizontal" method="post" action="{{ url('animals/store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-2">
                                <label for="name">Nome</label>
                                <input class="form-control" type="text" name="name">
                            </div>    
                            <div class="col-md-2">
                                <label for="min_power">Força min</label>
                                <input class="form-control" type="number" min="0"  name="min_power">
                            </div>    
                            <div class="col-md-2">
                                <label for="max_power">Força max</label>
                                <input class="form-control" type="number" max="4096" name="max_power">
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
                            <div class="col-md-12">
                                <label for="description">Descrição</label>
                                <textarea class="form-control" name="description" rows="3"></textarea>      
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
