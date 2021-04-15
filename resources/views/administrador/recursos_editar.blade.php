@extends('plantilla')
@section('titulo', 'SEMS - Administrador Recursos Editar')
@section('color_fons', "administrador")
@section('color-atras', 'administrador')
@section('boto_atras', './principal_administrador')
@section('incidencies')
    <a class="dropdown-item" href="./incidencies">Consultar Recursos</a>
@endsection
@section('container')
    <recursos-component></recursos-component>
@endsection
