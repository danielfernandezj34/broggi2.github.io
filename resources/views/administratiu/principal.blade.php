@extends('plantilla_principales')
@section('titulo', 'Administratiu Página Principal')
@section('color_fons', "administratiu")
@section('incidencies')
    <a class="dropdown-item" href="./incidencies">Consultar incidencies</a>
@endsection
@section('container')
<div id="botodiv_admin_recurs" class="float-sm-left col-md-6 col-sm-12">
    <button id="boto_admin_recurs" type="button" class="btn btn-outline-success float-md-right mr-sm-1 mr-md-3 mr-lg-5" ><strong><h4>Activar Formació</h4></strong></button>
</div>
<div id="botodiv_admin_recurs" class="float-sm-right col-md-6 col-sm-12">
    <a href="./trucada"><button id="boto_admin_recurs" type="button" class="btn btn-outline-warning float-md-left ml-sm-1 ml-md-3 ml-lg-5" ><strong><h4>Gestionar Trucades</h4></strong></button></a>
</div>

@endsection
