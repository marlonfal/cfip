<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Producto::class, function (Faker\Generator $faker) {

    return [
        'nombre_producto' => $faker->name,
        'precio_por_gramo' => $faker->numberBetween(100,500),
    ];
});

$factory->define(App\Factura::class, function (Faker\Generator $faker) {
    return [
        'fecha' => $faker->date,
        'vendedor' => $faker->name,
        'comprador' => $faker->name,
        'total' => $faker->numberBetween(1000, 3000),      
    ];
});

$factory->define(App\tipodegasto::class, function (Faker\Generator $faker) {
    return [
        'nombre_tipo_gasto' => $faker->name,
        'descripcion' => $faker->name, 
    ];
});

$factory->define(App\Retroalimentacion::class, function (Faker\Generator $faker) {
    return [
        'tipo' => $faker->randomElement($array = array ('Queja','Sugerencia','Reclamo')),
        'nombre' => $faker->name,
        'titulo' => $faker->name,
        'contenido' => $faker->realText($maxNbChars = 150),
        'email' => $faker->email,
    ];
});