<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $pageTitle ?? 'Minha Página' }}</title>
        <!-- Inclua os arquivos CSS do Bootstrap 4 -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
                /* create a custom class so you 
                   do not run into specificity issues 
                   against bootstraps styles
                   which tends to work better than using !important 
                   (future you will thank you later)*/

              
                opacity: .4;
            }
        </style>
    </head>
    <body class="container">

        <div class="text-center"> 
            <nav class="navbar navbar-expand-lg navbar-light bg-success custom-navbar"> 
                <a class="navbar-brand" href="#">Minha Página</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Página Inicial <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Sobre</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contato</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="card special-card mt-3">
            <div class="card-body">
                @yield('content')
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    </body>
</html>
