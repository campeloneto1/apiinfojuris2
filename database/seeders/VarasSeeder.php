<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VarasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $init = [
    		0 => ['comarca_id' => 1, 'nome' => 'Vara da Infacia', 'key' => bcrypt('Vara da Infacia')],
    		1 => ['comarca_id' => 1, 'nome' => '1ª Vara Penal', 'key' => bcrypt('1ª Vara Penal')],
    		2 => ['comarca_id' => 1, 'nome' => '2ª Vara Penal', 'key' => bcrypt('2ª Vara Penal')],
    		3 => ['comarca_id' => 1, 'nome' => '1ª Vara Civil', 'key' => bcrypt('1ª Vara Civil')],
    		4 => ['comarca_id' => 1, 'nome' => '2ª Vara Civil', 'key' => bcrypt('2ª Vara Civil')],
    	];
        DB::table('varas')->insert($init);
    }
}
