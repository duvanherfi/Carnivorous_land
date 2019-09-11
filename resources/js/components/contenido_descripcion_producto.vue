<template>
<div class="contenido-descripcion d-inline-block">
    <h1>{{ producto.genero }}</h1>
    <h3>{{ producto.nombre }}</h3>
    <p class="clasificacion">
        <input v-model="producto.calificacion" type="radio" name="estrellas" value="5">
        <label>★</label>
        <input v-model="producto.calificacion" type="radio" name="estrellas" value="4">
        <label>★</label>
        <input v-model="producto.calificacion" type="radio" name="estrellas" value="3">
        <label>★</label>
        <input v-model="producto.calificacion" type="radio" name="estrellas" value="2">
        <label>★</label>
        <input v-model="producto.calificacion" type="radio" name="estrellas" value="1">
        <label>★</label>
    </p>
    <h1>{{ producto.valor | currency }} COP</h1>
    <h4 class="font-weight-bold">Tamaño: {{ producto.tamaño }}</h4>
    <h4 class="font-weight-bold">Disponible: {{ producto.cantidad }}</h4>
    <button @click="cancelarCarrito()" v-if="producto.opcionCancelar == true" class="btn btn-lg botones w-50 m-0">
        <i class="fas fa-ban"></i> Cancelar</button>
    <button @click="advertencia('Señor(a) usuario, este producto no se puede añadir al carrito debido a que se encuentra agotado.')"
        v-else-if="producto.opcionCancelar == false && producto.cantidad == 0" class="btn btn-lg color-verde w-50">
        <i class="fas fa-cart-plus"></i>
        Añadir al carro
    </button>
    <button @click="añadirCarrito()" v-else class="btn btn-lg color-verde w-50">
        <i class="fas fa-cart-plus"></i> Añadir al carro</button>
    <pre class="mt-2">{{ producto.descripcion }}</pre>
    <h4 class="text-center">Ayudanos compartiendo nuestra página y redes sociales</h4>
    <div class="row justify-content-center">
        <a href="https://www.facebook.com/CarnivorousLandPlantasCarnivorasColombia/?epa=SEARCH_BOX" target="_blank">
            <img v-bind:src="'/img/redes-sociales/facebook.png'" alt="Facebook" width="45">
        </a>
        <a href="https://www.instagram.com/carnivorousland" target="_blank">
            <img class="ml-2" src="/img/redes-sociales/instagram.png" alt="Instagram" width="45">
        </a>
        <a href="https://www.youtube.com/channel/UC-HHD-jISuSeqQnGylaow1w" target="_blank">
            <img class="ml-2" src="/img/redes-sociales/youtube.png" alt="Youtube" width="45">
        </a>
        <a href="https://api.whatsapp.com/send?phone=573167973829" target="_blank">
            <img class="ml-2" src="/img/redes-sociales/whatsapp.png" alt="Whatsapp" width="45">
        </a>
        <a href="/carnivorousland.com" target="_blank">
            <img class="ml-2 icono_carnivorousland" src="/img/Logo.jpg" alt="Whatsapp" width="45">
        </a>
    </div>

    <!-- Verificar CarritoCompra -->
    <div class="modal fade" id="verificar_carrito_descripcion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                    <p>{{ mensajeAdvertencia }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn botones" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import EventBus from '../event_bus'
export default {
    data() {
        return {
            mensajeAdvertencia: '',
            producto: []
        }
    },
    created() {
        EventBus.$on('descripcionProducto', data => {
            this.producto = data;
        });
    },
    methods: {
        advertencia(mensaje){
            this.mensajeAdvertencia = mensaje;
            $('#verificar_carrito_descripcion').modal('show');
        },
        añadirCarrito() {
            axios.get('/comprobarSiAdmin').then(response => {
                if (response.data == '') {
                    this.advertencia('Señor(a) usuario, para poder añadir un producto al carrito necesita haber iniciado sesión primero.');
                } else {
                    this.producto.opcionCancelar = true;
                    var contadorCarrito = Number($('#contadorCarrito').html());
                    contadorCarrito += 1;
                    $('#contadorCarrito').html(contadorCarrito);

                    $('[data-toggle="popover"]').popover("show");
                    setTimeout("$('#añadirCarrito').popover('hide');", 5000);

                    const params = {
                        id: this.producto.id_producto,
                        accion: 'añadir'
                    };
                    EventBus.$emit('actualizarOpcionCancelar', params);

                    let formData = new FormData();
                    formData.append('id', this.producto.id_producto);
                    formData.append('nombre', this.producto.nombre);
                    formData.append('imagen', this.producto.imagen_principal);
                    formData.append('valor', this.producto.valor);
                    formData.append('tamaño', this.producto.tamaño);
                    formData.append('cantidad', item.cantidad);

                    axios.post('/carritoControl', formData).then(response => {
                        // console.log(response.data);
                    })
                }
            })
        },
        cancelarCarrito() {
            this.producto.opcionCancelar = false;
            var contadorCarrito = Number($('#contadorCarrito').html());
            contadorCarrito -= 1;
            const params = {
                id: this.producto.id_producto,
                accion: 'cancelar'
            };
            EventBus.$emit('actualizarOpcionCancelar', params);
            $('#contadorCarrito').html(contadorCarrito);
            axios.delete(`/carritoControl/${this.producto.id_producto}`).then(response => {
                // console.log(response.data);
            })
        },
    }
}
</script>

<style scoped>
.icono_carnivorousland {
    border-radius: 50px;
    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, .16), 0 2px 10px 0 rgba(0, 0, 0, .12);
}

.contenido-descripcion {
    width: 50%;
    box-sizing: border-box;
    padding-left: 10px;
}

h1 {
    font-family: 'Source Sans Pro', serif;
    font-weight: bold;
    color: #434343;
    margin-bottom: 0rem;
}

h3 {
    font-family: 'Source Sans Pro', serif;
    font-weight: bold;
    color: #434343;
    font-size: 2rem;
    margin-bottom: 0rem;
}

h4 {
    font-family: 'Source Sans Pro', serif;
    font-weight: bold;
    color: #434343;
}

.color-verde {
    background-color: #86a74d;
    color: white;
    margin: 0rem;
}

/* Estrellas */

input[type="radio"] {
    display: none;
}

label {
    color: #434343;
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
</style>
