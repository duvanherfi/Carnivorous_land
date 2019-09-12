<template>
<div>
    Los siguientes campos son obligatorios
    <div class="form-group row mt-2">
        <label for="nombre_carrito" class="col-md-2 col-form-label">Nombre:</label>
        <div class="col-md-5 p-0">
            <input v-model="nombre" id="nombre_carrito" placeholder="Ej: Antonio Jaramillo Cardenas" 
            :class="mensajesError.nombre != undefined ? 'is-invalid' : ''" type="text" class="form-control" name="nombre_carrito" required autocomplete="nombre_carrito" autofocus>
            <span v-if="mensajesError.nombre != undefined" class="invalid-feedback" style="display: flex;" role="alert">
                <strong>{{ mensajesError.nombre[0] }}</strong>
            </span>
        </div>
    </div>
    <div class="form-group row mt-2">
        <label for="cedula_carrito" class="col-md-2 col-form-label">Cédula:</label>
        <div class="col-md-5 p-0">
            <input v-model="cedula" id="cedula_carrito" placeholder="Ej: 1113693793" type="number" class="form-control" 
            :class="mensajesError.cedula != undefined ? 'is-invalid' : ''" name="cedula_carrito" required autocomplete="cedula_carrito" autofocus>
            <span v-if="mensajesError.cedula != undefined" class="invalid-feedback" style="display: flex;" role="alert">
                <strong>{{ mensajesError.cedula[0] }}</strong>
            </span>
        </div>
    </div>
    <div class="form-group row mt-2">
        <label for="telefono_carrito" class="col-md-2 col-form-label">Teléfono:</label>
        <div class="col-md-5 p-0">
            <input v-model="telefono" id="telefono_carrito" placeholder="Ej: xxx xxx xx xx" type="number" class="form-control" 
            :class="mensajesError.telefono != undefined ? 'is-invalid' : ''" name="telefono_carrito" required autocomplete="telefono_carrito" autofocus>
            <span v-if="mensajesError.telefono != undefined" class="invalid-feedback" style="display: flex;" role="alert">
                <strong>{{ mensajesError.telefono[0] }}</strong>
            </span>
        </div>
    </div>
    <div class="form-group row mt-2">
        <label for="departamento_carrito" class="col-md-2  col-form-label">Departamento:</label>
        <div class="col-md-5 p-0">
            <input v-model="departamento" id="departamento_carrito" placeholder="Ej: Valle del cauca" type="text" class="form-control" 
            :class="mensajesError.departamento != undefined ? 'is-invalid' : ''" name="departamento_carrito" required autocomplete="departamento_carrito" autofocus>
            <span v-if="mensajesError.departamento != undefined" class="invalid-feedback" style="display: flex;" role="alert">
                <strong>{{ mensajesError.departamento[0] }}</strong>
            </span>
        </div>
    </div>
    <div class="form-group row mt-2">
        <label for="ciudad_carrito" class="col-md-2  col-form-label">Ciudad:</label>
        <div class="col-md-5 p-0">
            <input v-model="ciudad" id="ciudad_carrito" placeholder="Ej: Cali" type="text" class="form-control" name="ciudad_carrito" 
            :class="mensajesError.ciudad != undefined ? 'is-invalid' : ''" required autocomplete="ciudad_carrito" autofocus>
            <span v-if="mensajesError.ciudad != undefined" class="invalid-feedback" style="display: flex;" role="alert">
                <strong>{{ mensajesError.ciudad[0] }}</strong>
            </span>
        </div>
    </div>
    <div class="form-group row mt-2">
        <label for="barrio_carrito" class="col-md-2  col-form-label">Barrio:</label>
        <div class="col-md-5 p-0">
            <input v-model="barrio" id="barrio_carrito" placeholder="Ej: Petecuy" type="text" class="form-control" name="barrio_carrito" 
            :class="mensajesError.barrio != undefined ? 'is-invalid' : ''" required autocomplete="barrio_carrito" autofocus>
            <span v-if="mensajesError.barrio != undefined" class="invalid-feedback" style="display: flex;" role="alert">
                <strong>{{ mensajesError.barrio[0] }}</strong>
            </span>
        </div>
    </div>
    <div class="form-group row mt-2">
        <label for="direccion_carrito" class="col-md-2  col-form-label">Dirección:</label>
        <div class="col-md-5 p-0">
            <input v-model="direccion" id="direccion_carrito" placeholder="Ej: Calle 13Cn # 13N40" type="text" class="form-control" 
            :class="mensajesError.direccion != undefined ? 'is-invalid' : ''" name="direccion_carrito" required autocomplete="direccion_carrito" autofocus>
            <span v-if="mensajesError.direccion != undefined" class="invalid-feedback" style="display: flex;" role="alert">
                <strong>{{ mensajesError.direccion[0] }}</strong>
            </span>
        </div>
    </div>
    <div class="card card-body w-50">
        <pre class="m-0"><b>Nombre:</b> {{ nombre }}</pre>
        <pre class="m-0"><b>Cédula:</b> {{ cedula }}</pre>
        <pre class="m-0"><b>Teléfono:</b> {{ telefono }}</pre>
        <pre class="m-0"><b>Departamento:</b> {{ departamento }}</pre>
        <pre class="m-0"><b>Ciudad:</b> {{ ciudad }}</pre>
        <pre class="m-0"><b>Barrio:</b> {{ barrio }}</pre>
        <pre class="m-0"><b>Dirección:</b> {{ direccion }}</pre>
    </div>
</div>
</template>

<script>
import EventBus from '../event_bus'
export default {
    data() {
        return {
            nombre: '',
            cedula: '',
            telefono: '',
            departamento: '',
            ciudad: '',
            barrio: '',
            direccion: '',
            mensajesError: []
        }
    },
    created(){
        EventBus.$on('errores', data => {
            this.mensajesError = data;
        })
    }

}
</script>
