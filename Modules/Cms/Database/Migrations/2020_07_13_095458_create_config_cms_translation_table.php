<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigCmsTranslationTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('config_cms', function (Blueprint $table) {
            $table->dropColumn(['title', 'value']);
        });
        Schema::create('config_cms_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('config_cms_id');
            $table->string('locale')->index();
            $table->string('title')->nullable();
            $table->longText('value')->nullable();
            $table->timestamps();
            $table->unique(['config_cms_id', 'locale']);
            $table->foreign('config_cms_id')->references('id')->on('config_cms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('config_cms', function (Blueprint $table) {
            $table->string('title')->nullable();
            $table->longText('value')->nullable();
        });
        Schema::dropIfExists('config_cms_translations');
    }
}
