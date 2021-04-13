<template>
    <div class="card mt-3">
        <div class="card-body mt-1">
            <h5 class="card-title" id="titol_usuaris">Taula d'Incidencies</h5>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Número de la incidència" aria-label="Buscar ID incidència">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" id="boto_buscar"><i class="fal fa-search"> Buscar</i></button>
            </form>
            <table class="table mt-2">
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
                        <div v-for="usuari in usuaris" :key="usuari.id">
                            <td v-if="usuari.id == incidencia.usuaris_id">
                                {{ usuari.nom }} {{ usuari.cognoms }}
                            </td>
                        </div>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>

export default ({
    data() {
        return{
            incidencies:[],
            tipusIncidencies:[],
            usuaris:[]
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
                me3.incidencies = response.data;
             })
                .catch(error => {
                console.log(error)
                this.errored = true;
             })
                .finally(() => this.loading = false)
        }
    },
    created(){
       selectIncidencies()

    }
})
</script>
