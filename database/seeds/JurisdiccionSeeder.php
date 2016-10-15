<?php

use Illuminate\Database\Seeder;

class JurisdiccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Estudio\Entities\Jurisdiccion::class)->create(['jurisdiccion' => 'San Martin']);
        factory(Estudio\Entities\Jurisdiccion::class)->create(['jurisdiccion' => 'San Isidro']);
        factory(Estudio\Entities\Jurisdiccion::class)->create(['jurisdiccion' => 'C.A.B.A.']);
    }
}
