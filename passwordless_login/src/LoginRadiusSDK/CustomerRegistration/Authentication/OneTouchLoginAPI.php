<?php
 /**
 * @category            : CustomerRegistration
 * @link                : http://www.loginradius.com
 * @package             : OneTouchLoginAPI
 * @author              : LoginRadius Team
 * @license             : https://opensource.org/licenses/MIT
 */

namespace LoginRadiusSDK\CustomerRegistration\Authentication;

use LoginRadiusSDK\Utility\Functions;
use LoginRadiusSDK\LoginRadiusException;

class OneTouchLoginAPI extends Functions
{

    public function __construct($options = [])
    {
        parent::__construct($options);
    }
       


    /**
     * This API is used to send a link to a specified email for a frictionless login/registration
     * @param oneTouchLoginByEmailModel Model Class containing Definition of payload for OneTouchLogin By EmailModel API
     * @param oneTouchLoginEmailTemplate Name of the One Touch Login Email Template
     * @param redirecturl Url where the user will redirect after success authentication
     * @param welcomeemailtemplate Name of the welcome email template
     * @return Response containing Definition of Complete Validation data
     * 1.2
    */

    public function oneTouchLoginByEmail($oneTouchLoginByEmailModel, $oneTouchLoginEmailTemplate = null,
        $redirecturl = null, $welcomeemailtemplate = null)
    {
        $resourcePath = "/identity/v2/auth/onetouchlogin/email";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        if ($oneTouchLoginEmailTemplate != '') {
            $queryParam['oneTouchLoginEmailTemplate'] = $oneTouchLoginEmailTemplate;
        }
        if ($redirecturl != '') {
            $queryParam['redirecturl'] = $redirecturl;
        }
        if ($welcomeemailtemplate != '') {
            $queryParam['welcomeemailtemplate'] = $welcomeemailtemplate;
        }
        return Functions::_apiClientHandler('POST', $resourcePath, $queryParam, $oneTouchLoginByEmailModel);
    }
       


    /**
     * This API is used to send one time password to a given phone number for a frictionless login/registration.
     * @param oneTouchLoginByPhoneModel Model Class containing Definition of payload for OneTouchLogin By PhoneModel API
     * @param smsTemplate SMS Template name
     * @return Response containing Definition of Complete Validation data
     * 1.4
    */

    public function oneTouchLoginByPhone($oneTouchLoginByPhoneModel, $smsTemplate = null)
    {
        $resourcePath = "/identity/v2/auth/onetouchlogin/phone";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        if ($smsTemplate != '') {
            $queryParam['smsTemplate'] = $smsTemplate;
        }
        return Functions::_apiClientHandler('POST', $resourcePath, $queryParam, $oneTouchLoginByPhoneModel);
    }
       


    /**
     * This API is used to verify the otp for One Touch Login.
     * @param otp The Verification Code
     * @param phone New Phone Number
     * @param fields The fields parameter filters the API response so that the response only includes a specific set of fields
     * @param smsTemplate SMS Template name
     * @return Response Containing Access Token and Complete Profile Data
     * 1.5
    */

    public function oneTouchLoginOTPVerification($otp, $phone,
        $fields = "", $smsTemplate = null)
    {
        $resourcePath = "/identity/v2/auth/onetouchlogin/phone/verify";
        $bodyParam = [];
        $bodyParam['phone'] = $phone;
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        if ($otp === '' || ctype_space($otp)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('otp'));
        }
        if ($fields != '') {
            $queryParam['fields'] = $fields;
        }
        if ($smsTemplate != '') {
            $queryParam['smsTemplate'] = $smsTemplate;
        }
        $queryParam['otp'] = $otp;
        return Functions::_apiClientHandler('PUT', $resourcePath, $queryParam, json_encode($bodyParam));
    }
       


    /**
     * This API verifies the provided token for One Touch Login
     * @param verificationToken Verification token received in the email
     * @param welcomeEmailTemplate Name of the welcome email template
     * @return Complete verified response data
     * 8.4.2
    */

    public function oneTouchEmailVerification($verificationToken, $welcomeEmailTemplate = null)
    {
        $resourcePath = "/identity/v2/auth/email/onetouchlogin";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        if ($verificationToken === '' || ctype_space($verificationToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('verificationToken'));
        }
        if ($welcomeEmailTemplate != '') {
            $queryParam['welcomeEmailTemplate'] = $welcomeEmailTemplate;
        }
        $queryParam['verificationToken'] = $verificationToken;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * This API is used to check if the One Touch Login link has been clicked or not.
     * @param clientGuid Unique string used in the Smart Login request
     * @param fields The fields parameter filters the API response so that the response only includes a specific set of fields
     * @return Response containing User Profile Data and access token
     * 9.21.2
    */

    public function oneTouchLoginPing($clientGuid, $fields = "")
    {
        $resourcePath = "/identity/v2/auth/login/smartlogin/ping";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        if ($clientGuid === '' || ctype_space($clientGuid)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('clientGuid'));
        }
        if ($fields != '') {
            $queryParam['fields'] = $fields;
        }
        $queryParam['clientGuid'] = $clientGuid;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }

}