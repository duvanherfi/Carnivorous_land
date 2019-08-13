<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoutesTest extends TestCase
{

 
    /**
     * A basic feature test example.
     *
     * @return void
     */

     // Prueba de la carga efectiva de las rutas
    public function test_status_inicio()
    {
        $this->get('/')
        ->assertStatus(200)
        ->assertSee('EVENTOS');
    }

    public function test_status_quienes_somos()
    {
        $this->get('/quienes_somos')
        ->assertStatus(200)
        ->assertSee('Misión');
    }

    public function test_status_productos()
    {
        $this->get('/productos/dionea')
        ->assertStatus(200)
        ->assertSee('dionea');
    }

    public function test_status_contactanos()
    {
        $this->get('/contactanos')
        ->assertStatus(200)
        ->assertSee('NUESTRAS REDES SOCIALES');
    }

    public function test_status_carrito()
    {
        $this->get('/carrito_compra')
        ->assertStatus(200)
        ->assertSee('producto');
    }

    public function test_status_lnicio_sesion()
    {
        $this->get('/login')
        ->assertStatus(200)
        ->assertSee('Correo');
    }

    public function test_status_registro()
    {
        $this->get('/register')
        ->assertStatus(200)
        ->assertSee('Nombre');
    }

  



}
