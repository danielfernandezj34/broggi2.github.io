<template>
    <div class="container">

        <form>
            <div class="form-group row">
                <div class="card col-6 mr-1 mt-2" id="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title">Alertant</h3>
                        <input type="hidden" id="id_alertant" name="id_alertant" v-model="alertant.id">
                    </div>
                    <div class="card-body">

                        <div v-if="telefonAlertant == true" class=" col-sm-12 col-12 alert alert-success alert-dismissible fade show mt-2" role="alert">
                            <strong>Alertant registrat anteriorment!</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="form-group row">

                            <div class="col-sm-6 col-6">
                                <label for="telefon_alertant" class="col-form-label"><strong>Telèfon</strong>
                                    <div class="mt-2">
                                        <i class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                            type="button" :title="[helpbox[3].preguntaES, helpbox[3].preguntaEN]"></i>
                                    </div>
                                </label>

                                <input class="form-control" type="tel" name="telefon_alertant" id="telefon_alertant" maxlength="9" min="0" v-model="alertant.telefon" @keyup.enter="cercaAlertant(alertant.telefon)">
                                <p class="card-text"><small class="text-muted">Click "Enter" o "Intro" per verificar el número</small></p>
                            </div>

                            <div class="col-sm-6 col-6">
                                <label for="tipus_alertant" class="col-form-label"><strong>Tipus alertant</strong>
                                    <div class="mt-2">
                                        <i class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                            type="button" :title="[helpbox[0].preguntaES, helpbox[0].preguntaEN]"></i>
                                    </div>
                                </label>
                                <select v-model="alertant.tipus_alertants_id" class="form-control" name="tipus_alertant" id="tipus_alertant">
                                    <option  v-for="tipuAlertant in tipusAlertants" :key="tipuAlertant.id" :value="tipuAlertant.id">{{ tipuAlertant.tipus }}</option>
                                </select>
                            </div>

                        </div>

                        <div class="form-group row">


                        </div>

                        <div v-if="alertant.tipus_alertants_id == 1" class="form-group row">

                            <div class="col-sm-9 col-9" >
                                <label for="nom_hospital" class="col-form-label"><strong>Nom del centre Sanitari</strong>
                                    <div class="mt-2">
                                        <i class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                        type="button" :title="[helpbox[14].preguntaES, helpbox[14].preguntaEN]"></i>
                                    </div>
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
                                    <div class="mt-2">
                                        <i class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                        type="button" :title="[helpbox[1].preguntaES, helpbox[1].preguntaEN]"></i>
                                    </div>
                                </label>

                                <input class="form-control" type="text" name="nom_alertant" id="nom_alertant" v-model="alertant.nom">

                            </div>

                            <div class="col-sm-6 col-6">
                                <label for="cognom_alertant" class="col-form-label"><strong>Cognoms</strong>
                                    <div class="mt-2">
                                        <i class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                        type="button" :title="[helpbox[2].preguntaES, helpbox[2].preguntaEN]"></i>
                                    </div>
                                </label>
                                <input class="form-control" type="text" name="cognom_alertant" id="cognom_alertant" v-model="alertant.cognoms">
                            </div>

                        </div>

                        <div class="form-group row">

                        <div class="col-sm-6 col-6">
                            <label for="tipus_accident" class="col-form-label"><strong>Tipus d'accident o d'incident</strong>
                                <div class="mt-2">
                                    <i class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                    type="button" :title="[helpbox[11].preguntaES, helpbox[11].preguntaEN]"></i>
                                </div>
                            </label>
                            <select class="form-control" name="tipus_accident" id="tipus_accident" v-model="incidencia.tipus_incidencies_id">
                                <option v-for="tipuIncidencia in tipusIncidencies" :key="tipuIncidencia.id" :value="tipuIncidencia.id">{{ tipuIncidencia.tipus }}</option>
                            </select>
                        </div>

                        <div class="col-sm-6 col-6">
                            <label for="descripcio" class="col-form-label"><strong>Descripció d'accident o d'incident</strong>
                                <div class="mt-2">
                                    <i class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                    type="button" :title="[helpbox[13].preguntaES, helpbox[13].preguntaEN]"></i>
                                </div>
                            </label>
                            <textarea class="form-control" v-model="incidencia.descripcio" id="descripcio" name= "descripcio" rows="4" placeholder="Descripció sobre l'accident o l'incident..."></textarea>
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
                                    <div class="mt-2">
                                        <i class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                            type="button" :title="[helpbox[5].preguntaES, helpbox[5].preguntaEN]"></i>
                                    </div>
                                </label>
                                <input v-if="alertant.tipus_alertants_id == 1" type="text" class="form-control" id="municipi" name="municipi" v-model="nomMunicipi" disabled>
                                <select v-else v-model="incidencia.municipis_id" class="form-control" name="municipi" id="municipi" @change="localitzacio(incidencia.municipis_id)">
                                    <option v-for="municipi in municipis" :key="municipi.id" :value="municipi.id">{{ municipi.nom }}</option>

                                </select>

                            </div>

                            <div class="col-sm-5 col-5">

                                <label for="provincia" class="col-form-label"><strong>Provincies</strong>
                                    <div class="mt-2">
                                        <i class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                            type="button" :title="[helpbox[4].preguntaES, helpbox[4].preguntaEN]"></i>
                                    </div>
                                </label>
                                <input class="form-control" type="text" name="provincia" id="provincia" v-model="nomProvincia" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="comarca" class="col-form-label"><strong>Comarca</strong>
                                    <div class="mt-2">
                                        <i class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                            type="button" :title="[helpbox[5].preguntaES, helpbox[5].preguntaEN]"></i>
                                    </div>
                                </label>
                                <input class="form-control" type="text" name="comarca" id="comarca" v-model="nomComarca" disabled>
                            </div>

                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12 col-12">
                                <label for="direccio" class="col-form-label"><strong>Adreça</strong>
                                    <div class="mt-2">
                                        <i class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                            type="button" :title="[helpbox[6].preguntaES, helpbox[6].preguntaEN]"></i>
                                    </div>
                                </label>
                                <input v-if="alertant.tipus_alertants_id == 1" type="text" class="form-control" name="direccio" id="direccio" v-model="alertant.adreca" disabled>
                                <input v-else type="text" class="form-control" name="direccio" id="direccio" v-model="alertant.adreca">

                                <div v-if="alertant.tipus_alertants_id != 1">
                                    <label for="comp_direccio" class="col-form-label"><strong>Adreça complementària</strong>
                                        <div class="mt-2">
                                            <i class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                                type="button" :title="[helpbox[6].preguntaES, helpbox[6].preguntaEN]"></i>
                                        </div>
                                    </label>
                                    <input type="text" class="form-control" name="comp_direccio" id="comp_direccio" v-model="incidencia.adreca_complement">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="card col-11 mt-2 mb-2" id="card" >

                <div class="card-header bg-primary text-white">
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="afectats" id="afectats" value="1" v-model="tipusAfec" checked>
                        <label for="afectats" class="form-check-label"><h3 class="card-title">Afectats</h3></label>
                    </div>
                    <div class="form-check form-check-inline" style="float:right">
                        <input type="radio" class="form-check-input" name="multiple_afectats" id="multiple_afectats" value="2" v-model="tipusAfec">
                        <label for="multiple_afectats" class="form-check-label"><h3 class="card-title">Multiples afectats</h3></label>
                    </div>

                </div>

                <div class="collapse multi-collapse card-body mt-2 ml-2 mr-2" id="afectat4" style="border: 2px solid #2c3e50; border-radius: 4px">
                    <div v-if="telefonAfectat4 != ''" class=" col-sm-12 col-12 alert alert-success alert-dismissible fade show mt-2" role="alert">
                        <strong>¡Afectat registrat anteriorment!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <h3><strong>Afectat 4</strong></h3>
                    <div class="form-group row">
                        <div class="col-sm-4 col-4">
                            <input type="hidden" id="id_alertant" name="id_alertant" v-model="afectat4.id">
                                <label for="nom_afectat4" class="col-form-label"><strong>Nom</strong>
                                    <div class="mt-2">
                                        <i class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                        type="button" :title="[helpbox[1].preguntaES, helpbox[1].preguntaEN]"></i>
                                    </div>
                                </label>
                            <input class="form-control" type="text" name="nom_afectat4" id="nom_afectat4" v-model="afectat4.nom">
                        </div>


                        <div class="col-sm-4 col-4">
                            <label for="cognom_afectat4" class="col-form-label"><strong>Cognom</strong>
                                <div class="mt-2">
                                    <i class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                        type="button" :title="[helpbox[2].preguntaES, helpbox[2].preguntaEN]"></i>
                                </div>
                            </label>
                            <input class="form-control" type="text" name="cognom_afectat4" id="cognom_afectat4" v-model="afectat4.cognoms">

                        </div>

                        <div class="col-sm-4 col-4">
                            <label for="telefon_alertant4" class="col-form-label"><strong>Telèfon</strong>
                                <div class="mt-2">
                                    <i class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                    type="button" :title="[helpbox[3].preguntaES, helpbox[3].preguntaEN]"></i>
                                </div>
                            </label>
                            <input class="form-control" type="tel" name="telefon_alertant4" id="telefon_alertant4" maxlength="9" min="0" v-model="afectat4.telefon" @keyup="cercarAfectat4(afectat4.telefon)">
                            <p class="card-text"><small class="text-muted">Click "Enter" o "Intro" per verificar el número</small></p>

                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-4 col-sm-4">
                            <label for="te_cip4" class="col-form-label"><strong>Té CIP? (Codi d'Identificació Personal)</strong></label>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="cip_si4" id="cip_si4" value="1" v-model="afectat4.te_cip">
                                <label for="cip_si4" class="form-check-label">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="cip_no4" id="cip_no4" value="0" v-model="afectat4.te_cip">
                                <label for="cip_no4" class="form-check-label">No</label>
                            </div>
                            <div v-if="afectat4.te_cip == 1">
                                <input type="text" class="form-control mt-1" name="cip" id="cip" v-model="afectat4.cip" @keyup="cercarAfectatCip4(afectat4.cip)" placeholder="Número del CIP">
                            </div>
                        </div>

                        <div class="col-sm-4 col-4">
                            <label for="edat_afectat4" class="col-form-label"><strong>Edat</strong>
                                <div class="mt-2">
                                    <i class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                    type="button" :title="[helpbox[8].preguntaES, helpbox[8].preguntaEN]"></i>
                                </div>
                            </label>
                            <input class="form-control" type="number" name="edat_afectat4" id="edat_afectat4" min="0" maxlength="3" v-model="afectat4.edat">
                        </div>

                        <div class="col-sm-4 col-4">
                            <label for="genere4" class="col-form-label"><strong>Génere</strong>
                                <div class="mt-2">
                                    <i class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                        type="button" :title="[helpbox[10].preguntaES, helpbox[10].preguntaEN]"></i>
                                </div>
                            </label><br>
                            <div class="form-check form-check-inline" v-for="sexe in sexes" :key="sexe.id" >
                                <input class="form-check-input" type="radio" name="genere4" :id="4 + sexe.sexe" :value="sexe.id" v-model="afectat4.sexes_id">
                                <label class="form-check-label" :for="4 + sexe.sexe">{{ sexe.sexe }}</label>
                            </div>
                        </div>
                    </div>



                </div>


                <div class="collapse multi-collapse card-body mt-2 ml-2 mr-2" id="afectat3" style="border: 2px solid #2c3e50; border-radius: 4px">
                    <div class="form-group row">
                        <button type="button" class="btn btn-primary m-2" id="afegir3" v-on:click="colorboto3()" :style="{ 'background-color': color3}" style="float:right" data-toggle="collapse" href="#afectat4" role="button" aria-expanded="false" aria-controls="afectat4" :disabled="afectat3.nom == ''">
                            Afegir Cuart Afectat
                        </button>
                    </div>
                    <div v-if="telefonAfectat3 != ''" class=" col-sm-12 col-12 alert alert-success alert-dismissible fade show mt-2" role="alert">
                        <strong>¡Afectat registrat anteriorment!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <h3><strong>Afectat 3</strong></h3>
                    <div class="form-group row">
                        <div class="col-sm-4 col-4">
                            <input type="hidden" id="id_alertant" name="id_alertant" v-model="afectat3.id">
                            <label for="nom_afectat3" class="col-form-label"><strong>Nom</strong>
                                <div class="mt-2">
                                    <i class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                        type="button" :title="[helpbox[1].preguntaES, helpbox[1].preguntaEN]"></i>
                                </div>
                            </label>
                            <input class="form-control" type="text" name="nom_afectat3" id="nom_afectat3" v-model="afectat3.nom">
                        </div>


                        <div class="col-sm-4 col-4">
                            <label for="cognom_afectat3" class="col-form-label"><strong>Cognom</strong>
                                <div class="mt-2">
                                    <i class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                        type="button" :title="[helpbox[2].preguntaES, helpbox[2].preguntaEN]"></i>
                                </div>
                            </label>
                            <input class="form-control" type="text" name="cognom_afectat3" id="cognom_afectat3" v-model="afectat3.cognoms">

                        </div>

                        <div class="col-sm-4 col-4">
                            <label for="telefon_alertant3" class="col-form-label"><strong>Telèfon</strong>
                                <div class="mt-2">
                                    <i class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                    type="button" :title="[helpbox[3].preguntaES, helpbox[3].preguntaEN]"></i>
                                </div>
                            </label>
                            <input class="form-control" type="tel" name="telefon_alertant3" id="telefon_alertant3" maxlength="9" min="0" v-model="afectat3.telefon" @keyup="cercarAfectat3(afectat3.telefon)">
                            <p class="card-text"><small class="text-muted">Click "Enter" o "Intro" per verificar el número</small></p>

                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-4 col-sm-4">
                            <label for="te_cip3" class="col-form-label"><strong>Té CIP? (Codi d'Identificació Personal)</strong></label>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="cip_si3" id="cip_si3" value="1" v-model="afectat3.te_cip">
                                <label for="cip_si3" class="form-check-label">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="cip_no3" id="cip_no3" value="0" v-model="afectat3.te_cip">
                                <label for="cip_no3" class="form-check-label">No</label>
                            </div>
                            <div v-if="afectat3.te_cip == 1">
                                <input type="text" class="form-control mt-1" name="cip" id="cip" v-model="afectat3.cip" @keyup="cercarAfectatCip3(afectat3.cip)" placeholder="Número del CIP">
                            </div>
                        </div>

                        <div class="col-sm-4 col-4">
                            <label for="edat_afectat3" class="col-form-label"><strong>Edat</strong>
                                <div class="mt-2">
                                    <i class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                    type="button" :title="[helpbox[8].preguntaES, helpbox[8].preguntaEN]"></i>
                                </div>
                            </label>
                            <input class="form-control" type="number" name="edat_afectat3" id="edat_afectat3" min="0" maxlength="3" v-model="afectat3.edat">
                        </div>

                        <div class="col-sm-4 col-4">
                            <label for="genere3" class="col-form-label"><strong>Génere</strong>
                                <div class="mt-2">
                                    <i class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                        type="button" :title="[helpbox[10].preguntaES, helpbox[10].preguntaEN]"></i>
                                </div>
                            </label><br>
                            <div class="form-check form-check-inline" v-for="sexe in sexes" :key="sexe.id" >
                                <input class="form-check-input" type="radio" name="genere3" :id="3 + sexe.sexe" :value="sexe.id" v-model="afectat3.sexes_id">
                                <label class="form-check-label" :for="3 + sexe.sexe">{{ sexe.sexe }}</label>
                            </div>
                        </div>
                    </div>



                </div>


                <div class="collapse multi-collapse card-body mt-2 ml-2 mr-2" id="afectat2" style="border: 2px solid #2c3e50; border-radius: 4px">
                    <div class="form-group row">
                        <button type="button" class="btn btn-primary m-2" id="afegir2" v-on:click="colorboto2()" :style="{ 'background-color': color2}" style="float:right" data-toggle="collapse" href="#afectat3" role="button" aria-expanded="false" aria-controls="afectat3" :disabled="afectat2.nom == ''">
                            Afegir Tercer Afectat
                        </button>
                    </div>

                    <div v-if="telefonAfectat2 != ''" class=" col-sm-12 col-12 alert alert-success alert-dismissible fade show mt-2" role="alert">
                        <strong>¡Afectat registrat anteriorment!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <h3><strong>Afectat 2</strong></h3>

                    <div class="form-group row">
                        <div class="col-sm-4 col-4">
                            <input type="hidden" id="id_alertant" name="id_alertant" v-model="afectat2.id">
                            <label for="nom_afectat2" class="col-form-label"><strong>Nom</strong>
                                <div class="mt-2">
                                    <i class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                        type="button" :title="[helpbox[1].preguntaES, helpbox[1].preguntaEN]"></i>
                                </div>
                            </label>
                            <input class="form-control" type="text" name="nom_afectat2" id="nom_afectat2" v-model="afectat2.nom">
                        </div>


                        <div class="col-sm-4 col-4">
                            <label for="cognom_afectat2" class="col-form-label"><strong>Cognoms</strong>
                                <div class="mt-2">
                                    <i class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                        type="button" :title="[helpbox[2].preguntaES, helpbox[2].preguntaEN]"></i>
                                </div>
                            </label>
                            <input class="form-control" type="text" name="cognom_afectat2" id="cognom_afectat2" v-model="afectat2.cognoms">

                        </div>

                        <div class="col-sm-4 col-4">
                            <label for="telefon_alertant2" class="col-form-label"><strong>Telèfon</strong>
                                <div class="mt-2">
                                    <i class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                    type="button" :title="[helpbox[3].preguntaES, helpbox[3].preguntaEN]"></i>
                                </div>
                            </label>
                            <input class="form-control" type="tel" name="telefon_alertant2" id="telefon_alertant2" maxlength="9" min="0" v-model="afectat2.telefon" @keyup.enter="cercarAfectat2(afectat2.telefon)">
                            <p class="card-text"><small class="text-muted">Click "Enter" o "Intro" per verificar el número</small></p>

                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-4 col-sm-4">
                            <label for="te_cip2" class="col-form-label"><strong>Té CIP? (Codi d'Identificació Personal)</strong></label>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="cip_si2" id="cip_si2" value="1" v-model="afectat2.te_cip">
                                <label for="cip_si2" class="form-check-label">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="cip_no2" id="cip_no2" value="0" v-model="afectat2.te_cip">
                                <label for="cip_no2" class="form-check-label">No</label>
                            </div>
                            <div v-if="afectat2.te_cip == 1">
                                <input type="text" class="form-control mt-1" name="cip" id="cip" v-model="afectat2.cip" @keyup.enter="cercarAfectatCip2(afectat2.cip)" placeholder="Número del CIP">
                            </div>
                        </div>

                        <div class="col-sm-4 col-4">
                            <label for="edat_afectat2" class="col-form-label"><strong>Edat</strong>
                                <div class="mt-2">
                                    <i class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                    type="button" :title="[helpbox[8].preguntaES, helpbox[8].preguntaEN]"></i>
                                </div>
                            </label>
                            <input class="form-control" type="number" name="edat_afectat2" id="edat_afectat2" min="0" maxlength="3" v-model="afectat2.edat">
                        </div>

                        <div class="col-sm-4 col-4">
                            <label for="genere2" class="col-form-label"><strong>Génere</strong>
                                <div class="mt-2">
                                    <i class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                        type="button" :title="[helpbox[10].preguntaES, helpbox[10].preguntaEN]"></i>
                                </div>
                            </label><br>
                            <div class="form-check form-check-inline" v-for="sexe in sexes" :key="sexe.id" >
                                <input class="form-check-input" type="radio" name="genere2" :id="2 + sexe.sexe" :value="sexe.id" v-model="afectat2.sexes_id">
                                <label class="form-check-label" :for="2 + sexe.sexe">{{ sexe.sexe }}</label>
                            </div>
                        </div>
                    </div>


                </div>

                <div v-if="tipusAfec == 2" class="card-body mt-2 ml-2 mr-2 mb-2" style="border: 2px solid #2c3e50; border-radius: 4px">
                    <h3><strong>Dades</strong></h3>
                    <div class="form-group row">
                        <div class="col-12 col-sm-12">
                            <label for="descripcioAdicional" class="col-form-label"><strong>Descripció general sobre els afectats del incident</strong>
                            </label>
                            <textarea class="form-control" v-model="descripcioAdicional" id="descripcioAdicional" name= "descripcioAdicional" rows="8" placeholder="Descripció breu sobre els afectats ex: (Dona de 35 anys, dos Homes de 42 i 38 anys...)"></textarea>
                        </div>

                    </div>

                </div>

                <!-- Afectat numero 1 -->
                <div v-else class="card-body mt-2 ml-2 mr-2 mb-2" style="border: 2px solid #2c3e50; border-radius: 4px">


                    <div class="form-group row">
                        <button type="button" class="btn btn-primary m-2" id="afegir" v-on:click="colorboto()" :style="{ 'background-color': color}" style="float:right" data-toggle="collapse" href="#afectat2" role="button" aria-expanded="false" aria-controls="afectat2" :disabled="afectat.te_cip == ''">
                            Afegir Segon Afectat
                        </button>
                    </div>
                    <div v-if="telefonAfectat != ''" class=" col-sm-12 col-12 alert alert-success alert-dismissible fade show mt-2" role="alert">
                        <strong>¡Afectat registrat anteriorment!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="form-group row">

                        <div class="col-sm-4 col-4">
                            <input type="hidden" id="id_alertant" name="id_alertant" v-model="afectat.id">
                            <label for="nom_afectat" class="col-form-label"><strong>Nom</strong>
                                <div class="mt-2">
                                    <i class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                        type="button" :title="[helpbox[1].preguntaES, helpbox[1].preguntaEN]"></i>
                                </div>
                            </label>
                            <input v-if="alertant.tipus_alertants_id == 2" class="form-control" type="text" name="nom_afectat" id="nom_afectat" v-model="alertant.nom" disabled>
                            <input v-else class="form-control" type="text" name="nom_afectat" id="nom_afectat" v-model="afectat.nom">
                        </div>


                        <div class="col-sm-4 col-4">
                            <label for="cognom_afectat" class="col-form-label"><strong>Cognom</strong>
                                <div class="mt-2">
                                    <i class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                        type="button" :title="[helpbox[2].preguntaES, helpbox[2].preguntaEN]"></i>
                                </div>
                            </label>
                            <input v-if="alertant.tipus_alertants_id == 2" class="form-control" type="text" name="cognom_afectat" id="cognom_afectat" v-model="alertant.cognoms" disabled>
                            <input v-else class="form-control" type="text" name="cognom_afectat" id="cognom_afectat" v-model="afectat.cognoms">

                        </div>

                        <div class="col-sm-4 col-4">
                            <label for="telefon_alertant" class="col-form-label"><strong>Telèfon</strong>
                                <div class="mt-2">
                                    <i class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                    type="button" :title="[helpbox[3].preguntaES, helpbox[3].preguntaEN]"></i>
                                </div>
                            </label>
                            <input v-if="alertant.tipus_alertants_id == 2" class="form-control" type="tel" name="telefon_alertant" id="telefon_alertant" maxlength="9" min="0" v-model="alertant.telefon" disabled>
                            <input v-else class="form-control" type="tel" name="telefon_alertant" id="telefon_alertant" maxlength="9" min="0" v-model="afectat.telefon" @keyup.enter="cercarAfectat(afectat.telefon)" >
                            <p class="card-text"><small class="text-muted">Click "Enter" o "Intro" per verificar el número</small></p>

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
                                <input type="text" class="form-control mt-1" name="cip" id="cip" v-model="afectat.cip" @keyup.enter="cercarAfectatCip(afectat.cip)" placeholder="Número del CIP">
                            </div>
                        </div>

                        <div class="col-sm-4 col-4">
                            <label for="edat_afectat" class="col-form-label"><strong>Edat</strong>
                                <div class="mt-2">
                                    <i class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                    type="button" :title="[helpbox[8].preguntaES, helpbox[8].preguntaEN]"></i>
                                </div>
                            </label>
                            <input class="form-control" type="number" name="edat_afectat" id="edat_afectat" min="0" maxlength="3" v-model="afectat.edat">
                        </div>

                        <div class="col-sm-4 col-4">
                            <label for="genere" class="col-form-label"><strong>Génere</strong>
                                <div class="mt-2">
                                    <i class="far fa-question-square ml-4 float-sm-right" id="helpbox"
                                        type="button" :title="[helpbox[10].preguntaES, helpbox[10].preguntaEN]"></i>
                                </div>
                            </label><br>
                            <div class="form-check form-check-inline" v-for="sexe in sexes" :key="sexe.id" >
                                <input class="form-check-input" type="radio" name="genere" :id="1 + sexe.sexe" :value="sexe.id" v-model="afectat.sexes_id">
                                <label class="form-check-label" :for="1 + sexe.sexe">{{ sexe.sexe }}</label>
                            </div>
                        </div>
                    </div>



                </div>



            </div>

            <div class="card mt-2 mb-2 col-11" id="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title">Recurs</h3>
                </div>

                <div class="collapse multi-collapse card card-body mb-2 mt-2 ml-2 mr-2" style="border: 2px solid #2c3e50; border-radius: 4px" id="recurs2">

                    <div class="form-group row">
                        <div class="col-sm-4 col-4">
                            <h5><u>Cuart recurs mòbil</u></h5>
                            <label for="recurs4" class="col-form-label"><strong>Tipus de recurs</strong></label>
                            <select class="form-control" name="recurs4" id="recurs4" v-model="incidencies_has_recursos4.recursos_id">
                                <option v-for="recurs in recursos" :key="recurs.id" :value="recurs.id">{{ recurs.tipus }}</option>
                            </select>
                        </div>

                        <div class="col-sm-4 col-4">
                            <h5><u>Cinquè recurs mòbil</u></h5>
                            <label for="recurs5" class="col-form-label"><strong>Tipus de recurs</strong></label>
                            <select class="form-control" name="recurs5" id="recurs5" v-model="incidencies_has_recursos5.recursos_id">
                                <option v-for="recurs in recursos" :key="recurs.id" :value="recurs.id">{{ recurs.tipus }}</option>
                            </select>
                        </div>

                        <div class="col-sm-4 col-4">
                            <h5><u>Sisè recurs mòbil</u></h5>
                            <label for="recurs6" class="col-form-label"><strong>Tipus de recurs</strong></label>
                            <select class="form-control" name="recurs6" id="recurs6" v-model="incidencies_has_recursos6.recursos_id">
                                <option v-for="recurs in recursos" :key="recurs.id" :value="recurs.id">{{ recurs.tipus }}</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-sm-4 col-4">
                            <label for="prioritat4"><strong>Prioritat</strong></label>
                            <input type="range" class="form-control-range" id="prioritat4" name="prioritat4" min="0" max="4" oninput="this.nextElementSibling.value = this.value" v-model="incidencies_has_recursos4.prioritat">
                            <output>0</output>
                        </div>

                        <div class="col-sm-4 col-4">
                            <label for="prioritat5"><strong>Prioritat</strong></label>
                            <input type="range" class="form-control-range" id="prioritat5" name="prioritat5" min="0" max="4" oninput="this.nextElementSibling.value = this.value" v-model="incidencies_has_recursos5.prioritat">
                            <output>0</output>
                        </div>

                        <div class="col-sm-4 col-4">
                            <label for="prioritat6"><strong>Prioritat</strong></label>
                            <input type="range" class="form-control-range" id="prioritat6" name="prioritat6" min="0" max="4" oninput="this.nextElementSibling.value = this.value" v-model="incidencies_has_recursos6.prioritat">
                            <output>0</output>
                        </div>
                    </div>

                </div>

                <div class="card card-body mb-2 mt-2 ml-2 mr-2" style="border: 2px solid #2c3e50; border-radius: 4px">
                    <div class="form-group row">
                        <button type="button" class="btn btn-primary m-2" id="afegirRec" v-on:click="colorboto4()" :style="{ 'background-color': color4}" style="float:right" data-toggle="collapse" href="#recurs2" role="button" aria-expanded="false" aria-controls="recurs2" :disabled="incidencies_has_recursos.recursos_id == '' || incidencies_has_recursos2.recursos_id == '' || incidencies_has_recursos3.recursos_id == ''">
                            Afegir Recursos
                        </button>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4 col-4">
                            <h5><u>Primer recurs mòbil</u></h5>
                            <label for="recurs1" class="col-form-label"><strong>Tipus de recurs</strong></label>
                            <select class="form-control" name="recurs1" id="recurs1" v-model="incidencies_has_recursos.recursos_id">
                                <option v-for="recurs in recursos" :key="recurs.id" :value="recurs.id">{{ recurs.tipus }}</option>
                            </select>
                        </div>

                        <div class="col-sm-4 col-4">
                            <h5><u>Segon recurs mòbil</u></h5>
                            <label for="recurs_2" class="col-form-label"><strong>Tipus de recurs</strong></label>
                            <select class="form-control" name="recurs_2" id="recurs_2" v-model="incidencies_has_recursos2.recursos_id">
                                <option v-for="recurs in recursos" :key="recurs.id" :value="recurs.id">{{ recurs.tipus }}</option>
                            </select>
                        </div>

                        <div class="col-sm-4 col-4">
                            <h5><u>Tercer recurs mòbil</u></h5>
                            <label for="recurs3" class="col-form-label"><strong>Tipus de recurs</strong></label>
                            <select class="form-control" name="recurs3" id="recurs3" v-model="incidencies_has_recursos3.recursos_id">
                                <option v-for="recurs in recursos" :key="recurs.id" :value="recurs.id">{{ recurs.tipus }}</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-sm-4 col-4">
                            <label for="prioritat1"><strong>Prioritat</strong></label>
                            <input type="range" class="form-control-range" id="prioritat1" name="prioritat1" min="0" max="4" oninput="this.nextElementSibling.value = this.value" v-model="incidencies_has_recursos.prioritat">
                            <output>0</output>
                        </div>

                        <div class="col-sm-4 col-4">
                            <label for="prioritat2"><strong>Prioritat</strong></label>
                            <input type="range" class="form-control-range" id="prioritat2" name="prioritat2" min="0" max="4" oninput="this.nextElementSibling.value = this.value" v-model="incidencies_has_recursos2.prioritat">
                            <output>0</output>
                        </div>

                        <div class="col-sm-4 col-4">
                            <label for="prioritat3"><strong>Prioritat</strong></label>
                            <input type="range" class="form-control-range" id="prioritat3" name="prioritat3" min="0" max="4" oninput="this.nextElementSibling.value = this.value" v-model="incidencies_has_recursos3.prioritat">
                            <output>0</output>
                        </div>
                    </div>

                </div>
            </div>
        </form>
        <button type="button" @click="crearIncidencia()" class="btn btn-success btn-lg boto_enviar" style="background-color: #f70c74"><i class="fas fa-check fa-1x"></i> Enviar</button>

    </div>

</template>

<script>
export default {
        props : {
            user_id : {
                type : Number,
                require : true
            }
        },
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
                afectats : [],
                ///////////////
                comarcaSel : '',
                nomComarca : '',
                provinciaSel : '',
                nomProvincia : '',
                nomMunicipi : '',
                color  : '#2c3e50',
                color2 : '#2c3e50',
                color3 : '#2c3e50',
                color4 : '#2c3e50',
                tipusAfec : 1,
                descripcioAdicional : '',
                telefonAlertant : false,
                telefonAfectat : '',
                telefonAfectat2 : '',
                telefonAfectat3 : '',
                telefonAfectat4 : '',
                cipAfectat : '',
                cipAfectat2 : '',
                cipAfectat3 : '',
                cipAfectat4 : '',
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
                    usuaris_id : '',
                    incidencies_has_recursos: [],
                    incidencies_has_afectats : {
                        incidencies_id : '',
                        afectats_id : ''
                    }
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
                afectat2 : {
                    id : '',
                    telefon : '',
                    cip : '',
                    nom : '',
                    cognoms : '',
                    edat : '',
                    te_cip : '',
                    sexes_id : ''
                },
                afectat3 : {
                    id : '',
                    telefon : '',
                    cip : '',
                    nom : '',
                    cognoms : '',
                    edat : '',
                    te_cip : '',
                    sexes_id : ''
                },
                afectat4 : {
                    id : '',
                    telefon : '',
                    cip : '',
                    nom : '',
                    cognoms : '',
                    edat : '',
                    te_cip : '',
                    sexes_id : ''
                },
                incidencies_has_recursos : {
                    incidencies_id : '',
                    recursos_id : '',
                    hora_activacio : '',
                    hora_mobilitzacio: '',
                    hora_assistencia : '',
                    hora_tranport : '',
                    hora_arribada_hospital : '',
                    hora_transferencia : '',
                    hora_finalitzacio : '',
                    prioritat : 0,
                    desti : ''
                },
                incidencies_has_recursos2 : {
                    incidencies_id : '',
                    recursos_id : '',
                    hora_activacio : '',
                    hora_mobilitzacio: '',
                    hora_assistencia : '',
                    hora_tranport : '',
                    hora_arribada_hospital : '',
                    hora_transferencia : '',
                    hora_finalitzacio : '',
                    prioritat : 0,
                    desti : ''
                },
                incidencies_has_recursos3 : {
                    incidencies_id : '',
                    recursos_id : '',
                    hora_activacio : '',
                    hora_mobilitzacio: '',
                    hora_assistencia : '',
                    hora_tranport : '',
                    hora_arribada_hospital : '',
                    hora_transferencia : '',
                    hora_finalitzacio : '',
                    prioritat : 0,
                    desti : ''
                },
                incidencies_has_recursos4 : {
                    incidencies_id : '',
                    recursos_id : '',
                    hora_activacio : '',
                    hora_mobilitzacio: '',
                    hora_assistencia : '',
                    hora_tranport : '',
                    hora_arribada_hospital : '',
                    hora_transferencia : '',
                    hora_finalitzacio : '',
                    prioritat : 0,
                    desti : ''
                },
                incidencies_has_recursos5 : {
                    incidencies_id : '',
                    recursos_id : '',
                    hora_activacio : '',
                    hora_mobilitzacio: '',
                    hora_assistencia : '',
                    hora_tranport : '',
                    hora_arribada_hospital : '',
                    hora_transferencia : '',
                    hora_finalitzacio : '',
                    prioritat : 0,
                    desti : ''
                },
                incidencies_has_recursos6 : {
                    incidencies_id : '',
                    recursos_id : '',
                    hora_activacio : '',
                    hora_mobilitzacio: '',
                    hora_assistencia : '',
                    hora_tranport : '',
                    hora_arribada_hospital : '',
                    hora_transferencia : '',
                    hora_finalitzacio : '',
                    prioritat : 0,
                    desti : ''
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
                let me10 = this;
                axios
                    .get('/afectats')
                    .then(response => {
                        me10.afectats = response.data;
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
                    boto.textContent = "Afegir Segon Afectat"
                }else{
                    this.color = '#f70c74';
                    boto.textContent = "Treure Segon Afectat"

                }
            },
            colorboto2 : function(){
                var boto2 = document.querySelector('#afegir2');
                if(this.color2 == '#f70c74'){
                    this.color2 = '#2c3e50';
                    boto2.textContent = "Afegir Tercer Afectat"
                }else{
                    this.color2 = '#f70c74';
                    boto2.textContent = "Treure Tercer Afectat"
                }
            },
            colorboto3 : function(){
                var boto3 = document.querySelector('#afegir3');
                if(this.color3 == '#f70c74'){
                    this.color3 = '#2c3e50';
                    boto3.textContent = "Afegir Cuart Afectat"
                }else{
                    this.color3 = '#f70c74';
                    boto3.textContent = "Treure Cuart Afectat"
                }
            },
            colorboto4 : function(){
                var boto4 = document.querySelector('#afegirRec');
                if(this.color4 == '#f70c74'){
                    this.color4 = '#2c3e50';
                    boto4.textContent = "Afegir Recursos"
                }else{
                    this.color4 = '#f70c74';
                    boto4.textContent = "Treure Recursos"
                }
            },
            cercaAlertant (telefon){
                var i = 0;
                var j = 0;
                var x = 0;
                var y = 0;

                while(this.alertants.length > i){
                    if(this.alertants[i].telefon == telefon){
                        this.alertant.id = this.alertants[i].id;
                        this.alertant.nom  = this.alertants[i].nom;
                        this.alertant.cognoms = this.alertants[i].cognoms;
                        this.alertant.telefon = this.alertants[i].telefon;
                        this.alertant.adreca = this.alertants[i].adreca;
                        this.alertant.municipis_id = this.alertants[i].municipis_id;
                        this.alertant.tipus_alertants_id = this.alertants[i].tipus_alertants_id;
                        this.telefonAlertant = true;
                    }
                    i++;
                }
                if(this.alertant.tipus_alertants_id == 1){
                    while(this.municipis.length > j){
                        if(this.municipis[j].id == this.alertant.municipis_id){
                            this.nomMunicipi = this.municipis[j].nom;
                            this.comarcaSel = this.municipis[j].comarques_id;
                        }
                        j++;
                    }
                    while(this.comarques.length > x){
                        if(this.comarques[x].id == this.comarcaSel){
                            this.nomComarca = this.comarques[x].nom;
                            this.provinciaSel = this.comarques[x].provincies_id;
                        }
                        x++;
                    }
                    while(this.provincies.length > y){
                        if(this.provincies[y].id == this.provinciaSel){
                            this.nomProvincia = this.provincies[y].nom;
                        }
                        y++;
                    }
                }
            },
            cercarAfectat(telefon){
                var i = 0;
                // debugger;
                while(this.afectats.length > i){
                    if(this.afectats[i].telefon == telefon){
                        this.afectat.telefon = this.afectats[i].telefon;
                        this.afectat.cip = this.afectats[i].cip;
                        this.afectat.nom = this.afectats[i].nom;
                        this.afectat.cognoms = this.afectats[i].cognoms;
                        this.afectat.edat = this.afectats[i].edat;
                        this.afectat.te_cip = this.afectats[i].te_cip;
                        this.afectat.sexes_id = this.afectats[i].sexes_id;
                        this.telefonAfectat = telefon;
                    }
                    i++;
                }


            },
            cercarAfectat2(telefon){
                var i = 0;
                //debugger;
                while(this.afectats.length > i){
                    if(this.afectats[i].telefon == telefon){
                        this.afectat.telefon = this.afectats[i].telefon;
                        this.afectat.cip = this.afectats[i].cip;
                        this.afectat.nom = this.afectats[i].nom;
                        this.afectat.cognoms = this.afectats[i].cognoms;
                        this.afectat.edat = this.afectats[i].edat;
                        this.afectat.te_cip = this.afectats[i].te_cip;
                        this.afectat.sexes_id = this.afectats[i].sexes_id;
                        this.telefonAfectat2 = telefon;
                    }
                    i++;
                }


            },
            cercarAfectat3(telefon){
                var i = 0;

                while(this.afectats.length > i){
                    if(this.afectats[i].telefon == telefon){
                        this.afectat3.telefon = this.afectats[i].telefon;
                        this.afectat3.cip = this.afectats[i].cip;
                        this.afectat3.nom = this.afectats[i].nom;
                        this.afectat3.cognoms = this.afectats[i].cognoms;
                        this.afectat3.edat = this.afectats[i].edat;
                        this.afectat3.te_cip = this.afectats[i].te_cip;
                        this.afectat3.sexes_id = this.afectats[i].sexes_id;
                        this.telefonAfectat3 = telefon;
                    }
                    i++;
                }


            },
            cercarAfectat4(telefon){
                var i = 0;

                while(this.afectats.length > i){
                    if(this.afectats[i].telefon == telefon){
                        this.afectat4.telefon = this.afectats[i].telefon;
                        this.afectat4.cip = this.afectats[i].cip;
                        this.afectat4.nom = this.afectats[i].nom;
                        this.afectat4.cognoms = this.afectats[i].cognoms;
                        this.afectat4.edat = this.afectats[i].edat;
                        this.afectat4.te_cip = this.afectats[i].te_cip;
                        this.afectat4.sexes_id = this.afectats[i].sexes_id;
                        this.telefonAfectat4 = telefon;
                    }
                    i++;
                }


            },
            cercarAfectatCip(cip){
                var i = 0;

                while(this.afectats.length > i){
                    if(this.afectats[i].cip == cip){
                        this.afectat.telefon = this.afectats[i].telefon;
                        this.afectat.cip = this.afectats[i].cip;
                        this.afectat.nom = this.afectats[i].nom;
                        this.afectat.cognoms = this.afectats[i].cognoms;
                        this.afectat.edat = this.afectats[i].edat;
                        this.afectat.te_cip = this.afectats[i].te_cip;
                        this.afectat.sexes_id = this.afectats[i].sexes_id;
                        this.cipAfectat = cip;
                    }
                    i++;
                }


            },
            cercarAfectatCip2(cip){
                var i = 0;

                while(this.afectats.length > i){
                    if(this.afectats[i].cip == cip){
                        this.afectat2.telefon = this.afectats[i].telefon;
                        this.afectat2.cip = this.afectats[i].cip;
                        this.afectat2.nom = this.afectats[i].nom;
                        this.afectat2.cognoms = this.afectats[i].cognoms;
                        this.afectat2.edat = this.afectats[i].edat;
                        this.afectat2.te_cip = this.afectats[i].te_cip;
                        this.afectat2.sexes_id = this.afectats[i].sexes_id;
                        this.cipAfectat2 = cip;
                    }
                    i++;
                }


            },
            cercarAfectatCip3(cip){
                var i = 0;

                while(this.afectats.length > i){
                    if(this.afectats[i].cip == cip){
                        this.afectat3.telefon = this.afectats[i].telefon;
                        this.afectat3.cip = this.afectats[i].cip;
                        this.afectat3.nom = this.afectats[i].nom;
                        this.afectat3.cognoms = this.afectats[i].cognoms;
                        this.afectat3.edat = this.afectats[i].edat;
                        this.afectat3.te_cip = this.afectats[i].te_cip;
                        this.afectat3.sexes_id = this.afectats[i].sexes_id;
                        this.cipAfectat3 = cip;
                    }
                    i++;
                }


            },
            cercarAfectatCip4(cip){
                var i = 0;

                while(this.afectats.length > i){
                    if(this.afectats[i].cip == cip){
                        this.afectat4.telefon = this.afectats[i].telefon;
                        this.afectat4.cip = this.afectats[i].cip;
                        this.afectat4.nom = this.afectats[i].nom;
                        this.afectat4.cognoms = this.afectats[i].cognoms;
                        this.afectat4.edat = this.afectats[i].edat;
                        this.afectat4.te_cip = this.afectats[i].te_cip;
                        this.afectat4.sexes_id = this.afectats[i].sexes_id;
                        this.cipAfectat4 = cip;
                    }
                    i++;
                }


            },
            crearIncidencia(){

                var problema = false;
                const data = new Date();
                //debugger;
                if(this.afectat.telefon != this.telefonAfectat){
                    this.crearAfectat();
                    this.incidencia.incidencies_has_afectats.incidencies_id = this.incidencia.id;
                    this.incidencia.incidencies_has_afectats.afectats_id = this.afectat.id;
                }else{
                    this.incidencia.incidencies_has_afectats.incidencies_id = this.incidencia.id;
                    this.incidencia.incidencies_has_afectats.afectats_id = this.afectat.id;
                }


                if(this.afectat2.telefon != this.telefonAfectat2){
                    if(this.afectat2.te_cip != ''){
                        this.crearAfectat2();
                        this.incidencia.incidencies_has_afectats.incidencies_id = this.incidencia.id;
                        this.incidencia.incidencies_has_afectats.afectats_id = this.afectat.id;
                    }
                }else{
                    this.incidencia.incidencies_has_afectats.incidencies_id = this.incidencia.id;
                    this.incidencia.incidencies_has_afectats.afectats_id = this.afectat.id;
                    }
                if(this.afectat3.telefon != this.telefonAfectat3){
                    if(this.afectat3.te_cip != ''){
                        this.crearAfectat3();
                        this.incidencia.incidencies_has_afectats.incidencies_id = this.incidencia.id;
                        this.incidencia.incidencies_has_afectats.afectats_id = this.afectat.id;
                    }
                }else{
                        this.incidencia.incidencies_has_afectats.incidencies_id = this.incidencia.id;
                        this.incidencia.incidencies_has_afectats.afectats_id = this.afectat.id;
                    }
                if(this.afectat4.telefon != this.telefonAfectat4){
                    if(this.afectat4.te_cip != ''){
                        this.crearAfectat4();
                        this.incidencia.incidencies_has_afectats.incidencies_id = this.incidencia.id;
                        this.incidencia.incidencies_has_afectats.afectats_id = this.afectat.id;
                    }
                }else{
                    this.incidencia.incidencies_has_afectats.incidencies_id = this.incidencia.id;
                    this.incidencia.incidencies_has_afectats.afectats_id = this.afectat.id;
                }

                this.crearAlertant();

                //Campos de tabla incidencia rellenados con los valores que le faltaban
                this.incidencia.num_incident = this.incidencia.id;
                this.incidencia.data = data.getDate()+ '-' + data.getFullYear();
                this.incidencia.hora = data.getHours() + '-' + data.getMinutes();
                this.incidencia.telefon_alertant = this.alertant.telefon;
                this.incidencia.adreca = this.alertant.adreca;
                //this.incidencia.adreca_complement este campo ya esta puesto en el v-model del formulario en la parte de ADREÇA COMPLEMENTARIA
                //this.incidencia.descripcio este campo ya esta puesto en el v-model del formulario en la parte de DESCRIPCIO
                //this.incidencia.nom_metge este campo ya esta puesto en el v-model del formulario en la parte de NOM DEL METGE
                //this.incidencia.tipus_incidencies_id este campo ya esta puesto en el v-model del formulario en la parte de TIPUS DE D'ACCIDENT O D'INCIDENT
                // this.incidencia.alertants_id = this.alertant.id;
                //this.incidencia.municipis_id este campo ya esta puesto en el v-model del formulario en la parte de MUNICIPI
                this.incidencia.usuaris_id= this.user_id;
                /////////////
                if(this.descripcioAdicional != ''){
                    this.incidencia.descripcio + ', DESCRIPCIO DELS AFECTATS: '+ this.descripcioAdicional;
                }

                if(this.incidencies_has_recursos.recursos_id != ''){
                    this.incidencia.incidencies_has_recursos.push(this.incidencies_has_recursos);
                }
                if(this.incidencies_has_recursos2.recursos_id != ''){
                    this.incidencia.incidencies_has_recursos.push(this.incidencies_has_recursos2);
                }
                if(this.incidencies_has_recursos3.recursos_id != ''){
                    this.incidencia.incidencies_has_recursos.push(this.incidencies_has_recursos3);
                }
                if(this.incidencies_has_recursos4.recursos_id != ''){
                    this.incidencia.incidencies_has_recursos.push(this.incidencies_has_recursos4);
                }
                if(this.incidencies_has_recursos5.recursos_id != ''){
                    this.incidencia.incidencies_has_recursos.push(this.incidencies_has_recursos5);
                }
                if(this.incidencies_has_recursos6.recursos_id != ''){
                    this.incidencia.incidencies_has_recursos.push(this.incidencies_has_recursos6);
                }





                let me = this;
                axios
                    .post('/incidencies', me.incidencia)
                    .then(function(response){
                        console.log(response);
                    }).catch(function(error) {
                        problema = true;
                        console.log(error.response.status);
                        console.log(error.response.data);
                        me.errorMessage = error.response.data.error;
                })



                if(problema == false){
                    return window.open('http://localhost:80/broggi2.github.io/public/incidencies', '_self');
                }

            },
            crearAfectat(){
                var me = this;
                //Campos de tabla afectat rellenados con los valores que le faltaban
                if(this.alertant.tipus_alertants_id == 2){
                    this.afectat.telefon = this.alertant.telefon;
                    this.afectat.nom = this.alertant.nom;
                    this.afectat.cognoms = this.alertant.cognoms;
                }
                //this.afectat.telefon este campo ya esta puesto en el v-model del formulario en la parte de TELEFONO AFECTAT si el alertante no es AFECTADO
                //this.afectat.cip este campo ya esta puesto en el v-model del formulario en la parte de TE CIP si el usuario da a la opcion de SI
                //this.afectat.edat este campo ya esta puesto en el v-model del formulario en la parte de EDAT
                //this.afectat.te_cip este campo ya esta puesto en el v-model del formulario en la parte de TE CIP
                //this.afectat.sexes_id este campo ya esta puesto en el v-model del formulario en la parte de GÉNERE
                ////////////

                axios
                    .post('/afectats', me.afectat)
                    .then(function(response){
                        console.log(response);

                    }).catch(function(error){
                        console.log(error.response.status);
                        console.log(error.response.data);
                        me.errorMessage = error.response.data.error;
                })

            },
            crearAfectat2(){
                var me = this;
                axios
                        .post('/afectats', me.afectat2)
                        .then(function(response){
                            console.log(response);

                        }).catch(function(error){
                            console.log(error.response.status);
                            console.log(error.response.data);
                            me.errorMessage = error.response.data.error;
                    })
            },
            crearAfectat3(){
                var me = this;

                axios
                    .post('/afectats', me.afectat3)
                    .then(function(response){
                        console.log(response);

                    }).catch(function(error){
                        console.log(error.response.status);
                        console.log(error.response.data);
                        me.errorMessage = error.response.data.error;
                })
            },
            crearAfectat4(){
                var me = this;

                axios
                    .post('/afectats', me.afectat4)
                    .then(function(response){
                        console.log(response);

                    }).catch(function(error){
                        console.log(error.response.status);
                        console.log(error.response.data);
                        me.errorMessage = error.response.data.error;
                })

            },
            crearAlertant(){
                var me = this;
                //Campos de tabla alertant rellenados con los valores que le faltaban
                this.alertant.municipis_id = this.incidencia.municipis_id;
                /////////
                if(this.alertant.tipus_alertants_id != 1){
                    axios
                        .post('/alertants', me.alertant)
                        .then(function(response){
                            console.log(response);
                        }).catch(function(error){
                            console.log(error.response.status);
                            console.log(error.response.data);
                            me.errorMessage = error.response.data.error;
                    })
                }

            },
            // crearIncidencies_has_recursos(){
            //     var me = this;


            //         this.incidencies_has_recursos.incidencies_id = this.incidencia.id;
            //         axios
            //             .post('/incidencies_has_recursos', me.incidencies_has_recursos)
            //             .then(function(response){
            //                 console.log(response);
            //             }).catch(function(error){
            //                 console.log(error.response.status);
            //                 console.log(error.response.data);
            //                 me.errorMessage = error.response.data.error;
            //         })
            //     }
            //     if(this.incidencies_has_recursos2.recursos_id != ''){
            //         this.incidencies_has_recursos2.incidencies_id = this.incidencia.id;
            //         axios
            //             .post('/incidencies_has_recursos', me.incidencies_has_recursos2)
            //             .then(function(response){
            //                 console.log(response);
            //             }).catch(function(error){
            //                 console.log(error.response.status);
            //                 console.log(error.response.data);
            //                 me.errorMessage = error.response.data.error;
            //         })
            //     }
            //     if(this.incidencies_has_recursos3.recursos_id != ''){
            //         this.incidencies_has_recursos3.incidencies_id = this.incidencia.id;
            //         axios
            //             .post('/incidencies_has_recursos', me.incidencies_has_recursos3)
            //             .then(function(response){
            //                 console.log(response);
            //             }).catch(function(error){
            //                 console.log(error.response.status);
            //                 console.log(error.response.data);
            //                 me.errorMessage = error.response.data.error;
            //         })                }
            //     if(this.incidencies_has_recursos4.recursos_id != ''){
            //         this.incidencies_has_recursos4.incidencies_id = this.incidencia.id;
            //         axios
            //             .post('/incidencies_has_recursos', me.incidencies_has_recursos4)
            //             .then(function(response){
            //                 console.log(response);
            //             }).catch(function(error){
            //                 console.log(error.response.status);
            //                 console.log(error.response.data);
            //                 me.errorMessage = error.response.data.error;
            //         })
            //     }
            //     if(this.incidencies_has_recursos5.recursos_id != ''){
            //         this.incidencies_has_recursos5.incidencies_id = this.incidencia.id;
            //         axios
            //             .post('/incidencies_has_recursos', me.incidencies_has_recursos5)
            //             .then(function(response){
            //                 console.log(response);
            //             }).catch(function(error){
            //                 console.log(error.response.status);
            //                 console.log(error.response.data);
            //                 me.errorMessage = error.response.data.error;
            //         })
            //     }
            //     if(this.incidencies_has_recursos6.recursos_id != ''){
            //         this.incidencies_has_recursos6.incidencies_id = this.incidencia.id;
            //         axios
            //             .post('/incidencies_has_recursos', me.incidencies_has_recursos6)
            //             .then(function(response){
            //                 console.log(response);
            //             }).catch(function(error){
            //                 console.log(error.response.status);
            //                 console.log(error.response.data);
            //                 me.errorMessage = error.response.data.error;
            //         })
            //     }

            // }


        },

        created() {
        this.selectAll();
        },
    }
</script>
