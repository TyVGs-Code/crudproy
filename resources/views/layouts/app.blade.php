<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <!-- Font Awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> <!-- Tu archivo CSS personalizado -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css" rel="stylesheet" />

</head>

<body>

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-dark border-right" id="sidebar-wrapper">
            <div class="sidebar-heading text-white text-center py-4">
                <h3 class="font-weight-bold">CRUD V.5</h3>
            </div>
            <div class="list-group list-group-flush">
                <a href="{{ route('usuarios.index') }}"
                    class="list-group-item list-group-item-action bg-dark text-white {{ request()->is('usuarios') ? 'active' : '' }}">
                    <i class="fas fa-users"></i> Usuarios
                </a>
                <div class="list-group list-group-flush">
                    <a href="{{ route(name: 'categorias.index')}}"
                        class="list-group-item list-group-item-action bg-dark text-white {{request()->is('categorias') ? 'active' : '' }} ">
                        <i class="fas fa-list"></i> Categorias
                    </a>

                </div>
                <div class="list-group list-group-flush">
                    <a href="{{ route(name: 'sectores.index')}}"
                        class="list-group-item list-group-item-action bg-dark text-white {{request()->is('sectores') ? 'active' : '' }} ">
                        <i class="fas fa-car"></i> Sectores
                    </a>

                </div>

                <div class="list-group list-group-flush">
                    <a href="{{ route(name: 'ascensos.index')}}"
                        class="list-group-item list-group-item-action bg-dark text-white {{request()->is('ascensos') ? 'active' : '' }} ">
                        <i class="fa-solid fa-arrow-up"></i> Ascensos
                    </a>

                </div>

                <div class="list-group list-group-flush">
                    <a href="{{ route(name: 'reglamentos.index')}}"
                        class="list-group-item list-group-item-action bg-dark text-white {{request()->is('reglamentos') ? 'active' : '' }} ">
                        <i class="fa-solid fa-ruler"></i> Reglamento
                    </a>

                </div>

                <div class="list-group list-group-flush">
                    <a href="{{ route(name: 'formatos.index')}}"
                        class="list-group-item list-group-item-action bg-dark text-white {{request()->is('formatos') ? 'active' : '' }} ">
                         <i class="fa-solid fa-receipt"></i>Formatos
                    </a>

                </div>
                
                <div class="list-group list-group-flush">
                    <a href="{{ route(name: 'instrucciones.index')}}"
                        class="list-group-item list-group-item-action bg-dark text-white {{request()->is('Instrucciones') ? 'active' : '' }} ">
                        <i class="fa-solid fa-square-check"></i> Instrucciones
                    </a>

                </div>

                <div class="list-group list-group-flush">
                    <a href="{{ route(name: 'tipo-pros.index')}}"
                        class="list-group-item list-group-item-action bg-dark text-white {{request()->is('tipo-pro') ? 'active' : '' }} ">
                        <i class="fa-solid fa-shapes"></i> Tipo procedimientos
                    </a>

                </div>

                <div class="list-group list-group-flush">
                    <a href="{{ route(name: 'evaacts.index')}}"
                        class="list-group-item list-group-item-action bg-dark text-white {{request()->is('evaacts') ? 'active' : '' }} ">
                        <i class="fa-solid fa-outdent"></i> Evaluación de actividades
                    </a>

                </div>

                <div class="list-group list-group-flush">
                    <a href="{{ route(name: 'anexos.index')}}"
                        class="list-group-item list-group-item-action bg-dark text-white {{request()->is('anexos') ? 'active' : '' }} ">
                        <i class="fa-solid fa-grip"></i> Anexos
                    </a>

                </div>

                <div class="list-group list-group-flush">
                    <a href="{{ route(name: 'tablacontabis.index')}}"
                        class="list-group-item list-group-item-action bg-dark text-white {{request()->is('tablacontabis') ? 'active' : '' }} ">
                        <i class="fa-solid fa-money-check-dollar"></i> Tabla de contabilidad
                    </a>
                </div>

                <a href="#subMenu1" class="list-group-item list-group-item-action bg-dark text-white"
                    data-toggle="collapse">
                    <i class="fas fa-cogs"></i> Configuraciones
                </a>

                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                    <i class="fas fa-sign-out-alt"></i> Cerrar sesión
                </a>
            </div>
        </div>


        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="d-flex align-items-center">
                    <button class="btn btn-primary" id="menu-toggle"><i class="fas fa-bars"></i></button>
                    <span class="ml-2 navbar-brand"></span>
                </div>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-user"></i> Perfil</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js"></script>

    <script>
        // Script para alternar el sidebar
        $("#menu-toggle").click(function (e) {
            e.preventDefault();
            $("#sidebar-wrapper").toggleClass("toggled");
            $("#wrapper").toggleClass("toggled");
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#Fk_cat').select2({
                placeholder: "Selecciona una o más categorías",
                allowClear: true,
                width: '100%' // Para que el select ocupe todo el ancho del contenedor
            });
        });
    </script>

</body>

</html>