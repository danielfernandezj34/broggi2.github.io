<template>
    <div>
        <div :id="div_a" class="float-sm-left col-md-4 col-sm-12" @mouseover="usuari_img" >
            <a href="./usuaris"><button :id="boto_u" type="button" class="btn btn-primary ml-lg-5" ><strong>Usuaris i rols</strong></button></a>
        </div>
        <div :id="div_a" class="float-sm-left col-md-4 col-sm-12">
            <button :id="boto_a" type="button" class="btn btn-outline-secondary" ><strong>Alertants</strong></button>
        </div>
        <div :id="div_a" class="float-sm-left col-md-4 col-sm-12">
            <button :id="boto_r" type="button" class="btn btn-outline-warning mr-lg-5" ><strong>Recursos</strong></button>
        </div>
        <div :id="div_a" class="float-sm-left col-md-4 col-sm-12">
            <button :id="boto_h" type="button" class="btn btn-outline-danger ml-lg-5" ><strong>Helpbox</strong></button>
        </div>
        <div :id="div_a" class="float-sm-left col-md-4 col-sm-12">
            <button :id="boto_i" type="button" class="btn btn-outline-info" ><strong>Incidències</strong></button>
        </div>
        <div :id="div_a" class="float-sm-left col-md-4 col-sm-12">
            <button :id="boto_e" type="button" class="btn btn-outline-dark mr-lg-5" ><strong>Estadistiques</strong></button>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                boto_u : 'boto_administrador_users',
                boto_a : 'boto_administrador_alertants',
                boto_r : 'boto_administrador_recursos',
                boto_h : 'boto_administrador_helpbox',
                boto_i : 'boto_administrador_incidencies',
                boto_e : 'boto_administrador_estadistiques',
                div_a  : 'botodiv_administrador'
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
