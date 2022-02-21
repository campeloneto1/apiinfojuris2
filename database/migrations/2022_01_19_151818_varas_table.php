<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VarasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('varas', function (Blueprint $table) {
            $table->increments('id');            
            $table->string('nome', 50);
            $table->integer('comarca_id'); //->default(1); 

            $table->string('telefone1', 15)->nullable();  
            $table->string('telefone2', 15)->nullable();  
            $table->string('email', 15)->nullable();  

            $table->integer('pais_id')->default(1); //->default(1); 
            $table->integer('estado_id')->nullable(); //->default(6); 
            $table->integer('cidade_id')->nullable(); //->default(1669);  
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

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('varas');
    }
}
