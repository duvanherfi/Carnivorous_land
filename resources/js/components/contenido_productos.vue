<template>
<div class="contenido-productos-DS">
    <div v-if="id == ''" class="d-flex w-100 h-100">
        <div class="text-center col align-self-center">
            <div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
    <div v-else>
        <div class="titulo_productos_content d-flex align-items-center justify-content-center">
            <h1 id="titulo_productos" class="text-uppercase">{{ nombre }}</h1>
            <img v-if="imagen != ''" class="imagen-subtitulo-DS" id="imagen_productos" v-bind:src="'/img/generos/' + imagen" alt="Fondo titulo inventario">
        </div>
        <div v-if="tipo == 'tips_cultivo' && isAdmin == 'administrador'" class="mt-2">
            <button @click="modificarTip" v-if="modificar == false" class="btn color-verde d-inline ml-0">Modificar Tip</button>
            <button @click="guardarTip" v-if="modificar == true" class="btn color-verde d-inline ml-0">Guardar Tip</button>
            <button @click="cancelarTip" v-if="modificar == true" class="btn botones d-inline">Cancelar</button>
            <p>Si desea que el tip no sea visto por el cliente, deje el tip vacio.</p>
        </div>
        <textarea v-model="tips_de_cultivo_nuevo" class="form-control z-depth-1 shadow-textarea mt-4" v-if="tipo == 'tips_cultivo' && modificar == true" rows="10" placeholder="Escribe el tip de cultivo..."></textarea>
        <pre v-else-if="tipo == 'tips_cultivo' && modificar == false" class="mt-4 text-break">{{ tips_de_cultivo }}</pre>
        <pre v-else class="mt-4 text-break">{{ descripcion }}</pre>
        <div v-if="categoria != '' && tipo!='tips_cultivo'" class="d-flex justify-content-between" id="opciones_productos">
            <div class="d-flex">
                <label for="ordenar" class="d-inline-flex col-form-label pr-0">Ordenar:</label>
                <div class="col-md-10">
                    <select @change="ordenar" v-model="tipoOrden" class="custom-select form-control" id="ordenar_productos" name="ordenar" required autocomplete="ordenar">
                        <option value="ninguno">Ninguno</option>
                        <option value="alfabeticamente">Alfabéticamente (Nombre)</option>
                        <option value="ascendente">Ascendente (Precio)</option>
                        <option value="descendente">Descendente (Precio)</option>
                        <option value="destacados">Más destacados</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div v-if="tipo!='tips_cultivo'">
        <productos :tipo="tipo"></productos>
    </div>
</div>
</template>

<script>
import EventBus from '../event_bus'
export default {
    data() {
        return {
            id: '',
            imagen: '',
            descripcion: '',
            tips_de_cultivo: '',
            tips_de_cultivo_nuevo: '',
            nombre: '',
            categoria: '',
            genero: {
                imagen: '',
                imagennombre: '',
                imagennombreAntiguo: '',
                nombre: '',
                descripcion: ''
            },
            tipoOrden: 'ninguno',
            modificar: false,
            isAdmin: ''
        }
    },
    created() {
        EventBus.$on('reiniciarTipoOrden', data => {
            this.tipoOrden = data;
        })

        EventBus.$on('tip', data => {
            this.isAdmin = data;
        })

        EventBus.$on('articulos_productos', data => {
            this.modificar = false;
            this.id = '';
            this.categoria = data.categoria;
            axios.get(`/tiposControl/${data.genero}/${data.categoria}`).then(response => {
                this.imagen = response.data.imagen;
                if (this.categoria == 'plantas') {
                    this.nombre = response.data.genero;
                } else {
                    this.nombre = response.data.tipo;
                }
                this.descripcion = response.data.descripcion;
                this.tips_de_cultivo = this.tips_de_cultivo_nuevo = response.data.tips_de_cultivo;
                this.id = response.data.id;
            })
        })
    },
    methods: {
        ordenar() {
            EventBus.$emit('ordenar', this.tipoOrden);
        },
        modificarTip(){
            this.modificar = true;
        },
        guardarTip(){
            this.tips_de_cultivo = this.tips_de_cultivo_nuevo;
            this.modificar = false;
            const params = {
                'tip': this.tips_de_cultivo_nuevo
            }
            axios.post(`/tiposControl/${this.id}/${this.tips_de_cultivo_nuevo}`, params).then(response => {})
        },
        cancelarTip(){
            this.modificar = false;
            this.tips_de_cultivo_nuevo = this.tips_de_cultivo;
        }
    },
    props: ['tipo']
}
</script>

<style scoped>
.imagen-subtitulo-DS {
    width: 100%;
    height: 150px;
    object-fit: cover;
}

.titulo_productos_content {
    width: 100%;
    height: 150px;
}

#titulo_productos {
    position: absolute;
    color: white;
}

.contenido-productos-DS {
    padding-top: 1.5rem;
    padding-left: 2rem;
    padding-bottom: 1.5rem;
    max-width: 74%;
    width: 74%;
    border-left: #434343 3px solid;
}

.subtitulo-producto-DS {
    top: 34%;
    left: 53%;
    color: white;
}

h1 {
    font-size: 60px;
    font-weight: bold;
    font-family: 'Source Sans Pro', serif;
    text-shadow: 0 0 30px #9DCE5B, 0 0 5px #244623;
}
</style>
