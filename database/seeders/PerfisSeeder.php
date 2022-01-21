<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerfisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $init = [
    		0 => ['nome' => 'Administrador', 'administrador' => 1, 'gestor' => 1, 'relatorios' => 1],
    		1 => ['nome' => 'Gestor', 'administrador' => 0, 'gestor' => 1, 'relatorios' => 1],
    		2 => ['nome' => 'Usuário', 'administrador' => 0, 'gestor' => 0, 'relatorios' => 0]
    	];
        DB::table('perfis')->insert($init);
    }
}
