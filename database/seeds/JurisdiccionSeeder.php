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
        factory(Jurisdiccion::class)->create(['jurisdiccion' => 'San Martin']);
        factory(Jurisdiccion::class)->create(['jurisdiccion' => 'San Isidro']);
        factory(Jurisdiccion::class)->create(['jurisdiccion' => 'C.A.B.A.']);
    }
}
