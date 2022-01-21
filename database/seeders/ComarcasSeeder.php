<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComarcasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $init = [
    		0 => ['tribunal_id' => 1, 'nome' => 'Comarca de Fortaleza', 'key' => bcrypt('Comarca de Fortaleza')],
    		1 => ['tribunal_id' => 1, 'nome' => 'Comarca de Juazeiro', 'key' => bcrypt('Comarca de Juazeiro')],
    		2 => ['tribunal_id' => 1, 'nome' => 'Comarca de Sobral', 'key' => bcrypt('Comarca de Sobral')],
    		3 => ['tribunal_id' => 1, 'nome' => 'Comarca de Quixada', 'key' => bcrypt('Comarca de Quixada')],
    	];
        DB::table('comarcas')->insert($init);
    }
}
