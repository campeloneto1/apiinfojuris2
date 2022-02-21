<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');

            $table->string('mensagem', 50);
            $table->string('table', 50);
            $table->integer('fk')->nullable();
            $table->integer('action'); 
            $table->text('object')->nullable();    
            $table->text('object_old')->nullable();       
      
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
        Schema::dropIfExists('logs');
    }
}
