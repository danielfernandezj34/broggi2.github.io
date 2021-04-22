<template>
    <main>
        <div class="card mt-3 mb-3">
            <div class="card-body mt-1">
                <h5 class="card-title" id="titol_form">Taula d'Alertants</h5>
                <form class="form-inline my-2 my-lg-0" style="margin-left: 40%;">
                    <button class="btn btn-outline-success my-2 my-sm-0 ml-2" type="button" id="boto_filtres"><i class="far fa-filter" @click="filtres"> Filtres</i></button>
                </form>
                <div v-if="alertants.length == 0" class="alert alert-light mt-2" role="alert">
                    No hi ha cap Alertant.
                </div>
                <table v-else class="table mt-2">
                    <thead>
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Telèfon</th>
                            <th scope="col">Tipus d'alertant</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="alertant in alertants" :key="alertant.id">
                            <td>{{ alertant.nom }}</td>
                            <td>{{ alertant.telefon }}</td>
                            <div v-for="tipus_alertant in tipus_alertants" :key="tipus_alertant.id">
                                <td v-if="alertant.tipus_alertants_id == tipus_alertant.id">
                                        {{ tipus_alertant.tipus }}
                                </td>
                            </div>
                            <td>
                                <button type="submit" class="btn btn-primary btn-sm" @click="mostrarAlertant(alertant)"><i class="fas fa-eye"></i></button>
                                <button type="submit" class="btn btn-secondary btn-sm ml-1" @click="editAlertant(alertant)"><i class="far fa-edit"></i> Editar</button>
                                <button type="submit" id="botones" class="btn btn-danger btn-sm ml-1" @click="confirmarDelete(alertant)"><i class="far fa-trash-alt"></i> Esborrar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <nav aria-label="Page navigation example" class="ml-5">
                    <ul class="pagination">
                        <li class="page-item" :class="{disabled: meta_alertant.from == meta_alertant.current_page}">
                            <a class="page-link"  aria-label="Previous"  @click="paginar(pagina)">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item" :class="{active: pagina == meta_alertant.current_page}" v-for="(pagina, index) in paginas" :key="index"><a class="page-link" v-text="pagina" @click="paginar(pagina)"></a></li>
                        <li class="page-item" :class="{disabled: meta_alertant.last_page == meta_alertant.current_page}">
                            <a class="page-link" aria-label="Next" @click="paginar(pagina)">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <a @click="crearAlertant()" id="botoCrear"><i class="far fa-plus-circle fa-3x"></i></a>

        <!-- Modal Borrar-->
        <div class="modal fade" id="modalBorrar" tabindex="-1" role="dialog" aria-labelledby="modalBorrarLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Esborrar Alertant</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Estas segur d'esborrar l'alertant {{ alertant.nom }} ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Tancar</button>
                        <button type="button" id="botonBorrar" class="btn btn-danger btn-sm" @click="borrarAlertant()"><i class="far fa-trash-alt"></i> Esborrar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Insert/Update -->
        <div class="modal fade" id="modalAlertant" tabindex="-1" role="dialog" aria-labelledby="modalBorrarLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 v-if="insert" class="modal-title" id="AlertantModalLabel">Introduir Alertant</h5>
                        <h5 v-else class="modal-title" id="AlertantModalLabel">Modificar Alertant</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>

                            <div class="form-group row">
                                <label for="nom" class="col-sm-3 col-form-label" >Nom</label>
                                <div class="col-sm-9">
                                    <input v-if="insert" type="text" name="nom" class="form-control" id="nom" placeholder="Nom" v-model="alertant.nom">
                                    <input v-else type="text" name="nom" class="form-control" id="nom"  v-model="alertant.nom">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cognoms" class="col-sm-3 col-form-label" >Cognoms</label>
                                <div class="col-sm-3">
                                    <input v-if="insert" type="nom" name="cognoms" class="form-control" id="cognoms" placeholder="Cognoms" v-model="alertant.cognoms">
                                    <input v-else type="nom" name="cognoms" class="form-control" id="cognoms" v-model="alertant.cognoms">
                                </div>

                                <label for="telefon" class="col-sm-3 col-form-label" >Telefon de l'Alertant</label>
                                <div class="col-sm-3">
                                    <input v-if="insert" type="tel" name="telefon" class="form-control" id="telefon" v-model="alertant.telefon" placeholder="Exemple: 612345678" maxlength="9" pattern="[0-9]{9}">
                                    <input v-else type="tel" name="telefon" class="form-control" id="telefon" v-model="alertant.telefon" maxlength="9" pattern="[0-9]{9}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="adreca" class="col-sm-3 col-form-label" >Adreça</label>
                                <div class="col-sm-9">
                                    <input v-if="insert" type="text" name="adreca" class="form-control" id="adreca" placeholder="Exemple, 201" v-model="alertant.adreca">
                                    <input v-else type="text" name="adreca" class="form-control" id="adreca" v-model="alertant.adreca">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tipus_alertant" class="col-sm-3 col-form-label" >Tipus d'Alertant</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="tipus_alertant" name="tipus_alertant" v-model="alertant.tipus_alertants_id">
                                        <option v-if="insert" selected disabled>Seleccionar...</option>
                                        <option v-for="tipus_alertant in tipus_alertants" :key="tipus_alertant.id" v-bind:value="tipus_alertant.id">{{ tipus_alertant.tipus   }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="municipi" class="col-sm-3 col-form-label" >Municipi</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="municipi" name="municipi" v-model="alertant.municipis_id">
                                        <option v-if="insert" selected disabled>Seleccionar...</option>
                                        <option v-for="municipi in municipis" :key="municipi.id" v-bind:value="municipi.id">{{ municipi.nom   }}</option>
                                    </select>
                                </div>

                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Tancar</button>
                        <button v-if="insert" type="button" id="botonBorrar" class="btn btn-danger btn-sm" @click="insertAlertant()">Afegir</button>
                        <button v-else type="button" id="botonBorrar" class="btn btn-danger btn-sm" @click="updateAlertant()">Modificar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Mostrar -->
        <div class="modal fade" id="modalMostrarAlertant" tabindex="-1" role="dialog" aria-labelledby="modalBorrarLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="AlertantModalLabel">Mostrar Alertant</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>

                            <div class="form-group row">
                                <label for="nom" class="col-sm-3 col-form-label" >Nom</label>
                                <div class="col-sm-9">
                                    <input type="text" name="nom" class="form-control" id="nom" v-model="alertant.nom" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="cognoms" class="col-sm-3 col-form-label" >Cognoms</label>
                                <div class="col-sm-3">
                                    <input type="text" name="cognoms" class="form-control" id="cognoms" v-model="alertant.cognoms" disabled>
                                </div>

                                <label for="telefon_alertant" class="col-sm-3 col-form-label" >Telefon de l'Alertant</label>
                                <div class="col-sm-3">
                                    <input type="tel" name="telefon_alertant" class="form-control" id="telefon_alertant" v-model="alertant.telefon" maxlength="9" pattern="[0-9]{9}" disabled>
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="adreca" class="col-sm-3 col-form-label" >Adreça</label>
                                <div class="col-sm-9">
                                    <input type="text" name="adreca" class="form-control" id="adreca" v-model="alertant.adreca" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tipus_alertant" class="col-sm-3 col-form-label" >Tipus d'Alertant</label>
                                <div class="col-sm-9">
                                    <div v-for="tipus_alertant in tipus_alertants" :key="tipus_alertant.id">
                                        <input v-if="tipus_alertant.id == alertant.tipus_alertants_id" type="text" name="tipus_alertant" class="form-control" id="tipus_alertant" v-model="tipus_alertant.tipus" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="municipi" class="col-sm-3 col-form-label" >Municipi</label>
                                <div class="col-sm-9">
                                    <div v-for="municipi in municipis" :key="municipi.id">
                                        <input v-if="municipi.id == alertant.municipis_id" type="text" name="tipus_alertant" class="form-control" id="tipus_alertant" v-model="municipi.nom" disabled>
                                    </div>
                                </div>
                            </div>

                        </form>
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
                            <label for="nomAlertant" class="col-sm-6 col-form-label ml-5">Filtrar pel nom<br><h5 style="font-size: 11px">(si filtres pel nom els altres filtres no es podràn aplicar)</h5></label>
                            <input type="text" class="form-control col-sm-5" aria-label="Introdueix el nom de l'alertant" v-model="nomAlertant" placeholder= "Nom de l'Alertant">
                        </div>
                        <div class="form-group row ml-3">
                            <label for="tipus_alertant" class="col-sm-6 col-form-label ml-5">Filtrar pel tipus d'alertant</label>
                            <select class="col-sm-5 custom-select" v-if="nomAlertant ==''" name="tipus_alertant" id="tipus_alertant" v-model="idTipusAlertant">
                                <option  selected value=''>Seleccionar Tots</option>
                                <option v-for="tipus_alertant in tipus_alertants" :key="tipus_alertant.id" v-bind:value="tipus_alertant.id">{{ tipus_alertant.tipus }}</option>
                            </select>
                            <select class="col-sm-5 custom-select" v-else disabled name="tipus_alertants" id="tipus_alertants" v-model="idTipusAlertant">
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tancar</button>
                    <button type="button" class="btn btn-danger btn-sm"><i class="far fa-filter" @click="aplicarFiltres(nomAlertant, idTipusAlertant)">Aplicar Filtres</i></button>
                </div>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
    export default {

        data() {
            return{
                alertants: [],
                nomAlertant: '',
                idTipusAlertant: '',
                alertant:{
                    id: '',
                    telefon: '',
                    nom: '',
                    cognoms: '',
                    adreca: '',
                    municipis_id: '',
                    tipus_alertants_id: ''
                },
                alertantVacio:{
                    id: '',
                    telefon: '',
                    nom: '',
                    cognoms: '',
                    adreca: '',
                    municipis_id: '',
                    tipus_alertants_id: ''
                },
                tipus_alertants: [],
                municipis: [],
                insert: false,
                pagina: "",
                meta_alertant: {},
                paginas: []

            }

        },
        methods: {
            selectAlertants(){
                let me = this;
                axios
                    .get('/paginate_alertants', {params:{
                        nomAlertant: this.nomAlertant,
                        idTipusAlertant : this.idTipusAlertant

                    }})
                    .then(response => {
                        me.alertants = response.data.data;
                        me.meta_alertant = response.data.meta;

                        for (let index = 0; index < me.meta_alertant.last_page; index++) {
                            me.paginas[index] = index + 1;
                        }
                    })
                    .catch(error => {
                        console.log(error)
                        this.errored = true;
                    })
                    .finally(() => this.loading = false)


                let me2 = this;
                axios
                    .get('/tipusAlertants')
                    .then(response => {
                        me2.tipus_alertants = response.data;
                    })
                    .catch(error => {
                        console.log(error)
                        this.errored = true;
                    })
            },
            paginar(pagina){
                let me = this;
                axios
                    .get('/paginate_alertants' + '?page=' + pagina)
                    .then(response => {
                        me.alertants = response.data.data;
                        me.meta_alertant = response.data.meta;
                    })
                    .catch(error => {
                        console.log(error)
                        this.errored = true;
                    })

                    .finally(() => this.loading = false)
            },
            selectMunicipis(){
                let me = this;
                axios
                    .get('/municipis')
                    .then(response => {
                        me.municipis = response.data;
                    })
                    .catch(error => {
                        console.log(error)
                        this.errored = true;
                    })
                    .finally(() => this.loading = false)
            },
            crearAlertant(){
                this.insert = true;
                this.alertant = this.alertantVacio;
                $('#modalAlertant').modal('show')
            },
            insertAlertant(){
                let me = this;
                axios
                    .post('/alertants', me.alertant)
                    .then(function(response){
                        me.selectAlertants();
                        $('#modalAlertant').modal('hide');
                    }).catch(function(error){
                        me.errorMessage = error.response.data.error;
                    })
            },
            editAlertant(alertant){
                this.insert = false;
                this.alertant = alertant;
                $('#modalAlertant').modal('show')
            },
            updateAlertant(){
                let me = this;
                axios
                    .put('/alertants/'+ me.alertant.id, me.alertant)
                    .then(function(response){
                        me.selectAlertants();
                        $('#modalAlertant').modal('hide');
                    }).catch(function(error){
                        me.errorMessage = error.response.data.error;
                    })
            },
            confirmarDelete(alertant){
                this.alertant = alertant;
                $('#modalBorrar').modal('show')
            },
            borrarAlertant(){
                let me = this;
                axios
                    .delete('/alertants/'+ me.alertant.id)
                    .then(function(response){
                        me.infoMessage = response.data.missatge;
                        me.selectAlertants();
                        $('#modalBorrar').modal('hide'); // CERRAR MODAL
                    }).catch(function(error){
                        me.errorMessage = error.response.data.error;
                        $('modalBorrar').modal('hide');
                    })
            },
            mostrarAlertant(alertant){
                this.alertant = alertant;
                $('#modalMostrarAlertant').modal('show')
            },
            filtres(){
                $('#modalFiltres').modal('show')
            },
            aplicarFiltres(nomAlertant, idTipusAlertant){
                this.nomAlertant = nomAlertant;
                this.idTipusAlertant = idTipusAlertant;
                this.selectAlertants();
                $('#modalFiltres').modal('hide');
            }
        },
        created(){
            this.selectAlertants();
            this.selectMunicipis();
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
