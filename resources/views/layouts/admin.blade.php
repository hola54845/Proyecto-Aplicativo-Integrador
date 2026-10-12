<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/css.css') }}">
    <title>@yield('title', 'Sistema Empresarial')</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <!-- Fuente de AdminLTE -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
    >
    <!-- OverlayScrollbars -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"
    >
    <!-- Bootstrap Icons -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
    >
    <!-- Laravel / Bootstrap -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <!-- AdminLTE -->
    <link
        rel="stylesheet"
        href="{{ asset('adminlte/css/adminlte.css') }}"
    >
    <link rel="stylesheet"
          href="{{ asset('adminlte/css/adminlte.min.css') }}">
</head>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
<div class="app-wrapper">
    <!-- Navbar -->
    <nav class="app-header navbar navbar-expand bg-body">
        <div class="container-fluid">
            <!-- Parte izquierda -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a
                        class="nav-link"
                        data-lte-toggle="sidebar"
                        href="#"
                        role="button"
                    >
                        <i class="bi bi-list"></i>
                    </a>
                </li>
                <li class="nav-item d-none d-md-block">
                    <a
                        href="{{ route('inicio') }}"
                        class="nav-link"
                    >
                        <i class="bi bi-house-door me-1"></i>
                        Inicio
                    </a>
                </li>
            </ul>
            <!-- Parte derecha -->
            <ul class="navbar-nav ms-auto">
                @guest
                    <li class="nav-item">
                        <a
                            href="{{ route('login') }}"
                            class="nav-link"
                        >
                            <i class="bi bi-box-arrow-in-right me-1"></i>
                            Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a
                            href="{{ route('register') }}"
                            class="nav-link"
                        >
                            <i class="bi bi-person-plus me-1"></i>
                            Registro2
                        </a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle"
                            data-bs-toggle="dropdown"
                            href="#"
                        >
                            <i class="bi bi-person-circle me-1"></i>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a
                                class="dropdown-item"
                                href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"
                            >
                                Cerrar sesión
                            </a>
                            <form
                                id="logout-form"
                                action="{{ route('logout') }}"
                                method="POST"
                                class="d-none"
                            >
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>
    <!-- Sidebar -->
    
    <!-- Contenido -->
    <main class="app-main">
    <!-- Encabezado -->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">
                        @yield('header', 'Sistema de Facturacion y control de Inventarios')
                    </h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item">
                            <a href="{{ route('inicio') }}">
                                Inicio
                            </a>
                        </li>
                        <li class="breadcrumb-item active">
                            @yield('header', 'Panel')
                        </li>
                        
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Contenido -->
    <div class="app-content">
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>
    <div class="container-fluid">
            @include('usuario.tabla')
     </div>
</main>
    <!-- Footer -->
    <footer class="app-footer">
        <strong>
            Proyecto Aplicativo Integrador
        </strong>
        - Laravel + AdminLTE
    </footer>
</div>
<script src="{{ asset('adminlte/js/adminlte.min.js') }}"></script>
<!-- OverlayScrollbars -->
<script
    src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js">
</script>
<!-- Popper -->
<script
    src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js">
</script>
<!-- Bootstrap -->
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js">
</script>
<!-- AdminLTE -->
<script
    src="{{ asset('adminlte/js/adminlte.js') }}">
</script>
@if(session('success'))
    <div id="notificacion" class="notificacion">
        {{ session('success') }}
    </div>
@endif
@if(session('success'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const notificacion = document.getElementById('notificacion');

        setTimeout(function () {
            notificacion.classList.add('ocultar');

            setTimeout(function () {
                notificacion.remove();
            }, 500);
        }, 5000);
    });
</script>
@endif
</body>
</html>