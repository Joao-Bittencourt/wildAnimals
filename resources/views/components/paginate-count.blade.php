@props([
'data' => null
])

<div id="paginate-count">

    {{ __("Showing from ") 
        .  ($data ? $data?->firstItem() : '') 
        . __(' to ') 
        . ($data ? $data?->lastItem() : '') 
        . __(' of ') 
        . ($data ? $data?->total() : '')
     }}

</div>