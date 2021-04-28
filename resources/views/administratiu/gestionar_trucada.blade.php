@extends('plantilla')
@section('titulo', 'SEMS - Gestionar Trucada')
@section('color_fons', "administratiu")
@section('color-atras', 'administratiu')
@section('boto_atras', './principal_administratiu')
@section('incidencies')
    <a class="dropdown-item" href="./incidencies">Consultar incidencies</a>
@endsection
@section('container')
    <trucada-administratiu :user_id="{{ Auth::user()->id }}"></trucada-administratiu>
@endsection
