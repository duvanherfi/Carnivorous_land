<template>
<div class="contenido-descripcion d-inline-block">
    <h1>Drosera</h1>
    <h3>Czech Giant</h3>
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
    <h1>$50.000 COP</h1>
    <h4 class="font-weight-bold">Disponible: 5</h4>
    <button class="btn btn-lg color-verde"><i class="fas fa-cart-plus"></i> Añadir al carro</button>
    <p class="mt-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus ipsum soluta, dolor repellat vel, sint pariatur et corporis quibusdam impedit ab? Doloremque, labore doloribus. Quidem sunt eveniet cupiditate blanditiis sed exercitationem voluptate corporis rem ipsam. Explicabo, recusandae sed quos libero voluptatum, facilis ea eos quam fugit vel, consectetur dolorem aliquam alias harum aperiam hic tempore aut omnis voluptas suscipit totam facere. Iste minus sed odit possimus dolor, modi alias soluta provident ut aliquid, laudantium quidem ipsum repudiandae atque cum magni illo accusamus debitis quibusdam necessitatibus voluptate earum similique laboriosam. Deleniti incidunt magni a suscipit quod quibusdam explicabo, esse natus sint!</p>
    <h4>Compartir</h4>
    <a href="https://www.facebook.com/CarnivorousLandPlantasCarnivorasColombia/?epa=SEARCH_BOX" target="_blank">
        <img src="img/redes-sociales/facebook.png" alt="Facebook" width="45">
    </a>
    <a href="https://www.instagram.com/carnivorousland" target="_blank">
        <img class="ml-2" src="img/redes-sociales/instagram.png" alt="Instagram" width="45">
    </a>
    <a href="https://api.whatsapp.com/send?phone=573167973829" target="_blank">
        <img class="ml-2" src="img/redes-sociales/whatsapp.png" alt="Whatsapp" width="45">
    </a>
</div>
</template>

<style scoped>
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
    width: 84px;
    height: 30px;
    margin: 0;
    font-size: 1rem;
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
