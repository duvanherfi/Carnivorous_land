<template lang="es">
<!--Cartas-->
<div id="todos_los_productos">
    <!--Card-->
    <div class="card carta-DS" v-for="(item, index) in productos" :key="index" style="width: 290px; height: 475px;">
        <!--Card image-->
        <div class="img-sombra-producto-DS">
            <img class="imagen-producto-DS" v-bind:src="'/img/productoss/' + item.imagen_principal" alt="Imagen producto" />
        </div>
        <div class="btn-gestion">
            <button @click="modalModificar(item)" class="btn color-verde d-inline" data-toggle="modal" data-target="#modal_modificar_articulo">Modificar</button>
            <button @click="modaleliminarProducto(item.id_producto)" class="btn botones ml-1 d-inline" data-toggle="modal" data-target="#verificar_eliminar_producto">Eliminar</button>
        </div>
        <!-- /Imagen -->

        <!-- Contenido Inventario -->
        <div class="card-body card-body-cascade" v-if="gestion == 'gestion'">
            <div v-if="producto.categoria == 'merchandising'
                || producto.categoria == 'implementos'" class="my-2"></div>
            <!-- Nombre -->
            <h5 class="font-weight-bold mb-0 texto-truncado text-center">{{ item.nombre }}</h5>
            <hr class="my-1">
            <!-- Valor -->
            <p class="mb-0 text-center">Valor: {{ item.valor | currency}} COP</p>
            <!-- Cantidad -->
            <p class="mb-0 text-center">Cantidad: {{ item.cantidad }}</p>
            <!-- Stock minimo -->
            <p class="mb-0 text-center">Stock mínimo: {{ item.stock_minimo }}</p>
            <!-- Tamaño -->
            <p v-if="producto.categoria == 'plantas'" class="mb-0 text-center">Tamaño: {{ item.tamaño }}</p>
            <hr class="my-1">
            <!-- Opcion catalogo -->
            <div class="custom-control custom-switch pl-5" v-if="item.opcion_catalogo == 'true'">
                <label class="opcion_catalogo">Enviar a catálogo:</label>
                <input @change="guardarOpcionCatalogo(item.id_producto, item.opcion_catalogo, index)" type="checkbox" class="custom-control-input" :id="item.id_producto" checked>
                <label class="custom-control-label" :for="item.id_producto"></label>
            </div>
            <div class="custom-control custom-switch pl-5" v-else>
                <label class="opcion_catalogo">Enviar a catálogo:</label>
                <input @change="guardarOpcionCatalogo(item.id_producto, item.opcion_catalogo, index)" type="checkbox" class="custom-control-input" :id="item.id_producto" name="check">
                <label class="custom-control-label" :for="item.id_producto"></label>
            </div>
        </div>
    </div>
    <!--/.Card-->

    <!-- Paginacion -->
    <div class="d-inline">
        <nav aria-label="Page navigation example" class="d-flex justify-content-center">
            <ul class="pagination">
                <li class="page-item" v-if="paginacion.current_page > 1">
                    <a @click.prevent="changePage(paginacion.current_page - 1)" class="page-link borde-gris" href="#" v-bind:class="[page == isActived ? 'letra-blanca bordes-paginacion' : '']">
                        Atras</a></li>
                <li class="page-item" v-for="page in pagesNumber" v-bind:class="[page == isActived ? 'botones bordes-paginacion' : '']">
                    <a @click.prevent="changePage(page)" class="page-link borde-gris" href="#" v-bind:class="[page == isActived ? 'letra-blanca bordes-paginacion' : '']">{{ page }}</a></li>
                <li class="page-item" v-if="paginacion.current_page < paginacion.last_page">
                    <a @click.prevent="changePage(paginacion.current_page + 1)" class="page-link borde-gris" href="#" v-bind:class="[page == isActived ? 'letra-blanca bordes-paginacion' : '']">
                        Siguiente</a></li>
            </ul>
        </nav>
    </div>
    <!-- /Paginacion -->

    <!-- Verificar eliminar -->
    <div class="modal fade" id="verificar_eliminar_producto" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="row subtitulo-DS pt-3 w-100 m-0">
                        <img class="" src="/img/precaucion.png" alt="Icono de precaucion" width="30">¡ADVERTENCIA!</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>¿Esta seguro de desea eliminar el artículo?</p>
                </div>
                <div class="modal-footer">
                    <button @click="eliminarProducto(producto.id)" type="button" class="btn color-verde" data-dismiss="modal">Si</button>
                    <button type="button" class="btn botones" data-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal modificar articulo -->
    <div class="modal fade" id="modal_modificar_articulo" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="row subtitulo-DS pt-3 w-100 m-0">MODIFICAR ARTÍCULO</h2><br>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="ml-3">
                        <div class="form-group row">
                            <label for="imagen_principal_modificar" class="col-md-4 col-form-label pr-0">Imagen principal:</label>
                            <div class="archivos col-md-7 p-0">
                                <input @change="obtenerImagenPrincipal" type="file" class="custom-file-input" :class="mensajeErrorProducto.imagen_principal != undefined ? 'is-invalid' : ''" name="imagen_principal_modificar" id="imagen_principal_modificar" accept="image/*" lang="es">
                                <label class="custom-file-label" for="imagen_principal_modificar" v-if="this.producto.imagen_principalnombre == ''">Seleccionar Archivo</label>
                                <label class="custom-file-label" for="imagen_principal_modificar" v-else>{{ this.producto.imagen_principalnombre }}</label>
                                <span v-if="mensajeErrorProducto.imagen_principal != undefined" class="invalid-feedback" style="display: flex;" role="alert">
                                    <strong>{{ mensajeErrorProducto.imagen_principal[0] }}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="imagen2_modificar" class="col-md-4 col-form-label">Imagen #2:</label>
                            <div class="archivos col-md-7 p-0">
                                <input @change="obtenerImagen2" type="file" class="custom-file-input" :class="mensajeErrorProducto.imagen2 != undefined ? 'is-invalid' : ''" name="imagen2_modificar" id="imagen2_modificar" accept="image/*" lang="es">
                                <label class="custom-file-label" for="imagen2_modificar" v-if="this.producto.imagen2nombre == ''">Seleccionar Archivo</label>
                                <label class="custom-file-label" for="imagen2_modificar" v-else>{{ this.producto.imagen2nombre }}</label>
                                <span v-if="mensajeErrorProducto.imagen2 != undefined" class="invalid-feedback" style="display: flex;" role="alert">
                                    <strong>{{ mensajeErrorProducto.imagen2[0] }}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="imagen3_modificar" class="col-md-4 col-form-label">Imagen #3:</label>
                            <div class="archivos col-md-7 p-0">
                                <input @change="obtenerImagen3" type="file" class="custom-file-input" :class="mensajeErrorProducto.imagen3 != undefined ? 'is-invalid' : ''" name="imagen3_modificar" id="imagen3_modificar" accept="image/*" lang="es">
                                <label class="custom-file-label" for="imagen3_modificar" v-if="this.producto.imagen3nombre == ''">Seleccionar Archivo</label>
                                <label class="custom-file-label" for="imagen3_modificar" v-else>{{ this.producto.imagen3nombre }}</label>
                                <span v-if="mensajeErrorProducto.imagen3 != undefined" class="invalid-feedback" style="display: flex;" role="alert">
                                    <strong>{{ mensajeErrorProducto.imagen3[0] }}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nombre_modificar" class="col-md-4 col-form-label">Nombre:</label>
                            <div class="col-md-7 p-0">
                                <input v-model="producto.nombre" id="nombre_modificar" placeholder="Ej: Drosera" type="text" class="form-control" 
                                :class="mensajeErrorProducto.nombre != undefined ? 'is-invalid' : ''" name="nombre_modificar" required autocomplete="nombre_modificar" autofocus>
                                <span v-if="mensajeErrorProducto.nombre != undefined" class="invalid-feedback" style="display: flex;" role="alert">
                                    <strong>{{ mensajeErrorProducto.nombre[0] }}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="valor_modificar" class="col-md-4 col-form-label">Valor:</label>
                            <div class="col-md-7 p-0">
                                <input v-model="producto.valor" id="valor_modificar" placeholder="Ej: 50000" type="number" class="form-control" 
                                :class="mensajeErrorProducto.valor != undefined ? 'is-invalid' : ''" name="valor_modificar" required autocomplete="valor_modificar" autofocus>
                                <span v-if="mensajeErrorProducto.valor != undefined" class="invalid-feedback" style="display: flex;" role="alert">
                                    <strong>{{ mensajeErrorProducto.valor[0] }}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cantidad_modificar" class="col-md-4 col-form-label">Cantidad:</label>
                            <div class="col-md-7 p-0">
                                <input v-model="producto.cantidad" id="cantidad_modificar" placeholder="Ej: 43" type="number" class="form-control" 
                                :class="mensajeErrorProducto.cantidad != undefined ? 'is-invalid' : ''" name="cantidad_modificar" required autocomplete="cantidad_modificar" autofocus>
                                <span v-if="mensajeErrorProducto.cantidad != undefined" class="invalid-feedback" style="display: flex;" role="alert">
                                    <strong>{{ mensajeErrorProducto.cantidad[0] }}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="stock_minimo_modificar" class="col-md-4 col-form-label">Stock mínimo:</label>
                            <div class="col-md-7 p-0">
                                <input v-model="producto.stock_minimo" id="stock_minimo_modificar" placeholder="Ej: 10" type="number" class="form-control" 
                                :class="mensajeErrorProducto.stock_minimo != undefined ? 'is-invalid' : ''" name="stock_minimo_modificar" required autocomplete="stock_minimo_modificar" autofocus>
                                <span v-if="mensajeErrorProducto.stock_minimo != undefined" class="invalid-feedback" style="display: flex;" role="alert">
                                    <strong>{{ mensajeErrorProducto.stock_minimo[0] }}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row" v-if="this.producto.categoria=='plantas'">
                            <label for="tamaño_modificar" class="col-md-4 col-form-label">Tamaño:</label>
                            <div class="col-md-7 p-0">
                                <select v-model="producto.tamaño" class="custom-select form-control" id="tamaño" 
                                :class="mensajeErrorProducto.tamaño != undefined ? 'is-invalid' : ''" name="tamaño" required autocomplete="tamaño">
                                    <option disabled value="">Escoge una opción</option>
                                    <option value="XS">XS</option>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                </select>
                                <span v-if="mensajeErrorProducto.tamaño != undefined" class="invalid-feedback" style="display: flex;" role="alert">
                                    <strong>{{ mensajeErrorProducto.tamaño[0] }}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group mr-4">
                            <label for="descripcion_modificar" class="d-inline-flex col-form-label">Descripción:</label>
                            <textarea v-model="producto.descripcion" class="form-control" :class="mensajeErrorProducto.descripcion != undefined ? 'is-invalid' : ''" name="descripcion_modificar" id="descripcion_modificar" rows="5"></textarea>
                            <span v-if="mensajeErrorProducto.descripcion != undefined" class="invalid-feedback" style="display: flex;" role="alert">
                                <strong>{{ mensajeErrorProducto.descripcion[0] }}</strong>
                            </span>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button @click="modificarProducto(producto.id)" type="button" class="btn color-verde">Modificar</button>
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
import {
    isNullOrUndefined
} from 'util';
export default {
    data() {
        return {
            productos: [],
            tipos: [],
            producto: {
                id: '',
                imagen_principal: '',
                imagen_principalnombre: '',
                imagen_principalnombreAntiguo: '',
                imagen2: '',
                imagen2nombre: '',
                imagen2nombreAntiguo: '',
                imagen3: '',
                imagen3nombre: '',
                imagen3nombreAntiguo: '',
                nombre: '',
                nombreAntiguo: '',
                valor: '',
                cantidad: '',
                stock_minimo: '',
                categoria: '',
                genero: '',
                tamaño: '',
                tamañoAntiguo: '',
                opcion_catalogo: '',
                descripcion: ''
            },
            activar: true,
            offset: 3,
            paginacion: {
                total: 0,
                current_page: 0,
                per_page: 0,
                last_page: 0,
                next_page_url: 0,
                prev_page_url: 0,
                from: 0,
                to: 0
            },
            mensajeErrorProducto: []
        };
    },
    created() {
        EventBus.$on('articulos', data => {
            $('#todos_los_productos').css('visibility', 'hidden');
            this.producto.categoria = data.categoria;
            this.producto.genero = data.genero;
            axios.get(`/productosControl/${this.producto.genero}/${this.producto.categoria}/${this.gestion}?page=1`).then(response => {
                this.productos = response.data.data;
                this.hacerPaginacion(response.data);
                $('#todos_los_productos').css('visibility', 'visible');
            })
        })
    },
    beforeUpdate() {
        EventBus.$on('activarUpdate', data => {
            this.activar = data;
            if (this.activar == true) {
                this.actualizarProductos(this.paginacion.current_page);
            }
        })

        EventBus.$on('ordenar', data => {
            if (data == 'ninguno') {
                this.actualizarProductos(this.paginacion.current_page);
            } else if (data == 'alfabeticamente') {
                this.productos.sort(function comparar(a, b) {
                    if (a.nombre.toLowerCase() < b.nombre.toLowerCase()) return -1;
                });
            } else if (data == 'ascendente') {
                this.productos.sort(function comparar(a, b) {
                    return b.valor - a.valor;
                });
            } else if (data == 'descendente') {
                this.productos.sort(function comparar(a, b) {
                    return a.valor - b.valor;
                });
            } else if (data == 'destacados') {
                this.productos.sort(function comparar(a, b) {
                    return b.calificacion - a.calificacion;
                });
            }
        })
    },
    updated() {
        this.activar = false;
    },
    computed: {
        isActived() {
            return this.paginacion.current_page;
        },
        pagesNumber() {
            if (!this.paginacion.to) {
                return [];
            }

            var from = this.paginacion.current_page - this.offset;
            if (from < 1) {
                from = 1;
            }

            var to = from + (this.offset * 2);
            if (to >= this.paginacion.last_page) {
                to = this.paginacion.last_page;
            }

            var pagesArray = [];
            while (from <= to) {
                pagesArray.push(from);
                from++;
            }
            return pagesArray;
        }
    },
    methods: {
        hacerPaginacion(data) {
            this.paginacion.total = data.total;
            this.paginacion.current_page = data.current_page;
            this.paginacion.per_page = data.per_page;
            this.paginacion.last_page = data.last_page;
            this.paginacion.next_page_url = data.next_page_url;
            this.paginacion.prev_page_url = data.prev_page_url;
            this.paginacion.from = data.from;
            this.paginacion.to = data.to;
        },
        changePage(page) {
            EventBus.$emit('reiniciarTipoOrden', 'ninguno');
            this.paginacion.current_page = page;
            this.actualizarProductos(page);
        },
        obtenerImagenPrincipal(e) {
            let file = e.target.files[0];
            if (isNullOrUndefined(file)) {
                this.producto.imagen_principalnombre = '';
            } else {
                this.producto.imagen_principalnombre = file.name;
            }
            this.producto.imagen_principal = file;
        },
        obtenerImagen2(e) {
            let file = e.target.files[0];
            if (isNullOrUndefined(file)) {
                this.producto.imagen2nombre = '';
            } else {
                this.producto.imagen2nombre = file.name;
            }
            this.producto.imagen2 = file;
        },
        obtenerImagen3(e) {
            let file = e.target.files[0];
            if (isNullOrUndefined(file)) {
                this.producto.imagen3nombre = '';
            } else {
                this.producto.imagen3nombre = file.name;
            }
            this.producto.imagen3 = file;
        },
        actualizarProductos(page) {
            axios.get(`/productosControl/${this.producto.genero}/${this.producto.categoria}/${this.gestion}?page=` + page).then(response => {
                this.productos = response.data.data;
                this.hacerPaginacion(response.data);
                $('#todos_los_productos').css('visibility', 'visible');
            });
        },
        generarTipos() {
            axios.get(`/tiposControl/${this.producto.categoria}`).then(response => {
                this.tipos = response.data;
            })
        },
        modalModificar(item) {
            this.generarTipos();

            this.producto.imagen_principalnombre = this.producto.imagen_principalnombreAntiguo = item.imagen_principal;
            this.mensajeErrorProducto.imagen_principal = undefined;
            this.producto.imagen2nombre = this.producto.imagen2nombreAntiguo = item.imagen2;
            this.mensajeErrorProducto.imagen2 = undefined;
            this.producto.imagen3nombre = this.producto.imagen3nombreAntiguo = item.imagen3;
            this.mensajeErrorProducto.imagen3 = undefined;
            this.producto.nombre = this.producto.nombreAntiguo = item.nombre;
            this.mensajeErrorProducto.nombre = undefined;
            this.producto.valor = item.valor;
            this.mensajeErrorProducto.valor = undefined;
            this.producto.cantidad = item.cantidad;
            this.mensajeErrorProducto.cantidad = undefined;
            this.producto.stock_minimo = item.stock_minimo;
            this.mensajeErrorProducto.stock_minimo = undefined;
            this.producto.tamaño = this.producto.tamañoAntiguo = item.tamaño;
            this.mensajeErrorProducto.tamaño = undefined;
            this.producto.descripcion = item.descripcion;
            this.mensajeErrorProducto.descripcion = undefined;

            this.producto.id = item.id_producto;

            $('#imagen_principal_modificar').val(null);
            $('#imagen2_modificar').val(null);
            $('#imagen3_modificar').val(null);
        },
        modificarProducto(id) {
            let formData = new FormData();
            formData.append('imagen_principal', this.producto.imagen_principal);
            formData.append('imagen_principalnombre', this.producto.imagen_principalnombre);
            formData.append('imagen_principalnombreAntiguo', this.producto.imagen_principalnombreAntiguo);
            formData.append('imagen2', this.producto.imagen2);
            formData.append('imagen2nombre', this.producto.imagen2nombre);
            formData.append('imagen2nombreAntiguo', this.producto.imagen2nombreAntiguo);
            formData.append('imagen3', this.producto.imagen3);
            formData.append('imagen3nombre', this.producto.imagen3nombre);
            formData.append('imagen3nombreAntiguo', this.producto.imagen3nombreAntiguo);
            formData.append('nombre', this.producto.nombre);
            formData.append('nombreAntiguo', this.producto.nombreAntiguo);
            formData.append('valor', this.producto.valor);
            formData.append('cantidad', this.producto.cantidad);
            formData.append('stock_minimo', this.producto.stock_minimo);
            formData.append('tamaño', this.producto.tamaño);
            formData.append('tamañoAntiguo', this.producto.tamañoAntiguo);
            formData.append('genero', this.producto.genero);
            formData.append('descripcion', this.producto.descripcion);

            axios.post(`/productosControl/${id}/${this.producto.categoria}`, formData).then(response => {
                if (!isNullOrUndefined(response.data.existenErrores)) {
                    this.mensajeErrorProducto = response.data.errores;
                    if (this.producto.imagen_principalnombre == '')
                        this.mensajeErrorProducto.imagen_principal = ['El campo es obligatorio.'];
                    if (this.producto.imagen2nombre == '')
                        this.mensajeErrorProducto.imagen2 = ['El campo es obligatorio.'];
                    if (this.producto.imagen3nombre == '')
                        this.mensajeErrorProducto.imagen3 = ['El campo es obligatorio.'];
                    if (response.data.nombreUnico != '') {
                        this.mensajeErrorProducto.nombre = response.data.nombreUnico;
                    }
                    toastr.error('La modificación fue rechazada, por favor revise el formulario');
                } else {
                    $('#modal_modificar_articulo').modal('hide');
                    this.actualizarProductos();
                    toastr.success('La modificación se realizo con éxito');
                }
            })
        },
        guardarOpcionCatalogo(id_producto, opcion_catalogo, index) {
            if (opcion_catalogo == 'true') {
                this.productos[index].opcion_catalogo = 'false';
            } else {
                this.productos[index].opcion_catalogo = 'true';
            }

            axios.put(`/productosControl/${this.productos[index].opcion_catalogo}/${id_producto}`).then(response => {})
        },
        modaleliminarProducto(id) {
            this.producto.id = id;
        },
        eliminarProducto(id) {
            axios.delete(`/productosControl/${id}`).then(response => {
                this.actualizarProductos();
            })
        }
    },
    props: ['gestion']
};
</script>

