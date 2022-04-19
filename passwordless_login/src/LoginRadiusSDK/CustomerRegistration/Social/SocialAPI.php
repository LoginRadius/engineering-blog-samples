<?php
 /**
 * @category            : CustomerRegistration
 * @link                : http://www.loginradius.com
 * @package             : SocialAPI
 * @author              : LoginRadius Team
 * @license             : https://opensource.org/licenses/MIT
 */

namespace LoginRadiusSDK\CustomerRegistration\Social;

use LoginRadiusSDK\Utility\Functions;
use LoginRadiusSDK\LoginRadiusException;

class SocialAPI extends Functions
{

    public function __construct($options = [])
    {
        parent::__construct($options);
    }
       


    /**
     * This API Is used to translate the Request Token returned during authentication into an Access Token that can be used with other API calls.
     * @param token Token generated from a successful oauth from social platform
     * @return Response containing Definition of Complete Token data
     * 20.1
    */

    public function exchangeAccessToken($token)
    {
        $resourcePath = "/api/v2/access_token";
        $queryParam = [];
        $queryParam['secret'] = Functions::getApiSecret();
        if ($token === '' || ctype_space($token)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('token'));
        }
        $queryParam['token'] = $token;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * The Refresh Access Token API is used to refresh the provider access token after authentication. It will be valid for up to 60 days on LoginRadius depending on the provider. In order to use the access token in other APIs, always refresh the token using this API.<br><br><b>Supported Providers :</b> Facebook,Yahoo,Google,Twitter, Linkedin.<br><br> Contact LoginRadius support team to enable this API.
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @param expiresIn Allows you to specify a desired expiration time in minutes for the newly issued access_token.
     * @return Response containing Definition of Complete Token data
     * 20.2
    */

