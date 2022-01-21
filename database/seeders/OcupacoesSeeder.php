<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OcupacoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $init = [
    		0 => ['nome' => 'Policial Militar', 'key' => bcrypt('Policial Militar')],
    		1 => ['nome' => 'Médico', 'key' => bcrypt('Médico')],
    		2 => ['nome' => 'Advogado', 'key' => bcrypt('Advogado')],
    		3 => ['nome' => 'Enfermeiro', 'key' => bcrypt('Enfermeiro')],
    		4 => ['nome' => 'Fisioterapeuta', 'key' => bcrypt('Fisioterapeuta')],
    	];
        DB::table('ocupacoes')->insert($init);
    }
}
