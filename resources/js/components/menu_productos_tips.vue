<template>
<div class="col-3 pr-0 menu-producto-tips-DS">
    <!-- Subtitulo -->
    <br>
    <h2 class="row justify-content-center subtitulo-DS w-100 m-0" v-if="tipo=='plantas' || tipo=='tips_cultivo'">GÉNERO</h2>
    <h2 class="row justify-content-center subtitulo-DS w-100 m-0" v-else-if="tipo=='merchandising'">TIPO DE PRODUCTO</h2>
    <h2 class="row justify-content-center subtitulo-DS w-100 m-0" v-else-if="tipo=='implementos'">TIPO DE IMPLEMENTO</h2>
    <div class="row align-items-center row justify-content-center w-100 m-0">
        <hr align="left" class="izquierda-DS ml-0 mr-2" noshade="noshade" style="width:100px;">✻
        <hr align="left" class="derecha-DS ml-2 mr-0" noshade="noshade" style="width:100px;">
    </div>
    <div class="row justify-content-center" v-if="tipo=='tips_cultivo' && isAdmin == 'administrador'">
        <div class="col-9 borde-menu-DS"></div>
        <div @click="mostrarPlantas(item.genero)" v-for="(item, index) in generos" :key="index" class="col-9 text-center py-1 opcion-menu-DS">
            {{ item.genero }}
        </div>
    </div>
    <div class="row justify-content-center" v-if="tipo=='tips_cultivo' && isAdmin == 'Cliente_con_o_sin_registrar'">
        <div class="col-9 borde-menu-DS"></div>
        <div @click="mostrarPlantas(item.genero)" v-for="(item, index) in tip_genero" :key="index" class="col-9 text-center py-1 opcion-menu-DS">
            {{ item.genero }}
        </div>
    </div>
    <div class="row justify-content-center" v-if="tipo=='plantas'">
        <div class="col-9 borde-menu-DS"></div>
        <div @click="mostrarPlantas(item.genero)" v-for="(item, index) in generos" :key="index" class="col-9 text-center py-1 opcion-menu-DS">
            {{ item.genero }}
        </div>
    </div>
    <div class="row justify-content-center" v-else-if="tipo=='merchandising'">
        <div class="col-9 borde-menu-DS"></div>
        <div @click="mostrarMerchandising(item.tipo)" v-for="(item, index) in generos" :key="index" class="col-9 text-center py-1 opcion-menu-DS">
            {{ item.tipo }}
        </div>
    </div>
    <div class="row justify-content-center" v-else-if="tipo=='implementos'">
        <div class="col-9 borde-menu-DS"></div>
        <div @click="mostrarImplementos(item.tipo)" v-for="(item, index) in generos" :key="index" class="col-9 text-center py-1 opcion-menu-DS">
            {{ item.tipo }}
        </div>
    </div>
</div>
</template>

<script>
import EventBus from '../event_bus'
import {
    isNullOrUndefined
} from 'util';
export default {
    data() {
        return {
            generos: [],
            isAdmin: ''
        }
    },
    beforeCreate(){
        axios.get('/comprobarSiAdmin').then(response => {
            if (response.data == 'administrador') {
                this.isAdmin = response.data;
            }else{
                this.isAdmin = 'Cliente_con_o_sin_registrar';
            }
            EventBus.$emit('tip', this.isAdmin);
        })
    },
    created() {
        axios.get(`/tiposControl/${this.tipo}`).then(response => {
            // console.log(response.data);
            this.generos = response.data;
            if (this.tipo == 'tips_cultivo' && this.isAdmin == 'administrador') {
                const params = {
                    genero: response.data[0].genero,
                    categoria: 'plantas'
                };
                EventBus.$emit('articulos_productos', params);
            } else if (this.tipo == 'tips_cultivo' && this.isAdmin == 'Cliente_con_o_sin_registrar') {
                var posicion = "";
                for (var pos in this.tip_genero) {
                    posicion = pos;
                    break;
                }
                const params = {
                    genero: this.tip_genero[posicion].genero,
                    categoria: 'plantas'
                };
                EventBus.$emit('articulos_productos', params);
            } else if (this.tipo == 'plantas') {
                const params = {
                    genero: response.data[0].genero,
                    categoria: 'plantas'
                };
                EventBus.$emit('articulos_productos', params);
            } else if (this.tipo == 'merchandising') {
                const params = {
                    genero: response.data[0].tipo,
                    categoria: 'merchandising'
                };
                EventBus.$emit('articulos_productos', params);
            } else if (this.tipo == 'implementos') {
                const params = {
                    genero: response.data[0].tipo,
                    categoria: 'implementos'
                };
                EventBus.$emit('articulos_productos', params);
            }
        })
    },
    methods: {
        mostrarPlantas(genero) {
            const params = {
                genero: genero,
                categoria: 'plantas'
            };
            EventBus.$emit('articulos_productos', params);
        },
        mostrarMerchandising(tipo) {
            const params = {
                genero: tipo,
                categoria: 'merchandising'
            };
            EventBus.$emit('articulos_productos', params);
        },
        mostrarImplementos(tipo) {
            const params = {
                genero: tipo,
                categoria: 'implementos'
            };
            EventBus.$emit('articulos_productos', params);
        }
    },
    props: ['tipo'],
    computed: {
        tip_genero: function () {
            return _.pickBy(this.generos, function (g) {
                return g.tips_de_cultivo != '';
            });
        },
    }
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
</style>