    public function refreshAccessToken($accessToken, $expiresIn = 0)
    {
        $resourcePath = "/api/v2/access_token/refresh";
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        $queryParam['secret'] = Functions::getApiSecret();
        if ($expiresIn != '') {
            $queryParam['expiresIn'] = $expiresIn;
        }
        $queryParam['access_token'] = $accessToken;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * This API validates access token, if valid then returns a response with its expiry otherwise error.
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @return Response containing Definition of Complete Token data
     * 20.9
    */

    public function validateAccessToken($accessToken)
    {
        $resourcePath = "/api/v2/access_token/validate";
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        $queryParam['key'] = Functions::getApiKey();
        $queryParam['secret'] = Functions::getApiSecret();
        $queryParam['access_token'] = $accessToken;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * This api invalidates the active access token or expires an access token validity.
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @return Response containing Definition for Complete Validation data
     * 20.10
    */

    public function inValidateAccessToken($accessToken)
    {
        $resourcePath = "/api/v2/access_token/invalidate";
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        $queryParam['key'] = Functions::getApiKey();
        $queryParam['secret'] = Functions::getApiSecret();
        $queryParam['access_token'] = $accessToken;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * This api is use to get all active session by Access Token.
     * @param token Token generated from a successful oauth from social platform
     * @return Response containing Definition for Complete active sessions
     * 20.11.1
    */

    public function getActiveSession($token)
    {
        $resourcePath = "/api/v2/access_token/activesession";
        $queryParam = [];
        $queryParam['key'] = Functions::getApiKey();
        $queryParam['secret'] = Functions::getApiSecret();
        if ($token === '' || ctype_space($token)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('token'));
        }
        $queryParam['token'] = $token;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * This api is used to get all active sessions by AccountID(UID).
     * @param accountId UID, the unified identifier for each user account
     * @return Response containing Definition for Complete active sessions
     * 20.11.2
    */

    public function getActiveSessionByAccountID($accountId)
    {
        $resourcePath = "/api/v2/access_token/activesession";
        $queryParam = [];
        if ($accountId === '' || ctype_space($accountId)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accountId'));
        }
        $queryParam['key'] = Functions::getApiKey();
        $queryParam['secret'] = Functions::getApiSecret();
        $queryParam['accountId'] = $accountId;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * This api is used to get all active sessions by ProfileId.
     * @param profileId Social Provider Id
     * @return Response containing Definition for Complete active sessions
     * 20.11.3
    */

    public function getActiveSessionByProfileID($profileId)
    {
        $resourcePath = "/api/v2/access_token/activesession";
        $queryParam = [];
        $queryParam['key'] = Functions::getApiKey();
        if ($profileId === '' || ctype_space($profileId)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('profileId'));
        }
        $queryParam['secret'] = Functions::getApiSecret();
        $queryParam['profileId'] = $profileId;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * <b>Supported Providers:</b> Facebook, Google, Live, Vkontakte.<br><br> This API returns the photo albums associated with the passed in access tokens Social Profile.
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @return Response Containing List of Album Data
     * 22.2.1
    */

    public function getAlbums($accessToken)
    {
        $resourcePath = "/api/v2/album";
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        $queryParam['access_token'] = $accessToken;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * <b>Supported Providers:</b> Facebook, Google, Live, Vkontakte.<br><br> This API returns the photo albums associated with the passed in access tokens Social Profile.
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @param nextCursor Cursor value if not all contacts can be retrieved once.
     * @return Response Model containing Albums with next cursor
     * 22.2.2
    */

    public function getAlbumsWithCursor($accessToken, $nextCursor)
    {
        $resourcePath = "/api/v2/album";
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        if ($nextCursor === '' || ctype_space($nextCursor)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('nextCursor'));
        }
        $queryParam['access_token'] = $accessToken;
        $queryParam['nextCursor'] = $nextCursor;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * The Audio API is used to get audio files data from the user's social account.<br><br><b>Supported Providers:</b> Live, Vkontakte
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @return Response Containing List of Audio Data
     * 24.2.1
    */

    public function getAudios($accessToken)
    {
        $resourcePath = "/api/v2/audio";
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        $queryParam['access_token'] = $accessToken;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * The Audio API is used to get audio files data from the user's social account.<br><br><b>Supported Providers:</b> Live, Vkontakte
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @param nextCursor Cursor value if not all contacts can be retrieved once.
     * @return Response Model containing Audio with next cursor
     * 24.2.2
    */

    public function getAudiosWithCursor($accessToken, $nextCursor)
    {
        $resourcePath = "/api/v2/audio";
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        if ($nextCursor === '' || ctype_space($nextCursor)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('nextCursor'));
        }
        $queryParam['access_token'] = $accessToken;
        $queryParam['nextCursor'] = $nextCursor;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * The Check In API is used to get check Ins data from the user's social account.<br><br><b>Supported Providers:</b> Facebook, Foursquare, Vkontakte
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @return Response Containing List of CheckIn Data
     * 25.2.1
    */

    public function getCheckIns($accessToken)
    {
        $resourcePath = "/api/v2/checkin";
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        $queryParam['access_token'] = $accessToken;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * The Check In API is used to get check Ins data from the user's social account.<br><br><b>Supported Providers:</b> Facebook, Foursquare, Vkontakte
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @param nextCursor Cursor value if not all contacts can be retrieved once.
     * @return Response Model containing Checkins with next cursor
     * 25.2.2
    */

    public function getCheckInsWithCursor($accessToken, $nextCursor)
    {
        $resourcePath = "/api/v2/checkin";
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        if ($nextCursor === '' || ctype_space($nextCursor)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('nextCursor'));
        }
        $queryParam['access_token'] = $accessToken;
        $queryParam['nextCursor'] = $nextCursor;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * The Contact API is used to get contacts/friends/connections data from the user's social account.This is one of the APIs that makes up the LoginRadius Friend Invite System. The data will normalized into LoginRadius' standard data format. This API requires setting permissions in your LoginRadius Dashboard. <br><br><b>Note:</b> Facebook restricts access to the list of friends that is returned. When using the Contacts API with Facebook you will only receive friends that have accepted some permissions with your app. <br><br><b>Supported Providers:</b> Facebook, Foursquare, Google, LinkedIn, Live, Twitter, Vkontakte, Yahoo
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @param nextCursor Cursor value if not all contacts can be retrieved once.
     * @return Response containing Definition of Contact Data with Cursor
     * 27.1
    */

    public function getContacts($accessToken, $nextCursor = "")
    {
        $resourcePath = "/api/v2/contact";
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        if ($nextCursor != '') {
            $queryParam['nextCursor'] = $nextCursor;
        }
        $queryParam['access_token'] = $accessToken;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * The Event API is used to get the event data from the user's social account.<br><br><b>Supported Providers:</b> Facebook, Live
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @return Response Containing List of Events Data
     * 28.2.1
    */

    public function getEvents($accessToken)
    {
        $resourcePath = "/api/v2/event";
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        $queryParam['access_token'] = $accessToken;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * The Event API is used to get the event data from the user's social account.<br><br><b>Supported Providers:</b> Facebook, Live
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @param nextCursor Cursor value if not all contacts can be retrieved once.
     * @return Response Model containing Events with next cursor
     * 28.2.2
    */

    public function getEventsWithCursor($accessToken, $nextCursor)
    {
        $resourcePath = "/api/v2/event";
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        if ($nextCursor === '' || ctype_space($nextCursor)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('nextCursor'));
        }
        $queryParam['access_token'] = $accessToken;
        $queryParam['nextCursor'] = $nextCursor;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * Get the following user list from the user's social account.<br><br><b>Supported Providers:</b> Twitter
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @return Response Containing List of Contacts Data
     * 29.2.1
    */

    public function getFollowings($accessToken)
    {
        $resourcePath = "/api/v2/following";
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        $queryParam['access_token'] = $accessToken;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * Get the following user list from the user's social account.<br><br><b>Supported Providers:</b> Twitter
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @param nextCursor Cursor value if not all contacts can be retrieved once.
     * @return Response containing Definition of Contact Data with Cursor
     * 29.2.2
    */

    public function getFollowingsWithCursor($accessToken, $nextCursor)
    {
        $resourcePath = "/api/v2/following";
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        if ($nextCursor === '' || ctype_space($nextCursor)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('nextCursor'));
        }
        $queryParam['access_token'] = $accessToken;
        $queryParam['nextCursor'] = $nextCursor;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * The Group API is used to get group data from the user's social account.<br><br><b>Supported Providers:</b> Facebook, Vkontakte
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @return Response Containing List of Groups Data
     * 30.2.1
    */

    public function getGroups($accessToken)
    {
        $resourcePath = "/api/v2/group";
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        $queryParam['access_token'] = $accessToken;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * The Group API is used to get group data from the user's social account.<br><br><b>Supported Providers:</b> Facebook, Vkontakte
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @param nextCursor Cursor value if not all contacts can be retrieved once.
     * @return Response Model containing Groups with next cursor
     * 30.2.2
    */

    public function getGroupsWithCursor($accessToken, $nextCursor)
    {
        $resourcePath = "/api/v2/group";
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        if ($nextCursor === '' || ctype_space($nextCursor)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('nextCursor'));
        }
        $queryParam['access_token'] = $accessToken;
        $queryParam['nextCursor'] = $nextCursor;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * The Like API is used to get likes data from the user's social account.<br><br><b>Supported Providers:</b> Facebook
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @return Response Containing List of Likes Data
     * 31.2.1
    */

    public function getLikes($accessToken)
    {
        $resourcePath = "/api/v2/like";
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        $queryParam['access_token'] = $accessToken;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * The Like API is used to get likes data from the user's social account.<br><br><b>Supported Providers:</b> Facebook
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @param nextCursor Cursor value if not all contacts can be retrieved once.
     * @return Response Model containing Likes with next cursor
     * 31.2.2
    */

    public function getLikesWithCursor($accessToken, $nextCursor)
    {
        $resourcePath = "/api/v2/like";
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        if ($nextCursor === '' || ctype_space($nextCursor)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('nextCursor'));
        }
        $queryParam['access_token'] = $accessToken;
        $queryParam['nextCursor'] = $nextCursor;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * The Mention API is used to get mentions data from the user's social account.<br><br><b>Supported Providers:</b> Twitter
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @return Response Containing List of Status Data
     * 32.1
    */

    public function getMentions($accessToken)
    {
        $resourcePath = "/api/v2/mention";
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        $queryParam['access_token'] = $accessToken;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * Post Message API is used to post messages to the user's contacts.<br><br><b>Supported Providers:</b> Twitter, LinkedIn <br><br>The Message API is used to post messages to the user?s contacts. This is one of the APIs that makes up the LoginRadius Friend Invite System. After using the Contact API, you can send messages to the retrieved contacts. This API requires setting permissions in your LoginRadius Dashboard.<br><br>GET & POST Message API work the same way except the API method is different
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @param message Body of your message
     * @param subject Subject of your message
     * @param to Recipient's social provider's id
     * @return Response containing Definition for Complete Validation data
     * 33.1
    */

    public function postMessage($accessToken, $message,
        $subject, $to)
    {
        $resourcePath = "/api/v2/message";
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        if ($message === '' || ctype_space($message)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('message'));
        }
        if ($subject === '' || ctype_space($subject)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('subject'));
        }
        if ($to === '' || ctype_space($to)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('to'));
        }
        $queryParam['access_token'] = $accessToken;
        $queryParam['message'] = $message;
        $queryParam['subject'] = $subject;
        $queryParam['to'] = $to;
        return Functions::_apiClientHandler('POST', $resourcePath, $queryParam);
    }
       


    /**
     * The Page API is used to get the page data from the user's social account.<br><br><b>Supported Providers:</b>  Facebook, LinkedIn
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @param pageName Name of the page you want to retrieve info from
     * @return Response containing Definition of Complete page data
     * 34.1
    */

    public function getPage($accessToken, $pageName)
    {
        $resourcePath = "/api/v2/page";
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        if ($pageName === '' || ctype_space($pageName)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('pageName'));
        }
        $queryParam['access_token'] = $accessToken;
        $queryParam['pageName'] = $pageName;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * The Photo API is used to get photo data from the user's social account.<br><br><b>Supported Providers:</b>  Facebook, Foursquare, Google, Live, Vkontakte
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @param albumId The id of the album you want to retrieve info from
     * @return Response Containing List of Photos Data
     * 35.1
    */

    public function getPhotos($accessToken, $albumId)
    {
        $resourcePath = "/api/v2/photo";
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        if ($albumId === '' || ctype_space($albumId)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('albumId'));
        }
        $queryParam['access_token'] = $accessToken;
        $queryParam['albumId'] = $albumId;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * The Post API is used to get post message data from the user's social account.<br><br><b>Supported Providers:</b>  Facebook
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @return Response Containing List of Posts Data
     * 36.1
    */

    public function getPosts($accessToken)
    {
        $resourcePath = "/api/v2/post";
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        $queryParam['access_token'] = $accessToken;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * The Status API is used to update the status on the user's wall.<br><br><b>Supported Providers:</b>  Facebook, Twitter, LinkedIn
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @param caption Message displayed below the description(Requires URL, Under 70 Characters).
     * @param description Description of the displayed URL and Image(Requires URL)
     * @param imageurl Image to be displayed in the share(Requires URL).
     * @param status Main body of the Status update.
     * @param title Title of Linked URL
     * @param url URL to be included when clicking on the share.
     * @param shorturl short url
     * @return Response conatining Definition of Validation and Short URL data
     * 37.2
    */

    public function statusPosting($accessToken, $caption,
        $description, $imageurl, $status,
        $title, $url, $shorturl = "0")
    {
        $resourcePath = "/api/v2/status";
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        if ($caption === '' || ctype_space($caption)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('caption'));
        }
        if ($description === '' || ctype_space($description)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('description'));
        }
        if ($imageurl === '' || ctype_space($imageurl)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('imageurl'));
        }
        if ($status === '' || ctype_space($status)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('status'));
        }
        if ($title === '' || ctype_space($title)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('title'));
        }
        if ($url === '' || ctype_space($url)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('url'));
        }
        if ($shorturl != '') {
            $queryParam['shorturl'] = $shorturl;
        }
        $queryParam['access_token'] = $accessToken;
        $queryParam['caption'] = $caption;
        $queryParam['description'] = $description;
        $queryParam['imageurl'] = $imageurl;
        $queryParam['status'] = $status;
        $queryParam['title'] = $title;
        $queryParam['url'] = $url;
        return Functions::_apiClientHandler('POST', $resourcePath, $queryParam);
    }
       


    /**
     * The Trackable status API works very similar to the Status API but it returns a Post id that you can use to track the stats(shares, likes, comments) for a specific share/post/status update. This API requires setting permissions in your LoginRadius Dashboard.<br><br> The Trackable Status API is used to update the status on the user's wall and return an Post ID value. It is commonly referred to as Permission based sharing or Push notifications.<br><br> POST Input Parameter Format: application/x-www-form-urlencoded
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @param statusModel Model Class containing Definition of payload for Status API
     * @return Response containing Definition for Complete status data
     * 37.6
    */

    public function trackableStatusPosting($accessToken, $statusModel)
    {
        $resourcePath = "/api/v2/status/trackable";
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        $queryParam['access_token'] = $accessToken;
        return Functions::_apiClientHandler('POST', $resourcePath, $queryParam, $statusModel);
    }
       


    /**
     * The Trackable status API works very similar to the Status API but it returns a Post id that you can use to track the stats(shares, likes, comments) for a specific share/post/status update. This API requires setting permissions in your LoginRadius Dashboard.<br><br> The Trackable Status API is used to update the status on the user's wall and return an Post ID value. It is commonly referred to as Permission based sharing or Push notifications.
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @param caption Message displayed below the description(Requires URL, Under 70 Characters).
     * @param description Description of the displayed URL and Image(Requires URL)
     * @param imageurl Image to be displayed in the share(Requires URL).
     * @param status Main body of the Status update.
     * @param title Title of Linked URL
     * @param url URL to be included when clicking on the share.
     * @return Response containing Definition for Complete status data
     * 37.7
    */

    public function getTrackableStatusStats($accessToken, $caption,
        $description, $imageurl, $status,
        $title, $url)
    {
        $resourcePath = "/api/v2/status/trackable/js";
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        if ($caption === '' || ctype_space($caption)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('caption'));
        }
        if ($description === '' || ctype_space($description)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('description'));
        }
        if ($imageurl === '' || ctype_space($imageurl)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('imageurl'));
        }
        if ($status === '' || ctype_space($status)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('status'));
        }
        if ($title === '' || ctype_space($title)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('title'));
        }
        if ($url === '' || ctype_space($url)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('url'));
        }
        $queryParam['access_token'] = $accessToken;
        $queryParam['caption'] = $caption;
        $queryParam['description'] = $description;
        $queryParam['imageurl'] = $imageurl;
        $queryParam['status'] = $status;
        $queryParam['title'] = $title;
        $queryParam['url'] = $url;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * The Trackable status API works very similar to the Status API but it returns a Post id that you can use to track the stats(shares, likes, comments) for a specific share/post/status update. This API requires setting permissions in your LoginRadius Dashboard.<br><br> This API is used to retrieve a tracked post based on the passed in post ID value. This API requires setting permissions in your LoginRadius Dashboard.<br><br> <b>Note:</b> To utilize this API you need to find the ID for the post you want to track, which might require using Trackable Status Posting API first.
     * @param postId Post ID value
     * @return Response containing Definition of Complete Status Update data
     * 37.8
    */

