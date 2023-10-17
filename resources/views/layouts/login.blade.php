<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Animais Selvagens</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <style>
            /* Estilos personalizados para o fundo da página */
            body {
                background-image: url("{{ asset('img/natureza.jpg') }}"); /* Substitua pelo caminho da sua imagem */
                background-size: cover;
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-color: rgba(0, 0, 0, 0.3); /* Adiciona um fundo semi-transparente para melhorar a legibilidade do conteúdo */
            }

            .nav-bar-green-color {
                background-color: #228B22;
            }
        </style>
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>