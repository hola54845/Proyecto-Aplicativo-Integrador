@extends('layouts.admin')

@section('title', 'Panel')

@section('header', 'Panel principal')

@section('content')

<div class="card">

    <div class="card-header">

        <h3 class="card-title">

            Bienvenido al sistema

        </h3>

    </div>


    <div class="card-body">

        <p>

            Has iniciado sesión correctamente.

        </p>

        <p>

            Usuario:

            <strong>
                {{ Auth::user()->name }}
            </strong>

        </p>

    </div>

</div>

@endsection