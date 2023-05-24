<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRencontresTable extends Migration
{
    public function up()
    {
        Schema::table('rencontres', function (Blueprint $table) {
            $table->unsignedBigInteger('equipe_1_id')->nullable();
            $table->foreign('equipe_1_id', 'equipe_1_fk_8438383')->references('id')->on('equipes');
            $table->unsignedBigInteger('equipe_2_id')->nullable();
            $table->foreign('equipe_2_id', 'equipe_2_fk_8438384')->references('id')->on('equipes');
            $table->unsignedBigInteger('arbitre_id')->nullable();
            $table->foreign('arbitre_id', 'arbitre_fk_8438388')->references('id')->on('users');
        });
    }
}
