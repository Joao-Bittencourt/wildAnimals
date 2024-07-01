@props([
    'data' => null
])

{{ __("Showing from ") .  $data?->firstItem() . __(' to ') . $data?->lastItem() . __(' of ') . $data?->total() }}