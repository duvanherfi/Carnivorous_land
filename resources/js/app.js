require('./bootstrap');
require('./mdb');
var AOS = require('aos');
AOS.init();
window.md5 = require('md5');

import bsCustomFileInput from 'bs-custom-file-input';

global.bsCustomFileInput = bsCustomFileInput;

window.Vue = require('vue');

import VueCurrencyFilter from 'vue-currency-filter';
Vue.use(VueCurrencyFilter, {
    symbol: '$',
    thousandsSeparator: '.',
    fractionCount: 0,
    fractionSeparator: ',',
    symbolPosition: 'front',
    symbolSpacing: false
});

Vue.component('boton-arriba', require('./components/boton-arriba.vue').default);
Vue.component('productos', require('./components/cartas_productos.vue').default);
Vue.component('productos-inventario', require('./components/cartas_inventario.vue').default);
Vue.component('menu-producto-tips', require('./components/menu_productos_tips.vue').default);
Vue.component('contenido-productos', require('./components/contenido_productos.vue').default);
Vue.component('carrousel-descripcion', require('./components/descripcion_producto/carrousel_descripcion_producto.vue').default);
Vue.component('contenido-descripcion', require('./components/descripcion_producto/contenido_descripcion_producto.vue').default);
Vue.component('menu-inventario', require('./components/menu_inventario.vue').default);
Vue.component('contenido-inventario', require('./components/contenido_inventario.vue').default);
Vue.component('filas-carrito', require('./components/filas_carrito.vue').default);
Vue.component('menu_prueba', require('./components/menu_prueba.vue').default);

const app = new Vue({
    el: '#app',
});

const app2 = new Vue({
    el: '#app2',
});

const app3 = new Vue({
    el: '#app3',
});