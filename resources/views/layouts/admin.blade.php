<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
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
                            Registro
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
    <aside class="app-sidebar bg-body-secondary shadow">
    <div class="sidebar-brand">
        <a
            href="{{ route('inicio') }}"
            class="brand-link"
        >
            <span class="brand-text fw-light">
                Mi Empresa
            </span>
        </a>
    </div>
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul
                class="nav sidebar-menu flex-column"
                data-lte-toggle="treeview"
                role="menu"
            >
                <li class="nav-header">
                    MENÚ PRINCIPAL
                </li>
                <li class="nav-item">
                    <a
                        href="{{ route('inicio') }}"
                        class="nav-link"
                    >
                        <i class="nav-icon bi bi-house"></i>
                        <p>Inicio</p>
                    </a>
                </li>
                @auth
                    <li class="nav-item">
                        <a
                            href="{{ route('home') }}"
                            class="nav-link"
                        >
                            <i class="nav-icon bi bi-speedometer2"></i>
                            <p>Panel</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a
                            href="#"
                            class="nav-link"
                        >
                            <i class="nav-icon bi bi-people"></i>
                            <p>Usuarios</p>
                        </a>
                    </li>
                @endauth
            </ul>
        </nav>
    </div>
</aside>
    <!-- Contenido -->
    <main class="app-main">
    <!-- Encabezado -->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">
                        @yield('header', 'Panel')
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
</body>
</html>