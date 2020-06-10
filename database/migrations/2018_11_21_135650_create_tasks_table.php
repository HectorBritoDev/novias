<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('title');
            $table->longText('description')->nullable();
            $table->string('note')->nullable();
            $table->integer('status')->default(0); //0 INCOMPLETE - 1 COMPLETE
            $table->unsignedInteger('category_id')->nullable();
            $table->date('start_date')->nullable();
            $table->date('finish_date')->nullable();

            //relationships
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('task_categories')->onDelete('set null');

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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('tasks');
    }
}
