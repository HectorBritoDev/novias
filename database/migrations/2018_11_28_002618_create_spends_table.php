<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spends', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->bigInteger('estimated_cost')->default(0);
            $table->bigInteger('final_cost')->default(0);
            $table->unsignedInteger('budget_category_id');
            $table->foreign('budget_category_id')->references('id')->on('budget_categories');
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
        Schema::dropIfExists('spends');
    }
}
