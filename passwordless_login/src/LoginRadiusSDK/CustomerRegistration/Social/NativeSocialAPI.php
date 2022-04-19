<?php
 /**
 * @category            : CustomerRegistration
 * @link                : http://www.loginradius.com
 * @package             : NativeSocialAPI
 * @author              : LoginRadius Team
 * @license             : https://opensource.org/licenses/MIT
 */

namespace LoginRadiusSDK\CustomerRegistration\Social;

use LoginRadiusSDK\Utility\Functions;
use LoginRadiusSDK\LoginRadiusException;

class NativeSocialAPI extends Functions
{

    public function __construct($options = [])
    {
        parent::__construct($options);
    }
       


    /**
     * The API is used to get LoginRadius access token by sending Facebook's access token. It will be valid for the specific duration of time specified in the response.
     * @param fbAccessToken Facebook Access Token
     * @return Response containing Definition of Complete Token data
     * 20.3
    */

    public function getAccessTokenByFacebookAccessToken($fbAccessToken)
    {
        $resourcePath = "/api/v2/access_token/facebook";
        $queryParam = [];
        if ($fbAccessToken === '' || ctype_space($fbAccessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('fbAccessToken'));
        }
        $queryParam['key'] = Functions::getApiKey();
        $queryParam['fb_Access_Token'] = $fbAccessToken;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * The API is used to get LoginRadius access token by sending Twitter's access token. It will be valid for the specific duration of time specified in the response.
     * @param twAccessToken Twitter Access Token
     * @param twTokenSecret Twitter Token Secret
     * @return Response containing Definition of Complete Token data
     * 20.4
    */

    public function getAccessTokenByTwitterAccessToken($twAccessToken, $twTokenSecret)
    {
        $resourcePath = "/api/v2/access_token/twitter";
        $queryParam = [];
        $queryParam['key'] = Functions::getApiKey();
        if ($twAccessToken === '' || ctype_space($twAccessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('twAccessToken'));
        }
        if ($twTokenSecret === '' || ctype_space($twTokenSecret)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('twTokenSecret'));
        }
        $queryParam['tw_Access_Token'] = $twAccessToken;
        $queryParam['tw_Token_Secret'] = $twTokenSecret;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * The API is used to get LoginRadius access token by sending Google's access token. It will be valid for the specific duration of time specified in the response.
     * @param googleAccessToken Google Access Token
     * @param clientId Google Client ID
     * @param refreshToken LoginRadius refresh_token
     * @return Response containing Definition of Complete Token data
     * 20.5
    */

    public function getAccessTokenByGoogleAccessToken($googleAccessToken, $clientId = null,
        $refreshToken = null)
    {
        $resourcePath = "/api/v2/access_token/google";
        $queryParam = [];
        if ($googleAccessToken === '' || ctype_space($googleAccessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('googleAccessToken'));
        }
        $queryParam['key'] = Functions::getApiKey();
        if ($clientId != '') {
            $queryParam['client_id'] = $clientId;
        }
        if ($refreshToken != '') {
            $queryParam['refresh_token'] = $refreshToken;
        }
        $queryParam['google_Access_Token'] = $googleAccessToken;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * This API is used to Get LoginRadius Access Token using google jwt id token for google native mobile login/registration.
     * @param idToken Google JWT id_token
     * @return Response containing Definition of Complete Token data
     * 20.6
    */

    public function getAccessTokenByGoogleJWTAccessToken($idToken)
    {
        $resourcePath = "/api/v2/access_token/googlejwt";
        $queryParam = [];
        if ($idToken === '' || ctype_space($idToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('idToken'));
        }
        $queryParam['key'] = Functions::getApiKey();
        $queryParam['id_Token'] = $idToken;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * The API is used to get LoginRadius access token by sending Linkedin's access token. It will be valid for the specific duration of time specified in the response.
     * @param lnAccessToken Linkedin Access Token
     * @return Response containing Definition of Complete Token data
     * 20.7
    */

    public function getAccessTokenByLinkedinAccessToken($lnAccessToken)
    {
        $resourcePath = "/api/v2/access_token/linkedin";
        $queryParam = [];
        $queryParam['key'] = Functions::getApiKey();
        if ($lnAccessToken === '' || ctype_space($lnAccessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('lnAccessToken'));
        }
        $queryParam['ln_Access_Token'] = $lnAccessToken;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * The API is used to get LoginRadius access token by sending Foursquare's access token. It will be valid for the specific duration of time specified in the response.
     * @param fsAccessToken Foursquare Access Token
     * @return Response containing Definition of Complete Token data
     * 20.8
    */

    public function getAccessTokenByFoursquareAccessToken($fsAccessToken)
    {
        $resourcePath = "/api/v2/access_token/foursquare";
        $queryParam = [];
        if ($fsAccessToken === '' || ctype_space($fsAccessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('fsAccessToken'));
        }
        $queryParam['key'] = Functions::getApiKey();
        $queryParam['fs_Access_Token'] = $fsAccessToken;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * The API is used to get LoginRadius access token by sending Vkontakte's access token. It will be valid for the specific duration of time specified in the response.
     * @param vkAccessToken Vkontakte Access Token
     * @return Response containing Definition of Complete Token data
     * 20.15
    */

    public function getAccessTokenByVkontakteAccessToken($vkAccessToken)
    {
        $resourcePath = "/api/v2/access_token/vkontakte";
        $queryParam = [];
        $queryParam['key'] = Functions::getApiKey();
        if ($vkAccessToken === '' || ctype_space($vkAccessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('vkAccessToken'));
        }
        $queryParam['vk_access_token'] = $vkAccessToken;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * The API is used to get LoginRadius access token by sending Google's AuthCode. It will be valid for the specific duration of time specified in the response.
     * @param googleAuthcode Google AuthCode
     * @return Response containing Definition of Complete Token data
     * 20.16
    */

    public function getAccessTokenByGoogleAuthCode($googleAuthcode)
    {
        $resourcePath = "/api/v2/access_token/google";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        if ($googleAuthcode === '' || ctype_space($googleAuthcode)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('googleAuthcode'));
        }
        $queryParam['google_authcode'] = $googleAuthcode;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }

}