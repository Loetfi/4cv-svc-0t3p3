<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class OTP extends Model
{
    public $timestamps = false;
    
    protected $table = 'otp';
    protected $primaryKey = 'OTPSendId';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'UserId','PhoneNumber','Message','CodeOTP','Campaign','IsUsed'
    ];
 

    protected $dates = [
        'ExpiredAt',
        'CreatedAt',
        'UpdatedAt'
    ];
}
