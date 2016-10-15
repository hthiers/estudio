<?php

use Illuminate\Database\Seeder;

class RamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Estudio\Entities\Rama::class)->create(['rama' => 'Laboral']);
        factory(Estudio\Entities\Rama::class)->create(['rama' => 'Familia']);
        factory(Estudio\Entities\Rama::class)->create(['rama' => 'Sucesion']);
        factory(Estudio\Entities\Rama::class)->create(['rama' => 'Civil']);
        factory(Estudio\Entities\Rama::class)->create(['rama' => 'Mediacion']);
        factory(Estudio\Entities\Rama::class)->create(['rama' => 'Ejecucion']);
        factory(Estudio\Entities\Rama::class)->create(['rama' => 'Previsional']);
        factory(Estudio\Entities\Rama::class)->create(['rama' => 'Otros']);
    }
}
