<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('item_request');

        Schema::create('item_request', function (Blueprint $table) {
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
            $table->bigInteger('shop_id')->unsigned()->nullable();
            $table->bigInteger('brand_id')->unsigned();
            $table->bigInteger('item_id')->unsigned();
            $table->bigInteger('spare_part_id')->unsigned();
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
                ->foreign('item_id')
                ->references('id')
                ->on('shop_item')
                ->onDelete('cascade');

            $table
                ->foreign('spare_part_id')
                ->references('id')
                ->on('spare_part')
                ->onDelete('cascade');

            $table
                ->foreign('brand_id')
                ->references('id')
                ->on('shop_brand')
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
        Schema::dropIfExists('item_request');
    }
}
