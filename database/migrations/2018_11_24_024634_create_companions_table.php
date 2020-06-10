<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateCompanionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('companions', function (Blueprint $table) {
        //     $table->increments('id');

        //     $table->unsignedInteger('guest_id');
        //     $table->unsignedInteger('companion_id');

        //     //RELATIONSHIPS IN modified_companions_table MIGRATION

        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('companions');
    }
}
