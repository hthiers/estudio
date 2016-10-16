<?php

use Illuminate\Database\Seeder;

class EstudioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Estudio::class)->create(['estudio' => 'San Andres']);
        factory(Estudio::class)->create(['estudio' => 'Loma Hermosa']);
    }
}
