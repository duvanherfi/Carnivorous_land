<template>
<div class="contenido-productos-DS">
    <!-- <div class="position-absolute subtitulo-producto-DS">
        <h1>SARRACENIA</h1>
    </div>
    <img class="imagen-subtitulo-DS" src="/img/productos/fondo_productos.jpg" alt="Fondo productos">
    <div class="mask rgba-black-strong"></div>
    <p class="mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis, quas eaque veniam harum nostrum non pariatur! Non quidem adipisci pariatur eius provident impedit tenetur, quibusdam molestias culpa doloribus quam aliquam necessitatibus? Hic vel dolor quae ad veniam totam tempore culpa, omnis aut et doloremque laudantium. Incidunt labore alias libero aspernatur exercitationem sit tempora modi aliquid nesciunt ab atque minima, quos, dignissimos eos harum voluptates dicta! Vero eaque qui odit quo. Tempora et enim officiis dolore, eaque minima, quos voluptatum rerum velit officia assumenda praesentium tenetur quidem autem commodi culpa natus laudantium! Cupiditate voluptas est iure cumque enim perspiciatis id quasi nisi recusandae aliquam, labore numquam quod fugit temporibus distinctio omnis! Laboriosam explicabo consequatur nisi vitae neque tempore architecto blanditiis autem voluptatum sunt itaque magnam asperiores debitis dolor odit, accusantium nobis nulla fugiat totam odio reiciendis veritatis modi velit? Est accusantium blanditiis autem praesentium culpa? Similique libero quia natus est error voluptas sed et nobis ab sint accusantium, esse provident a in temporibus voluptate. Iure incidunt corporis dolorem aliquam quia rerum sit laudantium, debitis culpa maxime voluptatum doloribus, necessitatibus optio ea sequi alias laboriosam neque temporibus quis possimus inventore iusto aut impedit nemo. Amet nam iste at? Atque magni itaque quasi?</p> -->
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
        <pre class="mt-4 text-break">{{ descripcion }}</pre>
        <div v-if="categoria != ''" class="d-flex justify-content-between" id="opciones_productos">
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
            nombre: '',
            categoria: '',
            genero: {
                imagen: '',
                imagennombre: '',
                imagennombreAntiguo: '',
                nombre: '',
                descripcion: ''
            },
            tipoOrden: 'ninguno'
        }
    },
    created() {
        EventBus.$on('articulos_productos', data => {
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
                this.id = response.data.id;
            })
        })
    },
    methods: {
        ordenar() {
            EventBus.$emit('ordenar', this.tipoOrden);
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
    text-shadow: 0 0 30px #9DCE5B;
}
</style>
