<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('food_type_id');
            $table->integer('campaign_id');
            $table->integer('quantity');
            $table->time('pickuptime')->default('12:00:00');
            $table->dateTime('pickupdate');
            $table->text('description');
            $table->string('mobile_no');
            $table->string('food_pic')->default('default.jpg')->nullable();
            $table->string('pickup_address');
            $table->string('lat')->nullable();
            $table->string('lon')->nullable();
            $table->boolean('status')->default('0');
//            $table->foreign('user_id')->references('id')->on('users');
//            $table->foreign('food_type_id')->references('id')->on('food_types');
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
        Schema::dropIfExists('donations');
    }
}
