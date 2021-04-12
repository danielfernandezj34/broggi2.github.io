@extends('plantilla')
@section('titulo', 'SEMS - Administrador Incidencies Editar')
@section('container')
@section('color_fons', "administrador")
@section('color-atras', 'administrador')
@section('incidencies')
    <a class="dropdown-item" href="./incidencies">Consultar incidencies</a>
@endsection
<div class="card mt-3 mb-3">
    <div class="card-header bg-primary text-white">
      <h5 class="card-title" id="titol_editar_incidencia">Recursos</h5>
    </div>

    <div class="card-body ">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group row" id="id_primercamp">
                <label for="id_recurs" class="col-sm-3 col-form-label" id="id_recurs">Id del recurs</label>
                <div class="col-sm-3">
                    <input type="number" name="id_recurs" class="form-control" id="id_recurs" placeholder= "Número d'Incidencia" min="0" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="codi_recurs" class="col-sm-3 col-form-label" >Codi del recurs</label>
                <div class="col-sm-3">
                    <input type="text" name="codi_recurs" class="form-control" id="codi_recurs" placeholder= "Codi">
                </div>
                <label for="tipus_recurs" class="col-sm-2 col-form-label">Tipus de recurs</label>
                <div class="col-sm-3">
                    <select name="tipus_recurs" id="tipus_recurs" class="custom-select">
                        <option value="seleccionar" selected disabled>Seleccionar...</option>
                        <option value="usvb" name="usvb1">USVB</option>
                        <option value="usva" name="usva1">USVA</option>
                        <option value="usvap" name="usvap1">USVAP</option>
                        <option value="helicopter_medicalitzat" name="helicopter_medicalitzat1">Helicòpter medicalitzat</option>
                        <option value="transport_secundari" name="transport_secundari1">Transport secundari (col·lectiu i/o programat)</option>
                        <option value="altre" name="altre1">Altre</option>
                    </select>
                </div>
            </div>
            <div class="form-group row float-right">
                <button type="submit" id="editar_incidencia" name="editar_incidencia" class="btn btn-primary">Editar</button>
            </div>
        </form>
    </div>
</div>
@endsection
