<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('status')->default(1); // 0= PENDIENTE - 1=PAGADO
            $table->date('pay_date')->nullable();
            $table->date('expiration_date');
            $table->string('pay_by')->nullable();
            $table->string('pay_method')->nullable();
            $table->integer('amount')->default(0);
            $table->unsignedInteger('spend_id');

            //RELATIONSHIPS
            $table->foreign('spend_id')->references('id')->on('spends');
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
        Schema::dropIfExists('payments');
    }
}
