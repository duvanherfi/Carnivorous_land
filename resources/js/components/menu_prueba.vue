<template>
<ul class="navbar-nav ml-auto nav-flex-icons bordes-menu-DS">
    <li class="nav-item opcion-menu-DS bordes-DS">
        <a class="nav-link waves-effect waves-light" v-bind:href="inicioLink">
            <i class="fas fa-home"></i> INICIO
        </a>
    </li>
    <li class="nav-item opcion-menu-DS bordes-DS" v-if="isAdmin==='cliente' || isAdmin===null">
        <a class="nav-link waves-effect waves-light" v-bind:href="quienes_somosLink">
            <i class="fas fa-users"></i> ¿QUIÉNES SOMOS?
        </a>
    </li>
    <li class="nav-item opcion-menu-DS bordes-DS" v-else>
        <a class="nav-link waves-effect waves-light" v-bind:href="actualizarLink">
            <i class="fas fa-file-signature"></i> ACTUALIZAR DATOS
        </a>
    </li>
    <li class="nav-item dropdown opcion-menu-DS bordes-DS" v-if="isAdmin==='cliente' || isAdmin===null">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-leaf"></i> PRODUCTOS
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-default col-4 minimenu-DS" aria-labelledby="navbarDropdownMenuLink-333">
            <a class="dropdown-item tamaño" v-bind:href="plantasLink">
                <img src="/img/carnivorous-plant.png" alt="Icono de planta" width="23"> PLANTAS</a>
            <a class="dropdown-item tamaño" v-bind:href="imple_cultivoLink">
                <img class="" src="/img/pots.png" alt="Icono de maceta" width="23"> <div class="d-inline-flex"> IMPLEMENTOS DE <br>    CULTIVO</div></a>
            <a class="dropdown-item tamaño" v-bind:href="merchandisingLink">
                <img src="/img/shirt.png" alt="Icono de camisa" width="23"> MERCHANDISING</a>
        </div>
    </li>

    <li class="nav-item opcion-menu-DS bordes-DS" v-else>
        <a class="nav-link waves-effect waves-light" v-bind:href="inventarioLink">
            <i class="fas fa-dolly-flatbed"></i> INVENTARIO
        </a>
    </li>
    <li class="nav-item opcion-menu-DS bordes-DS">
        <a class="nav-link waves-effect waves-light" v-bind:href="tips_cultivoLink">
            <i class="fas fa-lightbulb"></i> TIPS DE CULTIVOS
        </a>
    </li>
    <li id="contactanos" class="nav-item opcion-menu-DS bordes-DS" v-if="isAdmin==='cliente' || isAdmin===null">
        <a class="nav-link waves-effect waves-light" v-bind:href="contactanosLink">
            <i class="fas fa-phone-alt"></i> CONTÁCTANOS
        </a>
    </li>
    <li class="nav-item opcion-menu-DS bordes-DS" v-else>
        <a class="nav-link waves-effect waves-light" v-bind:href="pedidosLink">
            <i class="fas fa-box-open"></i> PEDIDOS
        </a>
    </li>
</ul>
</template>

<script>
import axios from 'axios'
import toastr from 'toastr'
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
            actualizarLink: route('actualizar_datos'),
            isAdmin: null
        }
    },
    beforeCreate() {
        axios.get('comprobarSiAdmin')
            .then(response => {
                if (response.data === 'administrador' || response.data === 'cliente') {
                    this.isAdmin = response.data;
                    toastr.info(response.data);
                    // toastr.optionsOverride = 'positionclass = "toast-bottom-full-width"';
                    // toastr.options.positionClass = 'toast-bottom-full-width';
                    // //show when the button is clicked 
                    // toastr.success('Click Button', 'ButtonClick', 'positionclass = "toast-bottom-full-width"');
                }

                if (this.isAdmin == 'administrador') {
                    $('.redes-sociales-compra').addClass('redes-sociales-administrador');
                    $('.justificar-DS').addClass('justificar-administrador');
                    // $('#contactanos').addClass('bordes-DS');
                } else {
                    // $('#contactanos').removeClass('bordes-DS');
                }
            })
            .catch(err => {
                toastr.error(err);
            })

    },
    methods: {

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
