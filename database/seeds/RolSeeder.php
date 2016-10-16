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
        factory(Rol::class, 'admin')->create();
        factory(Rol::class, 'user')->create();
    }
}
