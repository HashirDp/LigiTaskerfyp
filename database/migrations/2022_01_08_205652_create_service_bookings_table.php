<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('order_no',150)->nullable();
            $table->string('order_status',150)->default('pending'); //approve,reject,jobStart,jonEnd,close
            $table->double('amount_payble')->nullable();
            $table->double('amount_receivced')->nullable();
            $table->string('job_assign_to')->nullable();
            $table->string('job_assigned_at')->nullable();
            $table->string('job_started_at')->nullable();
            $table->string('job_completed_at')->nullable();
            $table->bigInteger('service_id')->unsigned()->nullable();
            $table->bigInteger('user_id')->unsigned()->nullable();
            
            $table->foreign('service_id')->references('id')->on('services');
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('service_bookings');
    }
}
