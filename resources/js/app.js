require('./bootstrap');
require('./mdb');
var AOS = require('aos');
AOS.init();

window.Vue = require('vue');
import VueRouter from 'vue-router';

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('productos', require('./components/cartas_productos.vue').default);
Vue.component('menu-producto-tips', require('./components/productos_y_tips/menu_productos_tips.vue').default);
Vue.component('contenido-productos', require('./components/productos_y_tips/contenido_productos.vue').default);
Vue.component('carrousel-descripcion', require('./components/descripcion_producto/carrousel_descripcion_producto.vue').default);
Vue.component('contenido-descripcion', require('./components/descripcion_producto/contenido_descripcion_producto.vue').default);
Vue.component('menu-inventario', require('./components/inventario/menu_inventario.vue').default);
Vue.component('contenido-inventario', require('./components/inventario/contenido_inventario.vue').default);
Vue.component('filas-carrito', require('./components/filas_carrito.vue').default);
Vue.component('menu_prueba', require('./components/menu_prueba.vue').default);

const app = new Vue({
    el: '#app',
});

const app2 = new Vue({
    el: '#app2',
});