@extends('layouts.admin')
@section('title', 'Inicio')
@section('header', 'Página principal')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">
                    Sistema de Gestión Empresarial
                </h3>
            </div>
            <div class="card-body">
                <h2>Bienvenido</h2>
                <p>
                    Este proyecto aplicativo integrador fue
                    desarrollado utilizando Laravel,
                    Bootstrap y AdminLTE.
                </p>
                <p>
                    El sistema permite gestionar información
                    de usuarios y otros recursos de una empresa
                    mediante una interfaz web sencilla,
                    organizada y segura.
                </p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <!-- Usuarios -->
    <div class="col-lg-4 col-6">
        <div class="small-box text-bg-primary">
            <div class="inner">
                <h3>Usuarios</h3>
                <p>Gestión de usuarios</p>
            </div>
            <svg
                class="small-box-icon"
                fill="currentColor"
                viewBox="0 0 24 24"
            >
                <path
                    d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"
                />
            </svg>
            <a
                href="#"
                class="small-box-footer link-light"
            >
                Ver información
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>
    <!-- Login -->
    <div class="col-lg-2 col-6">
        <div class="small-box text-bg-success">
            <div class="inner">
                <h3>Login</h3>
                <p>Autenticación segura</p>
            </div>
            <svg
                class="small-box-icon"
                fill="currentColor"
                viewBox="0 0 24 24"
            >
                <path
                    d="M10 17l5-5-5-5v3H3v4h7v3zm9-14H5c-1.1 0-2 .9-2 2v3h2V5h14v14H5v-3H3v3c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z"
                />
            </svg>
            <a
                href="{{ route('login') }}"
                class="small-box-footer link-light"
            >
                Iniciar sesión
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>
    <!-- Laravel -->
    <div class="col-lg-2 col-6">
        <div class="small-box text-bg-warning">
            <div class="inner">
                <h3>Laravel</h3>
                <p>Aplicación web</p>
            </div>
            <svg
                class="small-box-icon"
                fill="currentColor"
                viewBox="0 0 24 24"
            >
                <path
                    d="M3 3h18v18H3V3zm2 2v14h14V5H5z"
                />
            </svg>
            <a
                href="#"
                class="small-box-footer link-dark"
            >
                Más información
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>
</div>
@endsection