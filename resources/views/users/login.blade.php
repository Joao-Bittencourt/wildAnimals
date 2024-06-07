@extends('layouts.login')

@section('content')

<div class="row justify-content-center">
    <div class="card mt-4">
        <div class="card-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/authenticate') }}">
                @csrf

                <div class="form-group">
                    <label for="email" class="col-md-12 control-label ">Email</label>
                    <div class="col-md-12">
                        <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
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
                <a href="{{ route('users.register')}}"> Criar conta</a>
            </form>
        </div>
    </div>
</div>

@endsection
