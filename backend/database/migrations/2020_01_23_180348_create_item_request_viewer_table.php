<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemRequestViewerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_request_viewer', function (Blueprint $table) {
            $table->bigIncrements('id');

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
        Schema::dropIfExists('item_request_viewer');
    }
}
