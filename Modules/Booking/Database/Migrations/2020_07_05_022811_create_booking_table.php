<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('short_code')->nullable();
            $table->unsignedBigInteger('product_id');
            $table->unsignedInteger('num_client')->nullable();
            $table->string('contact_name');
            $table->string('contact_email');
            $table->string('contact_number');
            $table->string('address')->nullable();
            $table->date('time_start');
            $table->date('time_end');
            $table->dateTime('checked_in_at')->nullable();
            $table->dateTime('checked_out_at')->nullable();
            $table->dateTime('completed_at')->nullable();
            $table->unsignedTinyInteger('status');
            $table->unsignedDouble('total_price');
            $table->unsignedDouble('room_price');
            $table->unsignedDouble('service_price')->default(0);
            $table->unsignedDouble('paid')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('booking_services', function (Blueprint $table) {
            $table->unsignedBigInteger('booking_id');
            $table->unsignedBigInteger('service_id');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
        Schema::dropIfExists('booking_services');
    }
}
