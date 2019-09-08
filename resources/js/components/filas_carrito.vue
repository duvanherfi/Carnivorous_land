<template>
<table id="cart" class="table table-hover table-condensed pt-5 mt-5">
    <thead id="carrito_tabla">
        <tr>
            <th style="width:20%">Imagen</th>
            <th style="width:23%">Producto</th>
            <th style="width:7%">Tamaño</th>
            <th style="width:15%" class="text-center">Precio</th>
            <th style="width:8%">Cantidad</th>
            <th style="width:17%" class="text-center">Subtotal</th>
            <th style="width:10%" class="text-center">Cancelar</th>
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
            <td class="text-center" v-if="item[0].tamaño == 'undefined' || item[0].tamaño == 'null'"></td>
            <td class="text-center" v-else>{{ item[0].tamaño }}</td>
            <td data-th="Precio" class="text-center">{{ item[0].valor | currency}}</td>
            <td data-th="Cantidad">
                <input @change="subtotal(item[0].valor, item[0].cantidad, index)" v-model="item[0].cantidad" type="number" min="1" max="5" class="form-control text-center">
            </td>
            <td data-th="Subtotal" class="text-center">{{ item[0].subtotal | currency }}</td>
            <td class="actions" data-th="">
                <button @click="cancelarProductoCarrito(item[0].id, index)" class="btn btn-danger btn-sm"><img src="/img/carrito/eliminar.png" alt="eliminar producto" width="25"></button>
            </td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3"><a v-bind:href="continuarComprando" id="continuar_comprando" class="btn btn-success">Continuar comprando</a></td>
            <td colspan="2" class="hidden-xs text-center">Total:</td>
            <td class="hidden-xs text-center"><strong id="total">{{ total | currency }}</strong></td>
            <td></td>
        </tr>
    </tfoot>
</table>
</template>

<script>
export default {
    data() {
        return {
            productos: [],
            total: 0,
            continuarComprando: route('productos','plantas')
        }
    },
    created() {
        axios.get('/carritoControl').then(response => {
            this.productos = response.data;
            var sum = 0;
            this.productos.forEach(element => {
                sum += Number(element[0].subtotal);
            });
            this.total = sum;
            // console.log(response.data);
        })
    },
    updated() {
        var total = $('#total').html();
        $('#precio').html(total);
    },
    methods: {
        subtotal(valor, cantidad, index) {
            var subtotal = valor * cantidad;
            this.productos[index][0].subtotal = subtotal;
            var sum = 0;
            this.productos.forEach(element => {
                sum += Number(element[0].subtotal);
            });
            this.total = sum;
        },
        cancelarProductoCarrito(id, index) {
            var contadorCarrito = Number($('#contadorCarrito').html());
            contadorCarrito -= 1;
            $('#contadorCarrito').html(contadorCarrito);
            this.productos.splice(index, 1);
            axios.delete(`/carritoControl/${id}`).then(response => {
                // console.log(response.data);
            })
        }
    }
}
</script>

<style>
.imagen_carrito {
    width: 220px;
    height: 110px;
    object-fit: cover;
}
</style>
