<?php
/**
 * Created by PhpStorm.
 * User: federico.antonucci
 * Date: 20/07/2016
 * Time: 12:04 PM
 */


$factory->defineAs(EstadoCivil::class, 'soltero', function(Faker\Generator $faker) {
    return [
        'estado' => 'Soltero/a'
    ];
});

$factory->defineAs(EstadoCivil::class, 'casado', function(Faker\Generator $faker) {
    return [
        'estado' => 'Casado/a'
    ];
});

$factory->defineAs(EstadoCivil::class, 'divorciado', function(Faker\Generator $faker) {
    return [
        'estado' => 'Divorciado/a'
    ];
});