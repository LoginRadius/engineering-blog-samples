<?php
 /**
 * @category            : CustomerRegistration
 * @link                : http://www.loginradius.com
 * @package             : ConsentManagementAPI
 * @author              : LoginRadius Team
 * @license             : https://opensource.org/licenses/MIT
 */

namespace LoginRadiusSDK\CustomerRegistration\Advanced;

use LoginRadiusSDK\Utility\Functions;
use LoginRadiusSDK\LoginRadiusException;

class ConsentManagementAPI extends Functions
{

    public function __construct($options = [])
    {
        parent::__construct($options);
    }
       


    /**
     * This API is used to get the Consent logs of the user.
     * @param uid UID, the unified identifier for each user account
     * @return Response containing consent logs
     * 18.37
    */

    public function getConsentLogsByUid($uid)
    {
        $resourcePath = "/identity/v2/manage/account/$uid/consent/logs";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['apiSecret'] = Functions::getApiSecret();
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * This API is to submit consent form using consent token.
     * @param consentToken The consent token received after login error 1226 
     * @param consentSubmitModel Model class containing list of multiple consent
     * @return Response containing User Profile Data and access token
     * 43.1
    */

    public function submitConsentByConsentToken($consentToken, $consentSubmitModel)
    {
        $resourcePath = "/identity/v2/auth/consent";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        if ($consentToken === '' || ctype_space($consentToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('consentToken'));
        }
        $queryParam['consentToken'] = $consentToken;
        return Functions::_apiClientHandler('POST', $resourcePath, $queryParam, $consentSubmitModel);
    }
       


    /**
     * This API is used to fetch consent logs.
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @return Response containing consent logs
     * 43.2
    */

    public function getConsentLogs($accessToken)
    {
        $resourcePath = "/identity/v2/auth/consent/logs";
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['access_token'] = $accessToken;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * API to provide a way to end user to submit a consent form for particular event type.
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @param consentSubmitModel Model class containing list of multiple consent
     * @return Response containing Definition for Complete profile data
     * 43.3
    */

    public function submitConsentByAccessToken($accessToken, $consentSubmitModel)
    {
        $resourcePath = "/identity/v2/auth/consent/profile";
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['access_token'] = $accessToken;
        return Functions::_apiClientHandler('POST', $resourcePath, $queryParam, $consentSubmitModel);
    }
       


    /**
     * This API is used to check if consent is submitted for a particular event or not.
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @param event Allowed events: Login, Register, UpdateProfile, ResetPassword, ChangePassword, emailVerification, AddEmail, RemoveEmail, BlockAccount, DeleteAccount, SetUsername, AssignRoles, UnassignRoles, SetPassword, LinkAccount, UnlinkAccount, UpdatePhoneId, VerifyPhoneNumber, CreateCustomObject, UpdateCustomobject, DeleteCustomObject
     * @param isCustom true/false
     * @return Response containing consent profile
     * 43.4
    */

    public function verifyConsentByAccessToken($accessToken, $event,
        $isCustom)
    {
        $resourcePath = "/identity/v2/auth/consent/verify";
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        $queryParam['apiKey'] = Functions::getApiKey();
        if ($event === '' || ctype_space($event)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('event'));
        }
        if ($isCustom === '' || ctype_space($isCustom)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('isCustom'));
        }
        $queryParam['access_token'] = $accessToken;
        $queryParam['event'] = $event;
        $queryParam['isCustom'] = $isCustom;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * This API is to update consents using access token.
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @param consentUpdateModel Model class containg list of multiple consent
     * @return Response containing consent profile
     * 43.5
    */

    public function updateConsentProfileByAccessToken($accessToken, $consentUpdateModel)
    {
        $resourcePath = "/identity/v2/auth/consent";
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['access_token'] = $accessToken;
        return Functions::_apiClientHandler('PUT', $resourcePath, $queryParam, $consentUpdateModel);
    }

}