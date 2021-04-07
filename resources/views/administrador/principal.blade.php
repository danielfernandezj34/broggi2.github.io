@extends('plantilla_principales')
@section('titulo', 'Administrador Página Principal')
@section('color_fons', "administrador")
@section('incidencies')
    <a class="dropdown-item" href="./incidencies">Consultar incidencies</a>
@endsection
@section('container')

<div id="botodiv_administrador" class="float-sm-left col-md-4 col-sm-12">
    <a href="./usuaris"><button id="boto_administrador" type="button" class="btn btn-outline-primary ml-lg-5" >Usuaris i rols</button></a>
</div>
<div id="botodiv_administrador" class="float-sm-left col-md-4 col-sm-12">
    <button id="boto_administrador" type="button" class="btn btn-outline-secondary" >Alertants</button>
</div>
<div id="botodiv_administrador" class="float-sm-left col-md-4 col-sm-12">
    <button id="boto_administrador" type="button" class="btn btn-outline-warning mr-lg-5" >Recursos</button>
</div>
<div id="botodiv_administrador" class="float-sm-left col-md-6 col-sm-12">
    <button id="boto_administrador" type="button" class="btn btn-outline-danger float-sm-right mr-md-2 mr-lg-5" >Helpbox</button>
</div>
<div id="botodiv_administrador" class="float-sm-right col-md-6 col-sm-12">
    <button id="boto_administrador" type="button" class="btn btn-outline-info float-sm-left ml-md-2 ml-lg-5" >Incidències</button>
</div>

@endsection
