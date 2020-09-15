<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoCmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_cms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('key');
            $table->unsignedTinyInteger('type')->default(\Modules\Cms\Entities\ConfigCms::TYPE_INTRODUCE_CMS);
            $table->string('source');
            $table->timestamps();
        });

        Schema::create('video_cms_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('video_cms_id');
            $table->string('locale')->index();
            $table->string('name')->nullable();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();
            $table->unique(['video_cms_id', 'locale']);
            $table->foreign('video_cms_id')->references('id')->on('video_cms')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('video_cms_translations');
        Schema::dropIfExists('video_cms');
    }
}
