<?php
 /**
 * @category            : CustomerRegistration
 * @link                : http://www.loginradius.com
 * @package             : PhoneAuthenticationAPI
 * @author              : LoginRadius Team
 * @license             : https://opensource.org/licenses/MIT
 */

namespace LoginRadiusSDK\CustomerRegistration\Authentication;

use LoginRadiusSDK\Utility\Functions;
use LoginRadiusSDK\LoginRadiusException;

class PhoneAuthenticationAPI extends Functions
{

    public function __construct($options = [])
    {
        parent::__construct($options);
    }
       


    /**
     * This API retrieves a copy of the user data based on the Phone
     * @param phoneAuthenticationModel Model Class containing Definition of payload for PhoneAuthenticationModel API
     * @param fields The fields parameter filters the API response so that the response only includes a specific set of fields
     * @param loginUrl Url where the user is logging from
     * @param smsTemplate SMS Template name
     * @return Response containing User Profile Data and access token
     * 9.2.3
    */

    public function loginByPhone($phoneAuthenticationModel, $fields = "",
        $loginUrl = null, $smsTemplate = null)
    {
        $resourcePath = "/identity/v2/auth/login";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        if ($fields != '') {
            $queryParam['fields'] = $fields;
        }
        if ($loginUrl != '') {
            $queryParam['loginUrl'] = $loginUrl;
        }
        if ($smsTemplate != '') {
            $queryParam['smsTemplate'] = $smsTemplate;
        }
        return Functions::_apiClientHandler('POST', $resourcePath, $queryParam, $phoneAuthenticationModel);
    }
       


    /**
     * This API is used to send the OTP to reset the account password.
     * @param phone New Phone Number
     * @param smsTemplate SMS Template name
     * @return Response Containing Validation Data and SMS Data
     * 10.4
    */

    public function forgotPasswordByPhoneOTP($phone, $smsTemplate = null)
    {
        $resourcePath = "/identity/v2/auth/password/otp";
        $bodyParam = [];
        $bodyParam['phone'] = $phone;
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        if ($smsTemplate != '') {
            $queryParam['smsTemplate'] = $smsTemplate;
        }
        return Functions::_apiClientHandler('POST', $resourcePath, $queryParam, json_encode($bodyParam));
    }
       


    /**
     * This API is used to reset the password
     * @param resetPasswordByOTPModel Model Class containing Definition of payload for ResetPasswordByOTP API
     * @return Response containing Definition of Complete Validation data
     * 10.5
    */

    public function resetPasswordByPhoneOTP($resetPasswordByOTPModel)
    {
        $resourcePath = "/identity/v2/auth/password/otp";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        return Functions::_apiClientHandler('PUT', $resourcePath, $queryParam, $resetPasswordByOTPModel);
    }
       


    /**
     * This API is used to validate the verification code sent to verify a user's phone number
     * @param otp The Verification Code
     * @param phone New Phone Number
     * @param fields The fields parameter filters the API response so that the response only includes a specific set of fields
     * @param smsTemplate SMS Template name
     * @return Response containing User Profile Data and access token
     * 11.1.1
    */

    public function phoneVerificationByOTP($otp, $phone,
        $fields = "", $smsTemplate = null)
    {
        $resourcePath = "/identity/v2/auth/phone/otp";
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
     * This API is used to consume the verification code sent to verify a user's phone number. Use this call for front-end purposes in cases where the user is already logged in by passing the user's access token.
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @param otp The Verification Code
     * @param smsTemplate SMS Template name
     * @return Response containing Definition of Complete Validation data
     * 11.1.2
    */

    public function phoneVerificationOTPByAccessToken($accessToken, $otp,
        $smsTemplate = null)
    {
        $resourcePath = "/identity/v2/auth/phone/otp";
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        $queryParam['apiKey'] = Functions::getApiKey();
        if ($otp === '' || ctype_space($otp)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('otp'));
        }
        if ($smsTemplate != '') {
            $queryParam['smsTemplate'] = $smsTemplate;
        }
        $queryParam['access_token'] = $accessToken;
        $queryParam['otp'] = $otp;
        return Functions::_apiClientHandler('PUT', $resourcePath, $queryParam);
    }
       


    /**
     * This API is used to resend a verification OTP to verify a user's Phone Number. The user will receive a verification code that they will need to input
     * @param phone New Phone Number
     * @param smsTemplate SMS Template name
     * @return Response Containing Validation Data and SMS Data
     * 11.2.1
    */

