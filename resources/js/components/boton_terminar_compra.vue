<template>
    <form id="PayU" method="post" action="https://sandbox.checkout.payulatam.com/ppp-web-gateway-payu">
        <input name="merchantId" type="hidden" id="merchantId">
        <input name="accountId" type="hidden" id="accountId">
        <input name="description" type="hidden" id="description">
        <input name="referenceCode" type="hidden" :value="id_ultpedido">
        <input name="amount" type="hidden" id="amount">
        <input name="tax" type="hidden" id="tax">
        <input name="taxReturnBase" type="hidden" id="taxReturnBase">
        <input name="currency" type="hidden" value="COP">
        <input name="signature" type="hidden" id="signature">
        <input name="test" type="hidden" value="1">
        <input name="buyerEmail" type="hidden" id="buyerEmail" :value="correo">
        <input name="responseUrl" type="hidden" :value="rutaPagRespuesta">
        <input name="confirmationUrl" type="hidden" :value="rutaPagConfirmacion">
        <input name="Submit" class="btn bg-success" @click="llenar" id="terminar_compra" type="button" value="TERMINAR COMPRA">
    </form>
</template>

<script>
import EventBus from '../event_bus'
export default {
    data(){
        return {
            rutaPagRespuesta: route('pagRespuestaPuente'),
            rutaPagConfirmacion: route('pagConfirmacion')
        }
    },
    methods: {
        llenar() {
            var valorInput = $('input:radio[name=opciones]:checked').val()
            if (valorInput == 'miDireccion') {
                const params = {
                    'valorTotal': $('#amount').val()
                }
                axios.post(`/carritoControl/${valorInput}`, params).then(response => {
                    this.valores();
                    $('#PayU').submit();
                })
            } else if (valorInput == 'otraDireccion') {
                const params = {
                    'valorTotal': $('#amount').val(),
                    'nombre': $('#nombre_carrito').val(),
                    'cedula': $('#cedula_carrito').val(),
                    'telefono': $('#telefono_carrito').val(),
                    'departamento': $('#departamento_carrito').val(),
                    'ciudad': $('#ciudad_carrito').val(),
                    'barrio': $('#barrio_carrito').val(),
                    'direccion': $('#direccion_carrito').val()
                }
                axios.post(`/carritoControl/${valorInput}`, params).then(response => {
                    if (response.data.errores != undefined) {
                        EventBus.$emit('errores', response.data.errores);
                        toastr.error('Los datos de la entrega fueron rechazados, por favor revisarlos');
                    } else {
                        this.valores();
                        $('#PayU').submit();
                    }
                })
            }
        },
        valores() {
            var merchantId = 508029;
            var ApiKey = "4Vj8eK4rloUd272L48hsrarnUA";
            var referenceCode = this.id_ultpedido;
            var amount = $('#amount').val();
            var tax = 0;
            var taxReturnBase = 0;
            var currency = "COP";
            var accountId = 512321;
            // var buyerEmail = "{{ auth()->user()->correo }}";
            var description = $('#description').val();
            var signature = md5(ApiKey + "~" + merchantId + "~" + referenceCode + "~" + amount + "~" + currency);
            //var p=$("#precio").html().split("$");
            //var p1=p[1].split(".");

            $('#merchantId').val(merchantId);
            $('#accountId').val(accountId);
            $('#description').val(description);
            // $('#referenceCode').val(referenceCode);
            $('#amount').val(amount);
            $('#tax').val(tax);
            $('#taxReturnBase').val(taxReturnBase);
            $('#signature').val(signature);
            // $('#buyerEmail').val(buyerEmail);
            // console.log(signature);
            //$('#preciop').val(p1[0]+p1[1]);
        }
    },
    props: ['id_ultpedido', 'correo']
}
</script>