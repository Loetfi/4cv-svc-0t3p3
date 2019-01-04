<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('otp', function (Blueprint $table) {
            $table->increments('OTPSendId');
            $table->string('PhoneNumber');
            $table->string('Message');
            $table->string('CodeOTP');
            $table->string('Campaign')->nullable();
            $table->string('IsUsed', 1);
            $table->dateTime('CreatedAt')->nullable();
            $table->dateTime('ExpiredAt')->nullable();
            $table->dateTime('UpdatedAt')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('otp');
    }
}
