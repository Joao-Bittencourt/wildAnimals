@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between w-100 flex-wrap">
    <div class="mb-3 mb-lg-0">
        <h2>{{ __('messages.animals') }}</h2>
    </div>
</div>
<div class="table-responsive p-3">
    @if(!empty(Auth::user()->id))
        <div class="row align-items-center justify-content-between mb-2">
            <div class="col col-sm-6 text-left">
                <a class="btn btn-success" href="{{ route('animals.create') }}">
                    <i class="fa fa-plus"></i> Criar
                </a>
            </div>
        </div>
    @endif
    <livewire:animal-list /> 
    

</div>

@stop
