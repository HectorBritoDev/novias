<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('price')->nullable();
            $table->string('notes')->nullable();
            $table->integer('rating')->nullable();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('provider_id');
            $table->unsignedInteger('sector_id');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('provider_id')->references('id')->on('users');
            $table->foreign('sector_id')->references('id')->on('sectors');

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
        Schema::dropIfExists('likes');
    }
}
