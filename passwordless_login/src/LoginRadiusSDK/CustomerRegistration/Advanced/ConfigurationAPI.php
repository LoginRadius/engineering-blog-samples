<?php
 /**
 * @category            : CustomerRegistration
 * @link                : http://www.loginradius.com
 * @package             : ConfigurationAPI
 * @author              : LoginRadius Team
 * @license             : https://opensource.org/licenses/MIT
 */

namespace LoginRadiusSDK\CustomerRegistration\Advanced;

use LoginRadiusSDK\Utility\Functions;
use LoginRadiusSDK\LoginRadiusException;

class ConfigurationAPI extends Functions
{

    public function __construct($options = [])
    {
        parent::__construct($options);
    }
    /**
    * This API is used to get the configurations which are set in the LoginRadius Dashboard for a particular LoginRadius site/environment
    * @param apiKey
    *100
    */
    public function getConfigurations()
    {
        $resourcePath = "/ciam/appinfo";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
        
       


    /**
     * This API allows you to query your LoginRadius account for basic server information and server time information which is useful when generating an SOTT token.
     * @param timeDifference The time difference you would like to pass, If you not pass difference then the default value is 10 minutes
     * @return Response containing Definition of Complete service info data
     * 3.1
    */

    public function getServerInfo($timeDifference = null)
    {
        $resourcePath = "/identity/v2/serverinfo";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        if ($timeDifference != '') {
            $queryParam['timeDifference'] = $timeDifference;
        }
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }

}