@extends('plantilla_principales')
@section('titulo', 'SEMS - Administrador Página Principal')
@section('color_fons', "administrador")
@section('incidencies')
    <a class="dropdown-item" href="./incidencies">Consultar incidencies</a>
@endsection
@section('container')

<administrador-principal></administrador-principal>

@endsection
