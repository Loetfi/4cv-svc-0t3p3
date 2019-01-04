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
            $table->dateTime('ExpiredAt')->nullable();
            $table->string('IsUsed', 1)->nullable();
            $table->timestamps();
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
