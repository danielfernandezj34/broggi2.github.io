@extends('plantilla_principales')
@section('titulo', 'Administrador Página Principal')
@section('color_fons', "administrador")
@section('incidencies')
    <a class="dropdown-item" href="./incidencies">Consultar incidencies</a>
@endsection
@section('container')

<div id="botodiv_administrador" class="float-sm-left col-md-4 col-sm-12">
    <a href="./usuaris"><button id="boto_administrador_users" type="button" class="btn btn-primary ml-lg-5" ><strong>Usuaris i rols</strong></button></a>
</div>
<div id="botodiv_administrador" class="float-sm-left col-md-4 col-sm-12">
    <button id="boto_administrador_alertants" type="button" class="btn btn-outline-secondary" ><strong>Alertants</strong></button>
</div>
<div id="botodiv_administrador" class="float-sm-left col-md-4 col-sm-12">
    <button id="boto_administrador_recursos" type="button" class="btn btn-outline-warning mr-lg-5" ><strong>Recursos</strong></button>
</div>
<div id="botodiv_administrador" class="float-sm-left col-md-4 col-sm-12">
    <button id="boto_administrador_helpbox" type="button" class="btn btn-outline-danger ml-lg-5" ><strong>Helpbox</strong></button>
</div>
<div id="botodiv_administrador" class="float-sm-left col-md-4 col-sm-12">
    <button id="boto_administrador_incidencies" type="button" class="btn btn-outline-info" ><strong>Incidències</strong></button>
</div>
<div id="botodiv_administrador" class="float-sm-left col-md-4 col-sm-12">
    <button id="boto_administrador_estadistiques" type="button" class="btn btn-outline-dark mr-lg-5" ><strong>Estadistiques</strong></button>
    
</div>

@endsection
