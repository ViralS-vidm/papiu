<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnAreaToConfigCmsTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('config_cms_translations', function (Blueprint $table) {
            $table->string('area')->nullable();
        });

        Schema::table('image_cms_translations', function (Blueprint $table) {
            $table->string('area')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('config_cms_translations', function (Blueprint $table) {
            $table->dropColumn('area');
        });

        Schema::table('image_cms_translations', function (Blueprint $table) {
            $table->dropColumn('area');
        });
    }
}
