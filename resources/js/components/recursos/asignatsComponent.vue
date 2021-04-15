<template>
    <main>
        <div class="card mt-3">
            <div class="card-body mt-1">
                <h5 class="card-title" id="titol_incidencies">incidencies asignades</h5>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Buscar Incidencia" aria-label="Buscar Incidencia">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fal fa-search"> Buscar</i></button>
                </form>
                <table class="table mt-2">
                    <thead>
                        <tr>
                            <th scope="col">Numero</th>
                            <th scope="col">Telefon</th>
                            <th scope="col">Data</th>
                            <th scope="col">Hora</th>
                            <th scope="col">Descripcio</th>

                            <th></th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="incidencia in incidencies" :key="incidencia.id">

                        <!-- <div v-if="user_id == incidencia.usuaris_id"> -->
                            <td v-if="user_id == incidencia.usuaris_id">{{ incidencia.num_incident }}</td>
                            <td v-if="user_id == incidencia.usuaris_id">{{ incidencia.telefon_alertant }}</td>
                            <td v-if="user_id == incidencia.usuaris_id">{{ incidencia.data }}</td>
                            <td v-if="user_id == incidencia.usuaris_id">{{ incidencia.hora }}</td>
                            <td v-if="user_id == incidencia.usuaris_id">{{ incidencia.descripcio }}</td>
                            <td v-if="user_id == incidencia.usuaris_id">
                                <button type="submit" class="btn btn-secondary btn-sm" @click="mostrarIncidencia(incidencia)"><i class="far fa-edit"></i> Mostrar</button>
                                <button type="submit" class="btn btn-primary btn-sm" @click="mostrarIncidencia(incidencia)"><i class="far fa-edit"></i> Mostrar</button>
                            </td>
                        <!-- </div> -->
                        </tr>


                    </tbody>
                </table>
            </div>

        </div>
                <!-- Modal Editar -->
        <div class="modal fade" id="modalEditarIncidencia" tabindex="-1" role="dialog" aria-labelledby="modalBorrarLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="AlertantModalLabel">Editar Incidencia</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
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
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Tancar</button>
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
                        <form>
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
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Tancar</button>
                    </div>
                </div>
            </div>
        </div>

    </main>
</template>

<script>
    export default {
        props:{
            user_id:{
                type: Number,
                require: true,
            }
        },
        data() {
        return{
            incidencies:[],
            tipusIncidencies:[],
            usuaris:[],
            municipis:[],
            alertants:[],
            recursos:[],
            recursosIncidencia:[],
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
                usuaris_id:''
            }
        }
    },
    methods:{
         selectIncidencies(){
            let me= this;
            axios
            .get('/incidencies')
            .then(response => {
                me.incidencies = response.data;
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
        },
        editIncidencia(incidencia){
                this.incidencia = incidencia;
                $('#modalIncidencia').modal('show')
            },
         updateIncidencia(){
                let me = this;
                axios
                    .put('/incidencies/'+ me.incidencia.id, me.incidencia)
                    .then(function(response){
                        me.selectIncidencies();
                        $('#modalEditarIncidencies').modal('hide');

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
                $('#modalMostrarIncidencia').modal('show')
            }
    },
        created(){
            this.selectIncidencies();
            this.selectUsuaris();
            this.selectRecursos();
        },
        mounted() {
            console.log('Component mounted.')
            console.log(this.user_id);

        }
    }

</script>

