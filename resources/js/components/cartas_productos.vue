<template>
<!--Cartas-->
<div>
    <!--Card-->
    <div class="card carta-DS" v-for="(item, index) in productos" :key="index" style="width: 290px; height: 370px;">
        <!--Card image-->
        <div class="img-sombra-producto-DS">

            <img class="imagen-producto-DS" v-bind:src="'/img/productoss/' + item.imagen_principal" alt />
        </div>
        <div class="btn-gestion">
            <button @click="modalModificar(item)" class="btn color-verde d-inline" >Modificar</button>
            <button class="btn botones ml-1 d-inline">Eliminar</button>
        </div>
        <!-- /Imagen -->

        <!-- Contenido Inventario -->
        <div class="card-body card-body-cascade" v-if="gestion == 'gestion'">
            <!-- Género -->
            <h5 class="font-weight-bold mb-0 text-center">{{ item.genero }}</h5>
            <!-- Nombre -->
            <p class="mb-0 text-center">{{ item.nombre }}</p>
            <hr class="my-1">
            <!-- Valor -->
            <p class="mb-0 text-center">Valor: {{ item.valor | currency}} COP</p>
            <!-- Cantidad -->
            <p class="mb-0 text-center">Cantidad: {{ item.cantidad }}</p>
            <!-- Stock minimo -->
            <p class="mb-0 text-center">Stock mínimo: {{ item.stock_minimo }}</p>
            <hr class="my-1">
            <!-- Opcion catalogo -->
            <div class="custom-control custom-switch pl-5" v-if="item.opcion_catalogo == 'true'">
                <label class="opcion_catalogo">Enviar a catálogo:</label>
                <input type="checkbox" class="custom-control-input" :id="item.nombre" checked>
                <label class="custom-control-label" :for="item.nombre"></label>
            </div>
            <div class="custom-control custom-switch pl-5" v-else>
                <label class="opcion_catalogo">Enviar a catálogo:</label>
                <input type="checkbox" class="custom-control-input" :id="item.nombre" name="check">
                <label class="custom-control-label" :for="item.nombre"></label>
            </div>
        </div>

        <!-- Contenido -->
        <div class="card-body card-body-cascade" v-else>
            <div class="row justify-content-between m-0 tamaño-estrellas">
                <!-- <form> -->
                <p class="clasificacion">
                    <input id="radio1" type="radio" name="estrellas" value="5" />
                    <label for="radio1" class="m-0">★</label>
                    <input id="radio2" type="radio" name="estrellas" value="4" />
                    <label for="radio2" class="m-0">★</label>
                    <input id="radio3" type="radio" name="estrellas" value="3" />
                    <label for="radio3" class="m-0">★</label>
                    <input id="radio4" type="radio" name="estrellas" value="2" />
                    <label for="radio4" class="m-0">★</label>
                    <input id="radio5" type="radio" name="estrellas" value="1" />
                    <label for="radio5" class="m-0">★</label>
                </p>
                <!-- </form> -->
                <p class="col-4 align-self-center mb-0 px-0">Tamaño: {{ item.tamaño }}</p>
            </div>
            <!-- Género -->
            <h5 class="font-weight-bold card-title mb-1">{{ item.genero }}</h5>
            <!-- Nombre -->
            <p class="mb-1">{{ item.nombre }}</p>
            <!-- Valor -->
            <h5 class="font-weight-bold mb-1">{{ item.valor | currency}} COP</h5>
            <!-- Button -->
            <button @click="popoverProducto" class="btn btn-block color-verde añadirCarritoBtn">
                <i class="fas fa-cart-plus"></i>
                Añadir al carro
            </button>
        </div>
        <!-- /Contenido -->
    </div>
    <!--/.Card-->

    <!-- Modal modificar articulo -->
    <div class="modal fade" id="modal_modificar_articulo" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="row subtitulo-DS pt-3 w-100 m-0">REGISTRO DE ARTÍCULO</h2><br>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="ml-3">
                        <p id="msj_campos">Todos los campos con * son obligatorios</p>
                        <div class="form-group row">
                            <label for="imagen_principal" class="col-md-4 col-form-label pr-0">Imagen principal*:</label>
                            <div class="custom-file col-md-7">
                                <input @change="obtenerImagenPrincipal" type="file" class="custom-file-input" name="imagen_principal" id="customFileLang" lang="es">
                                <label class="custom-file-label" for="customFileLang" v-if="this.producto.imagen_principalnombre == ''">Seleccionar Archivo</label>
                                <label class="custom-file-label" for="customFileLang" v-else>{{ this.producto.imagen_principalnombre }}</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="imagen2" class="col-md-4 col-form-label">Imagen #2*:</label>
                            <div class="custom-file col-md-7">
                                <input @change="obtenerImagen2" type="file" class="custom-file-input" name="imagen2" id="customFileLang" lang="es">
                                <label class="custom-file-label" for="customFileLang" v-if="this.producto.imagen2nombre == ''">Seleccionar Archivo</label>
                                <label class="custom-file-label" for="customFileLang" v-else>{{ this.producto.imagen2nombre }}</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="imagen3" class="col-md-4 col-form-label">Imagen #3*:</label>
                            <div class="custom-file col-md-7">
                                <input @change="obtenerImagen3" type="file" class="custom-file-input" name="imagen3" id="customFileLang" lang="es">
                                <label class="custom-file-label" for="customFileLang" v-if="this.producto.imagen3nombre == ''">Seleccionar Archivo</label>
                                <label class="custom-file-label" for="customFileLang" v-else>{{ this.producto.imagen3nombre }}</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label id="nombre_label" for="nombre" class="col-md-4 col-form-label">Nombre*:</label>
                            <div class="col-md-7 p-0">
                                <input v-model="producto.nombre" id="nombre" placeholder="Ej: Drosera" type="text" class="form-control" name="nombre" required autocomplete="nombre" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="valor" class="col-md-4 col-form-label">Valor*:</label>
                            <div class="col-md-7 p-0">
                                <input v-model="producto.valor" id="valor" placeholder="Ej: 50000" type="number" class="form-control" name="valor" required autocomplete="valor" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cantidad" class="col-md-4 col-form-label">Cantidad*:</label>
                            <div class="col-md-7 p-0">
                                <input v-model="producto.cantidad" id="cantidad" placeholder="Ej: 43" type="number" class="form-control" name="cantidad" required autocomplete="cantidad" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="stock_minimo" class="col-md-4 col-form-label">Stock mínimo*:</label>
                            <div class="col-md-7 p-0">
                                <input v-model="producto.stock_minimo" id="stock_minimo" placeholder="Ej: 10" type="number" class="form-control" name="stock_minimo" required autocomplete="stock_minimo" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="categoria" class="col-md-4 col-form-label">Categoría*: </label>
                            <div class="col-md-7 p-0">
                                <select @change="generarTipos" v-model="producto.categoria" class="custom-select form-control" id="categoria" name="categoria" required autocomplete="categoria">
                                    <option value="plantas">Plantas</option>
                                    <option value="merchandising">Merchandising</option>
                                    <option value="implementos">Implementos de cultivo</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label v-if="this.producto.categoria=='plantas'" for="tipo" class="col-md-4 col-form-label">Género*: </label>
                            <label v-else for="tipo" class="col-md-4 col-form-label">Tipo*: </label>
                            <div class="col-md-7 p-0">
                                <select v-model="producto.genero" v-if="this.producto.categoria=='plantas'" class="custom-select form-control" id="tipo" name="tipo" required autocomplete="tipo">
                                    <option v-for="(item, index) in tipos" :key="index">{{ item.genero }}</option>
                                </select>
                                <select v-model="producto.genero" v-else class="custom-select form-control" id="tipo" name="tipo" required autocomplete="tipo">
                                    <option v-for="(item, index) in tipos" :key="index">{{ item.tipo }}</option>
                                </select>
                            </div>
                        </div>

                        <!-- Registrar genero -->
                        <button @click="limpiarRegistrarTipo" v-if="this.producto.categoria=='plantas'" type="button" class="btn btn-md color-verde btn-registrar-genero mt-0" data-toggle="collapse" data-target="#registrar_genero" aria-expanded="false" aria-controls="registrar_genero">Registrar Género</button>
                        <button @click="limpiarRegistrarTipo" v-else type="button" class="btn btn-md color-verde btn-registrar-genero mt-0" data-toggle="collapse" data-target="#registrar_genero" aria-expanded="false" aria-controls="registrar_genero">Registrar Tipo</button>

                        <div class="row">
                            <div class="col">
                                <div class="collapse" id="registrar_genero">
                                    <div class="card card-body form-registrar-genero">
                                        <form class="ml-3">
                                            <div class="form-group row">
                                                <label for="imagen" class="col-md-3 col-form-label">Imagen*:</label>
                                                <div class="custom-file col-md-8">
                                                    <input @change="obtenerImagenTipo" type="file" class="custom-file-input" name="imagen" id="customFileLang" lang="es">
                                                    <label class="custom-file-label" for="customFileLang" v-if="this.tipo.imagen_tiponombre == ''">Seleccionar Archivo</label>
                                                    <label class="custom-file-label" for="customFileLang" v-else>{{ this.tipo.imagen_tiponombre }}</label>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="nombre_tipo" class="col-md-3 col-form-label">Nombre*:</label>
                                                <div class="col-md-8 p-0">
                                                    <input v-model="tipo.nombre" id="nombre_tipo" placeholder="Ej: Drosera" type="text" class="form-control" name="nombre_tipo" required autocomplete="nombre_tipo" autofocus>
                                                </div>
                                            </div>

                                            <div class="form-group mr-4">
                                                <label for="descripcion_tipo" class="d-inline-flex col-form-label">Descripción*:</label>
                                                <textarea v-model="tipo.descripcion" class="form-control" id="descripcion_tipo" rows="5"></textarea>
                                            </div>

                                            <button @click="registrarTipo" type="button" class="btn btn-md color-verde" data-toggle="collapse" data-target="#registrar_genero" aria-expanded="false" aria-controls="registrar_genero">Registrar</button>
                                            <button type="button" class="btn btn-md botones" data-toggle="collapse" data-target="#registrar_genero" aria-expanded="false" aria-controls="registrar_genero">Cancelar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Registrar genero -->

                        <div class="form-group row" v-if="this.producto.categoria=='plantas'">
                            <label for="tamaño" class="col-md-4 col-form-label">Tamaño*:</label>
                            <div class="col-md-7 p-0">
                                <input v-model="producto.tamaño" id="tamaño" placeholder="Ej: S" type="text" class="form-control" name="tamaño" required autocomplete="tamaño" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="catalogo" class="col-md-4 col-form-label">Enviar a catálogo:</label>
                            <div class="custom-control custom-switch pt-2 pl-5">
                                <input v-model="producto.opcion_catalogo" type="checkbox" class="custom-control-input" id="customSwitch2" checked>
                                <label class="custom-control-label" for="customSwitch2"></label>
                            </div>
                        </div>

                        <div class="form-group mr-4">
                            <label for="descripcion" class="d-inline-flex col-form-label">Descripción*:</label>
                            <textarea v-model="producto.descripcion" class="form-control" id="descripcion" rows="5"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button @click="registrarProducto" type="button" class="btn color-verde" data-dismiss="modal">Registrar</button>
                    <button type="button" class="btn botones" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

