<?php
/**
 * Created by PhpStorm.
 * User: federico.antonucci
 * Date: 20/07/2016
 * Time: 12:38 AM
 */

$factory->define(Estudio\Entities\Rama::class, function (Faker\Generator $faker) {
    return [
        'rama' => ucfirst($faker->word)
    ];
});