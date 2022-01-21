<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NaturezasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $init = [
    		0 => ['nome' => 'Natureza 1', 'key' => bcrypt('Natureza 1')],
    		1 => ['nome' => 'Natureza 2', 'key' => bcrypt('Natureza 2')],
    		2 => ['nome' => 'Natureza 3', 'key' => bcrypt('Natureza 3')],
    		3 => ['nome' => 'Natureza 4', 'key' => bcrypt('Natureza 4')],
    		4 => ['nome' => 'Natureza 5', 'key' => bcrypt('Natureza 5')],
    		5 => ['nome' => 'Natureza 6', 'key' => bcrypt('Natureza 6')],
    	];
        DB::table('naturezas')->insert($init);
    }
}
