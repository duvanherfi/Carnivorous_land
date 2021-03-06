<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'apellido' => $faker->lastName,
        'correo' => $faker->unique()->safeEmail,
        'cedula' => $faker->numberBetween($min = 1000, $max = 9000),
        'telefono' => $faker->numberBetween($min = 1000, $max = 9000),
        'departamento' => $faker->country,
        'ciudad' => $faker->country,
        'barrio' => $faker->country,
        'direccion' => $faker->country,
        'fecha_nacimiento' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'sexo' => $faker->randomElement(['Masculino', 'Femenino']),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});
