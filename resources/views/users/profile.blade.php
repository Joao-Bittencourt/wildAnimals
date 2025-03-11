@extends('layouts.app')

@section('content')

@php
$user = Auth::user();
@endphp
<div class="row justify-content-center">
    <div class="col-md-12">

        <div class="card">
            <div class="card-header">{{ __('messages.profile') }}</div>
            <div class="card-body">
                <div class="mb-3 row">
                    <label for="name" class="col-md-4 col-form-label text-md-end text-start">{{ __('messages.name') }}</label>
                    {{ $user->name }}
                </div>
                <div class="mb-3 row">
                    <label for="nick_name" class="col-md-4 col-form-label text-md-end text-start">{{ __('messages.nick_name') }}</label>
                    {{ $user->nick_name ?? '-' }}
                </div>
                <div class="mb-3 row">
                    <label for="email" class="col-md-4 col-form-label text-md-end text-start">{{ __('messages.email') }}</label>
                    {{ $user->email }}
                </div>

            </div>
        </div>
    </div>
</div>

@endsection