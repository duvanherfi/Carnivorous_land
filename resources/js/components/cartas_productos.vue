<template>
<!--Cartas-->
<div id="todos_los_productos_vista">
    <!--Card-->
    <div class="card carta-DS" v-for="(item, index) in productos" :key="index" style="width: 290px; height: 370px;">
        <!--Card image-->
        <div class="img-sombra-producto-DS">
            <img class="imagen-producto-DS" v-bind:src="'/img/productoss/' + item.imagen_principal" alt="Imagen producto" />
        </div>
        <!-- /Imagen -->

        <!-- Contenido -->
        <div class="card-body card-body-cascade">
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
                <p v-if="tipo == 'plantas'" class="col-4 align-self-center mb-0 px-0">Tamaño: {{ item.tamaño }}</p>
            </div>
            <!-- Género -->
            <h5 v-if="tipo == 'plantas'" class="font-weight-bold card-title mb-1">{{ item.genero }}</h5>
            <h5 v-else class="font-weight-bold card-title mb-1">{{ item.tipo }}</h5>
            <!-- Nombre -->
            <p class="mb-1">{{ item.nombre }}</p>
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
            activar: true
        }
    },
    created() {
        EventBus.$on('articulos_productos', data => {
            $('#todos_los_productos_vista').css('visibility', 'hidden');
            this.producto.categoria = data.categoria;
            this.producto.genero = data.genero;
            axios.get(`/productosControl/${this.producto.genero}/${this.producto.categoria}`).then(response => {
                this.productos = response.data;
                // console.log(response.data);
                
                $('#todos_los_productos_vista').css('visibility', 'visible');
            })
        })
    },
    beforeUpdate() {
        EventBus.$on('ordenar', data => {
            if (data == 'ninguno') {
                axios.get(`/productosControl/${this.producto.genero}/${this.producto.categoria}`).then(response => {
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
            }
        })
    },
    methods: {
        añadirCarrito(item, index) {
            axios.get('/comprobarSiAdmin').then(response => {
                if (response.data == '') {
                    $('#verificar_carrito').modal('show');
                } else {
                    $('[data-toggle="popover"]').popover("show");
                    setTimeout("$('#añadirCarrito').popover('hide');", 5000);

                    this.productos[index].opcionCancelar = true;
                    var contadorCarrito = Number($('#contadorCarrito').html());
                    contadorCarrito += 1;
                    $('#contadorCarrito').html(contadorCarrito);

                    let formData = new FormData();
                    formData.append('id', item.id_producto);
                    formData.append('nombre', item.nombre);
                    formData.append('imagen', item.imagen_principal);
                    formData.append('valor', item.valor);

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
        }
    },
    props: ['tipo']
}
</script>
