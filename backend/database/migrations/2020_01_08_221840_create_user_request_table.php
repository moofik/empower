<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_request', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('how_fast_time');
            $table->string('drive');
            $table->string('registration_number');
            $table->string('city');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('description');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('shop_id')->unsigned();
            $table->bigInteger('make_id')->unsigned();
            $table->bigInteger('service_id')->unsigned();
            $table->bigInteger('spare_parts_id')->unsigned();
            $table->timestamps();

            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table
                ->foreign('shop_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table
                ->foreign('service_id')
                ->references('id')
                ->on('shop_service')
                ->onDelete('cascade');

            $table
                ->foreign('spare_parts_id')
                ->references('id')
                ->on('shop_spare_parts')
                ->onDelete('cascade');

            $table
                ->foreign('make_id')
                ->references('id')
                ->on('shop_make')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_request');
    }
}
