<template>
<button class="btn color-verde boton-arriba"><i class="fas fa-angle-up"></i></button>
</template>

<script>
export default {
    mounted() {
        $(document).ready(function () {

            $('.boton-arriba').click(function () {
                $('body, html').animate({
                    scrollTop: '0px'
                }, 300);
            });

            $(window).scroll(function () {
                if ($(this).scrollTop() > 0) {
                    $('.boton-arriba').slideDown(300);
                } else {
                    $('.boton-arriba').slideUp(300);
                }
            });

        });
    }
}
</script>
