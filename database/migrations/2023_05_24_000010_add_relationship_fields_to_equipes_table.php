<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToEquipesTable extends Migration
{
    public function up()
    {
        Schema::table('equipes', function (Blueprint $table) {
            $table->unsignedBigInteger('nom_coach_id')->nullable();
            $table->foreign('nom_coach_id', 'nom_coach_fk_8438350')->references('id')->on('users');
        });
    }
}
