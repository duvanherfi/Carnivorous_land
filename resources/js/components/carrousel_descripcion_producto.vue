<template>
<!--Carousel Wrapper-->
<div id="carousel-example-2" class="carousel slide carousel-fade h-100 d-inline-block carrousel-descripcion" data-interval="false" data-ride="carousel">
    <!--Indicators-->
    <div class="contenedor-imgs-pequeñas">
        <img data-target="#carousel-example-2" data-slide-to="0" class="active indicadores float-left" v-bind:src="'/img/productoss/' + producto.imagen_principal" alt="">
        <img v-if="producto.imagen2 != null" data-target="#carousel-example-2" data-slide-to="1" class="indicadores float-left" v-bind:src="'/img/productoss/' + producto.imagen2" alt="">
        <img v-if="producto.imagen3 != null" data-target="#carousel-example-2" data-slide-to="2" class="indicadores float-left" v-bind:src="'/img/productoss/' + producto.imagen3" alt="">
    </div>
    <!--/.Indicators-->
    <!--Slides-->
    <div class="carousel-inner contenedor-imgs-grandes" role="listbox">
        <div class="carousel-item active">
                <img class="d-block imagen-descripcion" v-bind:src="'/img/productoss/' + producto.imagen_principal" alt="First slide">
        </div>
        <div v-if="producto.imagen2 != null" class="carousel-item">
                <img class="d-block imagen-descripcion" v-bind:src="'/img/productoss/' + producto.imagen2" alt="Second slide">
        </div>
        <div v-if="producto.imagen3 != null" class="carousel-item">
                <img class="d-block imagen-descripcion" v-bind:src="'/img/productoss/' + producto.imagen3" alt="Third slide">
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
    width: 100%;
    height: 133.3px;
    padding: 5.33333px 5.33333px 0px 0px;
    object-fit: cover;
    box-sizing: border-box;
    cursor: pointer;
}

.indicadores:first-child{
    padding-top: 0px;
}

.carrousel-descripcion {
    width: 50%;
    margin: 0;
    float: left;
    box-sizing: border-box;
}

.imagen-descripcion{
    width: 400px;
    height: 400px;
    object-fit: cover;
}

.contenedor-imgs-grandes{
    width: 72%;
}

.contenedor-imgs-pequeñas{
    width: 28%;
}
</style>
