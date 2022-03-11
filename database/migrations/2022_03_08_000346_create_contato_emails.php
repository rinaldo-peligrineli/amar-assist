<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContatoEmails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contato_emails', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contato_id');
            $table->string('email');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('contato_id')->references('id')->on('contatos');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contato_emails');
    }
}
