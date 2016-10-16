<?php
/**
 * Created by PhpStorm.
 * User: federico.antonucci
 * Date: 19/07/2016
 * Time: 09:41 PM
 */

$factory->define(Cliente::class, function(Faker\Generator $faker){
    return [
        'nombre' => $faker->firstName,
        'apellido' => $faker->lastName,
        'fecha_nac' => $faker->date(),
        'dni' => $faker->numberBetween(18999999, 44999999),
        'telefono' => $faker->numberBetween(40000000, 99999999),
        'celular' => $faker->numberBetween(1500000000, 1599999999),
        'email' => $faker->safeEmail,
        'domicilio' => $faker->streetAddress,
        'activo' => true,
        'estado_civil_id' => $faker->numberBetween(1,3)
    ];
});