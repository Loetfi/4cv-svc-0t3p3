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

	public static function insert($data)
	{
		try {
			OTPModel::create($data);
			return 'success_insert';
		}catch(QueryException $e){
			throw new \Exception($e->getMessage(), 500);
		}

	} 
}
