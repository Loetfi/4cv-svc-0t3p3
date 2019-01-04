<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class OTP extends Model
{
    
    protected $table = 'otp';
    protected $primaryKey = 'OTPSendId';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'PhoneNumber','Message','CodeOTP','Campaign','IsUsed'
    ];
 

    protected $dates = [
        'ExpiredAt',
        'CreatedAt',
        'UpdatedAt'
    ];
}
