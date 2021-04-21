<template>
    <div class="container">
        <div class="form-group row">
            <div class="card col-6 mr-1 mt-2" id="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title">Alertant</h3>
                </div>
                <div class="card-body">

                    <div class="form-group row">

                        <div class="col-sm-6 col-6">
                            <label for="telefon_alertant" class="col-form-label"><strong>Telèfon</strong>
                                <!-- <div class="mt-2">
                                    <i style="float: right;position: relative;margin: -25px -20px 0 0;" class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                        type="button"
                                        title="What is your phone number?"
                                        data-container="body"
                                        data-toggle="popover"
                                        data-placement="left"
                                        data-trigger="hover"
                                        data-delay= "500"
                                        data-content="Quin és el seu numero de telefon?"></i>
                                </div> -->
                            </label>

                            <input class="form-control" type="tel" name="telefon_alertant" id="telefon_alertant" maxlength="9" min="0" v-model="alertant.telefon" @keyup="selectAlertant(alertant.telefon)">
                            <p class="card-text"><small class="text-muted">Click "Enter" o "Intro" per verificar el número</small></p>
                        </div>

                        <div class="col-sm-5 col-5">
                            <label for="tipus_alertant" class="col-form-label col-12"><strong>Tipus alertant</strong>
                                <!-- <div id="div_helpbox" style="float: right;" class="col-sm-12">
                                    <i style="float: right;position: relative;" class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                        type="button"
                                        title="What kind of informant are you, a VIP informant, a health center, an accidental informant, of the affected?"
                                        data-container="body"
                                        data-toggle="popover"
                                        data-placement="left"
                                        data-trigger="hover"
                                        data-delay= "500"
                                        data-content="Quin tipus d'alertat ets, VIP, centre medic, alertat accidental, l'entorn de l'afectat o el propi afectat?"></i>
                                </div> -->
                            </label>
                            <select v-model="alertant.tipus_alertants_id" class="form-control" name="tipus_alertant" id="tipus_alertant">
                                <option selected disabled>Seleccionar...</option>
                                <option  v-for="tipuAlertant in tipusAlertants" :key="tipuAlertant.id" :value="tipuAlertant.id">{{ tipuAlertant.tipus }}</option>
                            </select>
                        </div>

                    </div>

                    <div class="form-group row">


                    </div>

                    <div v-if="alertant.tipus_alertants_id == 1" class="form-group row">

                        <div class="col-sm-9 col-9" >
                            <label for="nom_hospital" class="col-form-label"><strong>Nom del centre Sanitari</strong>
                                <!-- <div id="div_helpbox" class="col-12">
                                    <i style="float: right;position: relative;margin: -17px 0px 0 0;" class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                    type="button"
                                    title="What is the name of the ?"
                                    data-container="body"
                                    data-toggle="popover"
                                    data-placement="left"
                                    data-trigger="hover"
                                    data-delay= "500"
                                    data-content="Quin és el seu nom?"></i>
                                </div> -->
                            </label>
                            <input class="form-control" type="text" name="nom_hospital" id="nom_hospital" v-model="alertant.nom"  disabled>
                        </div>

                        <div class="col-sm-9 col-9" >
                            <label for="nom_metge" class="col-form-label"><strong>Nom del metge</strong></label>
                            <input class="form-control" type="text" name="nom_metge" id="nom_metge" v-model="incidencia.nom_metge">

                        </div>

                    </div>

                    <div v-else class="form-group row">

                        <div class="col-sm-6 col-6">
                            <label for="nom_alertant" class="col-form-label"><strong>Nom</strong>
                                <!-- <div id="div_helpbox" class="col-sm-12">
                                    <i style="float: right; position: relative;margin: -17px 0px 0 0;" class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                    type="button"
                                    title="What is your name?"
                                    data-container="body"
                                    data-toggle="popover"
                                    data-placement="left"
                                    data-trigger="hover"
                                    data-delay= "500"
                                    data-content="Quin és el seu nom?"></i>
                                </div> -->
                            </label>

                            <input class="form-control" type="text" name="nom_alertant" id="nom_alertant" v-model="alertant.nom">

                        </div>

                        <div class="col-sm-6 col-6">
                            <label for="cognom_alertant" class="col-form-label"><strong>Cognoms</strong>
                                <!-- <div id="div_helpbox" class="col-sm-12">
                                    <i style="float: right;position: relative;margin-top: -17px;margin-right:-30px;" class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                    type="button"
                                    title="What is your surname?"
                                    data-container="body"
                                    data-toggle="popover"
                                    data-placement="left"
                                    data-trigger="hover"
                                    data-delay= "500"
                                    data-content="Quin és el seu cognom?"></i>
                                </div> -->
                            </label>
                            <input class="form-control" type="text" name="cognom_alertant" id="cognom_alertant" v-model="alertant.cognoms">
                        </div>

                    </div>

                </div>

            </div>

            <div class="card col-5 mt-2" id="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title">Localització</h3>
                </div>
                <div class="card-body">

                    <div class="form-group row">

                        <div class="col-sm-7 col-7">
                            <label for="municipi" class="col-form-label"><strong>Municipi</strong>
                                <!-- <div class="mt-2">
                                    <i style="float: right;position: relative;margin: -25px -20px 0 0;" class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                        type="button"
                                        title="What is your phone number?"
                                        data-container="body"
                                        data-toggle="popover"
                                        data-placement="left"
                                        data-trigger="hover"
                                        data-delay= "500"
                                        data-content="Quin és el seu numero de telefon?"></i>
                                </div> -->
                            </label>
                            <select v-model="incidencia.municipis_id" class="form-control" name="municipi" id="municipi" @change="localitzacio(incidencia.municipis_id)">
                                <option selected disabled>Seleccionar...</option>
                                <option v-for="municipi in municipis" :key="municipi.id" :value="municipi.id">{{ municipi.nom }}</option>

                            </select>

                        </div>

                        <div class="col-sm-5 col-5">

                            <label for="provincia" class="col-form-label"><strong>Provincies</strong></label>
                            <input class="form-control" type="text" name="provincia" id="provincia" v-model="nomProvincia" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="comarca" class="col-form-label"><strong>Comarca</strong></label>
                            <input class="form-control" type="text" name="comarca" id="comarca" v-model="nomComarca" disabled>
                        </div>

                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12 col-12">
                            <label for="direccio" class="col-form-label"><strong>Adreça</strong>
                                <!-- <div id="div_helpbox" class="col-sm-12">
                                    <i style="float: right;position: relative;margin-top: -17px;margin-right:-32px;" class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                        type="button"
                                        title="What is your address?"
                                        data-container="body"
                                        data-toggle="popover"
                                        data-placement="left"
                                        data-trigger="hover"
                                        data-delay= "500"
                                        data-content="Quina es la teva adreça?"></i>
                                </div> -->
                            </label>
                            <input type="text" class="form-control" name="direccio" id="direccio">
                            <label for="comp_direccio" class="col-form-label"><strong>Adreça complementària</strong>
                                <!-- <div id="div_helpbox" class="col-sm-12">
                                    <i style="float: right;position: relative;margin-top: -17px;margin-right:-32px;" class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                        type="button"
                                        title="What is your complementary address?"
                                        data-container="body"
                                        data-toggle="popover"
                                        data-placement="left"
                                        data-trigger="hover"
                                        data-delay= "500"
                                        data-content="Quina es la teva adreça complementària?"></i>
                                </div> -->
                            </label>
                            <input type="text" class="form-control" name="comp_direccio" id="comp_direccio">
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="card col-11 mt-2" id="card">
            <div class="card-header bg-primary text-white">
                <h3 class="card-title">Afectats</h3>
            </div>

            <div class="collapse multi-collapse card-body" id="afectat3">
                <h3><strong>Afectat 3</strong></h3>
                <div class="form-group row">
                    <div class="col-sm-4 col-4">
                        <label for="nom_afectat3" class="col-form-label"><strong>Nom</strong>
                            <!-- <div class="mt-2">
                                <i style="float: right;position: relative;margin: -25px -20px 0 0;" class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                type="button"
                                title="What is your name?"
                                data-container="body"
                                data-toggle="popover"
                                data-placement="left"
                                data-trigger="hover"
                                data-delay= "500"
                                data-content="Quin és el seu nom?"></i>
                            </div> -->
                        </label>
                        <input class="form-control" type="text" name="nom_afectat3" id="nom_afectat3" v-model="afectat.nom">
                    </div>


                    <div class="col-sm-4 col-4">
                        <label for="cognom_afectat3" class="col-form-label"><strong>Cognom</strong>
                            <!-- <div class="mt-2">
                            <i style="float: right;position: relative;margin-top: -25px;margin-right:-30px;" class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                type="button"
                                title="What is your surname?"
                                data-container="body"
                                data-toggle="popover"
                                data-placement="left"
                                data-trigger="hover"
                                data-delay= "500"
                                data-content="Quin és el seu cognom?"></i>
                            </div> -->
                        </label>
                        <input class="form-control" type="text" name="cognom_afectat3" id="cognom_afectat3" v-model="afectat.cognom">

                    </div>

                    <div class="col-sm-4 col-4">
                        <label for="telefon_alertant3" class="col-form-label"><strong>Telèfon</strong>
                            <!-- <div class="mt-2">
                                <i style="float: right;position: relative;margin: -25px -20px 0 0;" class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                type="button"
                                title="What is your phone number?"
                                data-container="body"
                                data-toggle="popover"
                                data-placement="left"
                                data-trigger="hover"
                                data-delay= "500"
                                data-content="Quin és el seu telèfon?"></i>
                            </div> -->
                        </label>
                        <input class="form-control2" type="tel" name="telefon_alertant3" id="telefon_alertant3" maxlength="9" min="0" v-model="afectat.telefon">

                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-4 col-sm-4">
                        <label for="te_cip" class="col-form-label"><strong>Té CIP? (Codi d'Identificació Personal)</strong></label>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" name="cip_si3" id="cip_si3" value="1" v-model="afectat.te_cip">
                            <label for="cip_si3" class="form-check-label">Sí</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" name="cip_no3" id="cip_no3" value="0" v-model="afectat.te_cip">
                            <label for="cip_no3" class="form-check-label">No</label>
                        </div>
                        <div v-if="afectat.te_cip == 1">
                            <input type="text" class="form-control mt-1" name="cip" id="cip" v-model="afectat.cip" placeholder="Número del CIP">
                        </div>
                    </div>

                    <div class="col-sm-4 col-4">
                        <label for="edat_afectat3" class="col-form-label"><strong>Edat</strong>
                            <!-- <div class="mt-2">
                                <i style="float: right;position: relative;margin: -25px -20px 0 0;" class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                type="button"
                                title="How old are you?"
                                data-container="body"
                                data-toggle="popover"
                                data-placement="left"
                                data-trigger="hover"
                                data-delay= "500"
                                data-content="Quina edat tens?"></i>
                            </div> -->
                        </label>
                        <input class="form-control" type="number" name="edat_afectat3" id="edat_afectat2" min="0" maxlength="3" v-model="afectat.edat">
                    </div>

                    <div class="col-sm-4 col-4">
                        <label for="genere3" class="col-form-label"><strong>Génere</strong>
                            <!-- <div class="mt-2">
                                    <i style="float: right;position: relative;margin: -25px -20px 0 0;" class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                        type="button"
                                        title="Are you a man or a woman?"
                                        data-container="body"
                                        data-toggle="popover"
                                        data-placement="left"
                                        data-trigger="hover"
                                        data-delay= "500"
                                        data-content="Ets home o dona?"></i>
                                </div> -->
                        </label><br>
                        <div class="form-check form-check-inline" v-for="sexe in sexes" :key="sexe.id" >
                            <input class="form-check-input" type="radio" name="genere3" :id="sexe.id" :value="sexe.id" v-model="afectat.sexes_id">
                            <label class="form-check-label" :for="sexe.id">{{ sexe.sexe }}</label>
                        </div>
                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-sm-5 col-5">
                        <label for="tipus_accident3" class="col-form-label"><strong>Tipus d'accident o d'incident</strong>
                            <!-- <div class="mt-2">
                                <i style="float: right;position: relative;margin: -25px -20px 0 0;" class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                type="button"
                                title="What is the type of accident or incident?"
                                data-container="body"
                                data-toggle="popover"
                                data-placement="left"
                                data-trigger="hover"
                                data-delay= "500"
                                data-content="Quin és el tipus d'accident?"></i>
                            </div> -->
                        </label>
                        <select class="form-control" name="tipus_accident3" id="tipus_accident3">
                            <option selected disabled>Seleccionar...</option>
                            <option v-for="tipuIncidencia in tipusIncidencies" :key="tipuIncidencia.id" >{{ tipuIncidencia.tipus }}</option>
                        </select>
                    </div>

                    <div class="col-sm-6 col-6">
                        <label for="descripcio3" class="col-form-label"><strong>Descripció d'accident o d'incident</strong>
                            <!-- <div class="mt-2">
                                    <i style="float: right;position: relative;margin: -25px -20px 0 0;" class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                        type="button"
                                        title="Can you describe what happened?"
                                        data-container="body"
                                        data-toggle="popover"
                                        data-placement="left"
                                        data-trigger="hover"
                                        data-delay= "500"
                                        data-content="Pots descriure que ha pasat?"></i>
                                </div> -->
                        </label>
                        <textarea class="form-control" v-model="incidencia.descripcio" id="descripcio3" name= "descripcio3" rows="4" placeholder="Descripció sobre l'accident o l'incident..."></textarea>
                    </div>



                </div>

                <button type="submit" class="btn btn-success" style="background-color: #f70c74; float:right"><i class="fas fa-plus"></i> Afegir alertant</button>
                <a class="btn btn-primary m-2" v-on:click="colorboto3()" :style="{ 'background-color': color3}" style="float:right" data-toggle="collapse" href="#afectat3" role="button" aria-expanded="false" aria-controls="afectat2">
                    Afegir Afectat
                </a>
            </div>


            <div class="collapse multi-collapse card-body" id="afectat2">
                <h3><strong>Afectat 2</strong></h3>
                <div class="form-group row">
                    <div class="col-sm-4 col-4">
                        <label for="nom_afectat2" class="col-form-label"><strong>Nom</strong>
                            <!-- <div class="mt-2">
                                <i style="float: right;position: relative;margin: -25px -20px 0 0;" class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                type="button"
                                title="What is your name?"
                                data-container="body"
                                data-toggle="popover"
                                data-placement="left"
                                data-trigger="hover"
                                data-delay= "500"
                                data-content="Quin és el seu nom?"></i>
                            </div> -->
                        </label>
                        <input class="form-control" type="text" name="nom_afectat2" id="nom_afectat2" v-model="afectat.nom">
                    </div>


                    <div class="col-sm-4 col-4">
                        <label for="cognom_afectat2" class="col-form-label"><strong>Cognom</strong>
                            <!-- <div class="mt-2">
                            <i style="float: right;position: relative;margin-top: -25px;margin-right:-30px;" class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                type="button"
                                title="What is your surname?"
                                data-container="body"
                                data-toggle="popover"
                                data-placement="left"
                                data-trigger="hover"
                                data-delay= "500"
                                data-content="Quin és el seu cognom?"></i>
                            </div> -->
                        </label>
                        <input class="form-control" type="text" name="cognom_afectat2" id="cognom_afectat2" v-model="afectat.cognom">

                    </div>

                    <div class="col-sm-4 col-4">
                        <label for="telefon_alertant2" class="col-form-label"><strong>Telèfon</strong>
                            <!-- <div class="mt-2">
                                <i style="float: right;position: relative;margin: -25px -20px 0 0;" class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                type="button"
                                title="What is your phone number?"
                                data-container="body"
                                data-toggle="popover"
                                data-placement="left"
                                data-trigger="hover"
                                data-delay= "500"
                                data-content="Quin és el seu telèfon?"></i>
                            </div> -->
                        </label>
                        <input class="form-control2" type="tel" name="telefon_alertant2" id="telefon_alertant2" maxlength="9" min="0" v-model="afectat.telefon">

                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-4 col-sm-4">
                        <label for="te_cip" class="col-form-label"><strong>Té CIP? (Codi d'Identificació Personal)</strong></label>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" name="cip_si2" id="cip_si2" value="1" v-model="afectat.te_cip">
                            <label for="cip_si2" class="form-check-label">Sí</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" name="cip_no2" id="cip_no2" value="0" v-model="afectat.te_cip">
                            <label for="cip_no2" class="form-check-label">No</label>
                        </div>
                        <div v-if="afectat.te_cip == 1">
                            <input type="text" class="form-control mt-1" name="cip" id="cip" v-model="afectat.cip" placeholder="Número del CIP">
                        </div>
                    </div>

                    <div class="col-sm-4 col-4">
                        <label for="edat_afectat2" class="col-form-label"><strong>Edat</strong>
                            <!-- <div class="mt-2">
                                <i style="float: right;position: relative;margin: -25px -20px 0 0;" class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                type="button"
                                title="How old are you?"
                                data-container="body"
                                data-toggle="popover"
                                data-placement="left"
                                data-trigger="hover"
                                data-delay= "500"
                                data-content="Quina edat tens?"></i>
                            </div> -->
                        </label>
                        <input class="form-control" type="number" name="edat_afectat2" id="edat_afectat2" min="0" maxlength="3" v-model="afectat.edat">
                    </div>

                    <div class="col-sm-4 col-4">
                        <label for="genere2" class="col-form-label"><strong>Génere</strong>
                            <!-- <div class="mt-2">
                                    <i style="float: right;position: relative;margin: -25px -20px 0 0;" class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                        type="button"
                                        title="Are you a man or a woman?"
                                        data-container="body"
                                        data-toggle="popover"
                                        data-placement="left"
                                        data-trigger="hover"
                                        data-delay= "500"
                                        data-content="Ets home o dona?"></i>
                                </div> -->
                        </label><br>
                        <div class="form-check form-check-inline" v-for="sexe in sexes" :key="sexe.id" >
                            <input class="form-check-input" type="radio" name="genere2" :id="sexe.id" :value="sexe.id" v-model="afectat.sexes_id">
                            <label class="form-check-label" :for="sexe.id">{{ sexe.sexe }}</label>
                        </div>
                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-sm-5 col-5">
                        <label for="tipus_accident2" class="col-form-label"><strong>Tipus d'accident o d'incident</strong>
                            <!-- <div class="mt-2">
                                <i style="float: right;position: relative;margin: -25px -20px 0 0;" class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                type="button"
                                title="What is the type of accident or incident?"
                                data-container="body"
                                data-toggle="popover"
                                data-placement="left"
                                data-trigger="hover"
                                data-delay= "500"
                                data-content="Quin és el tipus d'accident?"></i>
                            </div> -->
                        </label>
                        <select class="form-control" name="tipus_accident2" id="tipus_accident2">
                            <option selected disabled>Seleccionar...</option>
                            <option v-for="tipuIncidencia in tipusIncidencies" :key="tipuIncidencia.id" >{{ tipuIncidencia.tipus }}</option>
                        </select>
                    </div>

                    <div class="col-sm-6 col-6">
                        <label for="descripcio2" class="col-form-label"><strong>Descripció d'accident o d'incident</strong>
                            <!-- <div class="mt-2">
                                    <i style="float: right;position: relative;margin: -25px -20px 0 0;" class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                        type="button"
                                        title="Can you describe what happened?"
                                        data-container="body"
                                        data-toggle="popover"
                                        data-placement="left"
                                        data-trigger="hover"
                                        data-delay= "500"
                                        data-content="Pots descriure que ha pasat?"></i>
                                </div> -->
                        </label>
                        <textarea class="form-control" v-model="incidencia.descripcio" id="descripcio2" name= "descripcio2" rows="4" placeholder="Descripció sobre l'accident o l'incident..."></textarea>
                    </div>



                </div>

                <a class="btn btn-primary m-2" v-on:click="colorboto2()" :style="{ 'background-color': color2}" style="float:right" data-toggle="collapse" href="#afectat3" role="button" aria-expanded="false" aria-controls="afectat2">
                    Afegir Afectat
                </a>
            </div>




            <div class="card-body">

                <div class="form-group row">
                    <div class="col-sm-4 col-4">
                        <label for="nom_afectat" class="col-form-label"><strong>Nom</strong>
                            <!-- <div class="mt-2">
                                <i style="float: right;position: relative;margin: -25px -20px 0 0;" class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                type="button"
                                title="What is your name?"
                                data-container="body"
                                data-toggle="popover"
                                data-placement="left"
                                data-trigger="hover"
                                data-delay= "500"
                                data-content="Quin és el seu nom?"></i>
                            </div> -->
                        </label>
                        <input v-if="alertant.tipus_alertants_id == 2" class="form-control" type="text" name="nom_afectat" id="nom_afectat" v-model="alertant.nom" disabled>
                        <input v-else class="form-control" type="text" name="nom_afectat" id="nom_afectat" v-model="afectat.nom">
                    </div>


                    <div class="col-sm-4 col-4">
                        <label for="cognom_afectat" class="col-form-label"><strong>Cognom</strong>
                            <!-- <div class="mt-2">
                            <i style="float: right;position: relative;margin-top: -25px;margin-right:-30px;" class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                type="button"
                                title="What is your surname?"
                                data-container="body"
                                data-toggle="popover"
                                data-placement="left"
                                data-trigger="hover"
                                data-delay= "500"
                                data-content="Quin és el seu cognom?"></i>
                            </div> -->
                        </label>
                        <input v-if="alertant.tipus_alertants_id == 2" class="form-control" type="text" name="cognom_afectat" id="cognom_afectat" v-model="alertant.cognoms" disabled>
                        <input v-else class="form-control" type="text" name="cognom_afectat" id="cognom_afectat" v-model="afectat.cognom">

                    </div>

                    <div class="col-sm-4 col-4">
                        <label for="telefon_alertant" class="col-form-label"><strong>Telèfon</strong>
                            <!-- <div class="mt-2">
                                <i style="float: right;position: relative;margin: -25px -20px 0 0;" class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                type="button"
                                title="What is your phone number?"
                                data-container="body"
                                data-toggle="popover"
                                data-placement="left"
                                data-trigger="hover"
                                data-delay= "500"
                                data-content="Quin és el seu telèfon?"></i>
                            </div> -->
                        </label>
                        <input v-if="alertant.tipus_alertants_id == 2" class="form-control" type="tel" name="telefon_alertant" id="telefon_alertant" maxlength="9" min="0" v-model="alertant.telefon" disabled>
                        <input v-else class="form-control" type="tel" name="telefon_alertant" id="telefon_alertant" maxlength="9" min="0" v-model="afectat.telefon">

                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-4 col-sm-4">
                        <label for="te_cip" class="col-form-label"><strong>Té CIP? (Codi d'Identificació Personal)</strong></label>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" name="cip_si" id="cip_si" value="1" v-model="afectat.te_cip">
                            <label for="cip_si" class="form-check-label">Sí</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" name="cip_no" id="cip_no" value="0" v-model="afectat.te_cip">
                            <label for="cip_no" class="form-check-label">No</label>
                        </div>
                        <div v-if="afectat.te_cip == 1">
                            <input type="text" class="form-control mt-1" name="cip" id="cip" v-model="afectat.cip" placeholder="Número del CIP">
                        </div>
                    </div>

                    <div class="col-sm-4 col-4">
                        <label for="edat_afectat" class="col-form-label"><strong>Edat</strong>
                            <!-- <div class="mt-2">
                                <i style="float: right;position: relative;margin: -25px -20px 0 0;" class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                type="button"
                                title="How old are you?"
                                data-container="body"
                                data-toggle="popover"
                                data-placement="left"
                                data-trigger="hover"
                                data-delay= "500"
                                data-content="Quina edat tens?"></i>
                            </div> -->
                        </label>
                        <input class="form-control" type="number" name="edat_afectat" id="edat_afectat" min="0" maxlength="3" v-model="afectat.edat">
                    </div>

                    <div class="col-sm-4 col-4">
                        <label for="genere" class="col-form-label"><strong>Génere</strong>
                            <!-- <div class="mt-2">
                                    <i style="float: right;position: relative;margin: -25px -20px 0 0;" class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                        type="button"
                                        title="Are you a man or a woman?"
                                        data-container="body"
                                        data-toggle="popover"
                                        data-placement="left"
                                        data-trigger="hover"
                                        data-delay= "500"
                                        data-content="Ets home o dona?"></i>
                                </div> -->
                        </label>
                        <div class="form-check form-check-inline" v-for="sexe in sexes" :key="sexe.id" >
                            <input class="form-check-input" type="radio" name="genere" :id="sexe.id" :value="sexe.id" v-model="afectat.sexes_id">
                            <label class="form-check-label" :for="sexe.id">{{ sexe.sexe }}</label>
                        </div>
                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-sm-5 col-5">
                        <label for="tipus_accident" class="col-form-label"><strong>Tipus d'accident o d'incident</strong>
                            <!-- <div class="mt-2">
                                <i style="float: right;position: relative;margin: -25px -20px 0 0;" class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                type="button"
                                title="What is the type of accident or incident?"
                                data-container="body"
                                data-toggle="popover"
                                data-placement="left"
                                data-trigger="hover"
                                data-delay= "500"
                                data-content="Quin és el tipus d'accident?"></i>
                            </div> -->
                        </label>
                        <select class="form-control" name="tipus_accident" id="tipus_accident">
                            <option selected disabled>Seleccionar...</option>
                            <option v-for="tipuIncidencia in tipusIncidencies" :key="tipuIncidencia.id" >{{ tipuIncidencia.tipus }}</option>
                        </select>
                    </div>

                    <div class="col-sm-6 col-6">
                        <label for="descripcio" class="col-form-label"><strong>Descripció d'accident o d'incident</strong>
                            <!-- <div class="mt-2">
                                    <i style="float: right;position: relative;margin: -25px -20px 0 0;" class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                        type="button"
                                        title="Can you describe what happened?"
                                        data-container="body"
                                        data-toggle="popover"
                                        data-placement="left"
                                        data-trigger="hover"
                                        data-delay= "500"
                                        data-content="Pots descriure que ha pasat?"></i>
                                </div> -->
                        </label>
                        <textarea class="form-control" v-model="incidencia.descripcio" id="descripcio" name= "descripcio" rows="4" placeholder="Descripció sobre l'accident o l'incident..."></textarea>
                    </div>



                </div>

                <a class="btn btn-primary m-2" id="afegir" v-on:click="colorboto()" :style="{ 'background-color': color}" style="float:right" data-toggle="collapse" href="#afectat2" role="button" aria-expanded="false" aria-controls="afectat2">
                    Afegir Afectat
                </a>

            </div>

        </div>
    </div>

</template>

<script>

    export default {
        data () {
            return {
                //GET de las apis
                provincies : [],
                comarques : [],
                municipis : [],
                tipusIncidencies : [],
                tipusAlertants : [],
                recursos : [],
                sexes : [],
                alertants : [],
                ///////////////
                comarcaSel : '',
                nomComarca : '',
                provinciaSel : '',
                nomProvincia : '',
                color : '#2c3e50',
                color2 : '#2c3e50',
                color3 : '#2c3e50',
                //POST de la incidencia
                incidencia : {
                    id : '',
                    num_incident : '',
                    data : '',
                    hora : '',
                    telefon_alertant : '',
                    adreca : '',
                    adreca_complement : '',
                    descripcio : '',
                    nom_metge : '',
                    tipus_incidencies_id : '',
                    alertants_id : '',
                    municipis_id : 0,
                    usuaris_id : ''
                },
                alertant: {
                    id: '',
                    telefon : '',
                    nom : '',
                    cognoms : '',
                    adreca : '',
                    municipis_id : 0,
                    tipus_alertants_id : ''
                },
                afectat : {
                    id : '',
                    telefon : '',
                    cip : '',
                    nom : '',
                    cognoms : '',
                    edat : '',
                    te_cip : '',
                    sexes_id : ''
                },
                sexe : {
                    id : '',
                    sexe : ''
                }
                ///////////////
            }

        },
        methods: {
            selectAll(){
                let me = this;
                axios
                    .get('/provincies')
                    .then( response => {
                        me.provincies = response.data;
                    })
                    .catch( error => {
                        console.log(error)
                        this.errored = true;
                    })
                    .finally(() => this.loading = false)

                let me2 = this;
                axios
                    .get('/municipis')
                    .then( response => {
                        me2.municipis = response.data;
                    })
                    .catch( error => {
                        console.log(error)
                        this.errored = true;
                    })
                    .finally(() => this.loading = false)

                let me3 = this;
                axios
                    .get('/comarques')
                    .then( response => {
                        me3.comarques = response.data;
                    })
                    .catch( error => {
                        console.log(error)
                        this.errored = true;
                    })
                    .finally(() => this.loading = false)

                let me4 = this;
                axios
                    .get('/sexes')
                    .then( response => {
                        me4.sexes = response.data;
                    })
                    .catch ( error => {
                        console.log(error)
                        this.errored = true;
                    })
                    .finally(() => this.loading = false)

                let me5 = this;
                axios
                    .get('/tipusIncidencies')
                    .then( response => {
                        me5.tipusIncidencies = response.data;
                    })
                    .catch ( error => {
                        console.log(error)
                        this.errored = true;
                    })
                    .finally(() => this.loading = false)

                let me6 = this;
                axios
                    .get('/tipusAlertants')
                    .then( response => {
                        me6.tipusAlertants = response.data;
                    })
                    .catch ( error => {
                        console.log(error)
                        this.errored = response.data;
                    })
                    .finally(() => this.loading = false)

                let me7 = this;
                axios
                    .get('/tipusRecursos')
                    .then( response => {
                        me7.recursos = response.data;
                    })
                    .catch ( error => {
                        console.log(error)
                        this.errored = response.data;
                    })
                    .finally(() => this.loading = false)
                let me8 = this;
                axios
                    .get('/alertants')
                    .then( response => {
                        me8.alertants = response.data;
                    })
                    .finally(() => this.loading = false)
                let me9 = this;
                axios
                    .get('/helpbox')
                    .then(response => {
                        me9.helpbox = response.data;
                    })
                    .catch(error => {
                        console.log(error)
                        this.errored = true;
                    })
                    .finally(() => this.loading = false)
            },
            localitzacio(id){
                console.log('funcio running');
                // debugger;
                var i = 0;
                var j = 0;
                var y = 0;
                this.comarcaSel = '';
                this.provinciaSel = '';
                this.nomProvincia = '';
                this.nomComarca = '';
                while(this.municipis.length > i){
                    if(this.municipis[i].id == id){
                        this.comarcaSel = this.municipis[i].comarques_id;
                    }
                    i++;
                }
                while(this.comarques.length > j){
                    if(this.comarques[j].id == this.comarcaSel){
                        this.nomComarca = this.comarques[j].nom;
                        this.provinciaSel = this.comarques[j].provincies_id;
                    }
                    j++;
                }
                while(this.provincies.length > y){
                    if(this.provincies[y].id == this.provinciaSel){
                        this.nomProvincia = this.provincies[y].nom;
                    }
                    y++;
                }
            },
            colorboto : function(){
                var boto = document.querySelector('#afegir');
                if(this.color == '#f70c74'){
                    this.color = '#2c3e50';
                    boto.textContent = "Afegir Afectat"
                }else{
                    this.color = '#f70c74';
                    boto.textContent = "Treure Afectat"

                }
            },
            colorboto2 : function(){
                if(this.color2 == '#f70c74'){
                    this.color2 = '#2c3e50';
                }else{
                    this.color2 = '#f70c74';
                }
            },
            colorboto3 : function(){
                if(this.color3 == '#f70c74'){
                    this.color3 = '#2c3e50';
                }else{
                    this.color3 = '#f70c74';
                }
            }

        },
        created() {
        this.selectAll();
        },
    }
</script>
