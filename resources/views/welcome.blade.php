@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between w-100 flex-wrap">
    <div class="mb-3 mb-lg-0">
        <h2>{{ __('Top 10 animals') }}</h2>
    </div>
</div>
<div class="table-responsive p-3">

    <div class="row">
        <div class="col-sm-12">

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

                    </tr>
                </thead>
                <tbody>
                    @forelse ($topAnimals as $topAnimalKey => $topAnimal)
                    <tr class="text-center">

                        <td>
                            <img src="{{ asset($topAnimal->animal->image_path) }}" class="rounded-circle" style="width: 100px;" alt="quixote">
                        </td>
                        <td>{{ $topAnimalKey + 1 . 'º' }}</td>
                        <td>{{ $topAnimal->name }}</td>
                        <td>{{ $topAnimal->hp }}</td>
                        <td>{{ $topAnimal->attack }}</td>
                        <td>{{ $topAnimal->defense }}</td>
                        <td>{{ $topAnimal->animal->description }}</td>


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
@endsection