<?php
 /**
 * @category            : CustomerRegistration
 * @link                : http://www.loginradius.com
 * @package             : CustomObjectAPI
 * @author              : LoginRadius Team
 * @license             : https://opensource.org/licenses/MIT
 */

namespace LoginRadiusSDK\CustomerRegistration\Advanced;

use LoginRadiusSDK\Utility\Functions;
use LoginRadiusSDK\LoginRadiusException;

class CustomObjectAPI extends Functions
{

    public function __construct($options = [])
    {
        parent::__construct($options);
    }
       


    /**
     * This API is used to write information in JSON format to the custom object for the specified account.
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @param objectName LoginRadius Custom Object Name
     * @param payload LoginRadius Custom Object Name
     * @return Response containing Definition for Complete user custom object data
     * 6.1
    */

    public function createCustomObjectByToken($accessToken, $objectName,
        $payload)
    {
        $resourcePath = "/identity/v2/auth/customobject";
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        $queryParam['apiKey'] = Functions::getApiKey();
        if ($objectName === '' || ctype_space($objectName)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('objectName'));
        }
        $queryParam['access_token'] = $accessToken;
        $queryParam['objectName'] = $objectName;
        return Functions::_apiClientHandler('POST', $resourcePath, $queryParam, $payload);
    }
       


    /**
     * This API is used to update the specified custom object data of the specified account. If the value of updatetype is 'replace' then it will fully replace custom object with the new custom object and if the value of updatetype is 'partialreplace' then it will perform an upsert type operation
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @param objectName LoginRadius Custom Object Name
     * @param objectRecordId Unique identifier of the user's record in Custom Object
     * @param payload LoginRadius Custom Object Name
     * @param updateType Possible values: replace, partialreplace.
     * @return Response containing Definition for Complete user custom object data
     * 6.2
    */

    public function updateCustomObjectByToken($accessToken, $objectName,
        $objectRecordId, $payload, $updateType = "")
    {
        $resourcePath = "/identity/v2/auth/customobject/$objectRecordId";
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        $queryParam['apiKey'] = Functions::getApiKey();
        if ($objectName === '' || ctype_space($objectName)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('objectName'));
        }
        if ($updateType != '') {
            $queryParam['updateType'] = $updateType;
        }
        $queryParam['access_token'] = $accessToken;
        $queryParam['objectName'] = $objectName;
        return Functions::_apiClientHandler('PUT', $resourcePath, $queryParam, $payload);
    }
       


    /**
     * This API is used to retrieve the specified Custom Object data for the specified account.
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @param objectName LoginRadius Custom Object Name
     * @return Complete user CustomObject data
     * 6.3
    */

    public function getCustomObjectByToken($accessToken, $objectName)
    {
        $resourcePath = "/identity/v2/auth/customobject";
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        $queryParam['apiKey'] = Functions::getApiKey();
        if ($objectName === '' || ctype_space($objectName)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('objectName'));
        }
        $queryParam['access_token'] = $accessToken;
        $queryParam['objectName'] = $objectName;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * This API is used to retrieve the Custom Object data for the specified account.
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @param objectName LoginRadius Custom Object Name
     * @param objectRecordId Unique identifier of the user's record in Custom Object
     * @return Response containing Definition for Complete user custom object data
     * 6.4
    */

    public function getCustomObjectByRecordIDAndToken($accessToken, $objectName,
        $objectRecordId)
    {
        $resourcePath = "/identity/v2/auth/customobject/$objectRecordId";
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        $queryParam['apiKey'] = Functions::getApiKey();
        if ($objectName === '' || ctype_space($objectName)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('objectName'));
        }
        $queryParam['access_token'] = $accessToken;
        $queryParam['objectName'] = $objectName;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * This API is used to remove the specified Custom Object data using ObjectRecordId of a specified account.
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @param objectName LoginRadius Custom Object Name
     * @param objectRecordId Unique identifier of the user's record in Custom Object
     * @return Response containing Definition of Delete Request
     * 6.5
    */

    public function deleteCustomObjectByToken($accessToken, $objectName,
        $objectRecordId)
    {
        $resourcePath = "/identity/v2/auth/customobject/$objectRecordId";
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        $queryParam['apiKey'] = Functions::getApiKey();
        if ($objectName === '' || ctype_space($objectName)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('objectName'));
        }
        $queryParam['access_token'] = $accessToken;
        $queryParam['objectName'] = $objectName;
        return Functions::_apiClientHandler('DELETE', $resourcePath, $queryParam);
    }
       


    /**
     * This API is used to write information in JSON format to the custom object for the specified account.
     * @param objectName LoginRadius Custom Object Name
     * @param payload LoginRadius Custom Object Name
     * @param uid UID, the unified identifier for each user account
     * @return Response containing Definition for Complete user custom object data
     * 19.1
    */

    public function createCustomObjectByUid($objectName, $payload,
        $uid)
    {
        $resourcePath = "/identity/v2/manage/account/$uid/customobject";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['apiSecret'] = Functions::getApiSecret();
        if ($objectName === '' || ctype_space($objectName)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('objectName'));
        }
        $queryParam['objectName'] = $objectName;
        return Functions::_apiClientHandler('POST', $resourcePath, $queryParam, $payload);
    }
       


    /**
     * This API is used to update the specified custom object data of a specified account. If the value of updatetype is 'replace' then it will fully replace custom object with new custom object and if the value of updatetype is partialreplace then it will perform an upsert type operation.
     * @param objectName LoginRadius Custom Object Name
     * @param objectRecordId Unique identifier of the user's record in Custom Object
     * @param payload LoginRadius Custom Object Name
     * @param uid UID, the unified identifier for each user account
     * @param updateType Possible values: replace, partialreplace.
     * @return Response containing Definition for Complete user custom object data
     * 19.2
    */

    public function updateCustomObjectByUid($objectName, $objectRecordId,
        $payload, $uid, $updateType = "")
    {
        $resourcePath = "/identity/v2/manage/account/$uid/customobject/$objectRecordId";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['apiSecret'] = Functions::getApiSecret();
        if ($objectName === '' || ctype_space($objectName)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('objectName'));
        }
        if ($updateType != '') {
            $queryParam['updateType'] = $updateType;
        }
        $queryParam['objectName'] = $objectName;
        return Functions::_apiClientHandler('PUT', $resourcePath, $queryParam, $payload);
    }
       


    /**
     * This API is used to retrieve all the custom objects by UID from cloud storage.
     * @param objectName LoginRadius Custom Object Name
     * @param uid UID, the unified identifier for each user account
     * @return Complete user CustomObject data
     * 19.3
    */

    public function getCustomObjectByUid($objectName, $uid)
    {
        $resourcePath = "/identity/v2/manage/account/$uid/customobject";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['apiSecret'] = Functions::getApiSecret();
        if ($objectName === '' || ctype_space($objectName)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('objectName'));
        }
        $queryParam['objectName'] = $objectName;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * This API is used to retrieve the Custom Object data for the specified account.
     * @param objectName LoginRadius Custom Object Name
     * @param objectRecordId Unique identifier of the user's record in Custom Object
     * @param uid UID, the unified identifier for each user account
     * @return Response containing Definition for Complete user custom object data
     * 19.4
    */

    public function getCustomObjectByRecordID($objectName, $objectRecordId,
        $uid)
    {
        $resourcePath = "/identity/v2/manage/account/$uid/customobject/$objectRecordId";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['apiSecret'] = Functions::getApiSecret();
        if ($objectName === '' || ctype_space($objectName)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('objectName'));
        }
        $queryParam['objectName'] = $objectName;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * This API is used to remove the specified Custom Object data using ObjectRecordId of specified account.
     * @param objectName LoginRadius Custom Object Name
     * @param objectRecordId Unique identifier of the user's record in Custom Object
     * @param uid UID, the unified identifier for each user account
     * @return Response containing Definition of Delete Request
     * 19.5
    */

    public function deleteCustomObjectByRecordID($objectName, $objectRecordId,
        $uid)
    {
        $resourcePath = "/identity/v2/manage/account/$uid/customobject/$objectRecordId";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['apiSecret'] = Functions::getApiSecret();
        if ($objectName === '' || ctype_space($objectName)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('objectName'));
        }
        $queryParam['objectName'] = $objectName;
        return Functions::_apiClientHandler('DELETE', $resourcePath, $queryParam);
    }

}