<template>
    <div>
        <div :id="div_admin_recurs" class="float-sm-left col-md-6 col-sm-12">
            <button :id="boto_admin_recurs_for" type="button" class="btn btn-outline-success float-md-right mr-sm-1 mr-md-3 mr-lg-5" @click="abrirModalPCR()"><h2><strong>Activar Formació</strong></h2></button>
        </div>
        <div :id="div_admin_recurs" class="float-sm-right col-md-6 col-sm-12">
            <a href="./trucada"><button :id="boto_admin_recurs_tru" type="button" class="btn btn-outline-warning float-md-left ml-sm-1 ml-md-3 ml-lg-5" ><h2><strong>Gestionar Trucades</strong></h2></button></a>
        </div>
        <div class="modal fade" id="modalPCR" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-secondary btn-sm"
                                    :class="{ ventanaActiva: ventanaSeleccionada === ventana }"
                                    v-for="(ventana, index) in ventanas"
                                    :key="index"
                                    @click="ventanaSeleccionada = ventana">
                                {{ ventana }}
                            </button>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="stop">
                            <span aria-hidden="true">&times;</span>Tancar
                        </button>
                    </div>
                    <div class="modal-body">
                        <div v-show="ventanaSeleccionada === 'PCR'">
                            <div class="container-fluid">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-10 d-flex justify-content-center">
                                        <video ref="videoRef" type="video/mp4" :src="videoRuta" id="video"></video>
                                    </div>
                                </div>
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-2 my-3 d-flex justify-content-center">
                                        <button type="button" class="btn btn-danger btn-sm mx-3" :disabled="reproducirVideo" @click="play"><i class="far fa-trash-alt"></i>Play</button>
                                        <button type="button" class="btn btn-success btn-sm" :disabled="!reproducirVideo" @click="stop">Stop</button>
                                    </div>
                                </div>
                                <div class="row d-flex justify-content-around mt-4">
                                    <div class="col-md-3 d-flex justify-content-center">
                                        <button class="btn btn-secondary btn-sm mx-5"
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
                                <div class="row">
                                    <div class="col-md-10">
                                        <video ref="myvideo" :src="video" width="800"></video>
                                        <hr>
                                    </div>
                                    <div class="col-md-2 d-flex justify-content-center">
                                        <button style= "width:20px, height:20px" type="button" class="btn btn-danger btn-sm" :disabled="reproducirVideo" @click="play"><i class="far fa-trash-alt"></i>Play</button>
                                        <button :disabled="!reproducirVideo" @click="stop">Stop</button>
                                    </div>
                                </div>
                                <div class="row d-flex justify-content-around mt-4">
                                    <div class="col-md-3 d-flex justify-content-center">
                                        <button type="button" class="btn btn-danger btn-sm" :disabled="reproducirVideo" @click="play"><i class="far fa-trash-alt"></i>Play</button>
                                    </div>

                                    <div class="col-md-3 d-flex justify-content-center">
                                        <button type="button" class="btn btn-danger btn-sm" :disabled="reproducirVideo" @click="play"><i class="far fa-trash-alt"></i>Play</button>
                                    </div>
                                    <div class="col-md-3 d-flex justify-content-center">
                                        <button type="button" class="btn btn-danger btn-sm" :disabled="reproducirVideo" @click="play"><i class="far fa-trash-alt"></i>Play</button>
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
                videos: [{
                    nombre: 'clip1',
                    ruta: 'https://archive.org/download/BigBuckBunny_124/Content/big_buck_bunny_720p_surround.mp4'
                },{
                    nombre: 'clip2',
                    ruta: 'https://ia803008.us.archive.org/1/items/FantasticPlanetTrailer/FantasticPlanetTrailer.mp4'
                },{
                    nombre: 'clip3',
                    ruta: 'https://ia803106.us.archive.org/8/items/sinema-trailer_king-kong-vs-godzilla/King%20Kong%20vs%20Godzilla%20Trailer%20%28In%20English%29%20%28288p_30fps_H264-96kbit_AAC%29.mp4'
                }]
            }
        },
        methods:{
            abrirModalPCR(){
                $('#modalPCR').modal('show')
            },
            play() {
                this.$refs.videoRef.play()
                this.reproducirVideo = true
            },
            stop() {
                this.$refs.videoRef.pause()
                this.reproducirVideo = false
            },
            cambiarVideo(index){
                this.videoSeleccionado = index
            }
        },
        computed:{
            videoRuta(){
                return this.videos[this.videoSeleccionado].ruta
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
