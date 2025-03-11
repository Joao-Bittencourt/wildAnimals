<nav class="navbar navbar-expand-lg navbar-light custom-navbar nav-bar-green-color">

    <image class="imagem mr-3" src="{{ asset('img/wolf-icon.jpg') }}" width="5%" onclick="location.href = '/';"></image>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        @if(!empty(Auth::user()->id))
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link btn btn-success ml-1" href="{{ route('playerAnimals.list') }}">Animais</a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn btn-success ml-1" href="{{ route('playerAnimals.explorer') }}">Explorar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn btn-success ml-1" href="#">Arena</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link btn btn-success ml-1 dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Configurações
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="#"> Animais <i class="bi bi-caret-right"></i></a>
                        <ul class="submenu dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('animals.list')}}">listar</a></li>
                            <li><a class="dropdown-item" href="{{route('animals.create')}}">Cadastrar</a></li>
                            <li>
                                <a class="dropdown-item" href="#"> Especies <i class="bi bi-caret-right"></i></a>
                                <ul class="submenu dropdown-menu">
                                    <li><a class="dropdown-item" href="{{route('animalEspecies.list')}}">listar</a></li>
                                    <li><a class="dropdown-item" href="{{route('animalEspecies.create')}}">Cadastrar</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#"> Familias <i class="bi bi-caret-right"></i></a>
                                <ul class="submenu dropdown-menu">
                                    <li><a class="dropdown-item" href="{{route('animalFamilies.list')}}">listar</a></li>
                                    <li><a class="dropdown-item" href="{{route('animalFamilies.create')}}">Cadastrar</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{route('users.list')}}"> Usuarios </i></a>
                    </li>
                </ul>
            </li>
        </ul>
        <ul class='navbar-nav ml-auto'>
            <a href="{{route('users.profile', ['user' => Auth::user()])}}" class='nav-link mr-1' title='detalhar'>
                {{ Auth::user()->name}} <br>
                <div>
                    @if(Auth::user()?->player)
                        lvl {{ Auth::user()->player->current_level }}
                        ({{Auth::user()->player->xp}} / {{ (new App\Services\LevelService())->getXpPerLevel(Auth::user()->player->current_level)}})
                    @endif
                </div>
            </a>
            <li class='nav-item'>
                <a href="{{route('users.logout')}}" class='btn btn-sm btn-danger' title='sair'>
                    <i class='bi bi-box-arrow-left'></i>
                </a>
            </li>
        </ul>
        @else
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link btn btn-success ml-1" href="{{ route('animals.list') }}">Animais</a>
            </li>
        </ul>
        <ul class='navbar-nav ml-auto'>

            <li class='nav-item'>
                <a href="{{route('users.login')}}" class='btn btn-sm btn-success' title='Login'>
                    <i class='bi bi-box-arrow-right'></i>
                </a>
            </li>
            <ul />
            @endif
    </div>
</nav>
