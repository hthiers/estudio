<?php
/**
 * Created by PhpStorm.
 * User: federico.antonucci
 * Date: 19/07/2016
 * Time: 09:51 PM
 */

$factory->define(Estudio\Entities\Cita::class, function (Faker\Generator $faker) {

    $users_ids = Estudio\Entities\User::where('id' ,'>' ,0)->pluck('id')->toArray();
    $clientes_ids = Estudio\Entities\Cliente::where('id' ,'>' ,0)->pluck('id')->toArray();

    return [
        'fecha' => $faker->dateTimeBetween('2016-1-1','2016-12-28'),
        'hora' => $faker->time(),
        'observacion' => $faker->sentence(11),
        'user_id' => $faker->randomElement($users_ids),
        'cliente_id' => $faker->randomElement($clientes_ids),
    ];
});