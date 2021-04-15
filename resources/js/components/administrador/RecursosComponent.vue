<template>
    <main>
        <div class="card mt-3 mb-3">

            <div class="card-header bg-primary text-white">
            <h5 class="card-title" id="titol_form">Recursos</h5>
            </div>

            <div class="card-body ">
                <form>
                    <table class="table mt-2">
                        <thead>
                            <tr>
                                <th scope="col">Codi</th>
                                <th scope="col">Actiu</th>
                                <th scope="col">Tipus recurs</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="recurs in recursos" :key="recurs.id">
                                <td>{{ recurs.codi }}</td>
                                <td>{{ recurs.actiu }}</td>
                                <div v-for="tipusRecurs in tipusRecursos" :key="tipusRecurs.id">
                                    <td v-if="recurs.tipus_recursos_id == tipusRecurs.id">
                                            {{ tipusRecurs.tipus }}
                                    </td>
                                </div>
                                <td>
                                    <button type="submit" class="btn btn-danger btn-sm float-right" @click="confirmarDelete(recurs)"><i class="far fa-trash-alt"></i> Esborrar</button>
                                    <button type="submit" id="botones" class="btn btn-secondary btn-sm mr-1 float-right" @click="editRecurs(recurs)"><i class="far fa-edit"></i> Editar</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- <div class="form-group row">
                        <label for="id_recurs" class="col-sm-3 col-form-label" id="id_recurs">Id del recurs</label>
                        <div class="col-sm-3">
                            <input type="number" name="id_recurs" class="form-control" id="id_recurs" placeholder= "Número d'Incidencia" min="0" disabled>
                        </div>

                        <label for="actiu" class="col-sm-1 col-form-label">Actiu</label>
                        <div class="col-sm-1 mt-2">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="actiu" name="actiu">
                                <label class="custom-control-label" for="actiu"></label>
                            </div>
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
                    </div> -->
                </form>
            </div>
        </div>
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
        <div class="modal fade" id="modalRecurs" tabindex="-1" role="dialog" aria-labelledby="modalBorrarLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 v-if="insert" class="modal-title" id="RecursModalLabel">Introduir Recurs</h5>
                        <h5 v-else class="modal-title" id="RecursModalLabel">Modificar Recurs</h5>
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

                                <label for="telefon_alertant" class="col-sm-3 col-form-label" >Telefon de l'Alertant</label>
                                <div class="col-sm-3">
                                    <input v-if="insert" type="tel" name="telefon_alertant" class="form-control" id="telefon_alertant" v-model="alertant.telefon" placeholder="Exemple: 612345678" maxlength="9" pattern="[0-9]{9}">
                                    <input v-else type="tel" name="telefon_alertant" class="form-control" id="telefon_alertant" v-model="alertant.telefon" maxlength="9" pattern="[0-9]{9}">
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
                                <div class="col-sm-9" v-if="insert">
                                    <select class="form-control" id="tipus_alertant" name="tipus_alertant" v-model="alertant.tipus_alertants_id">
                                        <option v-if="insert" selected disabled>Seleccionar...</option>
                                        <option v-for="tipus_alertant in tipus_alertants" :key="tipus_alertant.id" v-bind:value="tipus_alertant.id">{{ tipus_alertant.tipus   }}</option>
                                    </select>
                                </div>
                                <div class="col-sm-9" v-else>
                                    <select class="form-control" id="tipus_alertant" name="tipus_alertant" v-model="alertant.tipus_alertants_id">
                                        <option v-for="tipus_alertant in tipus_alertants" :key="tipus_alertant.id" v-bind:value="tipus_alertant.id">{{ tipus_alertant.tipus   }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="municipi" class="col-sm-3 col-form-label" >Municipi</label>
                                <div class="col-sm-9" v-if="insert">
                                    <select class="form-control" id="municipi" name="municipi" v-model="alertant.municipis_id">
                                        <option v-if="insert" selected disabled>Seleccionar...</option>
                                        <option v-for="municipi in municipis" :key="municipi.id" v-bind:value="municipi.id">{{ municipi.nom   }}</option>
                                    </select>
                                </div>
                                <div class="col-sm-9" v-else>
                                    <select class="form-control" id="municipi" name="municipi" v-model="alertant.municipis_id">
                                        <option v-if="insert" selected disabled>Seleccionar...</option>
                                        <option v-for="municipi in municipis" :key="municipi.id" v-bind:value="municipi.id">{{ municipi.nom   }}</option>
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
    </main>
</template>

<script>
    export default {
        data() {
            return{
                recursos: [],
                tipusRecursos: []
            }

        },
        methods: {
            selectRecursos(){
                let me = this;
                axios
                    .get('/recursos')
                    .then(response => {
                        me.recursos = response.data;
                    })
                    .catch(error => {
                        console.log(error)
                        this.errored = true;
                    })
                    .finally(() => this.loading = false)
            },
            selectTipusRecursos(){
                let me = this;
                axios
                    .get('/tipusRecursos')
                    .then(response => {
                        me.tipusRecursos = response.data;
                    })
                    .catch(error => {
                        console.log(error)
                        this.errored = true;
                    })
                    .finally(() => this.loading = false)
            }
        },
        created(){
            this.selectRecursos();
            this.selectTipusRecursos();
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
