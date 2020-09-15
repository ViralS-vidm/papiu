<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductConveniencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_conveniences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('icon');
            $table->timestamps();
        });

        Schema::create('product_convenience_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_convenience_id');
            $table->string('locale')->index();
            $table->string('name');
            $table->timestamps();

            $table->foreign('product_convenience_id')->references('id')->on('product_conveniences')->onDelete('cascade');
        });

        Schema::create('product_conveniences_pivot', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->unsignedBigInteger('convenience_id');
            $table->foreign('convenience_id')->references('id')->on('product_conveniences')->onDelete('cascade');
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
        Schema::dropIfExists('product_conveniences_pivot');
        Schema::dropIfExists('product_convenience_translations');
        Schema::dropIfExists('product_conveniences');
    }
}
