<template lang="es">
<div class="contenido-productos-DS">
    <div v-if="id == ''" class="text-center spinner">
        <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <div v-else>
        <div class="titulo_intentario_content d-flex align-items-center justify-content-center">
            <h1 id="titulo_inventario" class="text-uppercase">{{ nombre }}</h1>
            <img v-if="imagen != ''" class="imagen-subtitulo-DS" id="imagen_inventario" v-bind:src="'/img/generos/' + imagen" alt="Fondo titulo inventario">
        </div>
        <pre class="mt-4" id="descripcion_inventario">{{ descripcion }}</pre>
        <div class="d-flex justify-content-between" id="opciones_inventario">
            <div class="d-flex">
                <label for="ordenar" class="d-inline-flex col-form-label pr-0">Ordenar:</label>

                <div class="col-md-10">
                    <select @change="ordenar" v-model="tipoOrden" class="custom-select form-control" id="ordenar" name="ordenar" required autocomplete="ordenar">
                        <option value="ninguno">Ninguno</option>
                        <option value="alfabeticamente">Alfabéticamente (Nombre)</option>
                        <option value="ascendente">Ascendente (Precio)</option>
                        <option value="descendente">Descendente (Precio)</option>
                        <option value="destacados">Más destacados</option>
                    </select>
                </div>
            </div>
            <div v-if="categoria == 'plantas'">
                <button @click="modalModificarTipo" class="btn color-verde d-inline" data-toggle="modal" data-target="#modal_modificar_genero">Modificar Género</button>
                <button class="btn botones d-inline" data-toggle="modal" data-target="#verificar_eliminar">Eliminar Género</button>
            </div>
            <div v-else>
                <button @click="modalModificarTipo" class="btn color-verde d-inline" data-toggle="modal" data-target="#modal_modificar_genero">Modificar Tipo</button>
                <button class="btn botones d-inline" data-toggle="modal" data-target="#verificar_eliminar">Eliminar Tipo</button>
            </div>
        </div>
    </div>

    <div>
        <productos :gestion="gestion"></productos>
    </div>

    <!-- Verificar eliminar -->
    <div class="modal fade" id="verificar_eliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="row subtitulo-DS pt-3 w-100 m-0">¡ADVERTENCIA!</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Señor(a) usuario, recuerde que al eliminar un género o tipo también borrará los productos del mismo.</p>
                    <p>¿Esta seguro de desea eliminar el género o tipo?</p>
                </div>
                <div class="modal-footer">
                    <button @click="eliminarGenero" type="button" class="btn color-verde" data-dismiss="modal">Si</button>
                    <button type="button" class="btn botones" data-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal modificar genero -->
    <div class="modal fade" id="modal_modificar_genero" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="row subtitulo-DS pt-3 w-100 m-0">MODIFICAR GÉNERO</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="ml-3" method="POST" action="">
                        <div class="form-group row">
                            <label for="imagen" class="col-md-3 col-form-label">Imagen:</label>
                            <div class="custom-file col-md-8">
                                <input @change="obtenerImagen" type="file" class="custom-file-input" name="imagen_modificar" id="imagen_modificar" lang="es">
                                <label class="custom-file-label" for="imagen_modificar" v-if="this.genero.imagennombre == ''">Seleccionar Archivo</label>
                                <label class="custom-file-label" for="imagen_modificar" v-else>{{ this.genero.imagennombre }}</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nombre_tipo" class="col-md-3 col-form-label">Nombre:</label>
                            <div class="col-md-8 p-0">
                                <input v-model="genero.nombre" id="nombre_tipo" placeholder="Ej: Drosera" type="text" class="form-control" name="nombre_tipo" required autocomplete="nombre_tipo" autofocus>
                            </div>
                        </div>

                        <div class="form-group mr-4">
                            <label for="descripcion_tipo" class="d-inline-flex col-form-label">Descripción:</label>
                            <textarea v-model="genero.descripcion" class="form-control" id="descripcion_tipo" rows="5"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button @click="modificarTipo" type="button" class="btn color-verde" data-dismiss="modal">Modificar</button>
                    <button type="button" class="btn botones" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import EventBus from '../event_bus'
