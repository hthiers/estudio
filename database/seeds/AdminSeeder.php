<?php

use Illuminate\Database\Seeder;
use Estudio\Entities\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$admin_id = Estudio\Entities\Rol::where('rol', 'admin')->value('id');
        factory(Estudio\Entities\User::class, 'admin')->create();
    }
}
