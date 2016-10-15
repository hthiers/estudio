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
        factory(Estudio\Entities\EstadoCivil::class, 'soltero')->create();
        factory(Estudio\Entities\EstadoCivil::class, 'casado')->create();
        factory(Estudio\Entities\EstadoCivil::class, 'divorciado')->create();
    }
}