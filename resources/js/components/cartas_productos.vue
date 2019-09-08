<template>
<!--Cartas-->
<div id="todos_los_productos_vista">
    <!--Card-->
    <div class="card carta-DS" v-for="(item, index) in productos" :key="index" style="width: 290px; height: 370px;">
        <!--Card image-->
        <div class="img-sombra-producto-DS">
            <a @click="descripcion(item)" v-bind:href="descripcionProducto"><img class="imagen-producto-DS" v-bind:src="'/img/productoss/' + item.imagen_principal" alt="Imagen producto" /></a>
        </div>
        <!-- /Imagen -->

        <!-- Contenido -->
        <div class="card-body card-body-cascade">
            <div class="row justify-content-between m-0 tamaño-estrellas">
                <form>
                <p class="clasificacion">
                    <input v-model="item.calificacion" type="radio" name="estrellas" value="5" />
                    <label class="m-0">★</label>
                    <input v-model="item.calificacion" type="radio" name="estrellas" value="4" />
                    <label class="m-0">★</label>
                    <input v-model="item.calificacion" type="radio" name="estrellas" value="3" />
                    <label class="m-0">★</label>
                    <input v-model="item.calificacion" type="radio" name="estrellas" value="2" />
                    <label class="m-0">★</label>
                    <input v-model="item.calificacion" type="radio" name="estrellas" value="1" />
                    <label class="m-0">★</label>
                </p>
                </form>
                <p v-if="tipo == 'plantas' || item.tamaño != null" class="col-4 align-self-center mb-0 px-0">Tamaño: {{ item.tamaño }}</p>
            </div>
            <!-- Nombre -->
            <h5 class="font-weight-bold card-title mb-1">{{ item.nombre }}</h5>
            <!-- Cantidad -->
            <p class="mb-1">Disponible: {{ item.cantidad }}</p>
            <!-- Valor -->
            <h5 class="font-weight-bold mb-1">{{ item.valor | currency}} COP</h5>
            <!-- Button -->
            <button @click="añadirCarrito(item, index)" v-if="item.opcionCancelar == false" class="btn btn-block color-verde añadirCarritoBtn">
                <i class="fas fa-cart-plus"></i>
                Añadir al carro
            </button>
            <button @click="cancelarCarrito(item.id_producto, index)" v-else class="btn btn-block botones añadirCarritoBtn">
                <i class="fas fa-ban"></i>
                Cancelar
            </button>
        </div>
        <!-- /Contenido -->
    </div>
    <!--/.Card-->

    <!-- Paginacion -->
    <div class="d-inline">
        <nav aria-label="Page navigation example" class="d-flex justify-content-center">
            <ul class="pagination">
                <li class="page-item" v-if="paginacion.current_page > 1">
                    <a @click.prevent="changePage(paginacion.current_page - 1)" class="page-link borde-gris" href="#" v-bind:class="[page == isActived ? 'letra-blanca bordes-paginacion' : '']">
                        Atras</a></li>
                <li class="page-item" v-for="(page,index) in pagesNumber" :key="index" v-bind:class="[page == isActived ? 'botones bordes-paginacion' : '']">
                    <a @click.prevent="changePage(page)" class="page-link borde-gris" href="#" v-bind:class="[page == isActived ? 'letra-blanca bordes-paginacion' : '']">{{ page }}</a></li>
                <li class="page-item" v-if="paginacion.current_page < paginacion.last_page">
                    <a @click.prevent="changePage(paginacion.current_page + 1)" class="page-link borde-gris" href="#" v-bind:class="[page == isActived ? 'letra-blanca bordes-paginacion' : '']">
                        Siguiente</a></li>
            </ul>
        </nav>
    </div>
    <!-- /Paginacion -->

    <!-- Verificar CarritoCompra -->
    <div class="modal fade" id="verificar_carrito" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                    <p>Señor(a) usuario, para poder añadir un producto al carrito necesita haber iniciado sesión primero.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn botones" data-dismiss="modal">Cerrar</button>
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
            descripcionProducto: '',
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
                valor: '',
                cantidad: '',
                stock_minimo: '',
                categoria: '',
                genero: '',
                tamaño: '',
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
            }
        }
    },
    created() {
        if (this.tipo == 'calificacion') {
            axios.get(`/productosControl/ninguno/productosPorCalificacion/${this.tipo}`).then(response => {
                this.productos = response.data.data;
                // console.log(response.data);
            })
        }
        EventBus.$on('articulos_productos', data => {
            $('#todos_los_productos_vista').css('visibility', 'hidden');
            this.producto.categoria = data.categoria;
            this.producto.genero = data.genero;
            axios.get(`/productosControl/${this.producto.genero}/${this.producto.categoria}/${this.tipo}?page=1`).then(response => {
                this.productos = response.data.data;
                this.hacerPaginacion(response.data);
                // console.log(response.data);
                $('#todos_los_productos_vista').css('visibility', 'visible');
            })
        })
        EventBus.$on('actualizarOpcionCancelar', data => {
            for (let i = 0; i < this.productos.length; i++) {
                if (this.productos[i].id == data.id) {
                    if (data.accion == 'añadir') {
                        this.productos[i].opcionCancelar = true;
                    }else if (data.accion == 'cancelar'){
                        this.productos[i].opcionCancelar = false;
                    }
                    break;
                }
            }
        })
    },
    beforeUpdate() {
        EventBus.$on('ordenar', data => {
            if (data == 'ninguno') {
                axios.get(`/productosControl/${this.producto.genero}/${this.producto.categoria}/${this.tipo}`).then(response => {
                    this.productos = response.data;
                })
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
        actualizarProductos(page) {
            axios.get(`/productosControl/${this.producto.genero}/${this.producto.categoria}/${this.tipo}?page=`+page).then(response => {
                this.productos = response.data.data;
                this.hacerPaginacion(response.data);
                // console.log(response.data);
                $('#todos_los_productos_vista').css('visibility', 'visible');
            })
        },
        añadirCarrito(item, index) {
            axios.get('/comprobarSiAdmin').then(response => {
                if (response.data == '') {
                    $('#verificar_carrito').modal('show');
                } else {
                    this.productos[index].opcionCancelar = true;
                    var contadorCarrito = Number($('#contadorCarrito').html());
                    contadorCarrito += 1;
                    $('#contadorCarrito').html(contadorCarrito);

                    $('[data-toggle="popover"]').popover("show");
                    setTimeout("$('#añadirCarrito').popover('hide');", 5000);

                    let formData = new FormData();
                    formData.append('id', item.id_producto);
                    formData.append('nombre', item.nombre);
                    formData.append('imagen', item.imagen_principal);
                    formData.append('valor', item.valor);
                    formData.append('tamaño', item.tamaño);

                    axios.post('/carritoControl', formData).then(response => {
                        // console.log(response.data);
                    })
                }
            })
        },
        cancelarCarrito(id, index) {
            this.productos[index].opcionCancelar = false;
            var contadorCarrito = Number($('#contadorCarrito').html());
            contadorCarrito -= 1;
            $('#contadorCarrito').html(contadorCarrito);
            axios.delete(`/carritoControl/${id}`).then(response => {
                // console.log(response.data);
            })
        },
        descripcion(item) {
            const params = {
                categoria: this.tipo,
                id: item.id_producto
            }
            this.descripcionProducto = route('descripcion_producto', params);
        }
    },
    props: ['tipo']
}
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

.card-body {
    font-family: 'Montserrat', sans-serif;
    padding: 16px;
}

.custom-control {
    margin-right: 39px;
}

input[type="radio"] {
    display: none;
}

label {
    color: #434343;
    font-family: 'Montserrat', sans-serif;
}

.clasificacion {
    direction: rtl;
    unicode-bidi: bidi-override;
    width: 105px;
    height: 30px;
    margin: 0;
    font-size: 20px;
    cursor: default;
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
