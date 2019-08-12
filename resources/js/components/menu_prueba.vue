<template>
    <ul class="navbar-nav ml-auto nav-flex-icons bordes-menu-DS">
        <li class="nav-item opcion-menu-DS bordes-DS">
            <a class="nav-link waves-effect waves-light" v-bind:href="inicio">
                INICIO
            </a>
        </li>

        <li class="nav-item bordes-DS">
            <a class="nav-link waves-effect waves-light" v-bind:href="quienes_somos">
                ¿QUIÉNES SOMOS?
            </a>
        </li>
        <li class="nav-item dropdown opcion-menu-DS bordes-DS" v-if="1>0">
                <a class="nav-link dropdown-toggle" v-bind:href="producto" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        PRODUCTOS
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-default col-4 minimenu-DS"
                        aria-labelledby="navbarDropdownMenuLink-333">
                        <a class="dropdown-item" v-bind:href="plantas">Plantas</a>
                        <a class="dropdown-item" v-bind:href="imple_cultivo">Implementos de cultivo</a>
                        <a class="dropdown-item" v-bind:href="merchandising">Merchandising</a>
                    </div>
        </li>

                <li class="nav-item opcion-menu-DS bordes-DS" v-else>
                    <a class="nav-link waves-effect waves-light" v-bind:href="inventario">
                        INVENTARIO
                    </a>
                </li>

                <li class="nav-item opcion-menu-DS bordes-DS">
                    <a class="nav-link waves-effect waves-light" v-bind:href="tips_cultivo">
                        TIPS DE CULTIVOS
                    </a>
                </li>
                <li class="nav-item opcion-menu-DS">
                    <a class="nav-link waves-effect waves-light" v-bind:href="contactanos">
                        CONTÁCTANOS
                    </a>
                </li>
            </ul>

    </template>

<script>
export default {
    data() {
        return {
            inicio: route('inicio'),
            quienes_somos: route('quienes_somos'),
            producto:null,
            plantas:route('productos', 'plantas'),
            merchandising:route('productos', 'merchandising'),
            imple_cultivo:route('productos', 'implementos'),
            inventario:null,
            tips_cultivo:null,
            contactanos:route('contactanos')
        }
    },
    methods: {

    }
}
</script>
