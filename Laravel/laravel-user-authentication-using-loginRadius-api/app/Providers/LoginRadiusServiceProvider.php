<?php

namespace App\Providers;

use \LoginRadiusSDK\Utility\Functions;
use \LoginRadiusSDK\Utility\SOTT;
use \LoginRadiusSDK\LoginRadiusException;
use \LoginRadiusSDK\Clients\IHttpClientInterface;
use \LoginRadiusSDK\Clients\DefaultHttpClient;
use \LoginRadiusSDK\CustomerRegistration\Account\AccountAPI;
use \LoginRadiusSDK\CustomerRegistration\Account\RoleAPI;
use \LoginRadiusSDK\CustomerRegistration\Account\SottAPI;
use \LoginRadiusSDK\CustomerRegistration\Advanced\ConfigurationAPI;
use \LoginRadiusSDK\CustomerRegistration\Advanced\ConsentManagementAPI;
use \LoginRadiusSDK\CustomerRegistration\Advanced\CustomObjectAPI;
use \LoginRadiusSDK\CustomerRegistration\Advanced\CustomRegistrationDataAPI;
use \LoginRadiusSDK\CustomerRegistration\Advanced\MultiFactorAuthenticationAPI;
use \LoginRadiusSDK\CustomerRegistration\Advanced\ReAuthenticationAPI;
use \LoginRadiusSDK\CustomerRegistration\Advanced\WebHookAPI;
use \LoginRadiusSDK\CustomerRegistration\Authentication\AuthenticationAPI;
use \LoginRadiusSDK\CustomerRegistration\Authentication\OneTouchLoginAPI;
use \LoginRadiusSDK\CustomerRegistration\Authentication\PasswordLessLoginAPI;
use \LoginRadiusSDK\CustomerRegistration\Authentication\PhoneAuthenticationAPI;
use \LoginRadiusSDK\CustomerRegistration\Authentication\PINAuthenticationAPI;
use \LoginRadiusSDK\CustomerRegistration\Authentication\RiskBasedAuthenticationAPI;
use \LoginRadiusSDK\CustomerRegistration\Authentication\SmartLoginAPI;
use \LoginRadiusSDK\CustomerRegistration\Social\SocialAPI;
use \LoginRadiusSDK\CustomerRegistration\Social\NativeSocialAPI;

class LoginRadiusServiceProvider extends ServiceProvider
{

    function __construct(){
        $accountObject = new AccountAPI();
    }
   

}
?>