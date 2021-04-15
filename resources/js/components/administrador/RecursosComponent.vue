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
                            <button type="submit" class="btn btn-secondary btn-sm" @click="editRecurs(recurs)"><i class="far fa-edit"></i> Editar</button>
                            <button type="submit" id="botones" class="btn btn-danger btn-sm ml-1" @click="confirmarDelete(recurs)"><i class="far fa-trash-alt"></i> Esborrar</button>
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
