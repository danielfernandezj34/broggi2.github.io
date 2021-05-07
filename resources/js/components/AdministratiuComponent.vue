<template>
    <div>
        <div :id="div_admin_recurs" class="float-sm-left col-md-6 col-sm-12">
            <button :id="boto_admin_recurs_for" type="button" class="btn btn-outline-success float-md-right mr-sm-1 mr-md-3 mr-lg-5" @click="abrirModalPCR()"><h2><strong>Formació</strong></h2></button>
        </div>
        <div :id="div_admin_recurs" class="float-sm-right col-md-6 col-sm-12">
            <a href="./trucada"><button :id="boto_admin_recurs_tru" type="button" class="btn btn-outline-warning float-md-left ml-sm-1 ml-md-3 ml-lg-5" ><h2><strong>Gestionar Trucades</strong></h2></button></a>
        </div>
        <div class="modal fade" id="modalPCR" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="d-flex justify-content-center ml-3">
                            <button class="btn text-white btn-sm ml-2 btn-primary"
                                    :class="{ ventanaActiva: ventanaSeleccionada === ventana }"
                                    v-for="(ventana, index) in ventanas"
                                    :key="index"
                                    @click="ventanaSeleccionada = ventana">
                                {{ ventana }}
                            </button>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>Tancar
                        </button>
                    </div>
                    <div class="modal-body">
                        <div v-show="ventanaSeleccionada === 'PCR'">
                            <div class="container-fluid">
                                <div class="row d-flex my-3 justify-content-center">
                                    <div class="col-md-8 d-flex justify-content-center">
                                        <h4>Demostració de com fer una PCR, amb un video general i dos detallant els procediments</h4>
                                    </div>
                                </div>
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-10 d-flex justify-content-center">
                                        <div>
                                            <video controls type="video/mp4" :src="videoRuta" id="video"></video>
                                        </div>
                                    </div>
                                </div>
                                <div class="row d-flex justify-content-around my-3">
                                    <div class="col-md-3 d-flex justify-content-center">
                                        <button class="btn btn-secondary btn-sm mx-4"
                                                :class="{ ventanaActiva: videoSeleccionado == video.id }"
                                                v-for="(video, index) in videos"
                                                :key="video.nombre"
                                                @click="cambiarVideo(index)">
                                            {{ video.nombre }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div v-show="ventanaSeleccionada === 'Formació'">
                            <div class="container-fluid">
                                <div class="row d-flex my-3 justify-content-center">
                                    <div class="col-md-8 d-flex justify-content-center">
                                        <h4>Formació per poder omplir el formulari de la trucada</h4>
                                    </div>
                                </div>
                                <div class="row d-flex justify-content-end mb-5">
                                    <div class="col-md-10 d-flex justify-content-end">
                                        <div>
                                            <video ref="video" controls type="video/mp4" :src="videoFormacio" id="video" @timeupdate="currentTime_ = $event.target.currentTime"></video>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-secondary btn-sm mx-4 my-2"
                                                :class="{ ventanaActiva: seccionSeleccionada == seccion.id }"
                                                v-for="(seccion, index) in secciones"
                                                :key="seccion.nombre"
                                                @click="currentTime = seccion.segundo; cambiarSeccion(index);">
                                            {{ seccion.nombre }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                div_admin_recurs : 'botodiv_admin_recurs',
                boto_admin_recurs_for : 'boto_admin_recurs_formacio',
                boto_admin_recurs_tru : 'boto_admin_recurs_trucada',
                reproducirVideo: false,
                ventanas: ['PCR', 'Formació'],
                ventanaSeleccionada: 'PCR',
                videoSeleccionado: 0,
                seccionSeleccionada: 0,
                currentTime_: 10,
                videoFormacio: 'http://localhost/broggi2.github.io/public/img/RCP.mp4',
                videos: [{
                    id: '0',
                    nombre: 'RCP Completa',
                    ruta: 'http://localhost/broggi2.github.io/public/img/RCP.mp4'
                },{
                    id: '1',
                    nombre: 'DESA',
                    ruta: 'http://localhost/broggi2.github.io/public/img/DESA.mp4'
                },{
                    id: '2',
                    nombre: 'Seqüència RCP',
                    ruta: 'http://localhost/broggi2.github.io/public/img/formacioTrucada.mp4'
                }],
                secciones: [{
                    id: '0',
                    nombre: 'Alertant',
                    segundo: '0.0'
                },{
                    id: '1',
                    nombre: 'Localització',
                    segundo: '95.0'
                },{
                    id: '2',
                    nombre: 'Afectats',
                    segundo: '104.0'
                },{
                    id: '3',
                    nombre: 'Recurs',
                    segundo: '193.0'
                }]
            }
        },
        methods:{
            abrirModalPCR(){
                $('#modalPCR').modal('show')
                $('#modalPCR').modal('handleUpdate')
            },
            cambiarVideo(index){
                this.videoSeleccionado = index
            },
            cambiarSeccion(index){
                this.seccionSeleccionada = index
            }
        },
        computed:{
            videoRuta(){
                return this.videos[this.videoSeleccionado].ruta
            },
            currentTime: {
                get: ({ currentTime_ }) => currentTime_,
                set(time) {
                    this.$refs.video.currentTime = time
                }
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
