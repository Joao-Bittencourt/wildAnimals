@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="card mt-3">
                <div class="card-header">{{ __('messages.activity_log') }}</div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-md-4">
                            <label for="name">{{ __('messages.activity') }}</label>
                            <input class="form-control" type="text" name="name" value="{{ $activityLog->activity }}" disabled>
                        </div>
                        <div class="col-md-4">
                            <label for="name">{{ __('messages.user') }}</label>
                            <input class="form-control" type="text" name="name" value="{{ $activityLog->user?->name }}" disabled>
                        </div>
                        <div class="col-md-4">
                            <label for="name">{{ __('messages.created_at') }}</label>
                            <input class="form-control" type="text" name="name" value="{{ $activityLog->created_at->format('d/m/Y H:i:s') }}" disabled>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-12">
                            <label for="name">{{ __('messages.description') }}</label>
                            <textarea class="form-control" name="description"  rows="10" disabled>{{ json_encode(json_decode($activityLog->properties), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES); }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection