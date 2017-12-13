<?php
use App\tipodegasto;
use App\Producto;
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
        'nombre' => $faker->name,
        'precioventakilo' => $faker->numberBetween(100,500),
    ];
});

$factory->define(App\Factura::class, function (Faker\Generator $faker) {
    return [
        'fecha' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = date_default_timezone_get()),
        'vendedor' => $faker->name,
        'comprador' => $faker->name,
        'subtotal' => $faker->numberBetween(1000, 80000),
        'iva' => $faker->numberBetween(1000, 20000),
        'total' => $faker->numberBetween(1000, 120000),
        'id_pedido' => 0,
        'estado' => 'Valida',     
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

$factory->define(App\Gasto::class, function (Faker\Generator $faker) {
    return [
        'fecha' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = date_default_timezone_get()),
        'id_tipo_gasto' => $faker->randomElement(tipodegasto::pluck('id')->toArray()),
        'usuario' => $faker->name,
        'descripcion' => $faker->realText($maxNbChars = 20),
        'total' => $faker->numberBetween(1000, 100000),
        'estado' => 'valido', 
    ];
});

$factory->define(App\Compra::class, function (Faker\Generator $faker) {
    return [
        'fecha' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = date_default_timezone_get()),
        'proveedor' => $faker->name,
        'usuario' => $faker->name,
        'total' => $faker->numberBetween(1000, 200000),
        'estado' => 'valida', 
    ];
});

$factory->define(App\Pedido::class, function (Faker\Generator $faker) {
    return [
        'fecha_entrega' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = date_default_timezone_get()),
        'Hora_entrega' => '12:08',
        'telefono' => $faker->tollFreePhoneNumber,
        'nombre' => $faker->name,
        'direccion' => $faker->name,
        'estado' => $faker->randomElement($array = array ('En camino','Pendiente','Entregado')),
        'id_factura' => 0,
    ];
});