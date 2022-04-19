<?php
 /**
 * @category            : CustomerRegistration
 * @link                : http://www.loginradius.com
 * @package             : SottAPI
 * @author              : LoginRadius Team
 * @license             : https://opensource.org/licenses/MIT
 */

namespace LoginRadiusSDK\CustomerRegistration\Account;

use LoginRadiusSDK\Utility\Functions;
use LoginRadiusSDK\LoginRadiusException;

class SottAPI extends Functions
{

    public function __construct($options = [])
    {
        parent::__construct($options);
    }
       


    /**
     * This API allows you to generate SOTT with a given expiration time.
     * @param timeDifference The time difference you would like to pass, If you not pass difference then the default value is 10 minutes
     * @return Sott data For Registration
     * 18.28
    */

    public function generateSott($timeDifference = null)
    {
        $resourcePath = "/identity/v2/manage/account/sott";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['apiSecret'] = Functions::getApiSecret();
        if ($timeDifference != '') {
            $queryParam['timeDifference'] = $timeDifference;
        }
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }

}