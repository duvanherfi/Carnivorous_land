<template>
<!--Cartas-->
<div>
    <!--Card-->
    <div class="card carta-DS" v-for="(item, index) in productos" :key="index" style="width: 290px; height: 370px;">
        <!--Card image-->
        <div class="img-sombra-producto-DS">
            <img class="imagen-producto-DS" v-bind:src="'/imagenes-prueba/' + item.imagen" alt="">
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
                <h6 class="col-4 align-self-center mb-1 px-0">Tamaño: {{ item.tamaño }}</h6>
            </div>
            <!-- Género -->
            <h5 class="font-weight-bold card-title mb-1">{{ item.genero }}</h5>
            <!-- Nombre -->
            <h6 class="mb-1">{{ item.nombre }}</h6>
            <p class="font-weight-bold card-text mb-1">${{ item.valor }} COP</p>
            <!-- Button -->
            <button class="btn btn-block color-gris"><i class="fas fa-cart-plus"></i> Añadir al carro</button>
        </div>
        <!-- /Contenido -->
        <!--/.Card-->
    </div>
    <!--Formulario-->
    <div class="card carta-DS" style="width: 290px; height: 370px;">
        <form @submit.prevent="añadirProducto()" enctype="multipart/form-data">
            <div class="form-group">
                <label for="imagen">Imagen</label>
                <input type="file" @change="obtenerImagen" class="form-control-file">
            </div>
            <div>
                <label for="genero">Genero</label>
                <input type="text" id="genero" v-model="producto.genero" class="form-control">
            </div>
            <div>
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" v-model="producto.nombre" class="form-control">
            </div>
            <div>
                <label for="valor">Valor</label>
                <input type="text" id="valor" v-model="producto.valor" class="form-control">
            </div>
            <div>
                <label for="tamaño">Tamaño</label>
                <input type="text" id="tamaño" v-model="producto.tamaño" class="form-control">
            </div>

            <input type="submit" value="Agregar">
        </form>
        <!--/.Formulario-->
    </div>
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
        axios.get('/productos').then(res => {
            this.productos = res.data;
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
                console.log(response.data);
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

.color-gris {
    background-color: #86a74d;
    color: white;
}

.color-gris:hover {
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
