<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamCompetesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_competes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('iCompeted');
            $table->integer('iWon');
            $table->integer('team_id');
            $table->string('flag');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('team_competes');
    }
}
