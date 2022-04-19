<?php
 /**
 * @category            : CustomerRegistration
 * @link                : http://www.loginradius.com
 * @package             : RiskBasedAuthenticationAPI
 * @author              : LoginRadius Team
 * @license             : https://opensource.org/licenses/MIT
 */

namespace LoginRadiusSDK\CustomerRegistration\Authentication;

use LoginRadiusSDK\Utility\Functions;
use LoginRadiusSDK\LoginRadiusException;

class RiskBasedAuthenticationAPI extends Functions
{

    public function __construct($options = [])
    {
        parent::__construct($options);
    }
       


    /**
     * This API retrieves a copy of the user data based on the Email
     * @param emailAuthenticationModel Model Class containing Definition of payload for Email Authentication API
     * @param emailTemplate Email template name
     * @param fields The fields parameter filters the API response so that the response only includes a specific set of fields
     * @param loginUrl Url where the user is logging from
     * @param passwordDelegation Password Delegation Allows you to use a third-party service to store your passwords rather than LoginRadius Cloud storage.
     * @param passwordDelegationApp RiskBased Authentication Password Delegation App
     * @param rbaBrowserEmailTemplate Risk Based Authentication Browser EmailTemplate
     * @param rbaBrowserSmsTemplate Risk Based Authentication Browser Sms Template
     * @param rbaCityEmailTemplate Risk Based Authentication City Email Template
     * @param rbaCitySmsTemplate Risk Based Authentication City SmsTemplate
     * @param rbaCountryEmailTemplate Risk Based Authentication Country EmailTemplate
     * @param rbaCountrySmsTemplate Risk Based Authentication Country SmsTemplate
     * @param rbaIpEmailTemplate Risk Based Authentication Ip EmailTemplate
     * @param rbaIpSmsTemplate Risk Based Authentication Ip SmsTemplate
     * @param rbaOneclickEmailTemplate Risk Based Authentication Oneclick EmailTemplate
     * @param rbaOTPSmsTemplate Risk Based Authentication Oneclick EmailTemplate
     * @param smsTemplate SMS Template name
     * @param verificationUrl Email verification url
     * @return Response containing User Profile Data and access token
     * 9.2.4
    */

    public function rbaLoginByEmail($emailAuthenticationModel, $emailTemplate = null,
        $fields = "", $loginUrl = null, $passwordDelegation = false,
        $passwordDelegationApp = null, $rbaBrowserEmailTemplate = null, $rbaBrowserSmsTemplate = null,
        $rbaCityEmailTemplate = null, $rbaCitySmsTemplate = null, $rbaCountryEmailTemplate = null,
        $rbaCountrySmsTemplate = null, $rbaIpEmailTemplate = null, $rbaIpSmsTemplate = null,
        $rbaOneclickEmailTemplate = null, $rbaOTPSmsTemplate = null, $smsTemplate = null,
        $verificationUrl = null)
    {
        $resourcePath = "/identity/v2/auth/login";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        if ($emailTemplate != '') {
            $queryParam['emailTemplate'] = $emailTemplate;
        }
        if ($fields != '') {
            $queryParam['fields'] = $fields;
        }
        if ($loginUrl != '') {
            $queryParam['loginUrl'] = $loginUrl;
        }
        if ($passwordDelegation != '') {
            $queryParam['passwordDelegation'] = $passwordDelegation;
        }
        if ($passwordDelegationApp != '') {
            $queryParam['passwordDelegationApp'] = $passwordDelegationApp;
        }
        if ($rbaBrowserEmailTemplate != '') {
            $queryParam['rbaBrowserEmailTemplate'] = $rbaBrowserEmailTemplate;
        }
        if ($rbaBrowserSmsTemplate != '') {
            $queryParam['rbaBrowserSmsTemplate'] = $rbaBrowserSmsTemplate;
        }
        if ($rbaCityEmailTemplate != '') {
            $queryParam['rbaCityEmailTemplate'] = $rbaCityEmailTemplate;
        }
        if ($rbaCitySmsTemplate != '') {
            $queryParam['rbaCitySmsTemplate'] = $rbaCitySmsTemplate;
        }
        if ($rbaCountryEmailTemplate != '') {
            $queryParam['rbaCountryEmailTemplate'] = $rbaCountryEmailTemplate;
        }
        if ($rbaCountrySmsTemplate != '') {
            $queryParam['rbaCountrySmsTemplate'] = $rbaCountrySmsTemplate;
        }
        if ($rbaIpEmailTemplate != '') {
            $queryParam['rbaIpEmailTemplate'] = $rbaIpEmailTemplate;
        }
        if ($rbaIpSmsTemplate != '') {
            $queryParam['rbaIpSmsTemplate'] = $rbaIpSmsTemplate;
        }
        if ($rbaOneclickEmailTemplate != '') {
            $queryParam['rbaOneclickEmailTemplate'] = $rbaOneclickEmailTemplate;
        }
        if ($rbaOTPSmsTemplate != '') {
            $queryParam['rbaOTPSmsTemplate'] = $rbaOTPSmsTemplate;
        }
        if ($smsTemplate != '') {
            $queryParam['smsTemplate'] = $smsTemplate;
        }
        if ($verificationUrl != '') {
            $queryParam['verificationUrl'] = $verificationUrl;
        }
        return Functions::_apiClientHandler('POST', $resourcePath, $queryParam, $emailAuthenticationModel);
    }
       


