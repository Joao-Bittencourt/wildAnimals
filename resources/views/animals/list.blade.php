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

    <div class="row">
        <div class="col-sm-12">
            <x-paginate-count :data=$animals />
            <table class="table table-sm table-hover table-centered table-nowrap mb-0">
                <thead class="thead-light">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">{{ __('messages.name') }}</th>
                        <th class="text-center">{{ __('messages.description') }}</th>
                        <th class="text-center">{{ __('messages.min_max_hp') }}</th>
                        <th class="text-center">{{ __('messages.min_max_attack') }}</th>
                        <th class="text-center">{{ __('messages.min_max_defense') }}</th>
                        <th class="text-center">{{ __('messages.especie') }}</th>
                        <th class="text-center">{{ __('messages.family') }}</th>
                        <th class="text-center">{{ __('messages.status') }}</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($animals as $animal)
                    <tr class="text-center">
                        <td>{{ $animal->id }}</td>
                        <td>{{ $animal->name }}</td>
                        <td>{{ $animal->description }}</td>
                        <td>{{ $animal->min_hp . ' / ' . $animal->max_hp }}</td>
                        <td>{{ $animal->min_attack . ' / ' . $animal->max_attack }}</td>
                        <td>{{ $animal->min_defense . ' / ' . $animal->max_defense }}</td>
                        <td>{{ $animal->animalEspecie->name }}</td>
                        <td>{{ $animal->animalFamily->name }}</td>
                        <td>{{ $animal->status == 1 ? __('messages.active') : __('messages.inactive') }}</td>
                    </tr>
                    @empty
                    <tr class="text-center">
                        <td colspan="6">{{ __('messages.no_records') }}</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="d-flex justify-content-center mt-2">
                {{ $animals->links() }}
            </div>

        </div>
    </div>

</div>

@stop