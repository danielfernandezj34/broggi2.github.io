@extends('plantilla')
@section('titulo', 'SEMS - Crear usuari')
@section('color_fons', 'administrador')
@section('incidencies')
    <a class="dropdown-item" href="./incidencies">Consultar incidencies</a>
@endsection
@section('container')
    <div class="card mt-3">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title">Crear usuari</h3>
                </div>
            <div class="card-body mt-1">

                <div class="form-group row">
                    <label for="username" class="col-sm-3 col-form-label">Username</label>
                    <div class="col-sm-3">
                        <input type="text" name="username" id="username" class="form-control" placeholder="Nom d'usuari">
                    </div>

                    <label for="correu" class="col-sm-3 col-form-label">Correu</label>
                    <div class="col-sm-3">
                        <input type="text" name="correu" id="correu" class="form-control" placeholder="exemple@exemple.com">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nom" class="col-sm-3 col-form-label">Nom</label>
                    <div class="col-sm-3">
                        <input type="text" name="nom" id="nom" class="form-control" placeholder="Nom de l'alumne">
                    </div>

                    <label for="cognom" class="col-sm-3 col-form-label">Cognoms</label>
                    <div class="col-sm-3">
                        <input type="text" name="cognom" id="cognom" class="form-control" placeholder="Cognom de l'alumne">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="rol" class="col-sm-3 col-form-label">Tipus de Rol</label>
                    <div class="col-sm-1 mt-2">
                        <input class="form-check-input" type="radio" name="rol" id="1" value="1">
                        <label class="form-check-label" for="1">
                            Administrador
                        </label>
                    </div>

                    <div class="col-sm-1 mt-2">
                        <input class="form-check-input" type="radio" name="rol" id="2" value="2">
                        <label class="form-check-label" for="2">
                            CECOS
                        </label>
                    </div>

                    <div class="col-sm-1 mt-2">
                        <input class="form-check-input" type="radio" name="rol" id="3" value="3">
                        <label class="form-check-label" for="3">
                            Administrador
                        </label>

                    </div>

                    <label for="recurs" class="col-sm-3 col-form-label">Tipus de Recurs</label>
                    <div class="col-sm-3">
                        <select class="custom-select" id="recurs">
                            <option value="1">Ambulància Mèdicalitzada-Mike</option>
                            <option value="2">Ambulància Sanitaritzada-India</option>
                            <option value="3">Ambulància Assistèncial-Tango</option>
                            <option value="4">Helicopter medicalitzat</option>
                        </select>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
