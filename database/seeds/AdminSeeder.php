<?php

use Illuminate\Database\Seeder;

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
        factory(User::class, 'admin')->create();
    }
}
