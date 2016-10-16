<?php
/**
 * Created by PhpStorm.
 * User: federico.antonucci
 * Date: 20/07/2016
 * Time: 12:09 AM
 */

$factory->define(Comentario::class, function(Faker\Generator $faker) {

    $users_ids = User::where('id' ,'>' ,0)->pluck('id')->toArray();
    $expedientes_ids = Expediente::where('id' ,'>' ,0)->pluck('id')->toArray();

    return [
        'comentario' => $faker->sentence(16),
        'user_id' => $faker->randomElement($users_ids),
        'expediente_id' => $faker->randomElement($expedientes_ids)
    ];
});