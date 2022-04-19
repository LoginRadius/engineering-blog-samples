<?php
 /**
 * @category            : CustomerRegistration
 * @link                : http://www.loginradius.com
 * @package             : PINAuthenticationAPI
 * @author              : LoginRadius Team
 * @license             : https://opensource.org/licenses/MIT
 */

namespace LoginRadiusSDK\CustomerRegistration\Authentication;

use LoginRadiusSDK\Utility\Functions;
use LoginRadiusSDK\LoginRadiusException;

class PINAuthenticationAPI extends Functions
{

    public function __construct($options = [])
    {
        parent::__construct($options);
    }
       


    /**
     * This API is used to login a user by pin and session_token.
     * @param loginByPINModel Model Class containing Definition of payload for LoginByPin API
     * @param sessionToken Session Token of user
     * @return Response containing User Profile Data and access token
     * 9.22
    */

    public function pinLogin($loginByPINModel, $sessionToken)
    {
        $resourcePath = "/identity/v2/auth/login/pin";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        if ($sessionToken === '' || ctype_space($sessionToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('sessionToken'));
        }
        $queryParam['session_token'] = $sessionToken;
        return Functions::_apiClientHandler('POST', $resourcePath, $queryParam, $loginByPINModel);
    }
       


    /**
     * This API sends the reset pin email to specified email address.
     * @param forgotPINLinkByEmailModel Model Class containing Definition for Forgot Pin Link By Email API
     * @param emailTemplate Email template name
     * @param resetPINUrl Reset PIN Url
     * @return Response containing Definition of Complete Validation data
     * 42.1
    */

    public function sendForgotPINEmailByEmail($forgotPINLinkByEmailModel, $emailTemplate = null,
        $resetPINUrl = null)
    {
        $resourcePath = "/identity/v2/auth/pin/forgot/email";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        if ($emailTemplate != '') {
            $queryParam['emailTemplate'] = $emailTemplate;
        }
        if ($resetPINUrl != '') {
            $queryParam['resetPINUrl'] = $resetPINUrl;
        }
        return Functions::_apiClientHandler('POST', $resourcePath, $queryParam, $forgotPINLinkByEmailModel);
    }
       


    /**
     * This API sends the reset pin email using username.
     * @param forgotPINLinkByUserNameModel Model Class containing Definition for Forgot Pin Link By UserName API
     * @param emailTemplate Email template name
     * @param resetPINUrl Reset PIN Url
     * @return Response containing Definition of Complete Validation data
     * 42.2
    */

    public function sendForgotPINEmailByUsername($forgotPINLinkByUserNameModel, $emailTemplate = null,
        $resetPINUrl = null)
    {
        $resourcePath = "/identity/v2/auth/pin/forgot/username";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        if ($emailTemplate != '') {
            $queryParam['emailTemplate'] = $emailTemplate;
        }
        if ($resetPINUrl != '') {
            $queryParam['resetPINUrl'] = $resetPINUrl;
        }
        return Functions::_apiClientHandler('POST', $resourcePath, $queryParam, $forgotPINLinkByUserNameModel);
    }
       


    /**
     * This API is used to reset pin using reset token.
     * @param resetPINByResetToken Model Class containing Definition of payload for Reset Pin By Reset Token API
     * @return Response containing Definition of Complete Validation data
     * 42.3
    */

    public function resetPINByResetToken($resetPINByResetToken)
    {
        $resourcePath = "/identity/v2/auth/pin/reset/token";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        return Functions::_apiClientHandler('PUT', $resourcePath, $queryParam, $resetPINByResetToken);
    }
       


    /**
     * This API is used to reset pin using security question answer and email.
     * @param resetPINBySecurityQuestionAnswerAndEmailModel Model Class containing Definition of payload for Reset Pin By Security Question and Email API
     * @return Response containing Definition of Complete Validation data
     * 42.4
    */

    public function resetPINByEmailAndSecurityAnswer($resetPINBySecurityQuestionAnswerAndEmailModel)
    {
        $resourcePath = "/identity/v2/auth/pin/reset/securityanswer/email";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        return Functions::_apiClientHandler('PUT', $resourcePath, $queryParam, $resetPINBySecurityQuestionAnswerAndEmailModel);
    }
       


    /**
     * This API is used to reset pin using security question answer and username.
     * @param resetPINBySecurityQuestionAnswerAndUsernameModel Model Class containing Definition of payload for Reset Pin By Security Question and UserName API
     * @return Response containing Definition of Complete Validation data
     * 42.5
    */

    public function resetPINByUsernameAndSecurityAnswer($resetPINBySecurityQuestionAnswerAndUsernameModel)
    {
        $resourcePath = "/identity/v2/auth/pin/reset/securityanswer/username";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        return Functions::_apiClientHandler('PUT', $resourcePath, $queryParam, $resetPINBySecurityQuestionAnswerAndUsernameModel);
    }
       


