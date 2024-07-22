@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between w-100 flex-wrap">
    <div class="mb-3 mb-lg-0">
        <h2>{{ __('messages.animals') }}</h2>
    </div>
</div>
<div class="table-responsive p-3">

    <div class="row align-items-center justify-content-between mb-2"></div>

    <div class="row">
        <div class="col-sm-12">
            <x-paginate-count :data=$users />
            <table class="table table-sm table-hover table-centered table-nowrap mb-0">
                <thead class="thead-light">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">{{ __('messages.name') }}</th>
                        <th class="text-center">{{ __('messages.email') }}</th>
                        <th class="text-center">{{ __('messages.created_at') }}</th>
                        <th class="text-center">{{ __('messages.actions') }}</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                    <tr class="text-center">
                       
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at->format('d/m/Y H:i:s') }}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-secondary" title="{{ __('messages.ban') }}">
                                    <i class="bi bi-ban"></i>
                                    Ban
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
            <div class="d-flex justify-content-center mt-2">
                {{ $users->links() }}
            </div>
        </div>
    </div>

</div>

@stop