<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');            
            $table->string('nome', 75);
            $table->string('cpf', 15);
            $table->string('email',50)->nullable();
            $table->string('telefone1', 15);
            $table->string('telefone2', 15)->nullable();
            $table->date('data_nascimento')->nullable(); 
            $table->integer('escritorio_id'); 
            $table->integer('estado_civil')->nullable();
            $table->integer('nacionalidade')->nullable();
            $table->integer('ocupacao_id')->nullable();
            $table->string('mae', 75)->nullable();
            $table->string('pai', 75)->nullable();

            $table->integer('pais_id')->default(1);  
            $table->integer('estado_id')->nullable(); 
            $table->integer('cidade_id')->nullable();
            $table->string('cep', 15)->nullable();  
            $table->string('bairro', 100)->nullable();   
            $table->string('rua', 100)->nullable();   
            $table->string('numero', 7)->nullable();
            $table->string('complemento', 100)->nullable();

            $table->text('obs')->nullable();

            $table->string('key', 100)->unique();
                            
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();        
            $table->timestamps();

            $table->unique(['cpf', 'escritorio_id']);  

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
