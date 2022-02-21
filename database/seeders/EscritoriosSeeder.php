<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EscritoriosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $init = [
    		0 => ['nome' => 'Escritorio 01', 'gestor' => 'Sergio', 'cnpj' => '10806730000138', 'telefone1' => '88999492036', 'key' => bcrypt('10806730000138')],
    		1 => ['nome' => 'Escritorio 02', 'gestor' => 'Pedro', 'cnpj' => '10806730000131', 'telefone1' => '88999492036', 'key' => bcrypt('10806730000131')],
    		2 => ['nome' => 'Escritorio 03', 'gestor' => 'Raimundo', 'cnpj' => '10806730000132', 'telefone1' => '88999492036', 'key' => bcrypt('10806730000132')],
    		3 => ['nome' => 'Escritorio 04', 'gestor' => 'Arthur', 'cnpj' => '10806730000133', 'telefone1' => '88999492036', 'key' => bcrypt('10806730000133')],
    		4 => ['nome' => 'Escritorio 05', 'gestor' => 'Maria', 'cnpj' => '10806730000134', 'telefone1' => '88999492036', 'key' => bcrypt('10806730000134')],
    	];
        DB::table('escritorios')->insert($init);
    }
}
