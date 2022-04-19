<?php
 /**
 * @category            : CustomerRegistration
 * @link                : http://www.loginradius.com
 * @package             : SmartLoginAPI
 * @author              : LoginRadius Team
 * @license             : https://opensource.org/licenses/MIT
 */

namespace LoginRadiusSDK\CustomerRegistration\Authentication;

use LoginRadiusSDK\Utility\Functions;
use LoginRadiusSDK\LoginRadiusException;

class SmartLoginAPI extends Functions
{

    public function __construct($options = [])
    {
        parent::__construct($options);
    }
       


    /**
     * This API verifies the provided token for Smart Login
     * @param verificationToken Verification token received in the email
     * @param welcomeEmailTemplate Name of the welcome email template
     * @return Complete verified response data
     * 8.4.1
    */

    public function smartLoginTokenVerification($verificationToken, $welcomeEmailTemplate = null)
    {
        $resourcePath = "/identity/v2/auth/email/smartlogin";
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
     * This API sends a Smart Login link to the user's Email Id.
     * @param clientGuid Unique string used in the Smart Login request
     * @param email Email of the user
     * @param redirectUrl Url where the user will redirect after success authentication
     * @param smartLoginEmailTemplate Email template for Smart Login link
     * @param welcomeEmailTemplate Name of the welcome email template
     * @return Response containing Definition of Complete Validation data
     * 9.17.1
    */

    public function smartLoginByEmail($clientGuid, $email,
        $redirectUrl = null, $smartLoginEmailTemplate = null, $welcomeEmailTemplate = null)
    {
        $resourcePath = "/identity/v2/auth/login/smartlogin";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        if ($clientGuid === '' || ctype_space($clientGuid)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('clientGuid'));
        }
        if ($email === '' || ctype_space($email)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('email'));
        }
        if ($redirectUrl != '') {
            $queryParam['redirectUrl'] = $redirectUrl;
        }
        if ($smartLoginEmailTemplate != '') {
            $queryParam['smartLoginEmailTemplate'] = $smartLoginEmailTemplate;
        }
        if ($welcomeEmailTemplate != '') {
            $queryParam['welcomeEmailTemplate'] = $welcomeEmailTemplate;
        }
        $queryParam['clientGuid'] = $clientGuid;
        $queryParam['email'] = $email;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * This API sends a Smart Login link to the user's Email Id.
     * @param clientGuid Unique string used in the Smart Login request
     * @param username UserName of the user
     * @param redirectUrl Url where the user will redirect after success authentication
     * @param smartLoginEmailTemplate Email template for Smart Login link
     * @param welcomeEmailTemplate Name of the welcome email template
     * @return Response containing Definition of Complete Validation data
     * 9.17.2
    */

    public function smartLoginByUserName($clientGuid, $username,
        $redirectUrl = null, $smartLoginEmailTemplate = null, $welcomeEmailTemplate = null)
    {
        $resourcePath = "/identity/v2/auth/login/smartlogin";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        if ($clientGuid === '' || ctype_space($clientGuid)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('clientGuid'));
        }
        if ($username === '' || ctype_space($username)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('username'));
        }
        if ($redirectUrl != '') {
            $queryParam['redirectUrl'] = $redirectUrl;
        }
        if ($smartLoginEmailTemplate != '') {
            $queryParam['smartLoginEmailTemplate'] = $smartLoginEmailTemplate;
        }
        if ($welcomeEmailTemplate != '') {
            $queryParam['welcomeEmailTemplate'] = $welcomeEmailTemplate;
        }
        $queryParam['clientGuid'] = $clientGuid;
        $queryParam['username'] = $username;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * This API is used to check if the Smart Login link has been clicked or not
     * @param clientGuid Unique string used in the Smart Login request
     * @param fields The fields parameter filters the API response so that the response only includes a specific set of fields
     * @return Response containing User Profile Data and access token
     * 9.21.1
    */

    public function smartLoginPing($clientGuid, $fields = "")
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