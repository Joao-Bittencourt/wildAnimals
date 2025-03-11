@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between w-100 flex-wrap">
    <div class="mb-3 mb-lg-0">
        <h2>{{ __('messages.activityLogs') }}</h2>
    </div>
</div>
<div class="table-responsive p-3">

    <div class="row align-items-center justify-content-between mb-2">
    </div>

    <div class="row">
        <div class="col-sm-12">
            <x-paginate-count :data=$logs />
            <table class="table table-sm table-hover table-centered table-nowrap mb-0">
                <thead class="thead-light">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">{{ __('messages.activity') }}</th>
                        <th class="text-center">{{ __('messages.created_at') }}</th>
                        <th class="text-center">{{ __('messages.user') }}</th>
                        <th class="text-center">{{ __('messages.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($logs as $log)
                    <tr class="text-center">
                        <td>{{ $log->id }}</td>
                        <td>{{ $log->activity }}</td>
                        <td>{{ $log->created_at->format('d/m/Y H:i:s') }}</td>
                        <td>{{ $log->user?->name }}</td>
                        <td>
                            <a href="{{ route('activityLogs.show', ['activityLogId' => $log->id]) }}" class="btn btn-sm btn-primary" title="{{ __('messages.show') }}">
                                <i class="bi bi-card-list"></i>
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
                {{ $logs->links() }}
            </div>
        </div>
    </div>

</div>

@stop