<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OcupacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ocupacoes', function (Blueprint $table) {
            $table->increments('id');            
            $table->string('nome', 50);

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
      Schema::dropIfExists('ocupacoes');  
    }
}
