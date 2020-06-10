<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');

            //USER ROLES = 0-ADMIN 1-CLIENT 2-PROVIDER
            $table->integer('role')->default(1);
            //USER PROFILE COMPLETED = 0 NO - 1 YES
            $table->integer('completed')->default(0);
            //APPROVAL STATUS 0 = PENDING - 1=APPROVED
            $table->integer('status')->default(0);

            //LOGIN
            $table->string('email')->unique();
            $table->string('name');
            $table->string('avatar')->nullable();
            $table->string('password');
            $table->date('marrige_date')->nullable();
            $table->string('gender')->nullable();
            $table->unsignedInteger('departamento_id')->nullable();
            $table->unsignedInteger('municipio_id');

            //JUST FOR INSTAGRAM
            $table->string('nickname')->nullable();

            //GENERAL DATA
            $table->string('about_me')->nullable();
            $table->bigInteger('phone')->nullable();

            //FAMILY DATA
            $table->string('partner_name')->nullable();
            $table->date('partner_birthday')->nullable();
            $table->string('partner_gender')->nullable();
            $table->string('father_name')->nullable();
            $table->date('father_birthday')->nullable();
            $table->string('mother_name')->nullable();
            $table->date('mother_birthday')->nullable();

            //INSPIRATION
            $table->unsignedInteger('wedding_color_id')->nullable();
            $table->unsignedInteger('wedding_weather_id')->nullable();
            $table->unsignedInteger('wedding_style_id')->nullable();
            $table->string('wedding_honeymoon')->nullable();

            //MY MARRIGE
            $table->integer('expected_guests')->nullable();

            $table->unsignedInteger('wedding_municipio_id')->nullable();
            $table->longText('about_my_marrige')->nullable();
            $table->integer('wedding_hour_start')->nullable();
            $table->integer('wedding_minute_start')->nullable();
            $table->integer('wedding_hour_finish')->nullable();
            $table->integer('wedding_minute_finish')->nullable();

            //RELATIONSHIPS
            $table->foreign('departamento_id')->references('id_departamento')->on('departamentos');
            $table->foreign('municipio_id')->references('id_municipio')->on('municipios');
            $table->foreign('wedding_municipio_id')->references('id_municipio')->on('municipios');
            $table->foreign('wedding_color_id')->references('id')->on('wedding_colors')->onDelete('set null');
            $table->foreign('wedding_weather_id')->references('id')->on('wedding_weathers')->onDelete('set null');
            $table->foreign('wedding_style_id')->references('id')->on('wedding_styles')->onDelete('set null');

//-----------------------------------------------------------------------------------------------------------------------
            //-----------------------------------------------------------------------------------------------------------------------
            //-----------------------------------------------------------------------------------------------------------------------
            //PROVIDERS COLUMS

            //GENERAL DATA
            $table->integer('provider_min_cost')->nullable();
            $table->integer('provider_capacity')->nullable();
            $table->longText('provider_description')->nullable();
            $table->string('provider_adress')->nullable();

            //nullables de momento
            $table->string('provider_logo')->nullable();
            $table->string('provider_logo_description')->nullable();
            $table->string('provider_main_photo')->nullable(); //TABLA EXTRA PARA LAS FOTOS ADICIONALES
            $table->longText('provider_main_photo_description')->nullable();

            //CONTACT DATA
            $table->string('provider_contact_name')->nullable();
            $table->string('provider_contact_email')->nullable();
            $table->bigInteger('provider_contact_phone')->nullable();
            $table->bigInteger('provider_contact_cellphone')->nullable();
            $table->bigInteger('provider_contact_fax')->nullable();
            $table->string('provider_contact_website')->nullable();

            //FEATURES
            $table->integer('provider_discount')->nullable();
            $table->string('provider_video')->nullable();

            //RELATIONSHIPS

            $table->unsignedInteger('provider_sector_id')->nullable();
            $table->unsignedInteger('provider_category_id')->nullable();

            $table->foreign('provider_sector_id')->references('id')->on('sectors')->onDelete('set null');
            $table->foreign('provider_category_id')->references('id')->on('sector_categories')->onDelete('set null');

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
