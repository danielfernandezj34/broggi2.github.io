<template>
    <main>
        <div class="card mt-3">
            <div class="card-body mt-1">
                <h5 class="card-title" id="titol_form">Helpbox</h5>
                <!-- <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Buscar Pregunta" aria-label="Buscar Pregunta">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fal fa-search"> Buscar</i></button>
                </form> -->
                <table class="table mt-2">
                    <thead>
                        <tr>
                            <th scope="col">Pregunta Espanyol</th>
                            <th scope="col">Pregunta Anglés</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="pregunta in helpbox" :key="pregunta.id">
                            <td>{{ pregunta.preguntaES }}</td>
                            <td>{{ pregunta.preguntaEN }}</td>
                            <td>
                                <button type="submit" class="btn btn-secondary btn-sm" @click="editPregunta(pregunta)"><i class="far fa-edit"></i> Editar</button>
                            </td>
                            <td>
                                <button type="submit" id="botones" class="btn btn-danger btn-sm" @click="confirmarDelete(pregunta)"><i class="far fa-trash-alt"></i> Esborrar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

        <a @click="crearPregunta()" id="botoCrear"><i class="far fa-plus-circle fa-3x"></i></a>

        <!-- Modal Borrar-->
        <div class="modal fade" id="modalBorrar" tabindex="-1" role="dialog" aria-labelledby="modalBorrarLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Esborrar Pregunta</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Estas segur d'esborrar la pregunta "{{ pregunta.preguntaES }}" ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Tancar</button>
                        <button type="button" id="botonBorrar" class="btn btn-danger btn-sm" @click="borrarPregunta()"><i class="far fa-trash-alt"></i> Esborrar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Insert/Update -->
        <div class="modal fade" id="modalPregunta" tabindex="-1" role="dialog" aria-labelledby="modalBorrarLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 v-if="insert" class="modal-title" id="PreguntaModalLabel">Introduir Pregunta</h5>
                        <h5 v-else class="modal-title" id="PreguntaModalLabel">Modificar Pregunta</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <label for="preguntaES" class="col-sm-4 col-form-label">Pregunta en Espanyol</label>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <input v-if="insert" type="text" id="preguntaES" name="preguntaES" class="form-control" v-model="pregunta.preguntaES">
                                    <input v-else type="text" name="preguntaES" id="preguntaES" class="form-control" v-model="pregunta.preguntaES">
                                </div>

                            </div>

                            <label for="preguntaEN" class="col-sm-4 col-form-label">Pregunta en Anglés</label>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <input v-if="insert" type="text" id="preguntaEN" name="preguntaEN" class="form-control" v-model="pregunta.preguntaEN">
                                    <input v-else type="text" name="preguntaEN" id="preguntaEN" class="form-control" v-model="pregunta.preguntaEN">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Tancar</button>
                        <button v-if="insert" type="button" id="botonBorrar" class="btn btn-danger btn-sm" @click="insertPregunta()">Afegir</button>
                        <button v-else type="button" id="botonBorrar" class="btn btn-danger btn-sm" @click="updatePregunta()">Modificar</button>
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
                helpbox: [],
                pregunta: {
                    id: '',
                    preguntaES: '',
                    preguntaEN: ''
                },
                preguntaVacia: {
                    id: '',
                    preguntaES: '',
                    preguntaEN: ''
                },
                insert: false
            }

        },
        methods: {
            selectPreguntes(){
                let me = this;
                axios
                    .get('/helpbox')
                    .then(response => {
                        me.helpbox = response.data;
                    })
                    .catch(error => {
                        console.log(error)
                        this.errored = true;
                    })
                    .finally(() => this.loading = false)
            },
            crearPregunta(){
                this.insert = true;
                this.pregunta = this.preguntaVacia;
                $('#modalPregunta').modal('show')
            },
            insertPregunta(){
                let me = this;
                axios
                    .post('/helpbox', me.pregunta)
                    .then(function(response){
                        me.selectPreguntes();
                        $('#modalPregunta').modal('hide');
                    }).catch(function(error){
                        me.errorMessage = error.response.data.error;
                    })
            },
            editPregunta(pregunta){
                this.insert = false;
                this.pregunta = pregunta;
                $('#modalPregunta').modal('show')
            },
            updatePregunta(){
                let me = this;
                axios
                    .put('/helpbox/'+ me.pregunta.id, me.pregunta)
                    .then(function(response){
                        me.selectPreguntes();
                        $('#modalPregunta').modal('hide');
                    }).catch(function(error){
                        me.errorMessage = error.response.data.error;
                    })
            },
            confirmarDelete(pregunta){
                this.pregunta = pregunta;
                $('#modalBorrar').modal('show')
            },
            borrarPregunta(){
                let me = this;
                axios
                    .delete('/helpbox/'+ me.pregunta.id)
                    .then(function(response){
                        me.infoMessage = response.data.missatge;
                        me.selectPreguntes();
                        $('#modalBorrar').modal('hide'); // CERRAR MODAL
                    }).catch(function(error){
                        me.errorMessage = error.response.data.error;
                        $('modalBorrar').modal('hide');
                    })
            },
        },
        created(){
            this.selectPreguntes();
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
