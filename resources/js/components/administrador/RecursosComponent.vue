<template>
    <main>
        <div class="card mt-3 mb-3">
            <div class="card-body">
                <h5 class="card-title" id="titol_form">Recursos</h5>

                <div class="form-inline my-2 my-lg-0" style="margin-left: 40%;">
                    <button class="btn btn-outline-success my-2 my-sm-0 ml-2" type="button" id="boto_filtres"><i class="far fa-filter" @click="filtres"> Filtres</i></button>
                </div>


                <div v-if="recursos.length == 0" class="alert alert-light mt-2" role="alert">
                    No hi ha cap Recurs.
                </div>
                    <table v-else class="table mt-2">
                        <thead>
                            <tr>
                                <th scope="col">Codi</th>
                                <th scope="col">Actiu</th>
                                <th scope="col">Tipus recurs</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="recurso in recursos" :key="recurso.id">
                                <td>{{ recurso.codi }}</td>
                                <td v-if="recurso.actiu == 0">No Actiu</td>
                                 <td v-else>Actiu</td>
                                <div v-for="tipusRecurs in tipusRecursos" :key="tipusRecurs.id">
                                    <td v-if="recurso.tipus_recursos_id == tipusRecurs.id">
                                            {{ tipusRecurs.tipus }}
                                    </td>
                                </div>
                                <td>
                                    <button type="button" id="botones" class="btn btn-danger btn-sm float-right" @click="confirmarDelete(recurso)"><i class="far fa-trash-alt"></i> Esborrar</button>
                                    <button type="button" class="btn btn-secondary btn-sm mr-1 float-right" @click="editRecurs(recurso)"><i class="far fa-edit"></i> Editar</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
            </div>
        </div>

        <a @click="crearRecurs()" id="botoCrear"><i class="far fa-plus-circle fa-3x"></i></a>

        <!-- Modal Borrar-->
        <div class="modal fade" id="modalBorrar" tabindex="-1" role="dialog" aria-labelledby="modalBorrarLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Esborrar Recurs</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Estas segur d'esborrar el recurs {{ recurso.codi }} ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Tancar</button>
                        <button type="button" id="botonBorrar" class="btn btn-danger btn-sm" @click="borrarRecurs()"><i class="far fa-trash-alt"></i> Esborrar</button>
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
                            <div class="form-group row ml-5">

                                <label for="tipus_recursos" class="col-sm-3 col-form-label ml-5">Tipus de recurs</label>
                                <div class="col-sm-5">
                                    <select name="tipus_recursos" id="tipus_recursos" class="custom-select" v-model="recurso.tipus_recursos_id">
                                        <option v-if="insert" selected disabled>Seleccionar...</option>
                                        <option v-for="tipusRecurso in tipusRecursos" :key="tipusRecurso.id" v-bind:value="tipusRecurso.id">{{ tipusRecurso.tipus }}</option>
                                    </select>
                                </div>

                            </div>
                            <div class="form-group row ml-3">

                                <label for="codi" class="col-sm-3 col-form-label" >Codi del recurs</label>
                                <div class="col-sm-3">
                                    <input type="text" name="codi" class="form-control" id="codi" placeholder= "Codi" v-model="recurso.codi">
                                </div>

                                <label for="actiu" class="col-sm-1 col-form-label ml-5">Actiu</label>
                                <div class="col-sm-1 mt-2">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="actiu" name="actiu" v-model="recurso.actiu">
                                        <label class="custom-control-label" for="actiu"></label>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Tancar</button>
                        <button v-if="insert" type="button" id="botonBorrar" class="btn btn-danger btn-sm" @click="insertRecurs()">Afegir</button>
                        <button v-else type="button" id="botonBorrar" class="btn btn-danger btn-sm" @click="updateRecurs()">Modificar</button>
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
                            <label for="idRecurs" class="col-sm-6 col-form-label ml-5">Filtrar pel codi del recurs <br><h7 style="font-size: 11px">(si filtres per codi els altres filtres no es podràn aplicar)</h7></label>
                            <input type="text" class="form-control col-sm-5" aria-label="Introdueix el codi del recurs" v-model="codiRecurs" placeholder= "Codi del Recurs">
                        </div>
                        <div class="form-group row ml-3">
                            <label for="tipus_recursos" class="col-sm-6 col-form-label ml-5">Filtrar pel tipus de recurs</label>
                            <select class="col-sm-5 custom-select" v-if="codiRecurs ==''" name="tipus_recursos" id="tipus_recursos" v-model="idTipusRecurs">
                                <option  selected value=''>Seleccionar Tots</option>
                                <option v-for="tipusRecurso in tipusRecursos" :key="tipusRecurso.id" v-bind:value="tipusRecurso.id">{{ tipusRecurso.tipus }}</option>
                            </select>
                            <select class="col-sm-5 custom-select" v-else disabled name="tipus_recursos" id="tipus_recursos" v-model="idTipusRecurs">
                            </select>
                        </div>
                        <div class="form-group row ml-3">
                            <label for="tipus_recursos" class="col-sm-6 col-form-label ml-5">Filtrar per actiu</label>
                            <select class="col-sm-5 custom-select" v-if="codiRecurs ==''" name="tipus_recursos" id="tipus_recursos" v-model="actiu">
                                <option  selected value=''>Seleccionar Tots</option>
                                <option  selected value= 1>Actius</option>
                                <option  selected value= 0>No Actiu</option>
                            </select>
                            <select class="col-sm-5 custom-select" v-else disabled name="tipus_recursos" id="tipus_recursos" v-model="actiu">
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tancar</button>
                    <button type="button" class="btn btn-danger btn-sm"><i class="far fa-filter" @click="aplicarFiltres(codiRecurs, idTipusRecurs, actiu)">Aplicar Filtres</i></button>
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
                buscador:'',
                actiu:'',
                idTipusRecurs:'',
                codiRecurs:'',
                setTimeoutBuscador:'',
                recursos: [],
                recurso: {
                    id: '',
                    codi: '',
                    actiu: '',
                    tipus_recursos_id: ''
                },
                recursVacio: {
                    id: '',
                    codi: '',
                    actiu: '',
                    tipus_recursos_id: ''
                },
                tipusRecursos: [],
                insert: false
            }

        },
        methods: {
            selectRecursos(){
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
                let me2 = this;
                axios
                .get('/recursos', {params:{
                idTipusRecurs: this.idTipusRecurs,
                actiu: this.actiu,
                codiRecurs: this.codiRecurs
                }})
                .then(response => {
                    me2.recursos = response.data;
                })
                .catch(error => {
                    console.log(error)
                    this.errored = true;
                })
                .finally(() => this.loading = false)

            },
            crearRecurs(){
                this.insert = true;
                this.recurso = this.recursVacio;
                $('#modalRecurs').modal('show')
            },
            insertRecurs(){
                let me = this;
                axios
                    .post('/recursos', me.recurso)
                    .then(function(response){
                        me.selectRecursos();
                        $('#modalRecurs').modal('hide');
                    }).catch(function(error){
                        me.errorMessage = error.response.data.error;
                    })
            },
            editRecurs(recurso){
                this.insert = false;
                this.recurso = recurso;
                $('#modalRecurs').modal('show')
            },
            updateRecurs(){
                let me = this;
                axios
                    .put('/recursos/'+ me.recurso.id, me.recurso)
                    .then(function(response){
                        me.selectRecursos();
                        $('#modalRecurs').modal('hide');
                    }).catch(function(error){
                        me.errorMessage = error.response.data.error;
                    })
            },
            confirmarDelete(recurso){
                this.recurso = recurso;
                $('#modalBorrar').modal('show')
            },
            borrarRecurs(){
                let me = this;
                axios
                    .delete('/recursos/'+ me.recurso.id)
                    .then(function(response){
                        me.infoMessage = response.data.missatge;
                        me.selectRecursos();
                        $('#modalBorrar').modal('hide'); // CERRAR MODAL
                    }).catch(function(error){
                        me.errorMessage = error.response.data.error;
                        $('modalBorrar').modal('hide');
                    })
            },
            filtres(){
                $('#modalFiltres').modal('show')
            },
            aplicarFiltres(codiRecurs, idTipusRecurs, actiu){
                this.codiRecurs = codiRecurs;
                this.idTipusRecurs = idTipusRecurs;
                this.actiu = actiu;
                this.selectRecursos();
                $('#modalFiltres').modal('hide');
            }
        },
        created(){
            this.selectRecursos();
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>


