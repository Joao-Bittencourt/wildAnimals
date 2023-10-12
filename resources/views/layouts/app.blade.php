<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Animais Selvagens</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <style>
            /* Estilos personalizados para o navbar */
            .custom-navbar {
                border-radius: 20px;
                margin-top: 20px;
            }

            /* Estilos personalizados para o fundo da página */
            body {
                background-image: url("{{ asset('img/natureza.jpg') }}"); /* Substitua pelo caminho da sua imagem */
                background-size: cover;
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-color: rgba(0, 0, 0, 0.3); /* Adiciona um fundo semi-transparente para melhorar a legibilidade do conteúdo */
            }

            .special-card {
                 composes: card-body;
                /*opacity: .9;*/
                background-color: #5DC166;
            }

            .dropdown-menu li{ position: relative; 	}
            .nav-item .submenu{ 
                display: none;
                position: absolute;
                left:100%; top:-7px;
            }
            .nav-item .submenu-left{ 
                right:100%; left:auto;
            }
            .dropdown-menu > li:hover{ background-color: #f1f1f1 }
            .dropdown-menu > li:hover > .submenu{ display: block; }
            
            .nav-bar-green-color {
                background-color: #228B22;
            }
        </style>
    </head>
    <body class="container">

        <div class="text-center"> 
            
            <nav class="navbar navbar-expand-lg navbar-light custom-navbar nav-bar-green-color"> 
                <image class="imagem mr-3" src="{{ asset('img/wolf-icon.jpg') }}" width="5%"/>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
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
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

        </div>
        <div class="card mt-3">
            <div class="card-body">
                @yield('content')
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script>
document.querySelectorAll('.dropdown-menu a').forEach(function (element) {
    element.addEventListener('click', function (e) {
        let nextEl = this.nextElementSibling;
        if (nextEl && nextEl.classList.contains('submenu')) {
            // prevent opening link if link needs to open dropdown
            e.preventDefault();
            if (nextEl.style.display == 'block') {
                nextEl.style.display = 'none';
            } else {
                nextEl.style.display = 'block';
            }

        }
    });
})
        </script>
    </body>
</html>
