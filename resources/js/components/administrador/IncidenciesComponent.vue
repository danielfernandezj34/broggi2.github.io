<template>
    <main>
        <div class="card mt-3">
            <div class="card-body mt-1">
                <div id="centrarElements">
                    <h5 class="card-title">Taula d'Incidencies</h5>
                </div>
                <div id="centrarElements">
                    <button class="btn btn-outline-success my-2 my-sm-0 ml-2" type="button" id="boto_filtres" @click="filtres"><i class="far fa-filter"></i> Filtres</button>
                </div>
                <div v-if="incidencies.length == 0" class="alert alert-light mt-2" role="alert">
                            No hi ha cap incidència.
                </div>
                <table v-else class="table mt-2">
                    <thead>
                        <tr>
                            <th scope="col">Número d'Incidència</th>
                            <th scope="col">Nom metge</th>
                            <th scope="col">Tipus d'Incidència</th>
                            <th scope="col">Administratiu</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="incidencia in incidencies" :key="incidencia.id">
                            <td>{{ incidencia.num_incident }}</td>
                            <td>{{ incidencia.nom_metge }}</td>
                            <div v-for="tipusIncidencia in tipusIncidencies" :key="tipusIncidencia.id">
                                <td v-if="tipusIncidencia.id == incidencia.tipus_incidencies_id">
                                    {{ tipusIncidencia.tipus }}
                                </td>
                            </div>
                            <td v-for="usuari in usuaris" :key="usuari.id">
                                <div v-if="usuari.id == incidencia.usuaris_id">
                                    {{ usuari.nom }} {{ usuari.cognoms }}
                                </div>
                            </td>
                            <td>
                                    <button type="submit" class="btn btn-primary btn-sm" @click="mostrarIncidencia(incidencia)"><i class="fas fa-eye"></i></button>
                                    <button type="submit" class="btn btn-secondary btn-sm ml-1" @click="editIncidencia(incidencia)"><i class="far fa-edit"></i> Editar</button>
                                    <button type="submit" id="botones" class="btn btn-danger btn-sm ml-1" @click="confirmarDelete(incidencia)"><i class="far fa-trash-alt"></i> Esborrar</button>
                                </td>
                        </tr>
                    </tbody>
                </table>
                <nav aria-label="Page navigation example" class="ml-5">
                    <ul class="pagination">
                        <li class="page-item" :class="{disabled: meta_incidencies.from == meta_incidencies.current_page}">
                            <a class="page-link"  aria-label="Previous"  @click="paginar(meta_incidencies.current_page - 1)">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item" :class="{active: pagina == meta_incidencies.current_page}" v-for="(pagina, index) in paginas" :key="index"><a class="page-link" v-text="pagina" @click="paginar(pagina)"></a></li>
                        <li class="page-item" :class="{disabled: meta_incidencies.last_page == meta_incidencies.current_page}">
                            <a class="page-link" aria-label="Next" @click="paginar(meta_incidencies.current_page + 1)">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- Modal Borrar-->
        <div class="modal fade" id="modalBorrar" tabindex="-1" role="dialog" aria-labelledby="modalBorrarLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Esborrar Incidència</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Estas segur d'esborrar l'incidència {{ incidencia.num_incident }} ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Tancar</button>
                        <button type="button" id="botonBorrar" class="btn btn-danger btn-sm" @click="borrarIncidencia()"><i class="far fa-trash-alt"></i> Esborrar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Update -->
        <div class="modal fade" id="modalIncidencia" tabindex="-1" role="dialog" aria-labelledby="modalBorrarLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="AlertantModalLabel">Modificar Incidencia</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>

                            <div class="form-group row">
                                <label for="telefon_alertant" class="col-sm-3 col-form-label" >Telèfon de l'Alertant</label>
                                <div class="col-sm-3">
                                    <input type="tel" name="telefon_alertant" class="form-control" id="telefon_alertant"  v-model="incidencia.telefon_alertant" maxlength="9" pattern="[0-9]{9}">
                                </div>
                                <label for="nom_metge" class="col-sm-3 col-form-label" >Nom del Metge</label>
                                <div class="col-sm-3">
                                    <input type="text" name="nom_metge" class="form-control" id="nom_metge" v-model="incidencia.nom_metge">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="adreca" class="col-sm-3 col-form-label" >Adreça</label>
                                <div class="col-sm-3">
                                    <input type="text" name="adreca" class="form-control" id="adreca" v-model="incidencia.adreca">
                                </div>
                                <label for="adreca_complement" class="col-sm-3 col-form-label" >Adreça Complementària</label>
                                <div class="col-sm-3">
                                    <input type="text" name="adreca_complement" class="form-control" id="adreca_complement" v-model="incidencia.adreca_complement">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tipus_incidencies_id" class="col-sm-3 col-form-label" >Tipus d'Incidència</label>
                                <div class="col-sm-3">
                                    <select class="form-control" id="tipus_incidencies_id" name="tipus_incidencies_id" v-model="incidencia.tipus_incidencies_id">
                                        <option v-for="tipusIncidencia in tipusIncidencies" :key="tipusIncidencia.id" v-bind:value="tipusIncidencia.id">{{ tipusIncidencia.tipus }}</option>
                                    </select>
                                </div>
                                 <label for="municipis_id" class="col-sm-3 col-form-label" >Municipi</label>
                                 <div class="col-sm-3">
                                    <select class="form-control" id="municipis_id" name="municipis_id" v-model="incidencia.municipis_id">
                                        <option v-for="municipi in municipis" :key="municipi.id" v-bind:value="municipi.id">{{ municipi.nom }}</option>
                                    </select>
                                 </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label for="descripcio">Descripció</label>
                                    <textarea class="form-control" name="descripcio" id="descripcio" rows="4"  v-model="incidencia.descripcio"></textarea>
                                </div>
                            </div>
                            <hr><hr>
                            <div class="form-group row">
                                <h5 class="modal-title ml-3" id="AlertantModalLabel">  Recursos Assignats</h5>
                            </div>
                            <div v-for="recursIncidencia in recursosIncidencia" :key="recursIncidencia.id">
                                <div class="form-group row">
                                    <label for="recursos_id" class="col-sm-2 col-form-label" >Id del Recurs</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="recursos_id" class="form-control" id="recursos_id"  v-model="recursIncidencia.pivot.recursos_id" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="prioritat" class="col-sm-2 col-form-label" >Prioritat</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="prioritat" class="form-control" id="prioritat"  v-model="recursIncidencia.pivot.prioritat">
                                    </div>
                                    <label for="desti" class="col-sm-2 col-form-label" >Destí</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="desti" class="form-control" id="desti"  v-model="recursIncidencia.pivot.desti">
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Tancar</button>
                        <button type="button" id="botonBorrar" class="btn btn-success btn-sm" @click="updateIncidencia()"><i class="far fa-check"></i> Modificar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Mostrar -->
        <div class="modal fade" id="modalMostrarIncidencia" tabindex="-1" role="dialog" aria-labelledby="modalBorrarLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="AlertantModalLabel">Mostrar Incidencia</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <div class="form-group row">
                                <label for="num_incident" class="col-sm-2 col-form-label">Número de l'incidència</label>
                                <div class="col-sm-4">
                                    <input type="number" name="num_incident" id="num_incident" class="form-control" placeholder="Número de l'incidència"  v-model="incidencia.num_incident" disabled>
                                </div>
                                <label for="usuaris_id" class="col-sm-2 col-form-label" >Nom de l'Administratiu</label>
                                <div class="col-sm-4">
                                    <div v-for="usuari in usuaris" :key="usuari.id">
                                        <input v-if="usuari.id == incidencia.usuaris_id" type="text" name="usuaris_id" class="form-control" id="usuaris_id"  v-model="usuari.nom" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="data" class="col-sm-2 col-form-label">Data</label>
                                <div class="col-sm-4">
                                    <input type="date" name="data" id="data" class="form-control" placeholder="Data de l'incidència"  v-model="incidencia.data" disabled>
                                </div>
                                <label for="hora" class="col-sm-2 col-form-label">Hora</label>
                                <div class="col-sm-4">
                                    <input type="time" name="hora" id="hora" class="form-control" placeholder="Hora de l'incidència"  v-model="incidencia.hora" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="adreca" class="col-sm-2 col-form-label">Adreça</label>
                                <div class="col-sm-4">
                                    <input type="text" name="adreca" id="adreca" class="form-control" v-model="incidencia.adreca" disabled>
                                </div>
                                <label for="adreca_complement" class="col-sm-2 col-form-label">Adreça Complementària</label>
                                <div class="col-sm-4">
                                    <input type="text" name="adreca_complement" id="adreca_complement" class="form-control" v-model="incidencia.adreca_complement" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nom_metge" class="col-sm-2 col-form-label" >Nom del Metge</label>
                                <div class="col-sm-4">
                                    <input type="text" name="nom_metge" class="form-control" id="nom_metge"  v-model="incidencia.nom_metge" disabled>
                                </div>
                                <label for="tipus_incidencies_id" class="col-sm-2 col-form-label" >Tipus d'Incidència</label>
                                <div class="col-sm-4">
                                    <div v-for="tipusIncidencia in tipusIncidencies" :key="tipusIncidencia.id">
                                        <input v-if="tipusIncidencia.id == incidencia.tipus_incidencies_id" type="text" name="tipus_incidencies_id" class="form-control" id="tipus_incidencies_id"  v-model="tipusIncidencia.tipus" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alertants_id" class="col-sm-2 col-form-label" >Nom de l'Alertant</label>
                                <div class="col-sm-4">
                                    <div v-for="alertant in alertants" :key="alertant.id">
                                        <input v-if="alertant.id == incidencia.alertants_id" type="text" name="alertants_id" class="form-control" id="alertants_id"  v-model="alertant.nom" disabled>
                                    </div>
                                </div>
                                <label for="municipis_id" class="col-sm-2 col-form-label" >Municipi</label>
                                <div class="col-sm-4">
                                    <div v-for="municipi in municipis" :key="municipi.id">
                                        <input v-if="municipi.id == incidencia.municipis_id" type="text" name="tipus_incidencies_id" class="form-control" id="tipus_incidencies_id"  v-model="municipi.nom" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label for="descripcio">Descripció</label>
                                    <textarea class="form-control" name="descripcio" id="descripcio" rows="4"  v-model="incidencia.descripcio" disabled></textarea>
                                </div>
                            </div>
                            <hr><hr>
                        </div>
                        <div>
                            <div class="form-group row">
                                 <h5 class="modal-title ml-3" id="AlertantModalLabel">  Afectats</h5>
                            </div>
                            <div v-for="afectat in afectats" :key="afectat.id">
                                <div class="form-group row">
                                    <label for="nom_afectat" class="col-sm-2 col-form-label" >Nom</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="nom_afectat" class="form-control" id="nom_afectat"  v-model="afectat.nom" disabled>
                                    </div>
                                    <label for="cognom_afectat" class="col-sm-2 col-form-label" >Cognoms</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="cognom_afectat" class="form-control" id="cognom_afectat"  v-model="afectat.cognoms" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tel_afectat" class="col-sm-2 col-form-label" >Telèfon</label>
                                    <div class="col-sm-4">
                                        <input type="tel" name="tel_afectat" class="form-control" id="tel_afectat"  v-model="afectat.telefon" disabled>
                                    </div>
                                    <label for="edat_afectat" class="col-sm-2 col-form-label" >Edat</label>
                                    <div class="col-sm-4">
                                        <input type="tel" name="edat_afectat" class="form-control" id="edat_afectat"  v-model="afectat.edat" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tel_afectat" class="col-sm-2 col-form-label" >Té cip</label>
                                    <div class="col-sm-4">
                                        <input v-if="afectat.te_cip" type="text" name="te_cip_afectat" class="form-control" id="te_cip_afectat" value="Sí" disabled>
                                        <input v-else type="text" name="te_cip_afectat" class="form-control" id="te_cip_afectat" value="No" disabled>
                                    </div>
                                    <label for="edat_afectat" class="col-sm-2 col-form-label" >Sexe</label>
                                    <div class="col-sm-4">
                                        <div v-for ="sexe in sexes" :key="sexe.id">
                                            <input v-if="afectat.sexes_id == sexe.id" type="text" name="sexe_afectat" class="form-control" id="sexe_afectat"  v-model="sexe.sexe" disabled>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <hr>
                        </div>
                        <div>
                            <div class="form-group row">
                                <h5 class="modal-title ml-3" id="AlertantModalLabel">  Recursos Assignats</h5>
                            </div>
                            <div v-for="recursIncidencia in recursosIncidencia" :key="recursIncidencia.id">
                                <div class="form-group row">
                                    <label for="recursos_id" class="col-sm-2 col-form-label" >Id del Recurs</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="recursos_id" class="form-control" id="recursos_id"  v-model="recursIncidencia.pivot.recursos_id" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="prioritat" class="col-sm-2 col-form-label" >Prioritat</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="prioritat" class="form-control" id="prioritat"  v-model="recursIncidencia.pivot.prioritat" disabled>
                                    </div>
                                    <label for="desti" class="col-sm-2 col-form-label" >Destí</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="desti" class="form-control" id="desti"  v-model="recursIncidencia.pivot.desti" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="hora_activacio" class="col-sm-2 col-form-label">Hora d'Activació</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="hora_activacio" id="hora_activacio" class="form-control"  v-model="recursIncidencia.pivot.hora_activacio" disabled>
                                    </div>
                                    <label for="hora_mobilitzacio" class="col-sm-2 col-form-label">Hora de Mobilització</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="hora_mobilitzacio" id="hora_mobilitzacio" class="form-control"  v-model="recursIncidencia.pivot.hora_mobilitzacio" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="hora_assistencia" class="col-sm-2 col-form-label">Hora d'Assistència</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="hora_assistencia" id="hora_assistencia" class="form-control"  v-model="recursIncidencia.pivot.hora_assistencia" disabled>
                                    </div>
                                    <label for="hora_transport" class="col-sm-2 col-form-label">Hora de Transport</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="hora_transport" id="hora_transport" class="form-control"  v-model="recursIncidencia.pivot.hora_transport" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="hora_arribada_hospital" class="col-sm-2 col-form-label">Hora d'Arribada a l'Hospital</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="hora_arribada_hospital" id="hora_arribada_hospital" class="form-control"  v-model="recursIncidencia.pivot.hora_arribada_hospital" disabled>
                                    </div>
                                    <label for="hora_transferencia" class="col-sm-2 col-form-label">Hora de Transferència</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="hora_transferencia" id="hora_transferencia" class="form-control"  v-model="recursIncidencia.pivot.hora_transferencia" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="hora_finalitzacio" class="col-sm-2 col-form-label">Hora de Finalització</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="hora_finalitzacio" id="hora_finalitzacio" class="form-control"  v-model="recursIncidencia.pivot.hora_finalitzacio" disabled>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Tancar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal filtres -->
        <div class="modal fade" id="modalFiltres" aria-labelledby="modalFiltresLabel" role="dialog" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Filtres</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group row ml-3">
                            <label for="codiIncidencia" class="col-sm-6 col-form-label ml-5">Filtrar pel codi de l'incidència <br><h5 style="font-size: 11px">(si filtres per codi els altres filtres no es podràn aplicar)</h5></label>
                            <input type="text" class="form-control col-sm-5" v-if="nomAdministratiu =='' && cognomsAdministratiu ==''" aria-label="Introdueix el codi de l'incidència" v-model="codiIncidencia" placeholder= "Codi de l'Incidència">
                            <input type="text" class="form-control col-sm-5" v-else disabled aria-label="Introdueix el codi de l'incidència" v-model="codiIncidencia" placeholder= "Codi de l'Incidència">
                        </div>
                         <div class="form-group row ml-3">
                            <label for="nomAdministratiu" class="col-sm-6 col-form-label ml-5">Filtrar pel nom de l'administratiu <br><h5 style="font-size: 11px">(si filtres pel nom els altres filtres no es podràn aplicar)</h5></label>
                            <input type="text" class="form-control col-sm-5" v-if="codiIncidencia =='' && cognomsAdministratiu ==''" aria-label="Filtrar pel nom de l'administratiu" v-model="nomAdministratiu" placeholder= "Nom de l'Administratiu" @keyup="buscarUsuaris">
                            <input type="text" class="form-control col-sm-5" v-else disabled aria-label="Filtrar pel nom de l'administratiu" v-model="nomAdministratiu" placeholder= "Nom de l'Administratiu">
                        </div>
                        <div class="form-group row ml-3">
                            <label for="cognomsAdministratiu" class="col-sm-6 col-form-label ml-5">Filtrar pels cognoms de l'administratiu <br><h5 style="font-size: 11px">(si filtres pels cognoms els altres filtres no es podràn aplicar)</h5></label>
                            <input type="text" class="form-control col-sm-5" v-if="codiIncidencia =='' && nomAdministratiu ==''" aria-label="Filtrar pels cognoms de l'administratiu" v-model="cognomsAdministratiu" placeholder= "Cognoms de l'Administratiu" @keyup="buscarUsuaris">
                            <input type="text" class="form-control col-sm-5" v-else disabled aria-label="Filtrar pels cognoms de l'administratiu" v-model="cognomsAdministratiu" placeholder= "Cognoms de l'Administratiu">
                        </div>
                        <div class="form-group row ml-3" v-if="nomAdministratiu != '' || cognomsAdministratiu != ''">
                            <label for="idAdministratiu" class="col-sm-6 col-form-label ml-5">Selecciona l'Administratiu</label>
                            <select class="col-sm-5 custom-select" name="idAdministratiu" id="idAdministratiu" v-model="idAdministratiu">
                                <option  selected disabled v-if="usuarisFiltrats.length ==0">No hi ha cap coincidència.</option>
                                <option v-for="usuariFiltrat in usuarisFiltrats" :key="usuariFiltrat.id" v-bind:value="usuariFiltrat.id">{{ usuariFiltrat.nom }} {{ usuariFiltrat.cognoms }}</option>
                            </select>
                        </div>
                        <div class="form-group row ml-3" v-else>
                            <label for="idAdministratiu" class="col-sm-6 col-form-label ml-5">Selecciona l'Administratiu <br><h5 style="font-size: 11px">(Escriu el nom o els cognoms de l'administratiu per iniciar la cerca)</h5></label>
                            <select class="col-sm-5 custom-select" disabled name="idAdministratiu" id="idAdministratiu" v-model="idAdministratiu">
                            </select>
                        </div>
                        <div class="form-group row ml-3">
                            <label for="tipus_incidencia" class="col-sm-6 col-form-label ml-5">Filtrar pel tipus d'Incidència <br><h5 style="font-size: 11px">(si filtres pel tipus els altres filtres no es podràn aplicar)</h5></label>
                            <select class="col-sm-5 custom-select" v-if="codiIncidencia =='' && nomAdministratiu == '' && cognomsAdministratiu ==''" name="tipus_incidencia" id="tipus_incidencia" v-model="idTipusIncidencia">
                                <option  selected value=''>Seleccionar Tots</option>
                                <option v-for="tipusIncidencia in tipusIncidencies" :key="tipusIncidencia.id" v-bind:value="tipusIncidencia.id">{{ tipusIncidencia.tipus }}</option>
                            </select>
                            <select class="col-sm-5 custom-select" v-else disabled name="tipus_incidencia" id="tipus_incidencia" v-model="idTipusIncidencia">
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Tancar</button>
                    <button type="button" class="btn btn-success btn-sm" @click="aplicarFiltres(codiIncidencia, idAdministratiu, idTipusIncidencia)"><i class="far fa-filter"></i> Aplicar Filtres</button>
                </div>
                </div>
            </div>
        </div>
    </main>
