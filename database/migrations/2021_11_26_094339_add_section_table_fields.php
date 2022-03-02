<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSectionTableFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('section_users', function (Blueprint $table) {
            $table->string('section_key')->after('sections')->nullable();
            $table->string('url')->after('section_key')->nullable();
            $table->integer('parent_id')->after('url')->default(0);
            $table->string('icon_class')->after('parent_id')->nullable();
            $table->tinyInteger('order_no')->after('icon_class')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('section_users', function (Blueprint $table) {
            $table->dropColumn('section_key');
            $table->dropColumn('url');
            $table->dropColumn('parent_id');
            $table->dropColumn('icon_class');
            $table->dropColumn('order_no');
        });
    }
}
