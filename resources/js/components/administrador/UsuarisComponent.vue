<template>
    <main>
        <div class="card mt-3">
            <div class="card-body mt-1">
                <div id="centrarElements">
                    <h5 class="card-title">Taula d'Usuaris</h5>
                </div>
                <div id="centrarElements">
                    <button class="btn btn-outline-success my-2 my-sm-0 ml-2" type="button" id="boto_filtres" @click="filtres"><i class="far fa-filter"></i> Filtres</button>
                </div>
                <div v-if="usuaris.length == 0" class="alert alert-light mt-2" role="alert">
                            No hi ha cap usuari.
                </div>
                <table v-else class="table mt-2">
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
                            <td>
                                <button type="submit" class="btn btn-primary btn-sm" @click="mostrarUsuari(usuari)"><i class="fas fa-eye"></i></button>
                                <button type="submit" class="btn btn-secondary btn-sm" @click="editUsuari(usuari)"><i class="far fa-edit"></i> Editar</button>
                                <button type="submit" id="botones" class="btn btn-danger btn-sm ml-1" @click="confirmarDelete(usuari)"><i class="far fa-trash-alt"></i> Esborrar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <nav aria-label="Page navigation example" class="ml-5">
                    <ul class="pagination">
                        <li class="page-item" :class="{disabled: meta_usuaris.from == meta_usuaris.current_page}">
                            <a class="page-link"  aria-label="Previous"  @click="paginar(meta_usuaris.current_page - 1)">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item" :class="{active: pagina == meta_usuaris.current_page}" v-for="(pagina, index) in paginas" :key="index"><a class="page-link" v-text="pagina" @click="paginar(pagina)"></a></li>
                        <li class="page-item" :class="{disabled: meta_usuaris.last_page == meta_usuaris.current_page}">
                            <a class="page-link" aria-label="Next" @click="paginar(meta_usuaris.current_page + 1)">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

        </div>

        <a @click="crearUsuari()" id="botoCrear"><i class="far fa-plus-circle fa-3x"></i></a>

        <!-- Modal Borrar-->
        <div class="modal fade" id="modalBorrar" tabindex="-1" role="dialog" aria-labelledby="modalBorrarLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Esborrar Usuari</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Estas segur d'esborrar l'usuari {{ usuari.nom }} ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Tancar</button>
                        <button type="button" id="botonBorrar" class="btn btn-danger btn-sm" @click="borrarUsuari()"><i class="far fa-trash-alt"></i> Esborrar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Insert/Update -->
        <div class="modal fade" id="modalUsuari" tabindex="-1" role="dialog" aria-labelledby="modalBorrarLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 v-if="insert" class="modal-title" id="UsuariModalLabel">Introduir Usuari</h5>
                        <h5 v-else class="modal-title" id="UsuariModalLabel">Modificar Usuari</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group row">
                                <label for="nom" class="col-sm-2 col-form-label">Nom</label>
                                <div class="col-sm-4">
                                    <input type="text" name="nom" id="nom" class="form-control" v-model="usuari.nom">
                                </div>

                                <label for="cognoms" class="col-sm-2 col-form-label">Cognoms</label>
                                <div class="col-sm-4">
                                    <input type="text" name="cognoms" id="cognoms" class="form-control" v-model="usuari.cognoms">
                                </div>
                            </div>

                            <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" name="email" id="email" class="form-control" v-model="usuari.email">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="username" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-4">
                                    <input type="text" name="username" id="username" class="form-control" v-model="usuari.username" autofocus>
                                </div>

                                <label for="contrasenya" class="col-sm-2 col-form-label">Contrasenya</label>
                                <div class="col-sm-4">
                                    <input type="text" name="contrasenya" id="contrasenya" class="form-control" v-model="usuari.contrasenya">
                                </div>
                            </div>

                            <div class="form-group row" id="centrarElements">
                                <label for="rol" class="col-sm-2 col-form-label">Tipus de Rol</label>
                                <div class="form-check form-check-inline ml-3" v-for="rol in rols" :key="rol.id">
                                    <input class="form-check-input" type="radio" name="rol" :id="rol.id" :value="rol.id" v-model="usuari.rols_id">
                                    <label class="form-check-label" :for="rol.id">
                                        {{ rol.nom }}
                                    </label>
                                </div>
                            </div>

                            <div v-if="usuari.rols_id == 3" class="form-group row" id="centrarElements">
                                <label for="recurs" class="col-sm-2 col-form-label">Tipus de Recurs</label>
                                <div class="col-sm-7 mt-2">
                                    <select class="form-control" id="recurs" name="recurs" v-model="usuari.recursos_id">
                                        <option v-for="tipusRecurs in tipusRecursos" :key="tipusRecurs.id" v-bind:value="tipusRecurs.id">{{tipusRecurs.tipus}}</option>
                                    </select>
                                </div>
                            </div>
                            <div v-else style="visibility:hidden" disabled class="form-group row" >
                                <label for="recurs" class="col-sm-2 col-form-label" >Tipus de Recurs</label>
                                <div class="col-sm-7 mt-2">
                                    <select class="form-control" id="recurs" name="recurs" v-model="usuari.recursos_id">
                                        <option value="" selected> </option>
                                    </select>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Tancar</button>
                        <button v-if="insert" type="button" id="botonBorrar" class="btn btn-success btn-sm" @click="insertUsuari()"><i class="far fa-check"></i> Afegir</button>
                        <button v-else type="button" id="botonBorrar" class="btn btn-success btn-sm" @click="updateUsuari()"><i class="far fa-check"></i> Modificar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Mostrar -->
        <div class="modal fade" id="modalMostrarUsuari" tabindex="-1" role="dialog" aria-labelledby="modalBorrarLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="AlertantModalLabel">Mostrar Usuari</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group row">
                                <label for="nom" class="col-sm-2 col-form-label" >Nom</label>
                                <div class="col-sm-4">
                                    <input type="text" name="nom" class="form-control" id="nom" v-model="usuari.nom" disabled>
                                </div>
                                 <label for="cognoms" class="col-sm-2 col-form-label" >Cognoms</label>
                                <div class="col-sm-4">
                                    <input type="text" name="cognoms" class="form-control" id="cognoms" v-model="usuari.cognoms" disabled>
                                </div>
                            </div>

                             <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label" >Email</label>
                                <div class="col-sm-10">
                                    <input type="text" name="email" class="form-control" id="email" v-model="usuari.email" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="username" class="col-sm-2 col-form-label" >Username</label>
                                <div class="col-sm-4">
                                    <input type="text" name="username" class="form-control" id="username" v-model="usuari.username" disabled>
                                </div>
                                <label for="contrasenya" class="col-sm-2 col-form-label" >Contrasenya</label>
                                <div class="col-sm-4">
                                    <input type="text" name="contrasenya" class="form-control" id="contrasenya" v-model="usuari.contrasenya" disabled>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="rol" class="col-sm-2 col-form-label" >Rol</label>
                                <div class="col-sm-4">
                                    <div v-for="rol in rols" :key="rol.id">
                                        <input type="text" name="rol" v-if="usuari.rols_id == rol.id" class="form-control" id="rol" v-model="rol.nom" disabled>
                                    </div>
                                </div>
                                <label for="tipusRecurs" v-if="usuari.rols_id == 3" class="col-sm-2 col-form-label" >Tipus de recurs de l'usuari</label>
                                <div v-if="usuari.rols_id == 3" class="col-sm-4">
                                    <div v-for="tipusRecurs in tipusRecursos" :key="tipusRecurs.id">
                                        <input v-if="tipusRecurs.id == usuari.recursos_id" type="text" name="tipusRecurs" class="form-control" id="tipusRecurs" v-model="tipusRecurs.tipus" disabled>
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
                            <label for="nomUsuari" class="col-sm-6 col-form-label ml-5">Filtrar pel nom de l'usuari <br><h5 style="font-size: 11px">(si filtres pel nom els altres filtres no es podràn aplicar)</h5></label>
                            <input type="text" class="form-control col-sm-5" v-if="emailUsuari =='' && cognomsUsuari ==''" aria-label="Filtrar pel nom de l'usuari" v-model="nomUsuari" placeholder= "Nom de l'Usuari" @keyup="buscarUsuaris">
                            <input type="text" class="form-control col-sm-5" v-else disabled aria-label="Filtrar pel nom de l'usuari" v-model="nomUsuari" placeholder= "Nom de l'Usuari">
                        </div>
                        <div class="form-group row ml-3">
                            <label for="cognomsUsuari" class="col-sm-6 col-form-label ml-5">Filtrar pels cognoms de l'usuari <br><h5 style="font-size: 11px">(si filtres pels cognoms els altres filtres no es podràn aplicar)</h5></label>
                            <input type="text" class="form-control col-sm-5" v-if="emailUsuari =='' && nomUsuari ==''" aria-label="Filtrar pels cognoms de l'usuari" v-model="cognomsUsuari" placeholder= "Cognoms de l'Usuari" @keyup="buscarUsuaris">
                            <input type="text" class="form-control col-sm-5" v-else disabled aria-label="Filtrar pels cognoms de l'usuari" v-model="cognomsUsuari" placeholder= "Cognoms de l'Usuari">
                        </div>
                        <div class="form-group row ml-3">
                            <label for="emailUsuari" class="col-sm-6 col-form-label ml-5">Filtrar per l'email de l'usuari <br><h5 style="font-size: 11px">(si filtres per l'email els altres filtres no es podràn aplicar)</h5></label>
                            <input type="text" class="form-control col-sm-5" v-if="nomUsuari =='' && cognomsUsuari ==''" aria-label="Introdueix l'email de l'usuari" v-model="emailUsuari" placeholder= "Email de l'Usuari"  @keyup="buscarUsuaris">
                            <input type="text" class="form-control col-sm-5" v-else disabled aria-label="Introdueix l'email de l'usuari" v-model="emailUsuari" placeholder= "Email de l'Usuari">
                        </div>
                        <div class="form-group row ml-3" v-if="nomUsuari != '' || cognomsUsuari != '' || emailUsuari != ''">
                            <label for="idUsuari" class="col-sm-6 col-form-label ml-5">Selecciona l'Usuari</label>
                            <select class="col-sm-5 custom-select" name="idUsuari" id="idUsuari" v-model="idUsuari">
                                <option  selected disabled v-if="usuarisFiltrats.length ==0">No hi ha cap coincidència.</option>
                                <option v-for="usuariFiltrat in usuarisFiltrats" :key="usuariFiltrat.id" v-bind:value="usuariFiltrat.id">{{ usuariFiltrat.nom }} {{ usuariFiltrat.cognoms }}</option>
                            </select>
                        </div>
                        <div class="form-group row ml-3" v-else>
                            <label for="idUsuari" class="col-sm-6 col-form-label ml-5">Selecciona l'Usuari <br><h5 style="font-size: 11px">(Escriu el nom, els cognoms o l'email de l'usuari per iniciar la cerca)</h5></label>
                            <select class="col-sm-5 custom-select" disabled name="idUsuari" id="idUsuari" v-model="idUsuari">
                            </select>
                        </div>
                        <div class="form-group row ml-3">
                            <label for="rol_usuari" class="col-sm-6 col-form-label ml-5">Filtrar pel rol de l'Usuari <br><h5 style="font-size: 11px">(si filtres pel rol els altres filtres no es podràn aplicar)</h5></label>
                            <select class="col-sm-5 custom-select" v-if="emailUsuari =='' && nomUsuari == '' && cognomsUsuari ==''" name="rol_usuari" id="rol_usuari" v-model="idRolUsuari">
                                <option  selected value=''>Seleccionar Tots</option>
                                <option v-for="rol in rols" :key="rol.id" v-bind:value="rol.id">{{ rol.nom }}</option>
                            </select>
                            <select class="col-sm-5 custom-select" v-else disabled name="rol_usuari" value='' id="rol_usuari" v-model="idRolUsuari">
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Tancar</button>
                    <button type="button" class="btn btn-success btn-sm" @click="aplicarFiltres(emailUsuari, idUsuari, idRolUsuari)"><i class="far fa-filter"></i> Aplicar Filtres</button>
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
                setTimeoutBuscador:'',
                emailUsuari:'',
                nomUsuari:'',
                cognomsUsuari:'',
                idUsuari:'',
                idRolUsuari:'',
                usuarisFiltrats:[],
                usuaris: [],
                rols: [],
                usuari: {
                    id: '',
                    username: '',
                    contrasenya: '',
                    email: '',
                    nom: '',
                    cognoms: '',
                    rols_id: '',
                    recursos_id: ''
                },
                usuariVacio: {
                    id: '',
                    username: '',
                    contrasenya: '',
                    email: '',
                    nom: '',
                    cognoms: '',
                    rols_id: '',
                    recursos_id: ''
                },
                tipusRecursos: [],
                insert: false,
                pagina: "",
                meta_usuaris: {},
                paginas: []
            }

        },
        methods: {
            selectUsuaris(){
                let me = this;
                axios
                    .get('/paginate_usuaris',{params:{
                        nom: this.nomUsuari,
                        cognoms: this.cognomsUsuari,
                        email: this.emailUsuari,
                        idRol: this.idRolUsuari
                    }})
                    .then(response => {
                        me.usuaris = response.data.data;
                        me.meta_usuaris = response.data.meta;
                        me.paginas=[];
                        for (let index = 0; index < me.meta_usuaris.last_page; index++) {
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
                    .get('/rols')
                    .then(response => {
                        me2.rols = response.data;
                    })
                    .catch(error => {
                        console.log(error)
                        this.errored = true;
                    })
            },
            paginar(pagina){
                let me = this;
                axios
                    .get('/paginate_usuaris' + '?page=' + pagina, {params:{
                        buscador: this.buscador
                    }})
                    .then(response => {
                        me.usuaris = response.data.data;
                        me.meta_usuaris = response.data.meta;
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
            },
            crearUsuari(){
                this.insert = true;
                this.usuari = this.usuariVacio;
                $('#modalUsuari').modal('show')
            },
            insertUsuari(){
                let me = this;
                axios
                    .post('/usuaris', me.usuari)
                    .then(function(response){
                        me.selectUsuaris();
                        $('#modalUsuari').modal('hide');
                    }).catch(function(error){
                        me.errorMessage = error.response.data.error;
                    })
            },
            editUsuari(usuari){
                this.insert = false;
                this.usuari = usuari;
                $('#modalUsuari').modal('show')
            },
            updateUsuari(){
                let me = this;
                axios
                    .put('/usuaris/'+ me.usuari.id, me.usuari)
                    .then(function(response){
                        me.selectUsuaris();
                        $('#modalUsuari').modal('hide');
                    }).catch(function(error){
                        me.errorMessage = error.response.data.error;
                    })
            },
            confirmarDelete(usuari){
                this.usuari = usuari;
                $('#modalBorrar').modal('show')
            },
             mostrarUsuari(usuari){
                this.usuari = usuari;
                $('#modalMostrarUsuari').modal('show')
            },
            borrarUsuari(){
                let me = this;
                axios
                    .delete('/usuaris/'+ me.usuari.id)
                    .then(function(response){
                        me.infoMessage = response.data.missatge;
                        me.selectUsuaris();
                        $('#modalBorrar').modal('hide'); // CERRAR MODAL
                    }).catch(function(error){
                        me.errorMessage = error.response.data.error;
                        $('modalBorrar').modal('hide');
                    })
            },
             filtres(){
                $('#modalFiltres').modal('show')
            },
            aplicarFiltres(emailUsuari, idUsuari, idRolUsuari){
                this.emailUsuari = emailUsuari;
                this.idUsuari = idUsuari;
                this.idRolUsuari = idRolUsuari;
                this.selectUsuaris();
                $('#modalFiltres').modal('hide');
            },
             buscarUsuaris(){
                clearTimeout(this.setTimeoutBuscador);
                this.setTimeoutBuscador = setTimeout(this.filtrarUsuaris, 250);
            },
            filtrarUsuaris(){
            let me= this;
            axios
            .get('/usuaris',{params:{
                nom: this.nomUsuari,
                cognoms: this.cognomsUsuari,
                email: this.emailUsuari,
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
        },
        created(){
            this.selectUsuaris();
            this.selectTipusRecursos();
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
