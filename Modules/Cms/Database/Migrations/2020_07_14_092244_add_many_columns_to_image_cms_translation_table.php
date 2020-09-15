<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddManyColumnsToImageCmsTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('image_cms_translations', function (Blueprint $table) {
            $table->string('title')->nullable();
            $table->string('name')->nullable();
            $table->longText('hash_tag')->nullable();
            $table->longText('key_word')->nullable();
            $table->longText('header')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('image_cms_translations', function (Blueprint $table) {
            $table->dropColumn(['title', 'name', 'hash_tag', 'key_word', 'header']);
        });
    }
}
