@extends('layouts.app')

@section('content')
 
<div class="d-flex justify-content-between w-100 flex-wrap">
    <div class="mb-3 mb-lg-0">
        <h2>{{ __('messages.animals') }}</h2>
    </div>
</div>
<div class="card-body mt-3">
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-sm table-hover table-centered table-nowrap mb-0">
                <thead class="thead-light">
                    <tr>
                       
                        <th class="text-center">{{ __('messages.animal_families') }}</th>
                        <th class="text-center">{{ __('messages.actions') }}</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($animalFamilies as $animalFamily)
                    <tr class="text-center">
                        <td>{{ $animalFamily->name }}</td>
                        <td> 
                            <form method="POST" action="{{ route('playerAnimals.explor') }}">
                            @csrf
                            <input type="hidden" name="animal_family_id" value="{{ $animalFamily->id }}" >
                            <button type="submit">Submit</button>
                            </form>
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
