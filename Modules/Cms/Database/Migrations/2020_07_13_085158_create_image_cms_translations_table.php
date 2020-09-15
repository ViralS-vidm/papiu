<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageCmsTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('image_cms', function (Blueprint $table) {
            $table->dropColumn(['description', 'alt']);
        });
        Schema::create('image_cms_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('image_cms_id');
            $table->string('locale')->index();
            $table->text('alt')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();
            $table->unique(['image_cms_id', 'locale']);
            $table->foreign('image_cms_id')->references('id')->on('image_cms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('image_cms', function (Blueprint $table) {
            $table->longText('description')->nullable();
            $table->text('alt')->nullable();
        });
        Schema::dropIfExists('image_cms_translations');
    }
}
