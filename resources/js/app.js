require('./bootstrap');

var AOS = require('aos');
AOS.init();


window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('productos', require('./components/cartas_productos.vue').default);

const app = new Vue({
    el: '#app',
});