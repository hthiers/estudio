<?php
/**
 * Created by PhpStorm.
 * User: federico.antonucci
 * Date: 20/07/2016
 * Time: 12:04 PM
 */

$factory->defineAs(Rol::class, 'admin', function (Faker\Generator $faker) {
    return [
        'rol' => 'admin'
    ];
});

$factory->defineAs(Rol::class, 'user', function (Faker\Generator $faker) {
    return [
        'rol' => 'user'
    ];
});