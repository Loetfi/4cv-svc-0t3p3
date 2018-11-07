<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class OTP extends Model
{
    
    protected $table = 'OTP';
    protected $primaryKey = 'OTPSendId';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'PhoneNumber','Message','CodeOTP','Campaign'
    ];
 

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
