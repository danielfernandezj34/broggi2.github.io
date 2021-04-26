@extends('plantilla_principales')
@section('titulo', 'SEMS - Administratiu Página Principal')
@section('color_fons', "administratiu")
@section('incidencies')
    <a class="dropdown-item" href="./incidencies">Consultar incidencies</a>
@endsection
@section('container')

<administratiu-principal></administratiu-principal>

@endsection
