<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EstadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estados', function (Blueprint $table) {
            $table->increments('id');            
            $table->string('nome', 50);
            $table->string('uf', 2);
            $table->integer('pais_id')->default(1);
            
                            
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
        Schema::dropIfExists('estados'); 
    }
}
