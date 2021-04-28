@extends('plantilla')
@section('titulo', 'SEMS - Administrador gestionar Alertants')
@section('color_fons', "administrador")
@section('color-atras', 'administrador')
@section('boto_atras', './principal_administrador')
@section('incidencies')
    <a class="dropdown-item" href="./incidencies">Consultar incidencies</a>
@endsection
@section('container')
    <alertants-component></alertants-component>
@endsection
