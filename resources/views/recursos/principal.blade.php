@extends('plantilla_principales')
@section('titulo', 'Recursos Página Principal')
@section('color_fons', "recurs")
@section('container')

<div id="botodiv_admin_recurs" class="float-sm-left col-md-6 col-sm-12">
    <a href="./consultar"><button id="boto_admin_recurs" type="button" class="btn btn-outline-azul float-md-right mr-sm-1 mr-md-3 mr-lg-5" ><strong><h4>Consultar Incidències</h4></strong></button></a>
</div>
<div id="botodiv_admin_recurs" class="float-sm-right col-md-6 col-sm-12">
    <a href="./consultar"><button id="boto_admin_recurs" type="button" class="btn btn-outline-warning float-md-left ml-sm-1 ml-md-3 ml-lg-5" ><strong><h4>Incidències Asignades</h4></strong></button></a>
</div>

@endsection
