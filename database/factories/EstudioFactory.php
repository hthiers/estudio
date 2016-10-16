<?php
/**
 * Created by PhpStorm.
 * User: fethe
 * Date: 15/10/16
 * Time: 12:57
 */

$factory->define(Estudio::class, function (Faker\Generator $faker) {
    return [
        'estudio' => ucfirst($faker->word)
    ];
});