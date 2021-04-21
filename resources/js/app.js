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
});
