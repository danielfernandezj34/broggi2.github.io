@extends('plantilla')
@section('titulo', 'SEMS - Administrador Usuaris i Rols')
@section('color_fons', "administrador")
@section('color-atras', 'administrador')
@section('boto_atras', './principal_administrador')
@section('incidencies')
    <a class="dropdown-item" href="./incidencies">Consultar incidencies</a>
@endsection
@section('container')
<div class="card mt-3">
    <div class="card-body mt-1">
        <h5 class="card-title" id="titol_usuaris">Usuaris</h5>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Buscar Usuari" aria-label="Buscar Usuari">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fal fa-search"> Buscar</i></button>
        </form>
        <table class="table mt-2">
        <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Cognom</th>
                <th scope="col">Nom d'Usuari</th>
                <th scope="col">Email</th>
                <th scope="col">Rol</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
        </table>
    </div>
    <a href="{{ route('crearu') }}" id="botoCrear"><i class="far fa-plus-circle fa-3x"></i></a>
</div>
@endsection
