@extends('layouts.app')

@section('content')

<div class="mb-3 text-center">
    <h2>{{ __('messages.animals') }}</h2>
</div>

<div class="card-body mt-3">
    <div class="row">
        <div class="col-sm-12">
            <form class="form-horizontal" method="post" action="{{ route('playerAnimals.explor') }}">
                @csrf
               
                <div class="row">
                    <div class="col-md-12">
                        <label for="animal_family_id">Familia</label>
                        <select name="animal_family_id" class="form-control">
                            @foreach($animalFamilies as $animalFamily)
                            <option value="{{$animalFamily->id}}">{{$animalFamily->name}}</option>
                            @endforeach
                        </select>
                    </div>    
                </div>
                <div class="row text-center">
                    <div class="col-md-12 mt-4">
                        <button type="submit" class="btn btn-success">{{ __('messages.explorer')}}</button>   
                    </div>
                </div>
            </form>
            
        </div>
    </div>
</div>

@stop
