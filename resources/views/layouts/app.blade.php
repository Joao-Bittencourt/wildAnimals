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
         @livewireStyles
    </head>
    <body class="container">
        
        <div class="text-center"> 
            <x-nav-menu></x-nav-menu>
            
        </div>
        <x-alerts></x-alerts>
        <div class="card mt-3">
            <div class="card-body">
                @yield('content')
            </div>
        </div>
        @livewireScripts
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
