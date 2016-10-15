<?php
/**
 * Created by PhpStorm.
 * User: federico.antonucci
 * Date: 20/07/2016
 * Time: 12:18 AM
 */

$factory->define(Estudio\Entities\Expediente::class, function (Faker\Generator $faker) {

    $jurisdicciones_ids = Estudio\Entities\Jurisdiccion::where('id' ,'>' ,0)->pluck('id')->toArray();
    $ramas_ids = Estudio\Entities\Rama::where('id' ,'>' ,0)->pluck('id')->toArray();

    return [
        'titulo' => $faker->sentence(7),
        'fecha' => $faker->dateTimeBetween('2010-1-1', 'now'),
        'jurisdiccion_id' => $faker->randomElement($jurisdicciones_ids),
        'rama_id' => $faker->randomElement($ramas_ids),
    ];
});