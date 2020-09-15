<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetaCmsTranslations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('meta_cms', function (Blueprint $table) {
            $table->dropColumn(['title', 'key_word', 'description', 'tag']);
        });
        Schema::create('meta_cms_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('meta_cms_id');
            $table->string('locale')->index();
            $table->longText('description')->nullable();
            $table->string('title')->nullable();
            $table->string('key_word')->nullable();
            $table->string('tag')->nullable();
            $table->timestamps();
            $table->unique(['meta_cms_id', 'locale']);
            $table->foreign('meta_cms_id')->references('id')->on('meta_cms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('meta_cms', function (Blueprint $table) {
            $table->longText('description')->nullable();
            $table->string('title')->nullable();
            $table->string('key_word')->nullable();
            $table->string('tag')->nullable();
        });
        Schema::dropIfExists('meta_cms_translations');
    }
}
