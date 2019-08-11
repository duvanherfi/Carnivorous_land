<template lang="es">
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
            <div class="collapsed flecha" data-toggle="collapse" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
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
            <div class="collapsed flecha" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
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
            <div class="collapsed flecha" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
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
        <div class="col-9 text-center py-1 opcion-menu-DS" data-toggle="modal" data-target="#modal_registrar_articulo">
            Registrar artículo
        </div>
        <div class="col-9 text-center py-1 opcion-menu-DS">
            Modificar artículo
        </div>
        <div class="col-9 text-center py-1 opcion-menu-DS">
            Eliminar artículo
        </div>
    </div>

    <!-- Modal registrar articulo -->
    <div class="modal fade" id="modal_registrar_articulo" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="row subtitulo-DS pt-3 w-100 m-0">REGISTRO DE ARTÍCULO</h2><br>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="ml-3" method="POST" action="">
                        <div class="form-group row">
                            <label for="imagen_principal" class="col-md-4 col-form-label">Imagen principal:</label>
                            <div class="custom-file col-md-7">
                                <input type="file" class="custom-file-input" name="imagen_principal" id="customFileLang" lang="es">
                                <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="imagen2" class="col-md-4 col-form-label">Imagen #2:</label>
                            <div class="custom-file col-md-7">
                                <input type="file" class="custom-file-input" name="imagen2" id="customFileLang" lang="es">
                                <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="imagen3" class="col-md-4 col-form-label">Imagen #3:</label>
                            <div class="custom-file col-md-7">
                                <input type="file" class="custom-file-input" name="imagen3" id="customFileLang" lang="es">
                                <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label">Nombre:</label>
                            <div class="col-md-7 p-0">
                                <input id="nombre" placeholder="Ej: Drosera" type="text" class="form-control" name="nombre" required autocomplete="nombre" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="valor" class="col-md-4 col-form-label">Valor:</label>
                            <div class="col-md-7 p-0">
                                <input id="valor" placeholder="Ej: 50000" type="number" class="form-control" name="valor" required autocomplete="valor" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cantidad" class="col-md-4 col-form-label">Cantidad:</label>
                            <div class="col-md-7 p-0">
                                <input id="cantidad" placeholder="Ej: 43" type="number" class="form-control" name="cantidad" required autocomplete="cantidad" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="stock_minimo" class="col-md-4 col-form-label">Stock mínimo:</label>
                            <div class="col-md-7 p-0">
                                <input id="stock_minimo" placeholder="Ej: 10" type="number" class="form-control" name="stock_minimo" required autocomplete="stock_minimo" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="categoria" class="col-md-4 col-form-label">Categoría: </label>
                            <div class="col-md-7 p-0">
                                <select class="custom-select form-control" id="categoria" name="categoria" required autocomplete="categoria">
                                    <option selected>Escoge una opción</option>
                                    <option value="plantas">Plantas</option>
                                    <option value="merchandising">Merchandising</option>
                                    <option value="implementos">Implementos de cultivo</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tipo" class="col-md-4 col-form-label">Género: </label>
                            <div class="col-md-7 p-0">
                                <select class="custom-select form-control" id="tipo" name="tipo" required autocomplete="tipo">
                                    <option selected>Escoge una opción</option>
                                    <option value="Sarracenia">Sarracenia</option>
                                    <option value="Drosera">Drosera</option>
                                    <option value="Dionaea">Dionaea</option>
                                </select>
                            </div>
                        </div>

                        <!-- Registrar genero -->
                        <button type="button" class="btn btn-md color-verde btn-registrar-genero mt-0" data-toggle="collapse" data-target="#registrar_genero" aria-expanded="false" aria-controls="registrar_genero">Registrar Género</button>

                        <div class="row">
                            <div class="col">
                                <div class="collapse" id="registrar_genero">
                                    <div class="card card-body form-registrar-genero">
                                        <form class="ml-3" method="POST" action="">
                                            <div class="form-group row">
                                                <label for="imagen" class="col-md-3 col-form-label">Imagen:</label>
                                                <div class="custom-file col-md-8">
                                                    <input type="file" class="custom-file-input" name="imagen" id="customFileLang" lang="es">
                                                    <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="nombre_tipo" class="col-md-3 col-form-label">Nombre:</label>
                                                <div class="col-md-8 p-0">
                                                    <input id="nombre_tipo" placeholder="Ej: Drosera" type="text" class="form-control" name="nombre_tipo" required autocomplete="nombre_tipo" autofocus>
                                                </div>
                                            </div>

                                            <div class="form-group mr-4">
                                                <label for="descripcion_tipo" class="d-inline-flex col-form-label">Descripción:</label>
                                                <textarea class="form-control" id="descripcion_tipo" rows="5"></textarea>
                                            </div>

                                            <button type="button" class="btn btn-md color-verde" data-toggle="collapse" data-target="#registrar_genero" aria-expanded="false" aria-controls="registrar_genero">Registrar</button>
                                            <button type="button" class="btn btn-md botones" data-toggle="collapse" data-target="#registrar_genero" aria-expanded="false" aria-controls="registrar_genero">Cancelar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Registrar genero -->

                        <div class="form-group row">
                            <label for="tamaño" class="col-md-4 col-form-label">Tamaño:</label>
                            <div class="col-md-7 p-0">
                                <input id="tamaño" placeholder="Ej: S" type="text" class="form-control" name="tamaño" required autocomplete="tamaño" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="catalogo" class="col-md-4 col-form-label">Enviar a catalogo:</label>
                            <div class="custom-control custom-switch pt-2 pl-5">
                                <input type="checkbox" class="custom-control-input" id="customSwitch2" checked>
                                <label class="custom-control-label" for="customSwitch2"></label>
                            </div>
                        </div>

                        <div class="form-group mr-4">
                            <label for="descripcion" class="d-inline-flex col-form-label">Descripción:</label>
                            <textarea class="form-control" id="descripcion" rows="5"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn color-verde">Registrar</button>
                    <button type="button" class="btn botones" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
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

label {
    font-family: 'Montserrat', sans-serif;
}

.btn-registrar-genero {
    margin-left: 147px;
    margin-bottom: 16px;
}

.form-registrar-genero {
    margin-right: 27px;
    margin-bottom: 16px;
}

/* Collapse */

.flecha:after {
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

.flecha.collapsed:after {
    transform: rotate(0deg);
}
</style>
