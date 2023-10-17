@extends('layouts.login')

@section('content')

<div class="row justify-content-center">
    <div class="card mt-4">
        <div class="card-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/do-login') }}">
                @csrf

                <div class="form-group">
                    <label for="password" class="col-md-12 control-label ">Usuario</label>
                    <div class="col-md-12">
                        <input id="usuario" type="text" class="form-control" name="usuario" value="{{ old('usuario') }}" placeholder="Usuário" maxlength="14">
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="col-md-4 control-label">Senha</label>

                    <div class="col-md-12">
                        <input id="password" type="password" class="form-control" name="password" placeholder="Senha">

                    </div>
                </div>

<!--                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember"> Lembrar Me
                            </label>
                        </div>
                    </div>
                </div>-->

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-btn fa-sign-in"></i> Login
                        </button>                              
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
