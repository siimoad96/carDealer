<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnoncesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annonces', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('city');
            $table->float('price');
            $table->date('date');
            $table->integer('from');
            $table->integer('to');
            $table->biginteger('partenaire_id')->unsigned();
            $table->foreign('partenaire_id')->references('id')->on('users');
            $table->biginteger('voiture_id')->unsigned();
            $table->foreign('voiture_id')->references('id')->on('voitures');
            $table->integer('privilege')->nullable();
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
        Schema::dropIfExists('annonces');
    }
}
