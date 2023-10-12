@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between w-100 flex-wrap">
    <div class="mb-3 mb-lg-0">
        <h2>{{ __('messages.animals') }}</h2>
    </div>
</div>
<div class="table-responsive p-3">

    <div class="row align-items-center justify-content-between mb-2">

        <div class="col col-sm-6 text-left">
            <a class="btn btn-success" href="{{ route('playerAnimals.explorer') }}">
                <i class="fa fa-plus"></i> Explorar
            </a>
        </div>

    </div>

    <div class="row">
        <div class="col-sm-12">
            <table class="table table-sm table-hover table-centered table-nowrap mb-0">
                <thead class="thead-light">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">{{ __('messages.name') }}</th>
                        <th class="text-center">{{ __('messages.power') }}</th>
                        <th class="text-center">{{ __('messages.animal') }}</th>
                        <th class="text-center">{{ __('messages.status') }}</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($playerAnimals as $playeranimal)
                    <tr class="text-center">
                        <td>{{ $playeranimal->id }}</td>
                        <td>{{ $playeranimal->name }}</td>
                        <td>{{ $playeranimal->power }}</td>
                        <td>{{ $playeranimal->animal->name }}</td>
                        <td>{{ $playeranimal->status == 1 ? __('messages.active') : __('messages.inactive') }}</td>
                    </tr>
                    @empty
                    <tr class="text-center">
                        <td colspan="6">{{ __('messages.no_records') }}</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>


        </div>
    </div>

</div>

@stop
