<?php

use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Estudio\Entities\Rol::class, 'admin')->create();
        factory(Estudio\Entities\Rol::class, 'user')->create();
    }
}
