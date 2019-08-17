<template lang="es">
<div class="contenido-productos-DS">
    <div class="position-absolute subtitulo-producto-DS">
        <h1>SARRACENIA</h1>
    </div>
    <img class="imagen-subtitulo-DS" src="/img/productos/fondo_productos.jpg" alt="Fondo productos">
    <div class="mask rgba-black-strong"></div>
    <p class="mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis, quas eaque veniam harum nostrum non pariatur! Non quidem adipisci pariatur eius provident impedit tenetur, quibusdam molestias culpa doloribus quam aliquam necessitatibus? Hic vel dolor quae ad veniam totam tempore culpa, omnis aut et doloremque laudantium. Incidunt labore alias libero aspernatur exercitationem sit tempora modi aliquid nesciunt ab atque minima, quos, dignissimos eos harum voluptates dicta! Vero eaque qui odit quo. Tempora et enim officiis dolore, eaque minima, quos voluptatum rerum velit officia assumenda praesentium tenetur quidem autem commodi culpa natus laudantium! Cupiditate voluptas est iure cumque enim perspiciatis id quasi nisi recusandae aliquam, labore numquam quod fugit temporibus distinctio omnis! Laboriosam explicabo consequatur nisi vitae neque tempore architecto blanditiis autem voluptatum sunt itaque magnam asperiores debitis dolor odit, accusantium nobis nulla fugiat totam odio reiciendis veritatis modi velit? Est accusantium blanditiis autem praesentium culpa? Similique libero quia natus est error voluptas sed et nobis ab sint accusantium, esse provident a in temporibus voluptate. Iure incidunt corporis dolorem aliquam quia rerum sit laudantium, debitis culpa maxime voluptatum doloribus, necessitatibus optio ea sequi alias laboriosam neque temporibus quis possimus inventore iusto aut impedit nemo. Amet nam iste at? Atque magni itaque quasi?</p>
    <div class="d-flex justify-content-between">
        <div class="d-flex">
            <label for="sexo" class="d-inline-flex col-form-label pr-0">Ordenar:</label>

            <div class="col-md-10">
                <select class="custom-select form-control" id="sexo" name="sexo" required autocomplete="sexo">
                    <option selected>Ninguno</option>
                    <option value="alfabeticamente">Alfabéticamente (Nombre)</option>
                    <option value="ascendente">Ascendente (Precio)</option>
                    <option value="descendente">Descendente (Precio)</option>
                    <option value="destacados">Más destacados</option>
                </select>
            </div>
        </div>
        <div>
            <button class="btn color-verde d-inline" data-toggle="modal" data-target="#modal_modificar_genero">Modificar Género</button>
            <button class="btn botones d-inline">Eliminar Género</button>
        </div>
    </div>

    <div>
        <productos :gestion="gestion"></productos>
    </div>

    <!-- Modal modificar genero -->
    <div class="modal fade" id="modal_modificar_genero" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="row subtitulo-DS pt-3 w-100 m-0">MODIFICAR GÉNERO</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="ml-3" method="POST" action="">
                        <div class="form-group row">
                            <label for="imagen" class="col-md-3 col-form-label">Imagen:</label>
                            <div class="custom-file col-md-8">
                                <input type="file" class="custom-file-input" name="imagen" id="customFileLang" lang="es">
                                <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="nombre_tipo" class="col-md-3 col-form-label">Nombre:</label>
                            <div class="col-md-8 p-0">
                                <input id="nombre_tipo" placeholder="Ej: Drosera" type="text" class="form-control" name="nombre_tipo" required autocomplete="nombre_tipo" autofocus>
                            </div>
                        </div>

                        <div class="form-group mr-4">
                            <label for="descripcion_tipo" class="d-inline-flex col-form-label">Descripción:</label>
                            <textarea class="form-control" id="descripcion_tipo" rows="5"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn color-verde">Modificar</button>
                    <button type="button" class="btn botones" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

</div>
</template>

<script>
export default {
    props: ['gestion']
}
</script>

<style scoped>
.imagen-subtitulo-DS {
    width: 960px;
    height: 150px;
    object-fit: cover;
}

.contenido-productos-DS {
    margin-top: 1.5rem;
    margin-left: 2.3rem;
    margin-bottom: 1.5rem;
    max-width: 960px;
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

label {
    font-family: 'Montserrat', sans-serif;
}
</style>
