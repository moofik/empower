<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddActiveColumnsToShopScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shop_schedule', function (Blueprint $table) {
            $table->boolean('monday_active')->nullable();
            $table->boolean('tuesday_active')->nullable();
            $table->boolean('wednesday_active')->nullable();
            $table->boolean('thursday_active')->nullable();
            $table->boolean('friday_active')->nullable();
            $table->boolean('saturday_active')->nullable();
            $table->boolean('sunday_active')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shop_schedule', function (Blueprint $table) {
            //
        });
    }
}
