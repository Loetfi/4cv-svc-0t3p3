<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Helpers\RestCurl;
use App\Helpers\Api;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Validator;
use App\Repositories\OTPRepo;
use Freshbitsweb\Laratables\Laratables;
use App\Test;
// use Freshbitsweb\Laratables\request;

class OTPController extends Controller
{  

    public function index(Request $request){


        try{
            if(empty($request->json())) throw New \Exception('Params not found', 500);

            // awo configuration 
            $user_awo           = 'acv_user1';
            $password_user_awo  = 'acv_user1123';
            $sender             = 'ACV';
            
            $this->validate($request, [
                'phone_number'  => 'required|numeric', 
                'description'   => 'required',
                'campaign'      => 'required'
            ]);  
            // login message using OTP 

            // start message OTP
            $otp_code   = rand (10000,99999);
            $message    = 'Your One Time Password (OTP) for ACV is '.$otp_code.' and valid for 2 minutes.';
            // end message

            
            // set message 
            $url_awo = "https://astraapps.astra.co.id/awo/api/send_sms.php?user=".$user_awo."&pwd=".$password_user_awo."&sender=".$sender."&msisdn=".$request->phone_number."&message=".urlencode($message)."&description=".urlencode($request->description)."&schedule=&campaign=".urlencode($request->campaign);
            // test call API Awo
            $response = RestCurl::exec('GET', $url_awo, array(),'');

            // insert into database
            $insert_data = OTPRepo::insert($request->phone_number , $message , $otp_code , $request->campaign);

            $status   = 1;
            $httpcode = 200;
            $data     = ['sms' => $message , 'otp_code' => $otp_code]; 
            $errorMsg = 'Success request OTP';

        }catch(\Exception $e){
            $status   = 0;
            $httpcode = 400;
            $data     = null;
            $errorMsg = $e->getMessage();
        }
        return response()->json(Api::format($status, $data, $errorMsg), $httpcode);
    } 

}
