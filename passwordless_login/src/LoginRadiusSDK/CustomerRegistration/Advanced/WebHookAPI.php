<?php
 /**
 * @category            : CustomerRegistration
 * @link                : http://www.loginradius.com
 * @package             : WebHookAPI
 * @author              : LoginRadius Team
 * @license             : https://opensource.org/licenses/MIT
 */

namespace LoginRadiusSDK\CustomerRegistration\Advanced;

use LoginRadiusSDK\Utility\Functions;
use LoginRadiusSDK\LoginRadiusException;

class WebHookAPI extends Functions
{

    public function __construct($options = [])
    {
        parent::__construct($options);
    }
       


    /**
     * This API is used to fatch all the subscribed URLs, for particular event
     * @param event Allowed events: Login, Register, UpdateProfile, ResetPassword, ChangePassword, emailVerification, AddEmail, RemoveEmail, BlockAccount, DeleteAccount, SetUsername, AssignRoles, UnassignRoles, SetPassword, LinkAccount, UnlinkAccount, UpdatePhoneId, VerifyPhoneNumber, CreateCustomObject, UpdateCustomobject, DeleteCustomObject
     * @return Response Containing List of Webhhook Data
     * 40.1
    */

    public function getWebHookSubscribedURLs($event)
    {
        $resourcePath = "/api/v2/webhook";
        $queryParam = [];
        $queryParam['apikey'] = Functions::getApiKey();
        $queryParam['apisecret'] = Functions::getApiSecret();
        if ($event === '' || ctype_space($event)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('event'));
        }
        $queryParam['event'] = $event;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * API can be used to configure a WebHook on your LoginRadius site. Webhooks also work on subscribe and notification model, subscribe your hook and get a notification. Equivalent to RESThook but these provide security on basis of signature and RESThook work on unique URL. Following are the events that are allowed by LoginRadius to trigger a WebHook service call.
     * @param webHookSubscribeModel Model Class containing Definition of payload for Webhook Subscribe API
     * @return Response containing Definition of Complete Validation data
     * 40.2
    */

    public function webHookSubscribe($webHookSubscribeModel)
    {
        $resourcePath = "/api/v2/webhook";
        $queryParam = [];
        $queryParam['apikey'] = Functions::getApiKey();
        $queryParam['apisecret'] = Functions::getApiSecret();
        return Functions::_apiClientHandler('POST', $resourcePath, $queryParam, $webHookSubscribeModel);
    }
       


    /**
     * API can be used to test a subscribed WebHook.
     * @return Response containing Definition of Complete Validation data
     * 40.3
    */

    public function webhookTest()
    {
        $resourcePath = "/api/v2/webhook/test";
        $queryParam = [];
        $queryParam['apikey'] = Functions::getApiKey();
        $queryParam['apisecret'] = Functions::getApiSecret();
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * API can be used to unsubscribe a WebHook configured on your LoginRadius site.
     * @param webHookSubscribeModel Model Class containing Definition of payload for Webhook Subscribe API
     * @return Response containing Definition of Delete Request
     * 40.4
    */

    public function webHookUnsubscribe($webHookSubscribeModel)
    {
        $resourcePath = "/api/v2/webhook";
        $queryParam = [];
        $queryParam['apikey'] = Functions::getApiKey();
        $queryParam['apisecret'] = Functions::getApiSecret();
        return Functions::_apiClientHandler('DELETE', $resourcePath, $queryParam, $webHookSubscribeModel);
    }

}