import {
    log,
    isNullOrUndefined
} from 'util';
export default {
    data() {
        return {
            id: '',
            imagen: '',
            descripcion: '',
            nombre: '',
            categoria: '',
            genero: {
                imagen: '',
                imagennombre: '',
                imagennombreAntiguo: '',
                nombre: '',
                descripcion: ''
            },
            tipoOrden: 'ninguno'
        }
    },
    created() {
        EventBus.$on('articulos', data => {
            this.id = '';
            this.categoria = data.categoria;
            axios.get(`/tiposControl/${data.genero}/${data.categoria}`).then(response => {
                this.imagen = response.data.imagen;
                if (this.categoria == 'plantas') {
                    this.nombre = response.data.genero;
                } else {
                    this.nombre = response.data.tipo;
                }
                this.descripcion = response.data.descripcion;
                this.id = response.data.id;
            })
        })
    },
    methods: {
        obtenerImagen(e) {
            let file = e.target.files[0];
            if (isNullOrUndefined(file)) {
                this.genero.imagennombre = '';
            } else {
                this.genero.imagennombre = file.name;
            }
            this.genero.imagen = file;
        },
        actualizar() {
            axios.get(`/tiposControl/${this.genero.nombre}/${this.categoria}`).then(response => {
                this.imagen = response.data.imagen;
                if (this.categoria == 'plantas') {
                    this.nombre = response.data.genero;
                } else {
                    this.nombre = response.data.tipo;
                }
                this.descripcion = response.data.descripcion;
                this.id = response.data.id;
            })
        },
        modalModificarTipo() {
            this.genero.imagennombre = this.genero.imagennombreAntiguo = this.imagen;
            this.genero.nombre = this.nombre;
            this.genero.descripcion = this.descripcion;

            $('#imagen_modificar').val(null);
        },
        modificarTipo() {
            let formData = new FormData();
            formData.append('imagen', this.genero.imagen);
            formData.append('imagennombreAntiguo', this.genero.imagennombreAntiguo);
            formData.append('genero', this.genero.nombre);
            formData.append('descripcion', this.genero.descripcion);
            formData.append('categoria', this.categoria);

            axios.post(`/tiposControl/${this.id}`, formData).then(response => {
                // console.log(response.data);
                this.actualizar();
                const params = {
                    activar: true,
                    categoria: this.categoria
                }
                EventBus.$emit('actualizarMenuInventario', params);
            })
        },
        eliminarGenero() {
            axios.delete(`/tiposControl/${this.id}/${this.categoria}`).then(response => {
                // console.log(response.data);
                var merchandising = false;
                var implementos = false;
                axios.get('/tiposControl/plantas').then(response => {
                    if (!(isNullOrUndefined(response.data))) {
                        const params = {
                            genero: response.data[0].genero,
                            categoria: 'plantas'
                        };
                        EventBus.$emit('articulos', params);
                    } else {
                        merchandising = true;
                    }
                });
                if (merchandising == true) {
                    axios.get('/tiposControl/merchandising').then(response => {
                        if (!(isNullOrUndefined(response.data))) {
                            const params = {
                                genero: response.data[0].genero,
                                categoria: 'merchandising'
                            };
                            EventBus.$emit('articulos', params);
                        } else {
                            implementos = true;
                        }
                    });
                }
                if (implementos == true) {
                    axios.get('/tiposControl/implementos').then(response => {
                        if (!(isNullOrUndefined(response.data))) {
                            const params = {
                                genero: response.data[0].genero,
                                categoria: 'implementos'
                            };
                            EventBus.$emit('articulos', params);
                        }
                    });
                }
            })
            const param = {
                activar: true,
                categoria: this.categoria
            }
            EventBus.$emit('actualizarMenuInventario', param);
        },
        ordenar() {
            EventBus.$emit('ordenar', this.tipoOrden);
        }
    },
    props: ['gestion']
}
</script>

<style scoped>
.spinner {
    margin-top: 150px;
}

.imagen-subtitulo-DS {
    width: 100%;
    height: 150px;
    object-fit: cover;
}

.titulo_intentario_content {
    width: 100%;
    height: 150px;
}

#titulo_inventario {
    position: absolute;
    color: white;
}

.contenido-productos-DS {
    padding-top: 1.5rem;
    padding-left: 2rem;
    padding-bottom: 1.5rem;
    max-width: 74%;
    width: 74%;
    border-left: #434343 3px solid;
}

h1 {
    font-size: 60px;
    font-weight: bold;
    font-family: 'Source Sans Pro', serif;
    text-shadow: 0 0 30px #9DCE5B;
}

label {
    font-family: 'Montserrat', sans-serif;
}
</style>
