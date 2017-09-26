<?php

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

$factory->define(SysGESSI\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(SysGESSI\Cliente::class, function (Faker $faker) {
    $provinciasIds = SysGESSI\Provincia::pluck('id')->all();
    $provincia = $faker->randomElement($provinciasIds);

    $cantonesIds= SysGESSI\Canton::where('provincia_id', $provincia)->pluck('id')->all();
    $canton = $faker->randomElement($cantonesIds);

    $parroquiasIds = SysGESSI\Parroquia::where('canton_id', $canton)->pluck('id')->all();

    return [
		'numero_documento' => $faker->text(15),
		'nombre'           => $faker->firstName(),
		'apellido'         => $faker->lastName(20),
		'parroquia_id'     => $faker->randomElement($parroquiasIds),
		'direccion'        => $faker->address(),
    ];
});

$factory->define(SysGESSI\SolicitudEstudio::class, function (Faker $faker) {
    $clientesIds = SysGESSI\Cliente::pluck('id')->all();
    $parroquiasIds = SysGESSI\Parroquia::pluck('id')->all();
    $estados =  ['En Desarrollo', 'Finalizado', 'Anulado'];

    return[
        'descripcion'  => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'cliente_id'   => $faker->randomElement($clientesIds),
        'obra'         => $faker->text(20),
        'parroquia_id' => $faker->randomElement($parroquiasIds),
        'direccion'    => $faker->address(),
        'referencia'   => $faker->text(50),
        'coordenadas'  => $faker->text(10),
        'contacto'     => $faker->firstNameMale,
        //'costo_obra'    => $faker->numberBetween($min = 1000, $max = 9000),
        'estado'      => $faker->randomElement($estados),
        'progreso'     => $faker->numberBetween($min = 0, $max = 100)
    ];

});

$factory->define(SysGESSI\OrdenTrabajo::class, function (Faker $faker) {

    $solicitudEstudioId = SysGESSI\SolicitudEstudio::pluck('id')->all();
    $usuariosId = SysGESSI\User::pluck('id')->all();

    $estados =  ['En Espera', 'En Proceso', 'En Ejecución', 'En Laboratorio'];

    return[
		'solicitud_estudio_id'   => $faker->randomElement($solicitudEstudioId),
		'usuario_responsable_id' => 1,//$faker->randomElement($usuariosId),
		'descripcion'            => $faker->text(30),
		'fecha'                  => $faker->date($format = 'Y-m-d', $max = 'now'),
		'estado'                 =>  $faker->randomElement($estados),
		'observacion'            => $faker->text(30),
		'image'                  => '',
		'extras'                 => 0,
    ];
});

$factory->define(SysGESSI\TrabajoCampo::class, function (Faker $faker) {
      $usuariosId = SysGESSI\User::pluck('id')->all();
    $OrdenTrabajoId = SysGESSI\OrdenTrabajo::pluck('id')->all();

    return[
		'orden_trabajo_id'     =>  $faker->unique()->randomElement($OrdenTrabajoId),
		'usuario_responsable_id'   => $faker->randomElement($usuariosId),
		'fecha'                => $faker->date($format = 'Y-m-d', $max = 'now'),
		'cantidad'          => $faker->text(100),
		'viatico'    => $faker->numberBetween($min = 1000, $max = 9000),
		'observacion'          => $faker->text(30),

    ];
});


$factory->define(SysGESSI\TrabajoLaboratorio::class, function (Faker $faker) {

    $trabajosCampoId = SysGESSI\OrdenTrabajo::pluck('id')->all();
   
    return[
		'trabajo_campo_id'    => $faker->randomElement($trabajosCampoId),
		'descripcion_muestra' => $faker->text(10),
		'cantidad'            => $faker->text(100),
		'observacion'         => $faker->text(30),
		'estado'              => $faker->text(10),
    ];

});

//https://github.com/fzaninotto/Faker
