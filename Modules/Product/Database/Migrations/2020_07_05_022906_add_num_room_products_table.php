<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNumRoomProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedTinyInteger('num_bedroom')->default(0);
            $table->unsignedTinyInteger('num_bathroom')->default(0);
            $table->unsignedTinyInteger('num_lounge')->default(0);
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('num_bedroom');
            $table->dropColumn('num_bathroom');
            $table->dropColumn('num_lounge');
            $table->dropSoftDeletes();
        });
    }
}
