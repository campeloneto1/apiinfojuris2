<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AudienciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audiencias', function (Blueprint $table) {
            $table->increments('id');  
            $table->integer('processo_id');          
            $table->date('data');
            $table->time('hora');
            $table->integer('tipo_id');  

            $table->string('link', 200)->nullable();

            $table->integer('pais_id')->default(1); //->default(1); 
            $table->integer('estado_id')->nullable(); //->default(6); 
            $table->integer('cidade_id')->nullable(); //->default(1669);  
            $table->string('cep', 15)->nullable();  
            $table->string('bairro', 100)->nullable();   
            $table->string('rua', 100)->nullable();   
            $table->string('numero', 7)->nullable();
            $table->string('complemento', 100)->nullable();

            $table->integer('status')->default(1);

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
       Schema::dropIfExists('audiencias');
    }
}
