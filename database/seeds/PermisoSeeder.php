<?php

use Illuminate\Database\Seeder;

class PermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Permiso::class, 5)->create();
    }
}
