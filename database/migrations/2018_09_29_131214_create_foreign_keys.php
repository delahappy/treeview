<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('factories', function (Blueprint $table) {
            $table->foreign('tree_id')->references('id')->on('trees')->onDelete('cascade');
        });

        Schema::table('nodes', function (Blueprint $table) {
            $table->foreign('factory_id')->references('id')->on('factories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('factories', function (Blueprint $table) {
            $table->dropForeign(['tree_id']);
        });

        Schema::table('nodes', function (Blueprint $table) {
            $table->dropForeign(['factory_id']);
        });
    }
}