    /**
     * This API is used to reset pin using security question answer and phone.
     * @param resetPINBySecurityQuestionAnswerAndPhoneModel Model Class containing Definition of payload for Reset Pin By Security Question and Phone API
     * @return Response containing Definition of Complete Validation data
     * 42.6
    */

    public function resetPINByPhoneAndSecurityAnswer($resetPINBySecurityQuestionAnswerAndPhoneModel)
    {
        $resourcePath = "/identity/v2/auth/pin/reset/securityanswer/phone";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        return Functions::_apiClientHandler('PUT', $resourcePath, $queryParam, $resetPINBySecurityQuestionAnswerAndPhoneModel);
    }
       


    /**
     * This API sends the OTP to specified phone number
     * @param forgotPINOtpByPhoneModel Model Class containing Definition for Forgot Pin Otp By Phone API
     * @param smsTemplate 
     * @return Response Containing Validation Data and SMS Data
     * 42.7
    */

    public function sendForgotPINSMSByPhone($forgotPINOtpByPhoneModel, $smsTemplate = null)
    {
        $resourcePath = "/identity/v2/auth/pin/forgot/otp";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        if ($smsTemplate != '') {
            $queryParam['smsTemplate'] = $smsTemplate;
        }
        return Functions::_apiClientHandler('POST', $resourcePath, $queryParam, $forgotPINOtpByPhoneModel);
    }
       


    /**
     * This API is used to change a user's PIN using access token.
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @param changePINModel Model Class containing Definition for change PIN Property
     * @return Response containing Definition of Complete Validation data
     * 42.8
    */

    public function changePINByAccessToken($accessToken, $changePINModel)
    {
        $resourcePath = "/identity/v2/auth/pin/change";
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['access_token'] = $accessToken;
        return Functions::_apiClientHandler('PUT', $resourcePath, $queryParam, $changePINModel);
    }
       


    /**
     * This API is used to reset pin using phoneId and OTP.
     * @param resetPINByPhoneAndOTPModel Model Class containing Definition of payload for Reset Pin By Phone and Otp API
     * @return Response containing Definition of Complete Validation data
     * 42.9
    */

    public function resetPINByPhoneAndOtp($resetPINByPhoneAndOTPModel)
    {
        $resourcePath = "/identity/v2/auth/pin/reset/otp/phone";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        return Functions::_apiClientHandler('PUT', $resourcePath, $queryParam, $resetPINByPhoneAndOTPModel);
    }
       


    /**
     * This API is used to reset pin using email and OTP.
     * @param resetPINByEmailAndOtpModel Model Class containing Definition of payload for Reset Pin By Email and Otp API
     * @return Response containing Definition of Complete Validation data
     * 42.10
    */

    public function resetPINByEmailAndOtp($resetPINByEmailAndOtpModel)
    {
        $resourcePath = "/identity/v2/auth/pin/reset/otp/email";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        return Functions::_apiClientHandler('PUT', $resourcePath, $queryParam, $resetPINByEmailAndOtpModel);
    }
       


    /**
     * This API is used to reset pin using username and OTP.
     * @param resetPINByUsernameAndOtpModel Model Class containing Definition of payload for Reset Pin By Username and Otp API
     * @return Response containing Definition of Complete Validation data
     * 42.11
    */

    public function resetPINByUsernameAndOtp($resetPINByUsernameAndOtpModel)
    {
        $resourcePath = "/identity/v2/auth/pin/reset/otp/username";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        return Functions::_apiClientHandler('PUT', $resourcePath, $queryParam, $resetPINByUsernameAndOtpModel);
    }
       


    /**
     * This API is used to change a user's PIN using Pin Auth token.
     * @param pinRequiredModel Model Class containing Definition for PIN
     * @param pinAuthToken Pin Auth Token
     * @return Response containing User Profile Data and access token
     * 42.12
    */

    public function setPINByPinAuthToken($pinRequiredModel, $pinAuthToken)
    {
        $resourcePath = "/identity/v2/auth/pin/set/pinauthtoken";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        if ($pinAuthToken === '' || ctype_space($pinAuthToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('pinAuthToken'));
        }
        $queryParam['pinAuthToken'] = $pinAuthToken;
        return Functions::_apiClientHandler('POST', $resourcePath, $queryParam, $pinRequiredModel);
    }
       


    /**
     * This API is used to invalidate pin session token.
     * @param sessionToken Session Token of user
     * @return Response containing Definition of Complete Validation data
     * 44.1
    */

    public function inValidatePinSessionToken($sessionToken)
    {
        $resourcePath = "/identity/v2/auth/session_token/invalidate";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        if ($sessionToken === '' || ctype_space($sessionToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('sessionToken'));
        }
        $queryParam['session_token'] = $sessionToken;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }

}