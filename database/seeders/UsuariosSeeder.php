<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $init = [
    		0 => ['nome' => 'José de Barros Campêlo Neto', 'cpf' => '05906219471', 'usuario' => '05906219471', 'password' => bcrypt('123456'), 'perfil_id' => 1, 'escritorio_id' => 0, 'key' => bcrypt('05906219471')],
    		1 => ['nome' => 'Nathalia Araujo Pereira', 'cpf' => '04219964398', 'usuario' => '04219964398', 'password' => bcrypt('123456'), 'perfil_id' => 2 , 'escritorio_id' => 1, 'key' => bcrypt('04219964398')],
    	];
        DB::table('users')->insert($init);
    }
}
