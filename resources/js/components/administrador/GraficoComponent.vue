<template>
    <main>
        <div id="app">
            <div id="chart-container" class="mt-5">
                <fusioncharts
                    :type="type"
                    :width="width"
                    :height="height"
                    :dataformat="dataFormat"
                    :dataSource="dataSource"
                    >
                </fusioncharts>
            </div>
        </div>

    </main>
</template>

<script>
import Vue from 'vue';
import VueFusionCharts from 'vue-fusioncharts';
import FusionCharts from 'fusioncharts';
import Column3D from 'fusioncharts/fusioncharts.charts';
import FusionTheme from 'fusioncharts/themes/fusioncharts.theme.fusion';

Vue.use(VueFusionCharts, FusionCharts, Column3D, FusionTheme);
const chartData = [
    {
        label: "Barcelona",
        value: "290"
    },
    {
        label: "Tarragona",
        value: "60"
    },
    {
        label: "Lleida",
        value: "200"
    },
    {
        label: "Girona",
        value: "140"
    }
  ];

const dataSource = {
    chart: {
        caption: "Incidencies per Provincies",
        subcaption: "Per veure per Comarca seleccionar la provincia desitjada",
        xaxisname: "Provincia",
        yaxisname: "Incidencies",
        numbersuffix: "",
        theme: "fusion"
    },
    data: chartData
    };

export default {
    name: 'app',
    data() {
        return {
            "type": "column3d",
            "renderAt": "chart-container",
            "width": "750",
            "height": "450",
            "dataFormat": "json",
            dataSource,
            provincies: [],
            provincia:{
                label: "",
                value: ""
            }
        }
    },
    methods: {
        selectProvincies(){
            let me = this;
            axios
                .get('/provincies')
                .then( response => {
                    me.provincies = response.data;
                })
                .catch( error => {
                    console.log(error)
                    this.errored = true;
                })
                .finally(() => this.loading = false)
        },
        insertarProvincies(){
            var i = 0;

            while(i < this.provincies){
                // this.provincia.label = this.provincies[i].nom;
                // chartData.push(this.provincia);

                // i++;
            }

        }
    },
    created() {
        this.selectProvincies();
        this.insertarProvincies();
    }
}
</script>