    /**
     * This API retrieves a copy of the user data based on the Username
     * @param userNameAuthenticationModel Model Class containing Definition of payload for Username Authentication API
     * @param emailTemplate Email template name
     * @param fields The fields parameter filters the API response so that the response only includes a specific set of fields
     * @param loginUrl Url where the user is logging from
     * @param passwordDelegation Password Delegation Allows you to use a third-party service to store your passwords rather than LoginRadius Cloud storage.
     * @param passwordDelegationApp RiskBased Authentication Password Delegation App
     * @param rbaBrowserEmailTemplate Risk Based Authentication Browser EmailTemplate
     * @param rbaBrowserSmsTemplate Risk Based Authentication Browser Sms Template
     * @param rbaCityEmailTemplate Risk Based Authentication City Email Template
     * @param rbaCitySmsTemplate Risk Based Authentication City SmsTemplate
     * @param rbaCountryEmailTemplate Risk Based Authentication Country EmailTemplate
     * @param rbaCountrySmsTemplate Risk Based Authentication Country SmsTemplate
     * @param rbaIpEmailTemplate Risk Based Authentication Ip EmailTemplate
     * @param rbaIpSmsTemplate Risk Based Authentication Ip SmsTemplate
     * @param rbaOneclickEmailTemplate Risk Based Authentication Oneclick EmailTemplate
     * @param rbaOTPSmsTemplate Risk Based Authentication OTPSmsTemplate
     * @param smsTemplate SMS Template name
     * @param verificationUrl Email verification url
     * @return Response containing User Profile Data and access token
     * 9.2.5
    */

    public function rbaLoginByUserName($userNameAuthenticationModel, $emailTemplate = null,
        $fields = "", $loginUrl = null, $passwordDelegation = false,
        $passwordDelegationApp = null, $rbaBrowserEmailTemplate = null, $rbaBrowserSmsTemplate = null,
        $rbaCityEmailTemplate = null, $rbaCitySmsTemplate = null, $rbaCountryEmailTemplate = null,
        $rbaCountrySmsTemplate = null, $rbaIpEmailTemplate = null, $rbaIpSmsTemplate = null,
        $rbaOneclickEmailTemplate = null, $rbaOTPSmsTemplate = null, $smsTemplate = null,
        $verificationUrl = null)
    {
        $resourcePath = "/identity/v2/auth/login";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        if ($emailTemplate != '') {
            $queryParam['emailTemplate'] = $emailTemplate;
        }
        if ($fields != '') {
            $queryParam['fields'] = $fields;
        }
        if ($loginUrl != '') {
            $queryParam['loginUrl'] = $loginUrl;
        }
        if ($passwordDelegation != '') {
            $queryParam['passwordDelegation'] = $passwordDelegation;
        }
        if ($passwordDelegationApp != '') {
            $queryParam['passwordDelegationApp'] = $passwordDelegationApp;
        }
        if ($rbaBrowserEmailTemplate != '') {
            $queryParam['rbaBrowserEmailTemplate'] = $rbaBrowserEmailTemplate;
        }
        if ($rbaBrowserSmsTemplate != '') {
            $queryParam['rbaBrowserSmsTemplate'] = $rbaBrowserSmsTemplate;
        }
        if ($rbaCityEmailTemplate != '') {
            $queryParam['rbaCityEmailTemplate'] = $rbaCityEmailTemplate;
        }
        if ($rbaCitySmsTemplate != '') {
            $queryParam['rbaCitySmsTemplate'] = $rbaCitySmsTemplate;
        }
        if ($rbaCountryEmailTemplate != '') {
            $queryParam['rbaCountryEmailTemplate'] = $rbaCountryEmailTemplate;
        }
        if ($rbaCountrySmsTemplate != '') {
            $queryParam['rbaCountrySmsTemplate'] = $rbaCountrySmsTemplate;
        }
        if ($rbaIpEmailTemplate != '') {
            $queryParam['rbaIpEmailTemplate'] = $rbaIpEmailTemplate;
        }
        if ($rbaIpSmsTemplate != '') {
            $queryParam['rbaIpSmsTemplate'] = $rbaIpSmsTemplate;
        }
        if ($rbaOneclickEmailTemplate != '') {
            $queryParam['rbaOneclickEmailTemplate'] = $rbaOneclickEmailTemplate;
        }
        if ($rbaOTPSmsTemplate != '') {
            $queryParam['rbaOTPSmsTemplate'] = $rbaOTPSmsTemplate;
        }
        if ($smsTemplate != '') {
            $queryParam['smsTemplate'] = $smsTemplate;
        }
        if ($verificationUrl != '') {
            $queryParam['verificationUrl'] = $verificationUrl;
        }
        return Functions::_apiClientHandler('POST', $resourcePath, $queryParam, $userNameAuthenticationModel);
    }
       


