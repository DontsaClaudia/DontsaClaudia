<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJoueursTable extends Migration
{
    public function up()
    {
        Schema::create('joueurs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom_joueur');
            $table->string('prenom');
            $table->date('date_de_naissance');
            $table->string('email');
            $table->integer('dossard');
            $table->string('poste');
            $table->integer('age');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
