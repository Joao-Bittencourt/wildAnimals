@extends('layouts.app')



@section('content')
<div class="d-flex justify-content-between w-100 flex-wrap">
    <div class="mb-3 mb-lg-0">
        <h2>{{ __('messages.animal_families') }}</h2>
    </div>
</div>
<div class="table-responsive p-3">

    <div class="row align-items-center justify-content-between mb-2">

        <div class="col col-sm-6 text-left">
            <a class="btn btn-success" href="{{ route('animalFamilies.create') }}">
                <i class="fa fa-plus"></i> Criar
            </a>
        </div>

    </div>

    <div class="row">
        <div class="col-sm-12">
            <x-paginate-count :data=$animalFamilies />
            <table class="table table-sm table-hover table-centered table-nowrap mb-0">
                <thead class="thead-light">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">{{ __('messages.name') }}</th>
                        <th class="text-center">{{ __('messages.description') }}</th>
                        <th class="text-center">{{ __('messages.status') }}</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($animalFamilies as $animalFamily)
                    <tr class="text-center">
                        <td>{{ $animalFamily->id }}</td>
                        <td>{{ $animalFamily->name }}</td>
                        <td>{{ $animalFamily->description }}</td>
                        <td>{{ $animalFamily->status == 1 ? __('messages.active') : __('messages.inactive') }}</td>
                    </tr>
                    @empty
                    <tr class="text-center">
                        <td colspan="6">{{ __('messages.no_records') }}</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="d-flex justify-content-center mt-2">
                {{ $animalFamilies->links() }}
            </div>
        </div>
    </div>

</div>

@stop