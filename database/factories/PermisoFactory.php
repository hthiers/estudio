<?php
/**
 * Created by PhpStorm.
 * User: federico.antonucci
 * Date: 20/07/2016
 * Time: 12:04 PM
 */

$factory->define(Estudio\Entities\Permiso::class, function (Faker\Generator $faker) {
    return [
        'permiso' => $faker->word
    ];
});
