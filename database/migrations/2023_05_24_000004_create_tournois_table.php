<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTournoisTable extends Migration
{
    public function up()
    {
        Schema::create('tournois', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom_tournoi');
            $table->date('date_de_debut');
            $table->date('date_de_fin');
            $table->integer('nombre_equipes');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
