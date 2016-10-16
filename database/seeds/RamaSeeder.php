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
        factory(Rama::class)->create(['rama' => 'Laboral']);
        factory(Rama::class)->create(['rama' => 'Sucesion']);
        factory(Rama::class)->create(['rama' => 'Civil']);
        factory(Rama::class)->create(['rama' => 'Mediacion']);
        factory(Rama::class)->create(['rama' => 'Ejecucion']);
        factory(Rama::class)->create(['rama' => 'Previsional']);
        factory(Rama::class)->create(['rama' => 'Otros']);
    }
}
