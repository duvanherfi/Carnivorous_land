<template>
<div class="col-3 pr-0 menu-producto-tips-DS">
    <!-- Subtitulo -->
    <br>
    <h2 class="row justify-content-center subtitulo-DS w-100 m-0">CATEGORÍA DE ARTÍCULOS</h2>
    <div class="row align-items-center row justify-content-center w-100 m-0">
        <hr align="left" class="izquierda-DS ml-0 mr-2" noshade="noshade" style="width:100px;">✻
        <hr align="left" class="derecha-DS ml-2 mr-0" noshade="noshade" style="width:100px;">
    </div>
    <div id="accordion" class="row justify-content-center" role="tablist">
        <div class="col-9 borde-menu-DS"></div>
        <!-- Opcion Plantas -->
        <div role="tab" class="text-center py-1 opcion-menu-DS">
            <div class="collapsed" data-toggle="collapse" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                Plantas
            </div>
        </div>
        <div id="collapseOne" class="collapse contenedor-submenu-DS" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="text-center py-1 w-100 opcion-menu-DS">
                Sarracenia
            </div>
            <div class="text-center py-1 w-100 opcion-menu-DS">
                Drosera
            </div>
            <div class="text-center py-1 w-100 opcion-menu-DS">
                Dionaea
            </div>
            <div class="text-center py-1 w-100 opcion-menu-DS">
                Nepenthes
            </div>
            <div class="text-center py-1 w-100 opcion-menu-DS">
                Pinguicula
            </div>
            <div class="text-center py-1 w-100 opcion-menu-DS">
                Utricularia
            </div>
        </div>
        <!-- Opcion Merchandising -->
        <div role="tab" class="text-center py-1 opcion-menu-DS">
            <div class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Merchandising
            </div>
        </div>
        <div id="collapseTwo" class="collapse contenedor-submenu-DS" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="text-center py-1 w-100 opcion-menu-DS">
                Camisetas
            </div>
            <div class="text-center py-1 w-100 opcion-menu-DS">
                Vasos
            </div>
        </div>
        <!-- Opcion Implementos -->
        <div role="tab" class="text-center py-1 opcion-menu-DS">
            <div class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Implementos de cultivo
            </div>
        </div>
        <div id="collapseThree" class="collapse contenedor-submenu-DS" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
            <div class="text-center py-1 w-100 opcion-menu-DS">
                Macetas
            </div>
        </div>
    </div>

    <!-- Subtitulo -->
    <h2 class="row justify-content-center mt-4 subtitulo-DS w-100 m-0">GESTIÓN</h2>
    <div class="row align-items-center row justify-content-center w-100 m-0">
        <hr align="left" class="izquierda-DS ml-0 mr-2" noshade="noshade" style="width:100px;">✻
        <hr align="left" class="derecha-DS ml-2 mr-0" noshade="noshade" style="width:100px;">
    </div>
    <div class="row justify-content-center">
        <div class="col-9 borde-menu-DS"></div>
        <div class="col-9 text-center py-1 opcion-menu-DS">
            Registrar artículo
        </div>
        <div class="col-9 text-center py-1 opcion-menu-DS">
            Modificar artículo
        </div>
        <div class="col-9 text-center py-1 opcion-menu-DS">
            Eliminar artículo
        </div>
    </div>
</div>
</template>

<style scoped>
.borde-menu-DS {
    border-top: #434343 3px solid;
    width: 230px;
}

.opcion-menu-DS {
    border-bottom: #434343 3px solid;
    font-family: 'Montserrat', sans-serif;
    width: 261px;
}

.contenedor-submenu-DS {
    width: 261px;
}

.opcion-menu-DS:hover {
    background-color: #9DCE5B;
    color: white;
    cursor: pointer;
}

.menu-producto-tips-DS {
    border-right: #434343 3px solid;
}

/* Collapse */

[data-toggle="collapse"]:after {
    display: inline-block;
    display: inline-block;
    font: normal normal normal 14px/1 FontAwesome;
    font-size: inherit;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    content: "▼";
    transform: rotate(-90deg);
    transition: all linear 0.25s;
}

[data-toggle="collapse"].collapsed:after {
    transform: rotate(0deg);
}
</style>
