@props([
'data' => null
])

<div id="paginate-count">

    {{ __("Showing from ") .  $data?->firstItem() . __(' to ') . $data?->lastItem() . __(' of ') . $data?->total() }}

</div>