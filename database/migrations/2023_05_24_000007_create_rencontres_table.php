<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRencontresTable extends Migration
{
    public function up()
    {
        Schema::create('rencontres', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->datetime('date_et_heure');
            $table->integer('resultat_1')->nullable();
            $table->integer('resultat_2')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
