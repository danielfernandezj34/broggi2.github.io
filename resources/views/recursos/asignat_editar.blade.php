@extends('plantilla')
@section('titulo', 'Recurs Incidencia')
@section('color_fons', "recurs")
@section('color-atras', 'recurs')
@section('boto_atras', './consultar')
@section('container')

    <div class="container">
        {{-- RECURS MOVIL --}}
        <div class="card mt-3 mb-3">
            <div class="card-header bg-primary" id="titul_incidencia"><h5 class="card-title text-white"><strong>Recurs mòbil</strong></h5></div>
            <div class="card-body">

                <div class="form-group row">
                    <label for="codi" class="col-sm-3 col-form-label">Codi</label>
                    <div class="col-sm-3">
                        <input type="number" name="codi" id="codi" class="form-control" placeholder="Codi" disabled>
                    </div>
                    <label for="tip_recurs" class="col-sm-3 col-form-label">Tipus de recurs</label>
                    <div class="col-sm-3">
                        <input type="text" name="tip_recurs" id="tip_recurs" class="form-control" placeholder="Tipus de recurs" disabled>
                    </div>

                </div>

                <div class="form-group row">
                    <label for="hora_mobilitzacio" class="col-sm-3 col-form-label">Hora de mobilitació</label>
                    <div class="col-sm-3">
                        <input type="time" name="hora_mobilitzacio" id="hora_mobilitzacio" class="form-control">
                    </div>
                    <label for="hora_assistencia" class="col-sm-3 col-form-label">Hora d'assistència</label>
                    <div class="col-sm-3">
                        <input type="time" name="hora_assistencia" id="hora_assistencia" class="form-control">
                    </div>

                </div>

                <div class="form-group row">
                    <label for="hora_transport" class="col-sm-3 col-form-label">Hora del transport</label>
                    <div class="col-sm-3">
                        <input type="time" name="hora_transport" id="hora_transport" class="form-control">
                    </div>
                    <label for="hora_hospital" class="col-sm-3 col-form-label">Hora d'arribada a l'hospital</label>
                    <div class="col-sm-3">
                        <input type="time" name="hora_hospital" id="hora_hospital" class="form-control">
                    </div>

                </div>

                <div class="form-group row">
                    <label for="hora_transferencia" class="col-sm-3 col-form-label">Hora de transferéncia</label>
                    <div class="col-sm-3">
                        <input type="time" name="hora_transferencia" id="hora_transferencia" class="form-control">
                    </div>
                    <label for="hora_finalitzacio" class="col-sm-3 col-form-label">Hora finalització</label>
                    <div class="col-sm-3">
                        <input type="time" name="hora_finalitzacio" id="hora_finalitzacio" class="form-control">
                    </div>

                </div>

            </div>
        </div>
        <div class="card mt-3 mb-3">
            <div class="card-header bg-primary" id="titul_incidencia">
              <h5 class="card-title text-white"><strong>Mostrar Incidencia</strong></h5>
            </div>

            <div class="card-body ">
                <div class="form-group row" id="id_primercampo">
                    <label for="num_incident" class="col-sm-3 col-form-label" id="id">Numero d'Incidència</label>
                    <div class="col-sm-4">
                        <input type="number" name="num_incident" class="form-control" id="num_incident" placeholder= "Número d'Incidencia" min="0" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="usuaris_id" class="col-sm-3 col-form-label" >Usuari</label>
                    <div class="col-sm-3">
                        <input type="text" name="usuaris_id" class="form-control" id="usuaris_id" placeholder= 'Usuari' disabled>
                    </div>
                    <label for="telefon_alertant" class="col-sm-3 col-form-label" >Telefon de l'Alertant</label>
                    <div class="col-sm-3">
                        <input type="tel" name="telefon_alertant" class="form-control" id="telefon_alertant" placeholder= "999999999" maxlength="9" pattern="[0-9]{9}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hora" class="col-sm-3 col-form-label" >Hora</label>
                    <div class="col-sm-3">
                        <input type="hour" name="hora" class="form-control" id="hora" placeholder= 'Hora' disabled>
                    </div>
                    <label for="data" class="col-sm-3 col-form-label" >Data</label>
                    <div class="col-sm-3">
                        <input type="date" name="data" class="form-control" id="data" placeholder= 'Data' min="2021-01-01" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="adreca" class="col-sm-3 col-form-label" >Adreça</label>
                    <div class="col-sm-3">
                        <input type="text" name="adreca" class="form-control" id="adreca" placeholder= 'Adreça' disabled>
                    </div>
                    <label for="adreca_complement" class="col-sm-3 col-form-label" >Adreça Complementaria</label>
                    <div class="col-sm-3">
                        <input type="text" name="adreca_complement" class="form-control" id="adreca_complement" placeholder= 'Adreça Complemantaria' disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nom_metge" class="col-sm-3 col-form-label" >Nom del Metge</label>
                    <div class="col-sm-3">
                        <input type="text" name="nom_metge" class="form-control" id="nom_metge" placeholder= 'Nom del Metge' disabled>
                    </div>
                    <label for="tipus_incidencies_id" class="col-sm-3 col-form-label" >Tipus d'Incidència</label>
                    <div class="col-sm-3">
                        <input type="text" name="tipus_incidencies_id" class="form-control" id="tipus_incidencies_id" placeholder= "Tipus d'Incidència" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alertants_id" class="col-sm-3 col-form-label" >Alertant</label>
                    <div class="col-sm-3">
                        <input type="text" name="alertants_id" class="form-control" id="alertants_id" placeholder= 'Alertant' disabled>
                    </div>
                    <label for="municipis_id" class="col-sm-3 col-form-label" >Municipi</label>
                    <div class="col-sm-3">
                        <input type="text" name="municipis_id" class="form-control" id="municipis_id" placeholder= 'Municipi' disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="prioritat" class="col-sm-3 col-form-label" >Prioritat</label>
                    <div class="col-sm-3">
                        <input type="number" name="prioritat" class="form-control" id="prioritat" placeholder= 'Prioritat' disabled>
                    </div>
                    <label for="decripcio" class="col-sm-3 col-form-label" >Descripció</label>
                    <div class="col-sm-3">
                        <textarea class="form-control" id="descripcio" name= "descripcio" rows="5" disabled></textarea>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
