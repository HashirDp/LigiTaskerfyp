<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_details', function (Blueprint $table) {
           
            $table->id();

           //service details
            $table->string('service_name')->nullable();
            $table->double('service_qty')->nullable();
            $table->double('price')->nullable();
            $table->double('dicount')->nullable();
            $table->double('g_total')->nullable();
            $table->double('provider_id')->nullable();
            $table->string('provider_name')->nullable();
            
            //user details
            $table->string('user_name',150)->nullable();
            $table->string('house_no')->nullable();
            $table->string('block')->nullable();
            $table->string('area')->nullable();
            $table->string('city')->nullable();
            
            $table->bigInteger('order_id')->unsigned()->nullable();
            $table->foreign('order_id')->references('id')->on('service_bookings')->onDelete('cascade');

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
        Schema::dropIfExists('booking_details');
    }
}
