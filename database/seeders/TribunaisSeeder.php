<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TribunaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $init = [
    		0 => ['nome' => 'TJCE', 'key' => bcrypt('TJCE')],
    		1 => ['nome' => 'TJPE', 'key' => bcrypt('TJPE')],
    	];
        DB::table('tribunais')->insert($init);
    }
}
