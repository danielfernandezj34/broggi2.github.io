<template>

    <div>
        <div :id="botodiv_admin_recurs" class="float-sm-left col-md-6 col-sm-12">
            <a href="./incidencies"><button :id="boto_admin_recurs_incidencia" type="button" class="btn btn-outline-azul float-md-right mr-sm-1 mr-md-3 mr-lg-5" ><h2><strong>Consultar Incidències</strong></h2></button></a>
        </div>
        <div :id="botodiv_admin_recurs" class="float-sm-right col-md-6 col-sm-12">
            <a href="./consultar"><button :id="boto_admin_recurs_assignat" type="button" class="btn btn-outline-warning float-md-left ml-sm-1 ml-md-3 ml-lg-5" ><h2><strong>Incidències Asignades</strong></h2></button></a>
        </div>
    </div>

</template>

<script>
    export default {

        data() {
            return{
                boto_admin_recurs_incidencia : 'boto_admin_recurs_incidencia',
                boto_admin_recurs_assignat : 'boto_admin_recurs_assignat',
                botodiv_admin_recurs : 'botodiv_admin_recurs'
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
