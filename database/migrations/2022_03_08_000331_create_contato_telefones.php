<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContatoTelefones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contato_telefones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contato_id');
            $table->unsignedBigInteger('tipo_telefone_id');
            $table->string('telefone');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('contato_id')->references('id')->on('contatos');
            $table->foreign('tipo_telefone_id')->references('id')->on('tipos_telefone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contato_telefones');
    }
}
