@extends('plantilla')
@section('titulo', 'SEMS - Administrador Usuaris i Rols')
@section('color_fons', "administrador")
@section('color-atras', 'administrador')
@section('boto_atras', './principal_administrador')
@section('incidencies')
    <a class="dropdown-item" href="./incidencies">Consultar incidencies</a>
@endsection
@section('container')

    <usuari-component></usuari-component>

@endsection
