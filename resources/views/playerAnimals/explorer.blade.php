@extends('layouts.app')

@section('content')

<div class="mb-3 text-center">
    <h2>{{ __('messages.animals') }}</h2>
</div>

<div class="card-body mt-3">
    <div class="row">
        <div class="col-sm-12">
            <form class="form-horizontal" method="post" action="{{ route('playerAnimals.explor') }}">
                @csrf

                <div class="row">
                    <div class="col-md-12">
                        <label for="animal_family_id">Familia</label>
                        <select name="animal_family_id" class="form-control">
                            @foreach($animalFamilies as $animalFamily)
                            <option value="{{$animalFamily->id}}">{{$animalFamily->name}}</option>
                            @endforeach
                        </select>
                    </div>    
                </div>
                <div class="row text-center">
                    <div class="col-md-12 mt-4">
                        <button type="submit" class="btn btn-success" {{ !empty($timeExploration) ? "disabled" : '' }}>{{ __('messages.explorer')}}</button>   
                    </div>
                </div>
            </form>

            @if (!empty($timeExploration))
                <div class="mt-3" id="progress-bar-div">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 55%;" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" id="progress-bar"></div>
                    </div>
                    <div class="text-primary text-center" id="progress-bar-text"></div>
                </div>
                <script>
                    const totalTime = {{ $timeExploration }};
                    function updateProgressBar(i) {

                        var elapsedTime = totalTime - i;
                        if (i >= totalTime) {
                            document.getElementById("progress-bar-div").remove();
                            document.querySelector("body > div.card.mt-3 > div > div.card-body.mt-3 > div > div > form > div.row.text-center > div > button").disabled = false;
                            return;
                        }

                        const progress = (elapsedTime / totalTime) * 100;
                        document.getElementById("progress-bar").style.width = progress + "%"
                        document.getElementById("progress-bar-text").innerText = elapsedTime + " segundos"

                        setTimeout(() => {
                            updateProgressBar(i + 1);
                        }, 1000);
                    }

                    updateProgressBar(1);
                </script>
            @endif
        </div>
    </div>
</div>

@stop
