<?php

use Illuminate\Database\Seeder;

class EstadoCivilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(EstadoCivil::class, 'soltero')->create();
        factory(EstadoCivil::class, 'casado')->create();
        factory(EstadoCivil::class, 'divorciado')->create();
    }
}