    public function trackableStatusFetching($postId)
    {
        $resourcePath = "/api/v2/status/trackable";
        $queryParam = [];
        if ($postId === '' || ctype_space($postId)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('postId'));
        }
        $queryParam['secret'] = Functions::getApiSecret();
        $queryParam['postId'] = $postId;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * The User Profile API is used to get social profile data from the user's social account after authentication.<br><br><b>Supported Providers:</b>  All
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @param fields The fields parameter filters the API response so that the response only includes a specific set of fields
     * @return Response containing Definition for Complete UserProfile data
     * 38.1
    */

    public function getSocialUserProfile($accessToken, $fields = "")
    {
        $resourcePath = "/api/v2/userprofile";
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        if ($fields != '') {
            $queryParam['fields'] = $fields;
        }
        $queryParam['access_token'] = $accessToken;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * The User Profile API is used to get the latest updated social profile data from the user's social account after authentication. The social profile will be retrieved via oAuth and OpenID protocols. The data is normalized into LoginRadius' standard data format. This API should be called using the access token retrieved from the refresh access token API.
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @param fields The fields parameter filters the API response so that the response only includes a specific set of fields
     * @return Response containing Definition for Complete UserProfile data
     * 38.2
    */

    public function getRefreshedSocialUserProfile($accessToken, $fields = "")
    {
        $resourcePath = "/api/v2/userprofile/refresh";
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        if ($fields != '') {
            $queryParam['fields'] = $fields;
        }
        $queryParam['access_token'] = $accessToken;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * The Video API is used to get video files data from the user's social account.<br><br><b>Supported Providers:</b>   Facebook, Google, Live, Vkontakte
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @param nextCursor Cursor value if not all contacts can be retrieved once.
     * @return Response containing Definition of Video Data with Cursor
     * 39.2
    */

    public function getVideos($accessToken, $nextCursor)
    {
        $resourcePath = "/api/v2/video";
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        if ($nextCursor === '' || ctype_space($nextCursor)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('nextCursor'));
        }
        $queryParam['access_token'] = $accessToken;
        $queryParam['nextCursor'] = $nextCursor;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }

}