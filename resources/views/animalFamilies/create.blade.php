@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="card">
                <div class="card-header">Familia de animais</div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form class="form-horizontal" method="post" action="{{ url('animal-families/store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <label for="agency">Nome</label>
                                <input class="form-control" type="text" name="name">
                            </div>    
                            <div class="col md-4">
                                <label for="status">status</label>
                                <select name="status" class="form-control">
                                    @foreach($arStatus as $status)
                                    <option value="{{$status->id}}">{{$status->name}}</option>
                                    @endforeach
                                </select>
                            </div>    
                        </div>    
                        <div class="row">
                            <div class="col-md-12">
                                <label for="description">Descrição</label>
                                <textarea class="form-control" name="description" rows="3"></textarea>      
                            </div>


                        </div>

                        <div class="row">
                            <div class="col-md-6 mt-2">
                                <button type="submit" class="btn btn-success">Criar</button>   
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