</div>
<!--/Cartas-->
</template>

<script>
import EventBus from '../event_bus'
export default {
    data() {
        return {
            productos: []
        };
    },
    created() {
        axios.get("/productosControl").then(response => {
            console.log(response.data);
            this.productos = response.data;
        });
    },
    updated() {
        axios.get("/productosControl").then(response => {
            this.productos = response.data;
        })
    },
    methods: {
        popoverProducto() {
            $('[data-toggle="popover"]').popover("show");
            setTimeout("$('#añadirCarrito').popover('hide');", 5000);
        },
        modalModificar(item) {
            $('#modal_registrar_articulo').modal('show');
            $('#titulo_modal').html('MODIFICAR ARTÍCULO');

            $('#msj_campos').hide();
            $('#nombre_label').html('Nombre:');
            $('#nombre').val(item.nombre);
        }
    },
    props: ['gestion']
};
</script>

<style>
.btn-gestion {
    position: absolute;
}

.tamaño-estrellas {
    height: 29px;
}

.custom-control {
    margin-right: 39px;
}

.opcion_catalogo {
    margin-right: 36px;
}

.card-body {
    font-family: 'Montserrat', sans-serif;
    padding: 16px;
}

p {
    font-family: 'Montserrat', sans-serif;
    cursor: default;
}

input[type="radio"] {
    display: none;
}

label {
    color: #434343;
    font-family: 'Montserrat', sans-serif;
}

.color-verde {
    background-color: #86a74d;
    color: white;
}

.clasificacion {
    direction: rtl;
    unicode-bidi: bidi-override;
    width: 84px;
    height: 30px;
    margin: 0;
    font-size: 1rem;
}

.carta-DS {
    color: #434343;
}

label:hover,
label:hover~label {
    color: orange;
    cursor: pointer;
}

input[type="radio"]:checked~label {
    color: orange;
}

.img-sombra-producto-DS {
    -webkit-box-shadow: 0px 7px 13px -5px rgba(0, 0, 0, 0.75);
    -moz-box-shadow: 0px 7px 13px -5px rgba(0, 0, 0, 0.75);
    box-shadow: 0px 7px 13px -5px rgba(0, 0, 0, 0.75);
    height: 185px;
}
</style>
