@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between w-100 flex-wrap">
    <div class="mb-3 mb-lg-0">
        <h2>{{ __('messages.animals') }}</h2>
    </div>
</div>
<div class="lista-container">
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
                <x-paginate-count :data=$playerAnimals />
                <table class="table table-sm table-hover table-centered table-nowrap mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center"></th>
                            <th class="text-center">#</th>
                            <th class="text-center">{{ __('messages.name') }}</th>
                            <th class="text-center">{{ __('messages.hp') }}</th>
                            <th class="text-center">{{ __('messages.attack') }}</th>
                            <th class="text-center">{{ __('messages.defense') }}</th>
                            <th class="text-center">{{ __('messages.animal') }}</th>
                            <th class="text-center">{{ __('messages.status') }}</th>
                            <th class="text-center">{{ __('messages.actions') }}</th>

                        </tr>
                    </thead>
                    <tbody id="table-body">
                        @forelse ($playerAnimals as $playeranimal)
                        <tr class="text-center">

                            <td>
                                <img src="{{ asset($playeranimal->animal->image_path) }}" class="rounded-circle" style="width: 100px;" alt="quixote">
                            </td>
                            <td>{{ $playeranimal->id }}</td>
                            <td>{{ $playeranimal->name }}</td>
                            <td>{{ $playeranimal->hp }}</td>
                            <td>{{ $playeranimal->attack }}</td>
                            <td>{{ $playeranimal->defense }}</td>
                            <td>{{ $playeranimal->animal->name }}</td>
                            <td>{{ $playeranimal->status == 1 ? __('messages.active') : __('messages.inactive') }}</td>

                            <td>
                                <a href="{{ route('playerAnimals.show', ['playerAnimal' => $playeranimal]) }}" class="btn btn-sm btn-primary" title="{{ __('messages.show') }}">
                                    <i class="bi bi-card-list"></i>
                                </a>
                                <a href="{{ route('arenas.enter', ['player_animal_id' => $playeranimal->id]) }}" class="btn btn-sm btn-danger" title="{{ __('messages.enter_arena') }}">
                                <i class="bi bi-fire"></i>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr class="text-center">
                            <td colspan="6">{{ __('messages.no_records') }}</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="d-flex justify-content-center mt-2 paginacao">
                    {{ $playerAnimals->links() }}
                </div>
            </div>
        </div>

    </div>
</div>

@stop