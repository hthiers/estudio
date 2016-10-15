<?php

use Illuminate\Database\Seeder;

class ExpedienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Estudio\Entities\Expediente::class, 150)->create()->each(function($exp) {
            factory(Estudio\Entities\Cliente::class, 5)->make()->each(function($cliente) use($exp) {
                $exp->clientes()->save($cliente);
            });
        });
    }

}
