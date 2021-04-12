@extends('plantilla')
@section('titulo', 'SEMS - Administrador Alertant en Detall')
@section('container')
@section('color_fons', "administrador")
@section('color-atras', 'administrador')
@section('incidencies')
    <a class="dropdown-item" href="./incidencies">Consultar incidencies</a>
@endsection
<div class="card mt-3 mb-3">
    <div class="card-header bg-primary text-white">
      <h5 class="card-title" id="titol_alertant"><strong>Mostrar Alertant</strong></h5>
    </div>
    <div class="card-body ">
        <div class="form-group row">
            <label for="nom" class="col-sm-3 col-form-label" >Nom</label>
            <div class="col-sm-3">
                <input type="text" name="nom" class="form-control" id="nom" placeholder= 'Nom' disabled>
            </div>
            <label for="cognoms" class="col-sm-3 col-form-label" >Cognoms</label>
            <div class="col-sm-3">
                <input type="nom" name="cognoms" class="form-control" id="cognoms" placeholder= "Cognoms" disabled>
            </div>
        </div>
        <div class="form-group row">
            <label for="telefon_alertant" class="col-sm-3 col-form-label" >Telefon de l'Alertant</label>
            <div class="col-sm-3">
                <input type="tel" name="telefon_alertant" class="form-control" id="telefon_alertant" placeholder= "999999999" maxlength="9" pattern="[0-9]{9}" disabled>
            </div>
            <label for="tipus_alertant" class="col-sm-3 col-form-label" >Tipus d'Alertant</label>
            <div class="col-sm-3">
                <input type="tel" name="tipus_alertant" class="form-control" id="tipus_alertant" placeholder= "Tipus d'Alertant" disabled>
            </div>
        </div>
        <div class="form-group row">
            <label for="adreca" class="col-sm-3 col-form-label" >Adreça</label>
            <div class="col-sm-3">
                <input type="text" name="adreca" class="form-control" id="adreca" placeholder= 'Adreça' disabled>
            </div>
            <label for="municipi" class="col-sm-3 col-form-label" >Municipi</label>
            <div class="col-sm-3">
                <input type="text" name="municipi" class="form-control" id="municipi" placeholder= 'Municipi' disabled>
            </div>
        </div>
    </div>
</div>
@endsection
