<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermisoSeeder::class);
        $this->call(RolSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(EstadoCivilSeeder::class);
        $this->call(EstudioSeeder::class);
        $this->call(ClienteSeeder::class);
        $this->call(CitaSeeder::class);
        $this->call(JurisdiccionSeeder::class);
        $this->call(RamaSeeder::class);
        $this->call(ExpedienteSeeder::class);
        $this->call(ComentarioSeeder::class);
    }
}
