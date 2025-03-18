@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between w-100 flex-wrap">
    <div class="mb-3 mb-lg-0">
        <h2>{{ __('messages.arenas') }}</h2>
    </div>
</div>
<div class="lista-container">
    <div class="table-responsive p-3">
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-sm table-hover table-centered table-nowrap mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">{{ __('messages.attacker') }}</th>
                            <th class="text-center">{{ __('messages.attack') }}</th>
                            <th class="text-center">vs</th>
                            <th class="text-center">{{ __('messages.defender') }}</th>
                            <th class="text-center">{{ __('messages.defense') }}</th>
                            <th class="text-center">{{ __('messages.damage_received') }}</th>

                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($battle->battleTurns as $battleTurn)

                        <tr class="text-center">

                            <td>{{ $battleTurn->id }}</td>
                            <td>{{ $battleTurn->animal->name }}</td>
                            <td>{{ $battleTurn->attack }}</td>
                            <td> vs </td>
                            <td>{{ $battleTurn->b_animal->name }}</td>
                            <td>{{ $battleTurn->defense }}</td>
                            <td>{{ $battleTurn->damage_received < 0 ? 0 : $battleTurn->damage_received }}</td>

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
</div>

@stop