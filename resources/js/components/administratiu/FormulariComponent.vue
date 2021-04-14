<template>
    <div class="container mr-4 col-12">
        <div class="form-group row ml-5">
            <div class="card col-md-5 ml-2 mt-2 col-sm-12" id="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title">Alertant</h3>
                </div>
                <div class="card-body">

                    <div class="form-group row">

                        <div class="col-sm-12 col-12">
                            <label for="tipus_alertant" class="col-form-label"><strong>Tipus alertant</strong></label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tipus_alertant" id="vip" value="vip">
                                <label class="form-check-label" for="vip">Alertant VIP</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tipus_alertant" id="centre" value="sanitari">
                                <label class="form-check-label" for="centre">Centre sanitari</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tipus_alertant" id="accidental" value="accidental">
                                <label class="form-check-label" for="accidental">Accidental</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tipus_alertant" id="entorn_afectat" value="entorn_afectat">
                                <label class="form-check-label" for="entorn_afectat">Entorn afectat</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tipus_alertant" id="afectat" value="afectat">
                                <label class="form-check-label" for="afectat">Afectat</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-sm-5 col-5">
                            <label for="nom_alertant" class="col-form-label"><strong>Nom</strong></label>
                            <input class="form-control" type="text" name="nom_alertant" id="nom_alertant" autofocus>

                            <label for="telefon_alertant" class="col-form-label"><strong>Telèfon</strong></label>
                            <input class="form-control" type="tel" name="telefon_alertant" id="telefon_alertant" maxlength="9" min="0">
                        </div>

                        <div class="col-sm-5 col-5">
                            <label for="cognom_alertant" class="col-form-label"><strong>Cognom</strong></label>
                            <input class="form-control" type="text" name="cognom_alertant" id="cognom_alertant">

                        </div>

                    </div>

                    <div class="form-group row">

                        <div class="col-sm-5 col-5">
                            <label for="provincia" class="col-form-label"><strong>Província</strong></label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="provincia" id="Barcelona" value="Barcelona">
                                <label class="form-check-label" for="Barcelona">Barcelona</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="provincia" id="Girona" value="Girona">
                                <label class="form-check-label" for="Girona">Girona</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="provincia" id="Tarragona" value="Tarragona">
                                <label class="form-check-label" for="Tarragona">Tarragona</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="provincia" id="Lleida" value="Lleida">
                                <label class="form-check-label" for="Lleida">Lleida</label>
                            </div>
                        </div>

                        <div class="col-sm-5 col-5">
                            <label for="municipi" class="col-form-label"><strong>Municipi</strong></label>
                            <select class="form-control" name="municipi" id="municipi">
                                <option value="">1</option>
                                <option value="">2</option>
                                <option value="">3</option>
                                <option value="">4</option>
                                <option value="">5</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-7 col-7">
                            <label for="direccio" class="col-form-label"><strong>Adreça</strong></label>
                            <input type="text" class="form-control" name="direccio" id="direccio">
                            <label for="comp_direccio" class="col-form-label"><strong>Adreça complementària</strong></label>
                            <input type="text" class="form-control" name="comp_direccio" id="comp_direccio">
                        </div>

                    </div>

                </div>
            </div>

            <div class="card col-md-5 ml-2 mt-2 col-sm-12" id="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title">Afectat</h3>
                </div>
                <div class="card-body">
                    <div class="form-group row">

                        <div class="col-sm-5 col-5">
                            <label for="nom_afectat" class="col-form-label"><strong>Nom</strong></label>
                            <input class="form-control" type="text" name="nom_afectat" id="nom_afectat">
                        </div>

                        <div class="col-sm-5 col-5">
                            <label for="cognom_afectat" class="col-form-label"><strong>Cognom</strong></label>
                            <input class="form-control" type="text" name="cognom_afectat" id="cognom_afectat">

                        </div>

                    </div>

                    <div class="form-group row">

                        <div class="col-sm-5 col-5">
                            <label for="document_afectat" class="col-form-label"><strong>DNI, TS/NSS</strong></label>
                            <input class="form-control" type="text" name="document_afectat" id="document_afectat" maxlength="14" min="0" >

                        </div>

                        <div class="col-sm-5 col-5">
                            <label for="telefon_alertant" class="col-form-label"><strong>Telèfon</strong></label>
                            <input class="form-control" type="tel" name="telefon_alertant" id="telefon_alertant" maxlength="9" min="0">

                        </div>

                    </div>

                    <div class="form-group row">

                        <div class="col-sm-5 col-5">
                            <label for="edat_afectat" class="col-form-label"><strong>Edat</strong></label>
                            <input class="form-control" type="number" name="edat_afectat" id="edat_afectat" min="0" maxlength="3">
                        </div>

                        <div class="col-sm-5 col-5">
                            <label for="genere" class="col-form-label"><strong>Génere</strong></label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="genere" id="home" value="home">
                                <label class="form-check-label" for="home">Home</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="genere" id="dona" value="dona">
                                <label class="form-check-label" for="dona">Dona</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-sm-5 col-5">
                            <label for="tipus_accident" class="col-form-label"><strong>Tipus d'accident o d'incident</strong></label>
                            <select class="form-control" name="tipus_accident" id="tipus_accident">
                                <option value="">Accidents i traumatismes</option>
                                <option value="">Malaltia a un lloc públic</option>
                                <option value="">Malaltia a domicili</option>
                                <option value="">Consulta mèdica</option>
                                <option value="">Transports sanitari</option>
                            </select>

                            <label for="num_afectats" class="col-form-label mt-2"><strong>Numero de afectats</strong></label>
                            <input type="number" class="form-control" name="num_afectats" id="num_afectats" min="0">
                        </div>


                        <div class="col-sm-5 col-5">
                            <label for="descripcio" class="col-form-label"><strong>Descripció d'accident o d'incident</strong></label>
                            <textarea class="form-control" id="descripcio" name= "descripcio" rows="4" placeholder="Descripció sobre l'accident o l'incident..."></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="form-group row ml-5">
            <a class="btn btn-primary m-2 btn-lg" data-toggle="collapse" href="#recurs_mobil" role="button" aria-expanded="false" aria-controls="recurs_mobil">Resposta amb recurs mòbil</a>
            <a class="btn btn-primary m-2 btn-lg" data-toggle="collapse" href="#no_recurs" role="button" aria-expanded="false" aria-controls="no_recurs">Resposta sense recurs mòbil</a>
        </div>


        <div class="row mt-2 mb-1">
            <div class="col">
                <div class="collapse multi-collapse" id="recurs_mobil">
                    <div class="card card-body">
                        <div class="form-group row">
                            <div class="col-sm-4 col-4">
                                <h5><u>Primer recurs mòbil</u></h5>
                                <label for="recurs1" class="col-form-label"><strong>Tipus de recurs</strong></label>
                                <select class="form-control" name="recurs1" id="recurs1">
                                    <option value="seleccionar" selected disabled>Seleccionar...</option>
                                    <option value="usvb" name="usvb1">USVB</option>
                                    <option value="usva" name="usva1">USVA</option>
                                    <option value="usvap" name="usvap1">USVAP</option>
                                    <option value="helicopter_medicalitzat" name="helicopter_medicalitzat1">Helicòpter medicalitzat</option>
                                    <option value="transport_secundari" name="transport_secundari1">Transport secundari (col·lectiu i/o programat)</option>
                                    <option value="altre" name="altre1">Altre</option>
                                </select>
                            </div>

                            <div class="col-sm-4 col-4">
                                <h5><u>Segon recurs mòbil</u></h5>
                                <label for="recurs2" class="col-form-label"><strong>Tipus de recurs</strong></label>
                                <select class="form-control" name="recurs2" id="recurs2">
                                    <option value="seleccionar" selected disabled>Seleccionar...</option>
                                    <option value="usvb" name="usvb2">USVB</option>
                                    <option value="usva" name="usv2a">USVA</option>
                                    <option value="usvap" name="usvap2">USVAP</option>
                                    <option value="helicopter_medicalitzat" name="helicopter_medicalitzat2">Helicòpter medicalitzat</option>
                                    <option value="transport_secundari" name="transport_secundari2">Transport secundari (col·lectiu i/o programat)</option>
                                    <option value="altre" name="altre2">Altre</option>
                                </select>
                            </div>

                            <div class="col-sm-4 col-4">
                                <h5><u>Tercer recurs mòbil</u></h5>
                                <label for="recurs3" class="col-form-label"><strong>Tipus de recurs</strong></label>
                                <select class="form-control" name="recurs3" id="recurs3">
                                    <option value="seleccionar" selected disabled>Seleccionar...</option>
                                    <option value="usvb" name="usvb3">USVB</option>
                                    <option value="usva" name="usva3">USVA</option>
                                    <option value="usvap" name="usvap3">USVAP</option>
                                    <option value="helicopter_medicalitzat" name="helicopter_medicalitzat3">Helicòpter medicalitzat</option>
                                    <option value="transport_secundari" name="transport_secundari3">Transport secundari (col·lectiu i/o programat)</option>
                                    <option value="altre" name="altre3">Altre</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-sm-4 col-4">
                                <label for="prioritat1"><strong>Prioritat</strong></label>
                                <input type="range" class="form-control-range" id="prioritat1" name="prioritat1" value="0" min="0" max="4" oninput="this.nextElementSibling.value = this.value">
                                <output>0</output>
                            </div>

                            <div class="col-sm-4 col-4">
                                <label for="prioritat2"><strong>Prioritat</strong></label>
                                <input type="range" class="form-control-range" id="prioritat2" name="prioritat2" value="0" min="0" max="4" oninput="this.nextElementSibling.value = this.value">
                                <output>0</output>
                            </div>

                            <div class="col-sm-4 col-4">
                                <label for="prioritat3"><strong>Prioritat</strong></label>
                                <input type="range" class="form-control-range" id="prioritat3" name="prioritat3" value="0" min="0" max="4" oninput="this.nextElementSibling.value = this.value">
                                <output>0</output>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="row mt-2 mb-1">
            <div class="col">
                <div class="collapse multi-collapse" id="no_recurs">
                    <div class="card card-body">

                        <div class="form-group row">


                            <label for="resp_no_recurs" class="col-form-label col-2 col-sm-2"><strong>Tipus de resposta</strong></label>
                                <select class="form-control col-5 col-sm-5" name="resp_no_recurs" id="resp_no_recurs">
                                    <option value="seleccionar" selected disabled>Seleccionar...</option>
                                    <option value="consulta_telefonica" name="consulta_telefonica">Consulta telefònica</option>
                                    <option value="informacio_telefonica" name="informacio_telefonica">Informació telefònica</option>
                                    <option value="usvap" name="derivacio_centre">Derivació a centres sanitaris</option>
                                    <option value="Derivació_a_altres_centres_sanitaris" name="derivacio_altre_sanitari">Derivació a altres centres sanitaris</option>
                                    <option value="altre" name="altre_sense">Altre</option>
                                </select>

                        </div>

                    </div>
                </div>
            </div>
            <button type="submit" href="" class="btn btn-success btn-lg boto_enviar"><i class="fas fa-check fa-1x"></i>Enviar</button>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{

            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
