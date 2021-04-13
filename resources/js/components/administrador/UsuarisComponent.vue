<template>
    <main>
        <div class="card mt-3">
            <div class="card-body mt-1">
                <h5 class="card-title" id="titol_usuaris">Usuaris</h5>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Buscar Usuari" aria-label="Buscar Usuari">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fal fa-search"> Buscar</i></button>
                </form>
                <table class="table mt-2">
                    <thead>
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Cognoms</th>
                            <th scope="col">Nom d'Usuari</th>
                            <th scope="col">Email</th>
                            <th scope="col">Rol</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="usuari in usuaris" :key="usuari.id">
                            <td>{{ usuari.nom }}</td>
                            <td>{{ usuari.cognoms }}</td>
                            <td>{{ usuari.username }}</td>
                            <td>{{ usuari.email }}</td>
                            <div v-for="rol in rols" :key="rol.id">
                                <td v-if="usuari.rols_id == rol.id">
                                        {{ rol.nom }}
                                </td>
                            </div>
                        </tr>
                    </tbody>
                </table>
            </div>
            <a @click="insertUsuari()" id="botoCrear"><i class="far fa-plus-circle fa-3x"></i></a>
        </div>

        <!-- Modal Insert/Update -->
        <div class="modal fade" id="modalUsuari" tabindex="-1" role="dialog" aria-labelledby="modalBorrarLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="UsuariModalLabel">Usuari</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                        <div class="form-group row">
                            <label for="sigles" class="col-sm-1 col-form-label">Sigles</label>
                            <div class="col-sm-11">
                                <input type="text" class="form-control" id="sigles" name="sigles" v-model="curs.sigles" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nom" class="col-sm-1 col-form-label">Nom</label>
                            <div class="col-sm-11">
                                <input type="text" class="form-control" id="nom" name="nom" v-model="curs.nom">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cicle" class="col-sm-1 col-form-label">Cicle</label>
                            <div class="col-sm-11">
                                <select class="form-control" id="cicle" name="cicle" v-model="curs.cicles_id">
                                    <option v-for="cicle in cicles" :key="cicle.id" v-bind:value="cicle.id"> {{ cicle.nom   }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="actiu" class="col-sm-1 col-form-label">Actiu</label>
                            <div class="col-sm-11">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="actiu" name="actiu" v-model="curs.actiu">
                                    <label class="custom-control-label" for="actiu"></label>
                                </div>
                            </div>
                        </div>

                    </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Tancar</button>
                        <button v-if="insert" type="button" id="botonBorrar" class="btn btn-danger btn-sm" @click="insertCurs()">Afegir</button>
                        <button v-else type="button" id="botonBorrar" class="btn btn-danger btn-sm" @click="updateCurs()">Modificar</button>
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
                usuaris: [],
                rols: []
            }
        },
        methods: {
            selectUsuaris(){
                let me = this;
                axios
                    .get('/usuaris')
                    .then(response => {
                        me.usuaris = response.data;
                    })
                    .catch(error => {
                        console.log(error)
                        this.errored = true;
                    })
                    .finally(() => this.loading = false)
                let me2 = this;
                axios
                    .get('/rols')
                    .then(response => {
                        me2.rols = response.data;
                    })
                    .catch(error => {
                        console.log(error)
                        this.errored = true;
                    })
            }
        },
        created(){
            this.selectUsuaris();
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
