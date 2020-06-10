<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProviderRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provider_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('applicant_name');
            $table->string('applicant_email')->nullable();
            $table->bigInteger('applicant_phone')->nullable();
            $table->date('applicant_date')->nullable();
            $table->string('applicant_guests_number')->nullable();
            $table->longText('applicant_comment');

            $table->unsignedInteger('user_id');
            $table->unsignedInteger('for');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('for')->references('id')->on('users');
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
        Schema::dropIfExists('provider_requests');
    }
}
