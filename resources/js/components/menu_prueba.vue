<template>
<ul class="navbar-nav ml-auto nav-flex-icons bordes-menu-DS">
    <li class="nav-item opcion-menu-DS bordes-DS">
        <a class="nav-link waves-effect waves-light" v-bind:href="inicioLink">
            INICIO
        </a>
    </li>
    <li class="nav-item opcion-menu-DS bordes-DS" v-if="isAdmin==='cliente' || isAdmin===null">
        <a class="nav-link waves-effect waves-light" v-bind:href="quienes_somosLink">
            ¿QUIÉNES SOMOS?
        </a>
    </li>
    <li class="nav-item opcion-menu-DS bordes-DS" v-else>
        <a class="nav-link waves-effect waves-light" v-bind:href="actualizarLink">
            ACTUALIZAR DATOS
        </a>
    </li>
    <li class="nav-item dropdown opcion-menu-DS bordes-DS" v-if="isAdmin==='cliente' || isAdmin===null">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            PRODUCTOS
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-default col-4 minimenu-DS" aria-labelledby="navbarDropdownMenuLink-333">
            <a class="dropdown-item" v-bind:href="plantasLink">Plantas</a>
            <a class="dropdown-item" v-bind:href="imple_cultivoLink">Implementos de cultivo</a>
            <a class="dropdown-item" v-bind:href="merchandisingLink">Merchandising</a>
        </div>
    </li>

    <li class="nav-item opcion-menu-DS bordes-DS" v-else>
        <a class="nav-link waves-effect waves-light" v-bind:href="inventarioLink">
            INVENTARIO
        </a>
    </li>
    <li class="nav-item opcion-menu-DS bordes-DS">
        <a class="nav-link waves-effect waves-light" v-bind:href="tips_cultivoLink">
            TIPS DE CULTIVOS
        </a>
    </li>
    <li id="contactanos" class="nav-item opcion-menu-DS">
        <a class="nav-link waves-effect waves-light" v-bind:href="contactanosLink">
            CONTÁCTANOS
        </a>
    </li>
    <li class="nav-item opcion-menu-DS" v-if="isAdmin==='administrador'">
        <a class="nav-link waves-effect waves-light" v-bind:href="pedidosLink">
            PEDIDOS
        </a>
    </li>
</ul>
</template>

<script>
import axios from 'axios'
export default {

    data() {
        return {
            inicioLink: route('inicio'),
            quienes_somosLink: route('quienes_somos'),
            plantasLink: route('productos', 'plantas'),
            merchandisingLink: route('productos', 'merchandising'),
            imple_cultivoLink: route('productos', 'implementos'),
            inventarioLink: route('inventario', 'gestion'),
            tips_cultivoLink: route('productos', 'tips_cultivo'),
            contactanosLink: route('contactanos'),
            pedidosLink: route('pedidos'),
            actualizarLink:route('actualizar_datos'),
            isAdmin: null
        }
    },
    created: function () {
        this.comprobarAdmin();
    },
    methods: {
        comprobarAdmin: function () {
            axios.get('comprobarSiAdmin')
                .then(response => {
                    this.isAdmin = response.data;
                    if (this.isAdmin == 'administrador') {
                        $('.redes-sociales-compra').addClass('redes-sociales-administrador');
                        $('.justificar-DS').addClass('justificar-administrador');
                        $('#contactanos').addClass('bordes-DS');
                    }else{
                        $('#contactanos').removeClass('bordes-DS');
                    }
                })
                .catch(err => {
                    console.error(err);
                })

        }
    },
    mounted() {
        $(document).ready(function () {
            var altura = $('.menu').offset().top;

            $(window).on('scroll', function () {
                if ($(window).scrollTop() > altura) {
                    $('.menu').addClass('menu-fixed');
                } else {
                    $('.menu').removeClass('menu-fixed');
                }
            });
        });
    }
}
</script>
