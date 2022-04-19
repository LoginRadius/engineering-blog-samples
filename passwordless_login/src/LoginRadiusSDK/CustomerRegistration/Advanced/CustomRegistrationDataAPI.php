<?php
 /**
 * @category            : CustomerRegistration
 * @link                : http://www.loginradius.com
 * @package             : CustomRegistrationDataAPI
 * @author              : LoginRadius Team
 * @license             : https://opensource.org/licenses/MIT
 */

namespace LoginRadiusSDK\CustomerRegistration\Advanced;

use LoginRadiusSDK\Utility\Functions;
use LoginRadiusSDK\LoginRadiusException;

class CustomRegistrationDataAPI extends Functions
{

    public function __construct($options = [])
    {
        parent::__construct($options);
    }
       


    /**
     * This API is used to retrieve dropdown data.
     * @param type Type of the Datasource
     * @param limit Retrieve number of records at a time(max limit is 50)
     * @param parentId Id of parent dropdown member(if any).
     * @param skip Skip number of records from start
     * @return Complete user Registration data
     * 7.1
    */

    public function authGetRegistrationData($type, $limit = null,
        $parentId = null, $skip = null)
    {
        $resourcePath = "/identity/v2/auth/registrationdata/$type";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        if ($limit != '') {
            $queryParam['limit'] = $limit;
        }
        if ($parentId != '') {
            $queryParam['parentId'] = $parentId;
        }
        if ($skip != '') {
            $queryParam['skip'] = $skip;
        }
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * This API allows you to validate code for a particular dropdown member.
     * @param code Secret Code
     * @param recordId Selected dropdown item’s record id
     * @return Response containing Definition of Complete Validation data
     * 7.2
    */

    public function validateRegistrationDataCode($code, $recordId)
    {
        $resourcePath = "/identity/v2/auth/registrationdata/validatecode";
        $bodyParam = [];
        $bodyParam['code'] = $code;
        $bodyParam['recordId'] = $recordId;
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        return Functions::_apiClientHandler('POST', $resourcePath, $queryParam, json_encode($bodyParam));
    }
       


    /**
     * This API is used to retrieve dropdown data.
     * @param type Type of the Datasource
     * @param limit Retrive number of records at a time(max limit is 50
     * @param parentId Id of parent dropdown member(if any).
     * @param skip Skip number of records from start
     * @return Complete user Registration data Fields
     * 16.1
    */

    public function getRegistrationData($type, $limit = null,
        $parentId = null, $skip = null)
    {
        $resourcePath = "/identity/v2/manage/registrationdata/$type";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['apiSecret'] = Functions::getApiSecret();
        if ($limit != '') {
            $queryParam['limit'] = $limit;
        }
        if ($parentId != '') {
            $queryParam['parentId'] = $parentId;
        }
        if ($skip != '') {
            $queryParam['skip'] = $skip;
        }
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * This API allows you to fill data into a dropdown list which you have created for user Registeration. For more details on how to use this API please see our Custom Registration Data Overview
     * @param registrationDataCreateModelList Model Class containing Definition of List of Registration Data
     * @return Response containing Definition of Complete Validation data
     * 16.2
    */

    public function addRegistrationData($registrationDataCreateModelList)
    {
        $resourcePath = "/identity/v2/manage/registrationdata";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['apiSecret'] = Functions::getApiSecret();
        return Functions::_apiClientHandler('POST', $resourcePath, $queryParam, $registrationDataCreateModelList);
    }
       


    /**
     * This API allows you to update a dropdown item
     * @param registrationDataUpdateModel Model Class containing Definition of payload for Registration Data update API
     * @param recordId Registration data RecordId
     * @return Complete user Registration data Field
     * 16.3
    */

    public function updateRegistrationData($registrationDataUpdateModel, $recordId)
    {
        $resourcePath = "/identity/v2/manage/registrationdata/$recordId";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['apiSecret'] = Functions::getApiSecret();
        return Functions::_apiClientHandler('PUT', $resourcePath, $queryParam, $registrationDataUpdateModel);
    }
       


    /**
     * This API allows you to delete an item from a dropdown list.
     * @param recordId Registration data RecordId
     * @return Response containing Definition of Delete Request
     * 16.4
    */

    public function deleteRegistrationData($recordId)
    {
        $resourcePath = "/identity/v2/manage/registrationdata/$recordId";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['apiSecret'] = Functions::getApiSecret();
        return Functions::_apiClientHandler('DELETE', $resourcePath, $queryParam);
    }
       


    /**
     * This API allows you to delete all records contained in a datasource.
     * @param type Type of the Datasource
     * @return Response containing Definition of Delete Request
     * 16.5
    */

    public function deleteAllRecordsByDataSource($type)
    {
        $resourcePath = "/identity/v2/manage/registrationdata/type/$type";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['apiSecret'] = Functions::getApiSecret();
        return Functions::_apiClientHandler('DELETE', $resourcePath, $queryParam);
    }

}