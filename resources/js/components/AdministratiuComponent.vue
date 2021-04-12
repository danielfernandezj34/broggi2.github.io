<template>
    <div>
        <div :id="div_admin_recurs" class="float-sm-left col-md-6 col-sm-12">
            <button :id="boto_admin_recurs_for" type="button" class="btn btn-outline-success float-md-right mr-sm-1 mr-md-3 mr-lg-5" ><strong><h4>Activar Formació</h4></strong></button>
        </div>
        <div :id="div_admin_recurs" class="float-sm-right col-md-6 col-sm-12">
            <a href="./trucada"><button :id="boto_admin_recurs_tru" type="button" class="btn btn-outline-warning float-md-left ml-sm-1 ml-md-3 ml-lg-5" ><strong><h4>Gestionar Trucades</h4></strong></button></a>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                div_admin_recurs : 'botodiv_admin_recurs',
                boto_admin_recurs_for : 'boto_admin_recurs_formacio',
                boto_admin_recurs_tru : 'boto_admin_recurs_trucada'
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
