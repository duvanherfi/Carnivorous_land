require('./bootstrap');
require('./mdb');
var AOS = require('aos');
AOS.init();

window.Vue = require('vue');
import VueRouter from 'vue-router';


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('productos', require('./components/cartas_productos.vue').default);
Vue.component('menu-producto-tips', require('./components/menu_productos_tips.vue').default);
Vue.component('contenido-productos', require('./components/contenido_productos.vue').default);
Vue.component('filas-carrito', require('./components/filas_carrito.vue').default);


const app = new Vue({
    el: '#app',
});