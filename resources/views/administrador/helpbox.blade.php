@extends('plantilla')
@section('titulo', 'SEMS - Administrador Alertant en Detall')
@section('color_fons', "administrador")
@section('color-atras', 'administrador')
@section('boto_atras', './principal_administrador')
@section('incidencies')
    <a class="dropdown-item" href="./incidencies">Consultar incidencies</a>
@endsection
@section('container')

    <helpbox-component></helpbox-component>

@endsection
