<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('surname')->nullable();
            $table->string('email')->nullable();
            $table->bigInteger('phone')->nullable();
            $table->bigInteger('cellphone')->nullable();
            $table->string('adress')->nullable();
            $table->integer('postal_code')->nullable();
            $table->integer('status')->default(0); //0 = Pendiente - 1 = Confirmado - 2=Cancelado
            $table->integer('gender')->default(0); // 0 = Hombre - 1 = Mujer
            $table->string('age')->default(0); //0=Adulto 1=niño

            $table->unsignedInteger('user_id');
            $table->unsignedInteger('group_id');
            $table->unsignedInteger('menu_id')->nullable();
            // $table->unsignedInteger('companion_id')->nullable();
            $table->unsignedInteger('municipio_id')->nullable();

            // $table->unsignedInteger('table_id')->nullable();

            //RELATIONSHIPS
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('group_id')->references('id')->on('groups');
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('set null');
            //$table->foreign('companion_id')->references('id')->on('companions')->onDelete('cascade');
            $table->foreign('municipio_id')->references('id_municipio')->on('municipios');
            //$table->foreign('table_id')->references('id')->on('tables');

            $table->softDeletes();
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
        Schema::dropIfExists('guests');
    }
}
