require('./bootstrap');
require('./mdb');
require('./event_bus');
var AOS = require('aos');
AOS.init();
global.md5 = require('md5');

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

Vue.component('utilizar-otros-datos', require('./components/utilizar_otros_datos_carrito.vue').default);
Vue.component('boton-arriba', require('./components/boton-arriba.vue').default);
Vue.component('productos', require('./components/cartas_productos.vue').default);
Vue.component('productos-inventario', require('./components/cartas_inventario.vue').default);
Vue.component('menu-producto-tips', require('./components/menu_productos_tips.vue').default);
Vue.component('contenido-productos', require('./components/contenido_productos.vue').default);
Vue.component('carrousel-descripcion', require('./components/carrousel_descripcion_producto.vue').default);
Vue.component('contenido-descripcion', require('./components/contenido_descripcion_producto.vue').default);
Vue.component('menu-inventario', require('./components/menu_inventario.vue').default);
Vue.component('contenido-inventario', require('./components/contenido_inventario.vue').default);
Vue.component('filas-carrito', require('./components/filas_carrito.vue').default);
Vue.component('filas-pagrespuesta', require('./components/filas_pagRespuesta.vue').default);
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