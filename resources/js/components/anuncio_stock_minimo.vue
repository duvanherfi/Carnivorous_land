<template>
<div>
    <div v-if="tamañoProductos != 0" class="pr-3 position-relative"><img id="campana" src="/img/campana.png" alt="campana" width="33" data-toggle="popover" data-placement="bottom">
        <span class="badge badge-primary badge-pill counter position-absolute" style="z-index:4; right:10px;">{{ tamañoProductos }}</span></div>

    <div id="pop-title" style="display: none">Productos prontos a acabar</div>
    <!-- loaded popover content -->
    <div id="popover-content" style="display: none">
        <ul class="list-group custom-popover">
            <li v-for="(item, index) in productos" :key="index" 
            class="list-group-item border border-dark border-right-0 border-left-0 text-center">{{ item.nombre }}</li>
        </ul>
    </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            productos: [],
            tamañoProductos: 0
        }
    },
    created(){
        axios.get('/productosControl').then(response => {
            this.productos = response.data
            this.tamañoProductos = this.productos.length;
            // console.log(response.data);
        })
    },
    updated() {
        $(document).ready(function () {
            $('[data-toggle="popover"]').popover({
                html: true,
                title: function () {
                    return $('#pop-title').html();
                },
                content: function () {
                    return $('#popover-content').html();
                }
            })
            $('body').click(function (ev) {
                var target = $(ev.target);
                if (target.not('#campana').length) {
                    $('#campana').popover('hide');
                }
            })
        });
    }
}
</script>

<style scoped>
img {
    cursor: pointer;
}

.bordes{
    border-top: 1px solid #434343 !important;
}
</style>