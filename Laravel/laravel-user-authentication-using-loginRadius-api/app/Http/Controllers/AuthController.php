<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// login radius.
use \LoginRadiusSDK\Utility\SOTT;
use \LoginRadiusSDK\CustomerRegistration\Account\SottAPI;


// defining global variables.
define('APP_NAME', 'mwangikibuifirstapp'); // replace with your app name
define('LR_API_KEY', 'cac62d1b-e996-439f-97dc-21ba17c19582'); //replace with your api key
define('LR_API_SECRET', '57964b87-6a7a-46f4-aed4-560d93a3264e'); // replace with your api secret

define('API_REQUEST_SIGNING', TRUE); 

class AuthController extends Controller {

    public function login(Request $request){
        // send curl request.
        $apiKey = "cac62d1b-e996-439f-97dc-21ba17c19582";
        $postfields = json_encode(array(
            'email' => $request->email,
            'password' => $request->password
        ));
        $url = "https://api.loginradius.com/identity/v2/auth/login?apikey=".$apiKey;
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_POST, true );
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
        curl_setopt($ch,CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch,CURLOPT_POSTFIELDS, $postfields);

        $err = curl_error($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $output=curl_exec($ch);
        curl_close($ch);

        if($err){
            // set an error,,,
            return view('login')->with('validation_error',$err);
        }else{
            $res = json_decode($output);
            if($res){
                // check status code.
                if($status_code == 0){
                    // set the access token and the user.
                    session([
                        'access_token' => $res->access_token,
                        'logged_in_user' => $res->Profile
                    ]);
                    // redirect to dashboard page.
                    return redirect('dashboard')->with('status', 'Logged in successfully');
                }else{
                    // set the error.
                    return view('login')->with('validation_error',$res->Message);
                }
            }else{
                return view('login')->with('validation_error',$res->Message);
            }
        }

    }

    public function generateSott(){
        $timeDifference =''; // (Optional) The time difference will be used to set the expiration time of SOTT, If you do not pass time difference then the default expiration time of SOTT is 10 minutes.
        $getLRserverTime=false; //(Optional) If true it will call LoginRadius Get Server Time Api and fetch basic server information and server time information which is useful when generating an SOTT token.
        $apiKey="cac62d1b-e996-439f-97dc-21ba17c19582"; 
        $apiSecret="57964b87-6a7a-46f4-aed4-560d93a3264e";
        $sottObj = new SOTT();
        $sott = $sottObj->encrypt($timeDifference,$getLRserverTime,$apiKey,$apiSecret);
        return $sott;
    }

    public function register(Request $request){
        $sott = $this->generateSott();
        $apiKey = "cac62d1b-e996-439f-97dc-21ba17c19582";
        $full_name = $request->first_name.' '.$request->middle_name.' '.$request->last_name;
        $postfields = '{
            "FirstName": "'.$request->first_name.'",
            "MiddleName": "'.$request->middle_name.'",
            "LastName": "'.$request->last_name.'",
            "FullName": "'.$full_name.'",
            "Email": [
              {
                "Type": "Primary",
                "Value": "'.$request->email.'"
              }
            ],
            "Password": "'.$request->password.'"
          }';
        $url = "https://api.loginradius.com/identity/v2/auth/register?apikey=".$apiKey;
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_POST, true );
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
        curl_setopt($ch,CURLOPT_HTTPHEADER, array('Content-Type: application/json','X-LoginRadius-Sott: '.$sott));
        curl_setopt($ch,CURLOPT_POSTFIELDS, $postfields);
        $err = curl_error($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $output=curl_exec($ch);
        curl_close($ch);
        if($err){
            // redirect to register with the error...
            return view('register')->with('validation_error',$err);
        }else{
            $res = json_decode($output);
            if($res){
                // check status code.
                if(!isset($res->ErrorCode)){
                    // set the access token and the user.
                    session([
                        'access_token' => $res->Data->access_token,
                        'logged_in_user' => $res->Data->Profile
                    ]);
                    // redirect to dashboard page.
                    return redirect('dashboard')->with('status', 'Account created successfully');
                }else{
                    // redirect to register with the error...
                    return view('register')->with('validation_error',$res->Message);
                }
            }else{
                // redirect to register with the error...
                return view('register')->with('validation_error','Could not decode message from server');
            }
        }
    }
}

?>