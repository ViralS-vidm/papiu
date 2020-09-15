<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterFeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('feedbacks', function (Blueprint $table) {
            $table->dropColumn('name');
        });
        Schema::table('feedbacks', function (Blueprint $table) {
            $table->date('dob')->nullable();
            $table->string('phone');
            $table->string('job')->nullable();
            $table->unsignedTinyInteger('status')->default(\Modules\Feedback\Entities\Feedback::STATUS_NEW);
            $table->string('name')->nullable();
            $table->dropColumn('rate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('feedbacks', function (Blueprint $table) {
            $table->dropColumn('dob');
            $table->dropColumn('phone');
            $table->dropColumn('job');
            $table->dropColumn('status');
            $table->unsignedSmallInteger('rate');
            $table->string('name');
        });
    }
}
