<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use Auth;



class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
   use RefreshDatabase;
    
    public function test_user_database(){

        $user = factory(User::class)->create([
            'correo' => 'ejemplo@gmail.com',
            'nombre' => 'ejemplo nombre',
            'cedula' => '1123454'
        ]);

        $this->assertDatabaseHas('users', [
            
            'correo' => 'ejemplo@gmail.com',
            'nombre' => 'ejemplo nombre',
            'cedula' => '1123454',
        
        ]);           

                               
    }

    public function test_login(){

        $user = factory(User::class)->create([
            'nombre' => 'pedro',
            
        ]);
        Auth::login($user);

        $this->get('/mis_datos')
        ->assertSee('pedro');
    }


    // public function car_login(){

    //     $user = factory(User::class)->create([
    //         'nombre' => 'pedro'
    //     ]);
    //     Auth::login($user);

    //     $this->get('/carrito_compra')
    //     ->assertSee('Tamaño');
    // }
}
