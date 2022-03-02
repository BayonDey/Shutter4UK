<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsersTableFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('access_group')->comment('Master, Buyer')->after('resetlinktimestmp');
            $table->integer('type')->comment('1:Super Admin, 2:Admin, 3:Buyer')->after('access_group');
            $table->string('initials')->after('type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('access_group');
            $table->dropColumn('type');
            $table->dropColumn('initials');
        });
    }
}
