<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned()->index();
            $table->timestamp('registration_date')->nullable();
            $table->string('b_title')->nullable();
            $table->string('b_firstname')->nullable();
            $table->string('b_lastname')->nullable();
            $table->string('b_company')->nullable();
            $table->string('b_address1')->nullable();
            $table->string('b_address2')->nullable();
            $table->string('b_city')->nullable();
            $table->string('b_county')->nullable();
            $table->string('b_postcode')->nullable();
            $table->string('b_country')->nullable();
            $table->string('b_telephone')->nullable();
            $table->string('s_title')->nullable();
            $table->string('s_firstname')->nullable();
            $table->string('s_lastname')->nullable();
            $table->string('s_company')->nullable();
            $table->string('s_address1')->nullable();
            $table->string('s_address2')->nullable();
            $table->string('s_city')->nullable();
            $table->string('s_county')->nullable();
            $table->string('s_postcode')->nullable();
            $table->string('s_country')->nullable();
            $table->string('s_telephone')->nullable();
            $table->string('email')->nullable();
            $table->string('password');
            $table->string('password_encode')->nullable();
            $table->tinyInteger('is_subscribed')->default(0)->comment('0:Inactive;1:Active')->index();
            $table->string('how_hear')->nullable();
            $table->enum('user_status',['t', 'f'])->default('t');
            $table->string('optin_datetime')->nullable();
            $table->enum('gdpr_sent_email_status',['PENDING','PROCESS','DONE'])->default('PENDING')->index();
            $table->text('gdpr_email_text')->nullable();
            $table->mediumtext('gdpr_newsletter_subject')->nullable();
            $table->timestamp('gdpr_email_sent_date')->nullable();
            $table->text('gdpr_welcomeemail_text')->nullable();
            $table->mediumtext('gdpr_welcomeemail_subject')->nullable();
            $table->string('resetlinktimestmp',500)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->engine="InnoDB";
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
