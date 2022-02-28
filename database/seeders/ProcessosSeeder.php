<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProcessosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $init = [
    		0 => ['autor' => 1, 'reu' => 2, 'escritorio_id' => 1, 'vara_id' => 1, 'natureza_id' => 1, 'codigo' => '05906219471', 'data' => '2022-01-10', 'valor' => 50.2, 'key' => bcrypt('05906219471')],
    		1 => ['autor' => 2, 'reu' => 1, 'escritorio_id' => 1, 'vara_id' => 2, 'natureza_id' => 2, 'codigo' => '05906219472', 'data' => '2022-01-11', 'valor' => 50.2, 'key' => bcrypt('05906219472')],
    		2 => ['autor' => 3, 'reu' => 2, 'escritorio_id' => 1, 'vara_id' => 3, 'natureza_id' => 3, 'codigo' => '05906219473', 'data' => '2022-01-12', 'valor' => 50.2, 'key' => bcrypt('05906219473')],
    		3 => ['autor' => 2, 'reu' => 4, 'escritorio_id' => 1, 'vara_id' => 2, 'natureza_id' => 4, 'codigo' => '05906219474', 'data' => '2022-01-13', 'valor' => 50.2, 'key' => bcrypt('05906219474')],
    		4 => ['autor' => 5, 'reu' => 5, 'escritorio_id' => 1, 'vara_id' => 1, 'natureza_id' => 2, 'codigo' => '05906219475', 'data' => '2022-01-14', 'valor' => 50.2, 'key' => bcrypt('05906219475')],
    		5 => ['autor' => 4, 'reu' => 3, 'escritorio_id' => 1, 'vara_id' => 3, 'natureza_id' => 1, 'codigo' => '05906219476', 'data' => '2022-01-19', 'valor' => 50.2, 'key' => bcrypt('05906219476')],
    	];
        DB::table('processos')->insert($init);
    }
}
