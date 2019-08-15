<template>
<!--Cartas-->
<div>
    <!--Card-->
    <div class="card carta-DS" v-for="(item, index) in productos" :key="index" style="width: 290px; height: 370px;">
        <!--Card image-->
        <div class="img-sombra-producto-DS">
            <img class="imagen-producto-DS" v-bind:src="'/img/productoss/' + item.imagen_principal" alt="">
        </div>
        <!-- /Imagen -->
        <!-- Contenido -->
        <div class="card-body card-body-cascade">
            <div class="row justify-content-between m-0">
                <!-- <form> -->
                <p class="clasificacion">
                    <input id="radio1" type="radio" name="estrellas" value="5">
                    <label for="radio1">★</label>
                    <input id="radio2" type="radio" name="estrellas" value="4">
                    <label for="radio2">★</label>
                    <input id="radio3" type="radio" name="estrellas" value="3">
                    <label for="radio3">★</label>
                    <input id="radio4" type="radio" name="estrellas" value="2">
                    <label for="radio4">★</label>
                    <input id="radio5" type="radio" name="estrellas" value="1">
                    <label for="radio5">★</label>
                </p>
                <!-- </form> -->
                <h6 class="col-4 align-self-center mb-1 px-0">Tamaño: {{ item.nombre }}</h6>
            </div>
            <!-- Género -->
            <h5 class="font-weight-bold card-title mb-1">{{ item.nombre }}</h5>
            <!-- Nombre -->
            <h6 class="mb-1">{{ item.nombre }}</h6>
            <p class="font-weight-bold card-text mb-1">${{ item.valor }} COP</p>
            <!-- Button -->
            <button class="btn btn-block color-verde"><i class="fas fa-cart-plus"></i> Añadir al carro</button>
        </div>
        <!-- /Contenido -->
    </div>
    <!--/.Card-->
</div>
<!--/Cartas-->
</template>

<script>
export default {
    data() {
        return {
            productos: [],
            producto: {
                imagen: '',
                genero: '',
                nombre: '',
                valor: '',
                tamaño: ''
            }
        }
    },
    created() {
        axios.get('/productosControl').then(response => {
            this.productos = response.data;
        })
    },
    updated() {
        axios.get('/productosControl').then(response => {
            this.productos = response.data;
        })
    },
    methods: {
        obtenerImagen(e) {
            let file = e.target.files[0];
            this.producto.imagen = file;
        },
        añadirProducto() {
            let formData = new FormData();
            formData.append('imagen', this.producto.imagen);
            formData.append('genero', this.producto.genero);
            formData.append('nombre', this.producto.nombre);
            formData.append('valor', this.producto.valor);
            formData.append('tamaño', this.producto.tamaño);
            axios.post('/productos', formData).then(response => {
                // console.log(response.data);
                this.productos.push(response.data);
            })
            this.producto.imagen = '';
            this.producto.genero = '';
            this.producto.nombre = '';
            this.producto.valor = '';
            this.producto.tamaño = '';
        }
    }
}
</script>

<style>
#form {
    width: 250px;
    margin: 0 auto;
    height: 50px;
}

#form p {
    text-align: center;
}

#form label {
    font-size: 20px;
}

input[type="radio"] {
    display: none;
}

label {
    color: #434343;
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

p {
    cursor: default;
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
