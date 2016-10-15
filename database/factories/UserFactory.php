<?php
/**
 * Created by PhpStorm.
 * User: federico.antonucci
 * Date: 19/07/2016
 * Time: 10:13 PM
 */

$factory->defineAs(Estudio\Entities\User::class, 'user', function (Faker\Generator $faker) {
    return [
        'username' => $faker->userName,
        'nombre' => $faker->firstName,
        'apellido' => $faker->lastName,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        'rol_id' => Estudio\Entities\Rol::where('rol' ,'user')->first()->id
    ];
});

$factory->defineAs(Estudio\Entities\User::class, 'admin', function (Faker\Generator $faker) {
    return [
        'username' => 'admin',
        'nombre' => 'Federico',
        'apellido' => 'Antonucci',
        'email' => $faker->safeEmail,
        'password' => bcrypt('admin'),
        'remember_token' => str_random(10),
        'rol_id' => Estudio\Entities\Rol::where('rol' ,'admin')->first()->id
    ];
});