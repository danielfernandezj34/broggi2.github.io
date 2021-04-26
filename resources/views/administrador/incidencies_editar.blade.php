@extends('plantilla')
@section('titulo', 'SEMS - Administrador Incidencies Editar')
@section('container')
@section('color_fons', "administrador")
@section('color-atras', 'administrador')
@section('boto_atras', './principal_administrador')
@section('incidencies')
    <a class="dropdown-item" href="./incidencies">Consultar incidencies</a>
@endsection
    <mostrar-adminincidencies></mostrar-adminincidencies>
@endsection
