<template>
<div class="col-3 pr-0 menu-producto-tips-DS">
    <!-- Subtitulo -->
    <br>
    <h2 class="row justify-content-center subtitulo-DS w-100 m-0" v-if="tipo=='plantas'">GÉNERO</h2>
    <h2 class="row justify-content-center subtitulo-DS w-100 m-0" v-else-if="tipo=='merchandising'">TIPO DE PRODUCTO</h2>
    <h2 class="row justify-content-center subtitulo-DS w-100 m-0" v-else-if="tipo=='implementos'">TIPO DE IMPLEMENTO</h2>
    <div class="row align-items-center row justify-content-center w-100 m-0">
        <hr align="left" class="izquierda-DS ml-0 mr-2" noshade="noshade" style="width:100px;">✻
        <hr align="left" class="derecha-DS ml-2 mr-0" noshade="noshade" style="width:100px;">
    </div>
    <div class="row justify-content-center" v-if="tipo=='plantas'">
        <div class="col-9 borde-menu-DS"></div>
        <div v-for="(item, index) in generos" :key="index" class="col-9 text-center py-1 opcion-menu-DS">
            {{ item.genero }}
        </div>
    </div>
    <div class="row justify-content-center" v-else>
        <div class="col-9 borde-menu-DS"></div>
        <div v-for="(item, index) in generos" :key="index" class="col-9 text-center py-1 opcion-menu-DS">
            {{ item.tipo }}
        </div>
    </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            generos: []
        }
    },
    created() {
        axios.get(`/tiposControl/${this.tipo}`).then(response => {
            console.log(response.data);
            this.generos = response.data;
        })
    },
    methods: {

    },
    props: ['tipo']
}
</script>

<style scoped>
.borde-menu-DS {
    border-top: #434343 3px solid;
    width: 230px;
}

.opcion-menu-DS {
    border-bottom: #434343 3px solid;
    font-family: 'Montserrat', sans-serif;
}

.opcion-menu-DS:hover {
    background-color: #9DCE5B;
    color: white;
    cursor: pointer;
}

.menu-producto-tips-DS {
    border-right: #434343 3px solid;
}
</style>
