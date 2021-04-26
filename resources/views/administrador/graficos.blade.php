@extends('plantilla')
@section('titulo', 'SEMS - Administrador Estadistiques')
@section('color_fons', "administrador")
@section('color-atras', 'administrador')
@section('boto_atras', './principal_administrador')
@section('incidencies')
    <a class="dropdown-item" href="./incidencies">Consultar incidencies</a>
@endsection

@section('container')

    <estadistiques-component></estadistiques-component>

@endsection
