@if (Session::has('alert-success'))
<div class="alert alert-success mt-2 mb-2 text-white">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    {!! Session::get('alert-success') !!}
</div>
@endif

@if (Session::has('alert-error'))
<div class="alert alert-danger mt-2 mb-2">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    {!! Session::get('alert-error') !!}
</div>
@endif