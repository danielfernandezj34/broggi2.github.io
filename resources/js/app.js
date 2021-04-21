import Vue from 'vue';

// Include the vue-fusioncharts component
import VueFusionCharts from 'vue-fusioncharts';

//Include the FusionCharts library
import FusionCharts from 'fusioncharts';

//Include the chart type
import Charts from 'fusioncharts/fusioncharts.charts';

//import the theme
import FusionTheme from 'fusioncharts/themes/fusioncharts.theme.fusion';

// register VueFusionCharts component
Vue.use(VueFusionCharts, FusionCharts, Charts, FusionTheme)

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('administrador-principal', require('./components/AdministradorComponent.vue').default);
Vue.component('administratiu-principal', require('./components/AdministratiuComponent.vue').default);
Vue.component('usuari-component', require('./components/administrador/UsuarisComponent.vue').default);
Vue.component('recurs-principal', require('./components/RecursComponent.vue').default);
Vue.component('mostrar-incidencies', require('./components/administratiu/IncidenciesComponent.vue').default);
Vue.component('formulari-administratiu', require('./components/administratiu/FormulariComponent.vue').default);


Vue.component('trucada-administratiu', require('./components/administratiu/GestionarTrucadaComponent.vue').default);

Vue.component('alertants-component', require('./components/administrador/AlertantComponent.vue').default);
Vue.component('helpbox-component', require('./components/administrador/HelpboxComponent.vue').default);
Vue.component('recursos-component', require('./components/administrador/RecursosComponent.vue').default);
Vue.component('recursos-asignats', require('./components/recursos/asignatsComponent.vue').default);
Vue.component('recursos-consultar', require('./components/recursos/ConsultarComponent.vue').default);
Vue.component('estadistiques-component', require('./components/administrador/GraficoComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data: {
        type: "usa",
        renderAt: "chart-container",
        width: "100%",
        height: "100%",
        dataFormat: "json",
        dataSource: {
            // Chart Configuration
            chart: {
                caption: "States with Highest Poverty (>17%) in USA",
                subcaption: "For the year 2016",
                numbersuffix: "%",
                theme: "fusion",
                tooltipbgcolor: "#FFFFFF",
                tooltipbordercolor: "#CCCCCC",
                showentitytooltip: "0",
                showentityhovereffect: "0",
                showlabels: "0",
                entitytooltext:
                  "<div style='font-size:14px; text-align:center; padding: 2px 4px 2px 4px; color:black;'>$lName</div><div style='font-size:12px; color:black;'>Poverty Rate: <b>$value%</b></div>",
                entityfillhovercolor: "#FFF9C4",
                nullentitycolor: "#ECE9D3"
              },
              colorrange: {
                minvalue: "17.5",
                code: "#EAD95F",
                gradient: "1",
                color: [
                  {
                    maxvalue: "20",
                    code: "#EE8D50"
                  },
                  {
                    maxvalue: "22.5",
                    code: "#F24141"
                  }
                ]
              },
              data: [
                {
                  id: "DC",
                  value: "17.9",
                  showtooltip: "1",
                  showlabel: "1",
                  alpha: "100",
                  fontbold: "1"
                },
                {
                  id: "AZ",
                  value: "17.7",
                  showlabel: "1",
                  alpha: "100",
                  fontbold: "1",
                  usehovercolor: "1",
                  showtooltip: "1"
                },
                {
                  id: "NM",
                  value: "20.9",
                  showtooltip: "1",
                  showlabel: "1",
                  alpha: "100",
                  fontbold: "1",
                  usehovercolor: "1"
                },
                {
                  id: "AR",
                  value: "18.8",
                  showtooltip: "1",
                  showlabel: "1",
                  alpha: "100",
                  fontbold: "1",
                  usehovercolor: "1"
                },
                {
                  id: "LA",
                  value: "19.7",
                  showtooltip: "1",
                  showlabel: "1",
                  alpha: "100",
                  fontbold: "1",
                  usehovercolor: "1"
                },
                {
                  id: "KY",
                  value: "18.8",
                  showtooltip: "1",
                  showlabel: "1",
                  alpha: "100",
                  fontbold: "1",
                  usehovercolor: "1"
                },
                {
                  id: "MS",
                  value: "22.3",
                  showtooltip: "1",
                  showlabel: "1",
                  alpha: "100",
                  fontbold: "1",
                  usehovercolor: "1"
                },
                {
                  id: "AL",
                  value: "18.4",
                  showtooltip: "1",
                  showlabel: "1",
                  alpha: "100",
                  fontbold: "1",
                  usehovercolor: "1"
                },
                {
                  id: "GA",
                  value: "17.8",
                  showtooltip: "1",
                  showlabel: "1",
                  alpha: "100",
                  fontbold: "1",
                  usehovercolor: "1"
                },
                {
                  id: "WV",
                  value: "17.8",
                  showtooltip: "1",
                  showlabel: "1",
                  alpha: "100",
                  fontbold: "1",
                  usehovercolor: "1"
                }
              ]
            }
        }
});