<style scoped>
.page-item:last-child .page-link:hover {
    background-color: #434343 !important;
    border-top-right-radius: 0.25rem !important;
    border-bottom-right-radius: 0.25rem !important;
    color: white !important;
}

.page-item:first-child .page-link:hover {
    background-color: #434343 !important;
    border-top-left-radius: 0.25rem !important;
    border-bottom-left-radius: 0.25rem !important;
    color: white !important;
}

.borde-gris {
    border: 1px solid #434343 !important;
    color: #434343 !important;
    font-family: 'Montserrat', sans-serif;
}

.letra-blanca {
    color: white !important;
}

.bordes-paginacion:last-child {
    border-top-right-radius: 0.25rem;
    border-bottom-right-radius: 0.25rem;
}

.bordes-paginacion:first-child {
    border-top-left-radius: 0.25rem;
    border-bottom-left-radius: 0.25rem;
}

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

label {
    color: #434343;
    font-family: 'Montserrat', sans-serif;
}

.color-verde {
    background-color: #86a74d;
    color: white;
}

.carta-DS {
    color: #434343;
}

.img-sombra-producto-DS {
    -webkit-box-shadow: 0px 7px 13px -5px rgba(0, 0, 0, 0.75);
    -moz-box-shadow: 0px 7px 13px -5px rgba(0, 0, 0, 0.75);
    box-shadow: 0px 7px 13px -5px rgba(0, 0, 0, 0.75);
    height: 290px;
}
</style>
