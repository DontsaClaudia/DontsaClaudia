<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToJoueursTable extends Migration
{
    public function up()
    {
        Schema::table('joueurs', function (Blueprint $table) {
            $table->unsignedBigInteger('nom_equipe_id')->nullable();
            $table->foreign('nom_equipe_id', 'nom_equipe_fk_8438371')->references('id')->on('equipes');
        });
    }
}
