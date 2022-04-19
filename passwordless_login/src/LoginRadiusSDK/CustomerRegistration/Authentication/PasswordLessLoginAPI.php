<?php
 /**
 * @category            : CustomerRegistration
 * @link                : http://www.loginradius.com
 * @package             : PasswordLessLoginAPI
 * @author              : LoginRadius Team
 * @license             : https://opensource.org/licenses/MIT
 */

namespace LoginRadiusSDK\CustomerRegistration\Authentication;

use LoginRadiusSDK\Utility\Functions;
use LoginRadiusSDK\LoginRadiusException;

class PasswordLessLoginAPI extends Functions
{

    public function __construct($options = [])
    {
        parent::__construct($options);
    }
       


    /**
     * This API verifies an account by OTP and allows the customer to login.
     * @param passwordLessLoginOtpModel Model Class containing Definition of payload for PasswordLessLoginOtpModel API
     * @param fields The fields parameter filters the API response so that the response only includes a specific set of fields
     * @param smsTemplate SMS Template name
     * @return Response containing User Profile Data and access token
     * 9.6
    */

    public function passwordlessLoginPhoneVerification($passwordLessLoginOtpModel, $fields = "",
        $smsTemplate = null)
    {
        $resourcePath = "/identity/v2/auth/login/passwordlesslogin/otp/verify";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        if ($fields != '') {
            $queryParam['fields'] = $fields;
        }
        if ($smsTemplate != '') {
            $queryParam['smsTemplate'] = $smsTemplate;
        }
        return Functions::_apiClientHandler('PUT', $resourcePath, $queryParam, $passwordLessLoginOtpModel);
    }
       


    /**
     * API can be used to send a One-time Passcode (OTP) provided that the account has a verified PhoneID
     * @param phone The Registered Phone Number
     * @param smsTemplate SMS Template name
     * @return Response Containing Definition of SMS Data
     * 9.15
    */

    public function passwordlessLoginByPhone($phone, $smsTemplate = null)
    {
        $resourcePath = "/identity/v2/auth/login/passwordlesslogin/otp";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        if ($phone === '' || ctype_space($phone)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('phone'));
        }
        if ($smsTemplate != '') {
            $queryParam['smsTemplate'] = $smsTemplate;
        }
        $queryParam['phone'] = $phone;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * This API is used to send a Passwordless Login verification link to the provided Email ID
     * @param email Email of the user
     * @param passwordLessLoginTemplate Passwordless Login Template Name
     * @param verificationUrl Email verification url
     * @return Response containing Definition of Complete Validation data
     * 9.18.1
    */

    public function passwordlessLoginByEmail($email, $passwordLessLoginTemplate = null,
        $verificationUrl = null)
    {
        $resourcePath = "/identity/v2/auth/login/passwordlesslogin/email";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        if ($email === '' || ctype_space($email)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('email'));
        }
        if ($passwordLessLoginTemplate != '') {
            $queryParam['passwordLessLoginTemplate'] = $passwordLessLoginTemplate;
        }
        if ($verificationUrl != '') {
            $queryParam['verificationUrl'] = $verificationUrl;
        }
        $queryParam['email'] = $email;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * This API is used to send a Passwordless Login Verification Link to a customer by providing their UserName
     * @param username UserName of the user
     * @param passwordLessLoginTemplate Passwordless Login Template Name
     * @param verificationUrl Email verification url
     * @return Response containing Definition of Complete Validation data
     * 9.18.2
    */

    public function passwordlessLoginByUserName($username, $passwordLessLoginTemplate = null,
        $verificationUrl = null)
    {
        $resourcePath = "/identity/v2/auth/login/passwordlesslogin/email";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        if ($username === '' || ctype_space($username)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('username'));
        }
        if ($passwordLessLoginTemplate != '') {
            $queryParam['passwordLessLoginTemplate'] = $passwordLessLoginTemplate;
        }
        if ($verificationUrl != '') {
            $queryParam['verificationUrl'] = $verificationUrl;
        }
        $queryParam['username'] = $username;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * This API is used to verify the Passwordless Login verification link. Note: If you are using Passwordless Login by Phone you will need to use the Passwordless Login Phone Verification API
     * @param verificationToken Verification token received in the email
     * @param fields The fields parameter filters the API response so that the response only includes a specific set of fields
     * @param welcomeEmailTemplate Name of the welcome email template
     * @return Response containing User Profile Data and access token
     * 9.19
    */

    public function passwordlessLoginVerification($verificationToken, $fields = "",
        $welcomeEmailTemplate = null)
    {
        $resourcePath = "/identity/v2/auth/login/passwordlesslogin/email/verify";
        $queryParam = [];
        $queryParam['apikey'] = Functions::getApiKey();
        if ($verificationToken === '' || ctype_space($verificationToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('verificationToken'));
        }
        if ($fields != '') {
            $queryParam['fields'] = $fields;
        }
        if ($welcomeEmailTemplate != '') {
            $queryParam['welcomeEmailTemplate'] = $welcomeEmailTemplate;
        }
        $queryParam['verificationToken'] = $verificationToken;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }

}