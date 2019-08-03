<template>
<!--Cartas-->
<div>
    <!--Card-->
    <div class="card m-3 carta-DS" style="width: 19rem; height: 370px;">
        <!--Card image-->
        <div class="view overlay">
            <img class="imagen-producto-DS shadow-lg mb-5 bg-white" src="/img/cartas/carta1.jpg" alt="">
            <div class="mask rgba-white-slight"></div>
        </div>
        <!-- /Imagen -->
        <!-- Contenido -->
        <div class="card-body card-body-cascade">
            <div class="row row justify-content-between">
                <!-- Label -->
                <h5 class="col-5 font-weight-bold card-title mb-1">Drosera</h5>
                <h6 class="col-5 align-self-center mb-1 px-3">Tamaño: M</h6>
            </div>
            <!-- Title -->
            <h6 class="mb-1">Capensis</h6>
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
            <!-- Text -->
            <p class="font-weight-bold card-text mb-1">$50.000 COP</p>
            <!-- Button -->
            <button class="btn btn-block color-gris"><i class="fas fa-cart-plus"></i> Añadir al carro</button>
            <!-- /Contenido -->
        </div>
        <!--/.Card-->
    </div>
</div>
<!--/Cartas-->
</template>

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

label{
    color: #434343;
}

.color-gris{
    background-color:#86a74d;
    color: white;
}

.color-gris:hover{
    color: white;
}

.clasificacion {
    direction: rtl;
    unicode-bidi: bidi-override;
    width: 77px;
    height: 30px;
    margin: 0;
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
</style>
