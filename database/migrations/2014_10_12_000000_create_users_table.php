<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
           $table->id();
            $table->string('nome',100);
            $table->string('cpf',11)->unique();
            $table->string('usuario',11)->unique();
            $table->string('password');
            $table->string('email',50)->nullable();
            $table->string('telefone1', 15)->nullable();
            $table->string('telefone2', 15)->nullable();

            $table->integer('pais_id')->default(1); //->default(1); 
            $table->integer('estado_id')->nullable(); //->default(6); 
            $table->integer('cidade_id')->nullable(); //->default(1669);  
            $table->string('cep', 15)->nullable();  
            $table->string('bairro', 100)->nullable();   
            $table->string('rua', 100)->nullable();   
            $table->string('numero', 7)->nullable();
            $table->string('complemento', 100)->nullable();

            $table->integer('perfil_id')->default(2);
            $table->integer('escritorio_id');

            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();

            $table->string('key', 100)->unique();

            $table->timestamp('email_verified_at')->nullable();
            
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
