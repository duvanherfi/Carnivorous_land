<template>
<!--Carousel Wrapper-->
<div id="carousel-example-2" class="carousel slide carousel-fade h-100 d-inline-block carrousel-descripcion" data-interval="false" data-ride="carousel">
    <!--Slides-->
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
                <img class="d-block w-100 imagen-descripcion" v-bind:src="'/img/productoss/' + producto.imagen_principal" alt="First slide">
        </div>
        <div class="carousel-item">
                <img class="d-block w-100 imagen-descripcion" v-bind:src="'/img/productoss/' + producto.imagen2" alt="Second slide">
        </div>
        <div class="carousel-item">
                <img class="d-block w-100 imagen-descripcion" v-bind:src="'/img/productoss/' + producto.imagen3" alt="Third slide">
        </div>
        <!--Controls-->
        <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        <!--/.Controls-->
    </div>
    <!--/.Slides-->
    <!--Indicators-->
    <div class="row justify-content-center">
        <img data-target="#carousel-example-2" data-slide-to="0" class="active d-inline indicadores" v-bind:src="'/img/productoss/' + producto.imagen_principal" alt="">
        <img data-target="#carousel-example-2" data-slide-to="1" class="d-inline indicadores" v-bind:src="'/img/productoss/' + producto.imagen2" alt="">
        <img data-target="#carousel-example-2" data-slide-to="2" class="d-inline indicadores" v-bind:src="'/img/productoss/' + producto.imagen3" alt="">
    </div>
    <!--/.Indicators-->
</div>
<!--/.Carousel Wrapper-->
</template>

<script>
import EventBus from '../event_bus'
export default {
    data(){
        return{
            producto: []
        }
    },
    created(){
        axios.get(`/descripcion/${this.id}/${this.categoria}`).then(response => {
            this.producto = response.data[0];
            EventBus.$emit('descripcionProducto', this.producto);
        })  
    },
    props: ['categoria', 'id']
}
</script>

<style scoped>
.indicadores {
    width: 31.5%;
    height: 125px;
    padding: .3rem;
    object-fit: cover;
    box-sizing: border-box;
    cursor: pointer;
}

.carrousel-descripcion {
    width: 50%;
    margin: 0;
    float: left;
    box-sizing: border-box;
}

.imagen-descripcion{
    width: 555px;
    height: 300px;
    object-fit: cover;
}
</style>
