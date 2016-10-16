<?php
/**
 * Created by PhpStorm.
 * User: federico.antonucci
 * Date: 20/07/2016
 * Time: 12:32 AM
 */

$factory->define(Jurisdiccion::class, function (Faker\Generator $faker) {
    return [
        'jurisdiccion' => $faker->city
    ];
});