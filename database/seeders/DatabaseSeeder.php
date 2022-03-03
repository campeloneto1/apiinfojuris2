<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    //php artisan migrate:fresh --seed
    //php artisan passport:install
    /** 
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
    	$this->call([AudienciasSeeder::class]);
        $this->call([ClientesSeeder::class]);
        $this->call([ComarcasSeeder::class]);
        $this->call([EscritoriosSeeder::class]);
        $this->call([NaturezasSeeder::class]);
        $this->call([OcupacoesSeeder::class]);
        $this->call([PaisesSeeder::class]);
        $this->call([PerfisSeeder::class]);
        $this->call([ProcessosSeeder::class]);
        $this->call([TribunaisSeeder::class]);
        $this->call([UsuariosSeeder::class]);
        $this->call([VarasSeeder::class]);
    
    }
}
