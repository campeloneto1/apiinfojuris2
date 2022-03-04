<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProcessosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('processos', function (Blueprint $table) {
            $table->increments('id');    
            $table->integer('autor');
            $table->integer('reu');
            $table->string('codigo', 50)->unique();
            $table->decimal('valor',10,2);
            $table->integer('escritorio_id');
            $table->integer('natureza_id');
            $table->integer('vara_id');       
            $table->date('data');

            $table->text('obs')->nullable();

            $table->integer('status')->default(1);

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
        Schema::dropIfExists('processos');
    }
}
