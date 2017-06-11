<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('nome_logradouro');
            $table->string('tipo_logradouro');
            $table->integer('numero')->unsigned();
            $table->string('complemento');
            $table->string('bairro');
            $table->string('localidade');
            $table->string('sigla', 2);
            $table->string('cep', 9);
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
        Schema::dropIfExists('enderecos');
    }
}