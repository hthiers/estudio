<?php
/**
 * Created by PhpStorm.
 * User: federico.antonucci
 * Date: 19/07/2016
 * Time: 09:51 PM
 */

use Carbon\Carbon;

$factory->define(Cita::class, function (Faker\Generator $faker) {

    $users_ids = User::where('id' ,'>' ,0)->pluck('id')->toArray();
    $clientes_ids = Cliente::where('id' ,'>' ,0)->pluck('id')->toArray();
    $fechaComienzo = Carbon::createFromTimeStamp($faker->dateTimeBetween('-30 days', '+30 days')->getTimestamp());
    $fechaFin = Carbon::createFromFormat('Y-m-d H:i:s', $fechaComienzo)->addHours(12);
    return [
        'fecha_comienzo' => $fechaComienzo,
        'fecha_fin' => $faker->dateTimeBetween($fechaComienzo, $fechaFin),
        'titulo' => $faker->sentence(6),
        'user_id' => $faker->randomElement($users_ids),
        'cliente_id' => $faker->randomElement($clientes_ids),
    ];
});