<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOptionGrMapTableRemoveFlag extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('v2_map_sub_group_option', function (Blueprint $table) {
            $table->tinyInteger('removed')->after('position')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('v2_map_sub_group_option', function (Blueprint $table) {
            $table->dropColumn('removed');
        });
    }
}