    /**
     * This API retrieves a copy of the user data based on the Phone
     * @param phoneAuthenticationModel Model Class containing Definition of payload for PhoneAuthenticationModel API
     * @param emailTemplate Email template name
     * @param fields The fields parameter filters the API response so that the response only includes a specific set of fields
     * @param loginUrl Url where the user is logging from
     * @param passwordDelegation Password Delegation Allows you to use a third-party service to store your passwords rather than LoginRadius Cloud storage.
     * @param passwordDelegationApp RiskBased Authentication Password Delegation App
     * @param rbaBrowserEmailTemplate Risk Based Authentication Browser EmailTemplate
     * @param rbaBrowserSmsTemplate Risk Based Authentication Browser Sms Template
     * @param rbaCityEmailTemplate Risk Based Authentication City Email Template
     * @param rbaCitySmsTemplate Risk Based Authentication City SmsTemplate
     * @param rbaCountryEmailTemplate Risk Based Authentication Country EmailTemplate
     * @param rbaCountrySmsTemplate Risk Based Authentication Country SmsTemplate
     * @param rbaIpEmailTemplate Risk Based Authentication Ip EmailTemplate
     * @param rbaIpSmsTemplate Risk Based Authentication Ip SmsTemplate
     * @param rbaOneclickEmailTemplate Risk Based Authentication Oneclick EmailTemplate
     * @param rbaOTPSmsTemplate Risk Based Authentication OTPSmsTemplate
     * @param smsTemplate SMS Template name
     * @param verificationUrl Email verification url
     * @return Response containing User Profile Data and access token
     * 9.2.6
    */

    public function rbaLoginByPhone($phoneAuthenticationModel, $emailTemplate = null,
        $fields = "", $loginUrl = null, $passwordDelegation = false,
        $passwordDelegationApp = null, $rbaBrowserEmailTemplate = null, $rbaBrowserSmsTemplate = null,
        $rbaCityEmailTemplate = null, $rbaCitySmsTemplate = null, $rbaCountryEmailTemplate = null,
        $rbaCountrySmsTemplate = null, $rbaIpEmailTemplate = null, $rbaIpSmsTemplate = null,
        $rbaOneclickEmailTemplate = null, $rbaOTPSmsTemplate = null, $smsTemplate = null,
        $verificationUrl = null)
    {
        $resourcePath = "/identity/v2/auth/login";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        if ($emailTemplate != '') {
            $queryParam['emailTemplate'] = $emailTemplate;
        }
        if ($fields != '') {
            $queryParam['fields'] = $fields;
        }
        if ($loginUrl != '') {
            $queryParam['loginUrl'] = $loginUrl;
        }
        if ($passwordDelegation != '') {
            $queryParam['passwordDelegation'] = $passwordDelegation;
        }
        if ($passwordDelegationApp != '') {
            $queryParam['passwordDelegationApp'] = $passwordDelegationApp;
        }
        if ($rbaBrowserEmailTemplate != '') {
            $queryParam['rbaBrowserEmailTemplate'] = $rbaBrowserEmailTemplate;
        }
        if ($rbaBrowserSmsTemplate != '') {
            $queryParam['rbaBrowserSmsTemplate'] = $rbaBrowserSmsTemplate;
        }
        if ($rbaCityEmailTemplate != '') {
            $queryParam['rbaCityEmailTemplate'] = $rbaCityEmailTemplate;
        }
        if ($rbaCitySmsTemplate != '') {
            $queryParam['rbaCitySmsTemplate'] = $rbaCitySmsTemplate;
        }
        if ($rbaCountryEmailTemplate != '') {
            $queryParam['rbaCountryEmailTemplate'] = $rbaCountryEmailTemplate;
        }
        if ($rbaCountrySmsTemplate != '') {
            $queryParam['rbaCountrySmsTemplate'] = $rbaCountrySmsTemplate;
        }
        if ($rbaIpEmailTemplate != '') {
            $queryParam['rbaIpEmailTemplate'] = $rbaIpEmailTemplate;
        }
        if ($rbaIpSmsTemplate != '') {
            $queryParam['rbaIpSmsTemplate'] = $rbaIpSmsTemplate;
        }
        if ($rbaOneclickEmailTemplate != '') {
            $queryParam['rbaOneclickEmailTemplate'] = $rbaOneclickEmailTemplate;
        }
        if ($rbaOTPSmsTemplate != '') {
            $queryParam['rbaOTPSmsTemplate'] = $rbaOTPSmsTemplate;
        }
        if ($smsTemplate != '') {
            $queryParam['smsTemplate'] = $smsTemplate;
        }
        if ($verificationUrl != '') {
            $queryParam['verificationUrl'] = $verificationUrl;
        }
        return Functions::_apiClientHandler('POST', $resourcePath, $queryParam, $phoneAuthenticationModel);
    }

}