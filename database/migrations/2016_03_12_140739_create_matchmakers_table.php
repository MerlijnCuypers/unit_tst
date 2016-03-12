<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchmakersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::create('matchmakers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('picture1_id')->index();
            $table->integer('picture2_id')->index();
            $table->boolean('elected')->default(false)->index();
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
        Schema::drop('matchmakers');
    }
}
