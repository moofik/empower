<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopLogoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_logo', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('shop_id')->unsigned();
            $table
                ->foreign('shop_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->unique(['shop_id']);

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
        Schema::dropIfExists('shop_logo');
    }
}
