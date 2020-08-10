<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_setting', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('shop_name', 255);
            $table->string('shop_address', 255);
            $table->string('shop_phone', 255)->nullable();
            $table->string('company_name', 255)->nullable();
            $table->string('zip_code', 255)->nullable();
            $table->string('business_id', 255)->nullable();
            $table->string('city', 255);
            $table->string('repair_phone_number', 255)->nullable();
            $table->integer('employee')->nullable();
            $table->dateTime('founded')->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();

            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('shop_setting');
    }
}
