<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOverviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('overview', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('content');
            $table->timestamps();
        });

        Schema::create('model_has_overview', function (Blueprint $table) {
            $table->unsignedBigInteger('overview_id');
            $table->morphs('model');

            $table->foreign('overview_id')
                ->references('id')
                ->on('overview')
                ->onDelete('cascade');

            $table->primary(['overview_id', 'model_id', 'model_type']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('model_has_overview');
        Schema::dropIfExists('overview');
    }
}