    public function phoneResendVerificationOTP($phone, $smsTemplate = null)
    {
        $resourcePath = "/identity/v2/auth/phone/otp";
        $bodyParam = [];
        $bodyParam['phone'] = $phone;
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        if ($smsTemplate != '') {
            $queryParam['smsTemplate'] = $smsTemplate;
        }
        return Functions::_apiClientHandler('POST', $resourcePath, $queryParam, json_encode($bodyParam));
    }
       


    /**
     * This API is used to resend a verification OTP to verify a user's Phone Number in cases in which an active token already exists
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @param phone New Phone Number
     * @param smsTemplate SMS Template name
     * @return Response Containing Validation Data and SMS Data
     * 11.2.2
    */

    public function phoneResendVerificationOTPByToken($accessToken, $phone,
        $smsTemplate = null)
    {
        $resourcePath = "/identity/v2/auth/phone/otp";
        $bodyParam = [];
        $bodyParam['phone'] = $phone;
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        $queryParam['apiKey'] = Functions::getApiKey();
        if ($smsTemplate != '') {
            $queryParam['smsTemplate'] = $smsTemplate;
        }
        $queryParam['access_token'] = $accessToken;
        return Functions::_apiClientHandler('POST', $resourcePath, $queryParam, json_encode($bodyParam));
    }
       


    /**
     * This API is used to update the login Phone Number of users
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @param phone New Phone Number
     * @param smsTemplate SMS Template name
     * @return Response Containing Validation Data and SMS Data
     * 11.5
    */

    public function updatePhoneNumber($accessToken, $phone,
        $smsTemplate = null)
    {
        $resourcePath = "/identity/v2/auth/phone";
        $bodyParam = [];
        $bodyParam['phone'] = $phone;
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        $queryParam['apiKey'] = Functions::getApiKey();
        if ($smsTemplate != '') {
            $queryParam['smsTemplate'] = $smsTemplate;
        }
        $queryParam['access_token'] = $accessToken;
        return Functions::_apiClientHandler('PUT', $resourcePath, $queryParam, json_encode($bodyParam));
    }
       


    /**
     * This API is used to check the Phone Number exists or not on your site.
     * @param phone The Registered Phone Number
     * @return Response containing Definition Complete ExistResponse data
     * 11.6
    */

    public function checkPhoneNumberAvailability($phone)
    {
        $resourcePath = "/identity/v2/auth/phone";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        if ($phone === '' || ctype_space($phone)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('phone'));
        }
        $queryParam['phone'] = $phone;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * This API is used to delete the Phone ID on a user's account via the access_token
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @return Response containing Definition of Delete Request
     * 11.7
    */

    public function removePhoneIDByAccessToken($accessToken)
    {
        $resourcePath = "/identity/v2/auth/phone";
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['access_token'] = $accessToken;
        return Functions::_apiClientHandler('DELETE', $resourcePath, $queryParam);
    }
       


    /**
     * This API registers the new users into your Cloud Storage and triggers the phone verification process.
     * @param authUserRegistrationModel Model Class containing Definition of payload for Auth User Registration API
     * @param sott LoginRadius Secured One Time Token
     * @param fields The fields parameter filters the API response so that the response only includes a specific set of fields
     * @param options PreventVerificationEmail (Specifying this value prevents the verification email from being sent. Only applicable if you have the optional email verification flow)
     * @param smsTemplate SMS Template name
     * @param verificationUrl Email verification url
     * @param welcomeEmailTemplate Name of the welcome email template
     * @return Response containing Definition of Complete Validation, UserProfile data and Access Token
     * 17.1.2
    */

    public function userRegistrationByPhone($authUserRegistrationModel, $sott,
        $fields = "", $options = "", $smsTemplate = null,
        $verificationUrl = null, $welcomeEmailTemplate = null)
    {
        $resourcePath = "/identity/v2/auth/register";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        if ($sott === '' || ctype_space($sott)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('sott'));
        }
        if ($fields != '') {
            $queryParam['fields'] = $fields;
        }
        if ($options != '') {
            $queryParam['options'] = $options;
        }
        if ($smsTemplate != '') {
            $queryParam['smsTemplate'] = $smsTemplate;
        }
        if ($verificationUrl != '') {
            $queryParam['verificationUrl'] = $verificationUrl;
        }
        if ($welcomeEmailTemplate != '') {
            $queryParam['welcomeEmailTemplate'] = $welcomeEmailTemplate;
        }
        $queryParam['sott'] = $sott;
        return Functions::_apiClientHandler('POST', $resourcePath, $queryParam, $authUserRegistrationModel);
    }

}