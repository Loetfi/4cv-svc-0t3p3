<?php  

namespace App\Repositories;

use DB;
use App\Models\OTP as OTPModel;
use Illuminate\Database\QueryException; 

class OTPRepo
{
	public static function get()
	{
		try {
			// return DB::table('OTP')
			// ->select(DB::raw('*'))
			// ->get()->toArray();
			// return ;
			foreach (OTPModel::get() as $key=> $category) {
				$categories[$category->OTPSendId] = $category->PhoneNumber;
			}
			return $categories;
		}catch(QueryException $e){
			throw new \Exception($e->getMessage(), 500);
		}

	} 

	public static function insert($phone_number , $message , $otp_code , $campaign)
	{
		try {
			$flight = new OTPModel;
			$flight->PhoneNumber = $phone_number;
			$flight->Message = $message;
			$flight->CodeOTP = $otp_code;
			$flight->Campaign = $campaign;
			$flight->save();
			return 'success_insert';
		}catch(QueryException $e){
			throw new \Exception($e->getMessage(), 500);
		}

	} 
}
