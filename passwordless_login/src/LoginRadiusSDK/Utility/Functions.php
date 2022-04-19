<?php

/**
 * @link : http://www.loginradius.com
 * @category : Utility
 * @package : Functions
 * @author : LoginRadius Team
 * @version : 10.0.0
 * @license : https://opensource.org/licenses/MIT
 */

namespace LoginRadiusSDK\Utility;

use LoginRadiusSDK\Clients\IHttpClientInterface;
use LoginRadiusSDK\Clients\DefaultHttpClient;
use LoginRadiusSDK\LoginRadiusException;

/**
 * Class For LoginRadius
 * This is the Loginradius class to handle response of LoginRadius APIs.
 *
 */
class Functions
{

    const VERSION = '10.0.0';

    private static $_apikey;
    private static $_apisecret;
    private static $_options = array();

    /**
     * Validate and set API credentials and set options.
     *
     * @param string $apikey
     * @param string $apisecret
     * @param array $customizeOptions
     */
    public function __construct($customizeOptions = array())
    {
            if (empty(self::$_apikey) || empty(self::$_apisecret)) {
              
                if (defined('LR_API_KEY') && defined('LR_API_SECRET') && null !== LR_API_KEY && null !== LR_API_SECRET) {
                    self::setDefaultApplication(LR_API_KEY, LR_API_SECRET);
                } else {
                    throw new LoginRadiusException('Required "LoginRadius" API Key and API Secret.');
                }
            }
            if (!defined('API_DOMAIN')) {
                define('API_DOMAIN', 'https://api.loginradius.com');
            }
            if (!defined('API_CONFIG_DOMAIN')) {
                define('API_CONFIG_DOMAIN', 'https://config.lrcontent.com');
            }
        self::$_options = array_merge(self::$_options, $customizeOptions);
    }

    /**
     * Set API key and API secret.
     *
     * @param type $apikey
     * @param type $apisecret
     */
    public static function setDefaultApplication($apikey, $apisecret)
    {
        self::_checkAPIValidation($apikey, $apisecret);
        self::$_apikey = $apikey;
        self::$_apisecret = $apisecret;       

    }

    /**
     * Check API Key and Secret in valid GUID format.
     *
     * @param type $apikey
     * @param type $apisecret
     * @throws LoginRadiusException
     */
    private static function _checkAPIValidation($apikey, $apisecret)
    {
        if (empty($apikey) || !self::isValidGuid($apikey)) {
            throw new LoginRadiusException('Required "LoginRadius" API key in valid guid format.');
        }
        if (empty($apisecret) || !self::isValidGuid($apisecret)) {
            throw new LoginRadiusException('Required "LoginRadius" API secret in valid guid format.');
        }
    }

    /**
     * Get API Key that you set.
     *
     * @return string
     */
    public static function getApiKey()
    {
        if (empty(self::$_apikey) && defined('LR_API_KEY')) {
            self::$_apikey = LR_API_KEY;
        }
        return self::$_apikey;
    }

    /**
     * Get options that you set.
     *
     * @return string
     */
    public static function getCustomizeOptions()
    {
        return self::$_options;
    }

    /**
     * Set options that you set.
     *
     * @return string
     */
    public static function setCustomizeOptions($options = array())
    {
        self::$_options = $options;
    }

    /**
     * Get API Secret that you set.
     *
     * @return string
     */
    public static function getApiSecret()
    {
        if (empty(self::$_apisecret) && defined('LR_API_SECRET')) {
            self::$_apisecret = LR_API_SECRET;
        }
        return self::$_apisecret;
    }

    /**
     *  Check valid Guid format.
     *
     * @param type $value
     * @return type
     */
    public static function isValidGuid($value)
    {
        return preg_match('/^\{?[A-Z0-9]{8}-[A-Z0-9]{4}-[A-Z0-9]{4}-[A-Z0-9]{4}-[A-Z0-9]{12}\}?$/i', $value);
    }

    /**
     * _apiClientHandler
     */
    public static function _apiClientHandler($type, $path, $queryParameters= array(), $payload = "")
    {
        $options = array('method' => $type, 'content_type' => 'json');
        if (!empty($payload)) {
            $options['post_data'] = $payload;
        }
        return self::apiClient($path, $queryParameters, $options);
    }

