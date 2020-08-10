<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rating', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('customer_id')->unsigned();
            $table
                ->foreign('customer_id')
                ->references('id')
                ->on('usShopLoers')
                ->onDelete('cascade');

            $table->bigInteger('shop_id')->unsigned();
            $table
                ->foreign('shop_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->bigInteger('item_request_id')->unsigned();
            $table
                ->foreign('item_request_id')
                ->references('id')
                ->on('item_request')
                ->onDelete('cascade');

            $table->decimal('rating_score');
            $table->timestamps();
            $table->unique(['customer_id', 'shop_id', 'item_request_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rating');
    }
}
