@extends('layouts.admin')
@section('title', 'Panel')
@section('header', 'Panel principal')
@section('content')
<div class="card">
   <div class="card-header">
       <h3 class="card-title">
           Bienvenido al Pagina pri
       </h3>
   </div>
   <div class="card-body">
       <p>
           Has iniciado sesión correctamente.
           Pagina Privada @auth de (Auth de:: )@endaouth
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