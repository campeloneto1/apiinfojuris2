<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AudienciasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $init = [
    		0 => ['processo_id' => 1, 'data' => '2022-01-11', 'hora' => '15:30', 'tipo_id' => 1, 'key' => bcrypt('88999492036')],
    		1 => ['processo_id' => 1, 'data' => '2022-01-15', 'hora' => '15:30', 'tipo_id' => 1, 'key' => bcrypt('88999492036')],
    		2 => ['processo_id' => 1, 'data' => '2022-01-19', 'hora' => '15:30', 'tipo_id' => 1, 'key' => bcrypt('88999492036')],
    		3 => ['processo_id' => 2, 'data' => '2022-01-13', 'hora' => '15:30', 'tipo_id' => 2, 'key' => bcrypt('88999492036')],
    		4 => ['processo_id' => 2, 'data' => '2022-01-17', 'hora' => '15:30', 'tipo_id' => 2, 'key' => bcrypt('88999492036')],
    	];
        DB::table('audiencias')->insert($init);
    }
}