    /**
     * Access LoginRadius API server by External library
     *
     * @global type $apiClientClass
     * @param type $path
     * @param type $queryArray
     * @param type $options
     * @return type
     */
    public static function apiClient($path, $queryArray = array(), $options = array())
    {
        global $apiClientClass;  
        $mergeOptions = array_merge($options, self::$_options);
        if (isset($apiClientClass) && class_exists($apiClientClass)) {
            $client = new $apiClientClass();
        } else {
            $client = new DefaultHttpClient();
        }
        if (strpos($path, '/identity/v2/manage') !== false) {
            if (isset($queryArray['apiSecret']) && $queryArray['apiSecret'] != "") {
                unset($queryArray['apiSecret']);
                unset($queryArray['apiKey']);
            }
            $mergeOptions = array_merge(array('authentication' => 'secret'), $mergeOptions);
        } elseif ((strpos($path, '/identity/v2/auth/') !== false) && (isset($queryArray['access_token']) && $queryArray['access_token'] != "")) {
                $mergeOptions = array_merge(array('access-token' => "Bearer " . $queryArray['access_token']), $mergeOptions);
                unset($queryArray['access_token']);
        } elseif ((strpos($path, '/identity/v2/auth/register') !== false) && isset($queryArray['sott']) && $queryArray['sott'] != "") {
            $mergeOptions = array_merge(array('X-LoginRadius-Sott' => $queryArray['sott']), $mergeOptions);
                unset($queryArray['sott']);
        } elseif (strpos($path, '/ciam/appinfo') !== false) {
            $path = API_CONFIG_DOMAIN . $path;
        }
        try{
            $response = $client->request($path, $queryArray, $mergeOptions);
        }
        catch(LoginRadiusException $e){
           return $e;
        }
        
        return json_decode($response);
    }

    /**
     * Manage LoginRadius Authentication
     *
     * @param type $array
     * @return type
     */
    public static function authentication($array = array(), $secure = 'key', $requestUrl = '')
    {
        $result = array();
        if ($secure == 'key') {
            $result = array('apikey' => Functions::getApiKey());
        } else if ($secure == 'secret') {
            $result = array('X-LoginRadius-ApiSecret' => Functions::getApiSecret());
        } else if ($secure == 'hashsecret') {
            $expiryTime = gmdate("Y-m-d H:i:s", strtotime('1 hour'));
            $encodedUrl = self::urlReplacement(urlencode(urldecode($requestUrl)));

            if (isset($array['method']) && (($array['method'] == 'POST') || ($array['method'] == 'PUT') || ($array['method'] == 'DELETE')) && $array['post_data'] !== true) {
                $postData = $array['post_data'];              
                if (is_array($array['post_data']) || is_object($array['post_data'])) {
                   $postData = json_encode($array['post_data']);
                }              
                $stringToHash = $expiryTime . ':' . strtolower($encodedUrl) . ':' . $postData;
            } else {
                $stringToHash = $expiryTime . ':' . strtolower($encodedUrl);
            }
            $shaHash = hash_hmac('sha256', $stringToHash, Functions::getApiSecret(), true);
            $result = array('X-Request-Expires' => $expiryTime, 'digest' => "SHA-256=" . base64_encode($shaHash));
        }

        return (is_array($array) && count($array) > 0) ? array_merge($result, $array) : $result;
    }
    
    
    /**
     * URL replacement
     *
     * @param type $decodedUrl
     * @return type
     */
    public static function urlReplacement($decodedUrl)
    {
        $replacementArray = array('%2A' => '*','%28' => '(','%29' => ')');
        return str_replace(array_keys($replacementArray), array_values($replacementArray), $decodedUrl);
    }

    /**
     * Build Query string
     *
     * @param type $data
     * @return type
     */
    public static function queryBuild($data = array())
    {
        if (is_array($data) && sizeof($data) > 0) {
            return http_build_query($data);
        }
        return '';
    }

    /**
     * API validation message
     */
    public static function paramValidationMsg($parameter)
    {
        return "The $parameter method parameter is not formatted or null"; 
    }
}
