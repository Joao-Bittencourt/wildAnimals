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
                <x-paginate-count :data=$battles />
                <table class="table table-sm table-hover table-centered table-nowrap mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center"></th>
                            <th class="text-center">#</th>
                            <th class="text-center">{{ __('messages.name') }}</th>
                            <th class="text-center">{{ __('messages.hp') }}</th>
                            <th class="text-center">{{ __('messages.attack') }}</th>
                            <th class="text-center">{{ __('messages.defense') }}</th>

                        </tr>
                    </thead>
                    <tbody id="table-body">
                        @forelse ($battles as $battle)
                        <tr class="text-center">

                            <td>
                                <img src="{{ asset($battle->playeranimal->animal->image_path) }}" class="rounded-circle" style="width: 100px;" alt="quixote">
                            </td>
                            <td>{{ $battle->id }}</td>
                            <td>{{ $battle->playeranimal->name }}</td>
                            <td>{{ $battle->playeranimal->hp }}</td>
                            <td>{{ $battle->playeranimal->attack }}</td>
                            <td>{{ $battle->playeranimal->defense }}</td>



                        </tr>
                        @empty
                        <tr class="text-center">
                            <td colspan="6">{{ __('messages.no_records') }}</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="d-flex justify-content-center mt-2 paginacao">
                    {{ $battles->links() }}
                </div>
            </div>
        </div>

    </div>
</div>
<script>
    window.addEventListener('load', () => {
        setTimeout(() => {

            fetch('/jobs/battles').then(response => response.json()).then(data => {
                console.log(data)
            });
        });
    });
</script>

@stop