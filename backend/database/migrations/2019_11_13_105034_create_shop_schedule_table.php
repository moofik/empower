<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_schedule', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('monday_from', 100)->nullable();
            $table->string('monday_to', 100)->nullable();
            $table->string('tuesday_from', 100)->nullable();
            $table->string('tuesday_to', 100)->nullable();
            $table->string('wednesday_from', 100)->nullable();
            $table->string('wednesday_to', 100)->nullable();
            $table->string('thursday_from', 100)->nullable();
            $table->string('thursday_to', 100)->nullable();
            $table->string('friday_from', 100)->nullable();
            $table->string('friday_to', 100)->nullable();
            $table->string('saturday_from', 100)->nullable();
            $table->string('saturday_to', 100)->nullable();
            $table->string('sunday_from', 100)->nullable();
            $table->string('sunday_to', 100)->nullable();
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
        Schema::dropIfExists('shop_schedule');
    }
}
