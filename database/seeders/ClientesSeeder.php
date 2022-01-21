<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $init = [
    		0 => ['nome' => 'Cliente 01', 'cpf' => '05906219471', 'telefone1' => '88999492036', 'escritorio_id' => 1, 'key' => bcrypt('05906219471')],
    		1 => ['nome' => 'Cliente 02', 'cpf' => '05906219472', 'telefone1' => '88999492031', 'escritorio_id' => 1,  'key' => bcrypt('05906219472')],
    		2 => ['nome' => 'Cliente 03', 'cpf' => '05906219473', 'telefone1' => '88999492032', 'escritorio_id' => 1,  'key' => bcrypt('05906219473')],
    		3 => ['nome' => 'Cliente 04', 'cpf' => '05906219474', 'telefone1' => '88999492033', 'escritorio_id' => 1,  'key' => bcrypt('05906219474')],
    		4 => ['nome' => 'Cliente 05', 'cpf' => '05906219475', 'telefone1' => '88999492034', 'escritorio_id' => 1,  'key' => bcrypt('05906219475')],
    		5 => ['nome' => 'Empresa 01', 'cpf' => '05906219476', 'telefone1' => '88999492035', 'escritorio_id' => 2,  'key' => bcrypt('05906219476')],
    		6 => ['nome' => 'Empresa 02', 'cpf' => '05906219477', 'telefone1' => '88999492037', 'escritorio_id' => 2,  'key' => bcrypt('05906219477')],
    	];
        DB::table('clientes')->insert($init);
    }
}
