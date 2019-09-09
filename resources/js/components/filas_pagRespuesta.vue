<template>
<div>
    <table class="table table-hover table-condensed">
        <thead class="carrito_tabla">
            <tr>
                <th colspan="2" class="text-center">CALIFICACIÓN</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center">
                    Calificar todos tus productos con el mismo puntaje
                    <form>
                        <p class="clasificacion">
                            <input v-model="calificarTodos" id="radio1" type="radio" name="estrellas" value="5">
                            <label for="radio1">★</label>
                            <input v-model="calificarTodos" id="radio2" type="radio" name="estrellas" value="4">
                            <label for="radio2">★</label>
                            <input v-model="calificarTodos" id="radio3" type="radio" name="estrellas" value="3">
                            <label for="radio3">★</label>
                            <input v-model="calificarTodos" id="radio4" type="radio" name="estrellas" value="2">
                            <label for="radio4">★</label>
                            <input v-model="calificarTodos" id="radio5" type="radio" name="estrellas" value="1">
                            <label for="radio5">★</label>
                        </p>
                    </form>
                    <a @click="calificarTodo()" v-bind:href="inicio" class="btn btn-success">Calificar</a>
                </td>
            </tr>
        </tbody>
    </table>

    <table id="cart" class="table table-hover table-condensed">
        <thead class="carrito_tabla">
            <tr>
                <th style="width:25%">Imagen</th>
                <th style="width:30%">Producto</th>
                <th style="width:15%" class="text-center">Tamaño</th>
                <th style="width:30%" class="text-center">Calificación</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(item, index) in productos" :key="index">
                <td><img class="imagen_carrito" v-bind:src="'/img/productoss/' + item[0].imagen" alt="Imagen producto" /></td>
                <td data-th="Product">
                    <div>
                        <h4 class="nomargin m-0 text-break">{{ item[0].nombre }}</h4>
                    </div>
                </td>
                <td class="text-center" v-if="item[0].tamaño == 'undefined'"></td>
                <td class="text-center" v-else>{{ item[0].tamaño }}</td>
                <td>
                    <form>
                        <p class="clasificacion">
                            <input v-model="item[0].calificacion" :id="item[0].id + '1'" type="radio" name="estrellas" value="5">
                            <label :for="item[0].id + '1'">★</label>
                            <input v-model="item[0].calificacion" :id="item[0].id + '2'" type="radio" name="estrellas" value="4">
                            <label :for="item[0].id + '2'">★</label>
                            <input v-model="item[0].calificacion" :id="item[0].id + '3'" type="radio" name="estrellas" value="3">
                            <label :for="item[0].id + '3'">★</label>
                            <input v-model="item[0].calificacion" :id="item[0].id + '4'" type="radio" name="estrellas" value="2">
                            <label :for="item[0].id + '4'">★</label>
                            <input v-model="item[0].calificacion" :id="item[0].id + '5'" type="radio" name="estrellas" value="1">
                            <label :for="item[0].id + '5'">★</label>
                        </p>
                    </form>
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3"></td>
                <td><a @click="calificarCadaUno()" v-bind:href="inicio" class="btn btn-success btn-block">Calificar</a></td>
            </tr>
        </tfoot>
    </table>
</div>
</template>

<script>
import toastr from 'toastr'
export default {
    data() {
        return {
            productos: [],
            calificarTodos: '',
            inicio: route('inicio')
        }
    },
    created() {
        axios.get('/carritoControl').then(response => {
            this.productos = response.data;
            if (this.estado == 'Transacción aprobada') {
                toastr.success(this.estado);
            } else if (this.estado == 'Transacción pendiente') {
                toastr.info(this.estado);
            }
            // console.log(response.data);
        })
    },
    methods: {
        calificarCadaUno() {
            axios.post('/calificarControl', this.productos).then(response => {
                // // console.log(response.data);
            })
        },
        calificarTodo(){
            for (let i = 0; i < this.productos.length; i++) {
                this.productos[i][0].calificacion = this.calificarTodos;
            }
            axios.post('/calificarControl', this.productos).then(response => {
                // console.log(response.data);
            })
        }
    },
    props: ['estado']
}
</script>

<style scoped>
.carrito_tabla {
    background-color: #9DCE5B;
    color: #FFF;
}

/* Estrellas de calificación */
form p {
    text-align: center;
    cursor: default;
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
    margin: 0;
    font-size: 40px;
}

label:hover,
label:hover~label {
    color: orange;
    cursor: pointer;
}

input[type="radio"]:checked~label {
    color: orange;
}
</style>