</template>

<script>

export default ({
    data() {
        return{
            buscador:'',
            setTimeoutBuscador:'',
            codiIncidencia:'',
            idAdministratiu:'',
            nomAdministratiu:'',
            cognomsAdministratiu:'',
            idTipusIncidencia:'',
            incidencies:[],
            tipusIncidencies:[],
            usuaris:[],
            usuarisFiltrats:[],
            municipis:[],
            alertants:[],
            recursos:[],
            recursosIncidencia:[],
            afectats:[],
            sexes:[],
            incidencia:{
                id:'',
                num_incident:'',
                data:'',
                hora:'',
                telefon_alertant:'',
                adreca:'',
                adreca_complement:'',
                descripcio:'',
                nom_metge:'',
                tipus_incidencies_id:'',
                alertants_id:'',
                municipis_id:'',
                usuaris_id:'',
                pagina: "",
                meta_incidencies: {},
                paginas: []
            }
        }

    },
    methods:{
         selectIncidencies(){
            let me= this;
            axios
            .get('/paginate_incidencies',{params:{
                codiIncidencia: this.codiIncidencia,
                idAdministratiu: this.idAdministratiu,
                idTipusIncidencia: this.idTipusIncidencia,
            }})
            .then(response => {
                me.incidencies = response.data.data;
                me.meta_incidencies = response.data.meta;
                me.paginas=[];
                for (let index = 0; index < me.meta_incidencies.last_page; index++) {
                    me.paginas[index] = index + 1;
                }
             })
                .catch(error => {
                console.log(error)
                this.errored = true;
             })
                .finally(() => this.loading = false)
            let me2= this;
            axios
            .get('/tipusIncidencies')
            .then(response => {
                me2.tipusIncidencies = response.data;
             })
                .catch(error => {
                console.log(error)
                this.errored = true;
             })
                .finally(() => this.loading = false)
            let me3= this;
            axios
            .get('/usuaris')
            .then(response => {
                me3.usuaris = response.data;
             })
                .catch(error => {
                console.log(error)
                this.errored = true;
             })
                .finally(() => this.loading = false)
            let me4= this;
            axios
            .get('/municipis')
            .then(response => {
                me4.municipis = response.data;
             })
                .catch(error => {
                console.log(error)
                this.errored = true;
             })
                .finally(() => this.loading = false)
            let me5= this;
            axios
            .get('/alertants')
            .then(response => {
                me5.alertants = response.data;
             })
                .catch(error => {
                console.log(error)
                this.errored = true;
             })
                .finally(() => this.loading = false)
            let me6= this;
            axios
            .get('/recursos')
            .then(response => {
                me6.recursos = response.data;
             })
                .catch(error => {
                console.log(error)
                this.errored = true;
             })
                .finally(() => this.loading = false)
            let me7= this;
            axios
            .get('/sexes')
            .then(response => {
                me7.sexes = response.data;
             })
                .catch(error => {
                console.log(error)
                this.errored = true;
             })
                .finally(() => this.loading = false)
        },
        filtrarUsuaris(){
            let me= this;
            axios
            .get('/usuaris',{params:{
                nom: this.nomAdministratiu,
                cognoms: this.cognomsAdministratiu
            }})
            .then(response => {
                me.usuarisFiltrats = response.data;
             })
                .catch(error => {
                console.log(error)
                this.errored = true;
             })
                .finally(() => this.loading = false)

        },
        paginar(pagina){
            let me = this;
            axios
                .get('/paginate_incidencies' + '?page=' + pagina,{params:{
                codiIncidencia: this.codiIncidencia,
                idAdministratiu: this.idAdministratiu,
                idTipusIncidencia: this.idTipusIncidencia,
            }})
                .then(response => {
                    me.incidencies = response.data.data;
                    me.meta_incidencies = response.data.meta;
                })
                .catch(error => {
                    console.log(error)
                    this.errored = true;
                })

                .finally(() => this.loading = false)
        },
        editIncidencia(incidencia){
                this.incidencia = incidencia;
                this.recursosIncidencia = incidencia.recursos;
                this.afectats = incidencia.afectats;
                $('#modalIncidencia').modal('show')
            },
         updateIncidencia(){
                let me = this;
                axios
                    .put('/incidencies/'+ me.incidencia.id, me.incidencia)
                    .then(function(response){
                        me.selectIncidencies();
                        $('#modalIncidencies').modal('hide');
                    }).catch(function(error){
                        me.errorMessage = error.response.data.error;
                    })
            },
            confirmarDelete(incidencia){
                this.incidencia = incidencia;
                $('#modalBorrar').modal('show')
            },
            borrarIncidencia(){
                let me = this;
                axios
                    .delete('/incidencies/'+ me.incidencia.id)
                    .then(function(response){
                        me.infoMessage = response.data.missatge;
                        me.selectIncidencies();
                        $('#modalBorrar').modal('hide'); // CERRAR MODAL
                    }).catch(function(error){
                        me.errorMessage = error.response.data.error;
                        $('modalBorrar').modal('hide');
                    })
            },
            mostrarIncidencia(incidencia){
                this.incidencia = incidencia;
                this.recursosIncidencia = incidencia.recursos;
                this.afectats = incidencia.afectats;
                $('#modalMostrarIncidencia').modal('show')
            },
             filtres(){
                $('#modalFiltres').modal('show')
            },
            aplicarFiltres(codiIncidencia, idAdministratiu, idTipusIncidencia){
                this.codiIncidencia = codiIncidencia;
                this.idAdministratiu = idAdministratiu;
                this.idTipusIncidencia = idTipusIncidencia;
                this.selectIncidencies();
                $('#modalFiltres').modal('hide');
            },
             buscarUsuaris(){
                clearTimeout(this.setTimeoutBuscador);
                this.setTimeoutBuscador = setTimeout(this.filtrarUsuaris, 250);
            }
    },
    created(){
       this.selectIncidencies();
    }
})
</script>
