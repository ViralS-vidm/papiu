<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('original_url');
            $table->string('thumbnail_url')->nullable();
            $table->timestamps();
        });

        Schema::create('model_has_images', function (Blueprint $table) {
            $table->unsignedBigInteger('image_id');
            $table->unsignedTinyInteger('image_type')->nullable();
            $table->morphs('model');

            $table->foreign('image_id')
                ->references('id')
                ->on('images')
                ->onDelete('cascade');

            $table->primary(['image_id', 'model_id', 'model_type']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('model_has_images');
        Schema::dropIfExists('images');
    }
}
