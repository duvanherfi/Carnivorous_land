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
            <div @click="mostrarPlantas(item.genero)" v-for="(item, index) in generos" :key="index" class="text-center py-1 w-100 opcion-menu-DS">
                {{ item.genero }}
            </div>
        </div>
        <!-- Opcion Merchandising -->
        <div role="tab" class="text-center py-1 opcion-menu-DS">
            <div class="collapsed flecha" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Merchandising
            </div>
        </div>
        <div id="collapseTwo" class="collapse contenedor-submenu-DS" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
            <div @click="mostrarMerchandising(item.tipo)" v-for="(item, index) in merchandising" :key="index" class="text-center py-1 w-100 opcion-menu-DS">
                {{ item.tipo }}
            </div>
        </div>
        <!-- Opcion Implementos -->
        <div role="tab" class="text-center py-1 opcion-menu-DS">
            <div class="collapsed flecha" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Implementos de cultivo
            </div>
        </div>
        <div id="collapseThree" class="collapse contenedor-submenu-DS" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
            <div @click="mostrarImplementos(item.tipo)" v-for="(item, index) in implementos" :key="index" class="text-center py-1 w-100 opcion-menu-DS">
                {{ item.tipo }}
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
        <div @click="limpiarRegistraProducto" class="col-9 text-center py-1 opcion-menu-DS" data-toggle="modal" data-target="#modal_registrar_articulo">
            Registrar artículo
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
                    <form class="ml-3">
                        <p>Todos los campos con * son obligatorios</p>
                        <div class="form-group row">
                            <label for="imagen_principal" class="col-md-4 col-form-label pr-0">Imagen principal*:</label>
                            <div class="custom-file col-md-7">
                                <input @change="obtenerImagenPrincipal" type="file" class="custom-file-input" name="imagen_principal" id="imagen_principal" lang="es">
                                <label class="custom-file-label" for="imagen_principal" v-if="this.producto.imagen_principalnombre == ''">Seleccionar Archivo</label>
                                <label class="custom-file-label" for="imagen_principal" v-else>{{ this.producto.imagen_principalnombre }}</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="imagen2" class="col-md-4 col-form-label">Imagen #2*:</label>
                            <div class="custom-file col-md-7">
                                <input @change="obtenerImagen2" type="file" class="custom-file-input" name="imagen2" id="imagen2" lang="es">
                                <label class="custom-file-label" for="imagen2" v-if="this.producto.imagen2nombre == ''">Seleccionar Archivo</label>
                                <label class="custom-file-label" for="imagen2" v-else>{{ this.producto.imagen2nombre }}</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="imagen3" class="col-md-4 col-form-label">Imagen #3*:</label>
                            <div class="custom-file col-md-7">
                                <input @change="obtenerImagen3" type="file" class="custom-file-input" name="imagen3" id="imagen3" lang="es">
                                <label class="custom-file-label" for="imagen3" v-if="this.producto.imagen3nombre == ''">Seleccionar Archivo</label>
                                <label class="custom-file-label" for="imagen3" v-else>{{ this.producto.imagen3nombre }}</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label">Nombre*:</label>
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
                                    <option disabled value="">Escoge una opción</option>
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
                                    <option disabled value="">Escoge una opción</option>
                                    <option v-for="(item, index) in tipos" :key="index">{{ item.genero }}</option>
                                </select>
                                <select v-model="producto.genero" v-else class="custom-select form-control" id="tipo" name="tipo" required autocomplete="tipo">
                                    <option disabled value="">Escoge una opción</option>
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
                                                    <input @change="obtenerImagenTipo" type="file" class="custom-file-input" name="imagen" id="imagen" lang="es">
                                                    <label class="custom-file-label" for="imagen" v-if="this.tipo.imagen_tiponombre == ''">Seleccionar Archivo</label>
                                                    <label class="custom-file-label" for="imagen" v-else>{{ this.tipo.imagen_tiponombre }}</label>
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
                            <label for="catalogo" class="col-md-4 col-form-label pr-0">Enviar a catálogo*:</label>
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
                <div class="modal-footer d-block">
                    <p>Señor(a) usuario, los campos "Categoría" y "Género" no podran ser modificados, así que recuerde revisar bien la información antes de registrar el artículo.</p>
                    <div class="d-flex justify-content-end">
                        <button @click="registrarProducto" type="button" class="btn color-verde" data-dismiss="modal">Registrar</button>
                        <button type="button" class="btn botones" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import {
    isNullOrUndefined
} from 'util';
import EventBus from '../event_bus'
export default {
    data() {
        return {
            producto: {
                imagen_principal: '',
                imagen_principalnombre: '',
                imagen2: '',
                imagen2nombre: '',
                imagen3: '',
                imagen3nombre: '',
                nombre: '',
                valor: '',
                cantidad: '',
                stock_minimo: '',
                categoria: '',
                genero: '',
                tamaño: '',
                opcion_catalogo: '',
                descripcion: ''
            },
            tipo: {
                imagen_tipo: '',
                imagen_tiponombre: '',
                nombre: '',
                descripcion: ''
            },
            tipos: [],
            generos: [],
            merchandising: [],
            implementos: [],
            activar: true
        }
    },
    created() {
        axios.get('/tiposControl/plantas').then(response => {
            if (!(isNullOrUndefined(response.data))) {
                this.generos = response.data;
                const params = {
                    genero: response.data[0].genero,
                    categoria: 'plantas'
                };
                EventBus.$emit('articulos', params);
            }
        });

        axios.get('/tiposControl/merchandising').then(response => {
            this.merchandising = response.data;
            if (this.generos == '') {
                const params = {
                    genero: response.data[0].tipo,
                    categoria: 'merchandising'
                };
                EventBus.$emit('articulos', params);
            }
        });

        axios.get('/tiposControl/implementos').then(response => {
            this.implementos = response.data;
            if (this.merchandising == '') {
                const params = {
                    genero: response.data[0].tipo,
                    categoria: 'implementos'
                };
                EventBus.$emit('articulos', params);
            }
        });
    },
    updated() {
        EventBus.$on('actualizarMenuInventario', data => {
            this.activar = data.activar;
            if (this.activar == true) {
                if (data.categoria == 'plantas') {
                    axios.get('/tiposControl/plantas').then(response => {
                        this.generos = response.data;
                    });
                } else if (data.categoria == 'merchandising') {
                    axios.get('/tiposControl/merchandising').then(response => {
                        this.merchandising = response.data;
                    });
                } else if (data.categoria == 'implementos') {
                    axios.get('/tiposControl/implementos').then(response => {
                        this.implementos = response.data;
                    });
                }
            }
        })
    },
    methods: {
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
        obtenerImagenTipo(e) {
            let file = e.target.files[0];
            if (isNullOrUndefined(file)) {
                this.tipo.imagen_tiponombre = '';
            } else {
                this.tipo.imagen_tiponombre = file.name;
            }
            this.tipo.imagen_tipo = file;
        },
        registrarTipo() {
            let formData = new FormData();
            formData.append('imagen_tipo', this.tipo.imagen_tipo);
            formData.append('nombre', this.tipo.nombre);
            formData.append('descripcion', this.tipo.descripcion);
            formData.append('categoria', this.producto.categoria);
            axios.post('/tiposControl', formData).then(response => {
                // console.log(response.data);
                this.tipos.push(response.data);
                axios.get(`/tiposControl/${this.producto.categoria}`).then(response => {
                    if (this.producto.categoria == 'plantas') {
                        this.generos = response.data;
                    } else if (this.producto.categoria == 'merchandising') {
                        this.merchandising = response.data;
                    } else if (this.producto.categoria == 'implementos') {
                        this.implementos = response.data;
                    }
                })
            })
        },
        registrarProducto() {
            let formData = new FormData();
            formData.append('imagen_principal', this.producto.imagen_principal);
            formData.append('imagen2', this.producto.imagen2);
            formData.append('imagen3', this.producto.imagen3);
            formData.append('nombre', this.producto.nombre);
            formData.append('valor', this.producto.valor);
            formData.append('cantidad', this.producto.cantidad);
            formData.append('stock_minimo', this.producto.stock_minimo);
            formData.append('categoria', this.producto.categoria);
            formData.append('genero', this.producto.genero);
            formData.append('tamaño', this.producto.tamaño);
            if (this.producto.opcion_catalogo != true) {
                this.producto.opcion_catalogo = false;
            }
            formData.append('opcion_catalogo', this.producto.opcion_catalogo);
            formData.append('descripcion', this.producto.descripcion);

            axios.post('/productosControl', formData).then(response => {
                // console.log(response.data);
                EventBus.$emit('activarUpdate', true);
                if (!(isNullOrUndefined(response.data.imagen_principal))) {
                    formData.append('imagen_principalnombreAntiguo', response.data.imagen_principal);
                    formData.append('imagen2nombreAntiguo', response.data.imagen2);
                    formData.append('imagen3nombreAntiguo', response.data.imagen3);
                    // console.log(formData);
                    axios.post(`/productosControl/${response.data.id}/${response.data.categoria}`, formData).then(response => {
                        // console.log(response.data);
                    })
                }

            })
        },
        generarTipos() {
            axios.get(`/tiposControl/${this.producto.categoria}`).then(response => {
                this.tipos = response.data;
            })
        },
        mostrarPlantas(genero) {
            const params = {
                genero: genero,
                categoria: 'plantas'
            };
            EventBus.$emit('articulos', params);
        },
        mostrarMerchandising(tipo) {
            const params = {
                genero: tipo,
                categoria: 'merchandising'
            };
            EventBus.$emit('articulos', params);
        },
        mostrarImplementos(tipo) {
            const params = {
                genero: tipo,
                categoria: 'implementos'
            };
            EventBus.$emit('articulos', params);
        },
        limpiarRegistrarTipo() {
            $('#imagen').val(null);
            this.tipo.imagen_tiponombre = '';
            this.tipo.nombre = '';
            this.tipo.descripcion = '';
        },
        limpiarRegistraProducto() {
            $('#imagen_principal').val(null);
            this.producto.imagen_principalnombre = '';
            $('#imagen2').val(null);
            this.producto.imagen2nombre = '';
            $('#imagen3').val(null);
            this.producto.imagen3nombre = '';
            this.producto.nombre = '';
            this.producto.valor = '';
            this.producto.cantidad = '';
            this.producto.stock_minimo = '';
            this.producto.categoria = '';
            this.producto.genero = '';
            this.producto.tamaño = '';
            this.producto.opcion_catalogo = '';
            this.producto.descripcion = '';
        }
    }
}
</script>

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

.custom-file label {
    overflow: hidden;
    padding-top: 8px;
    padding-bottom: 4px;
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
