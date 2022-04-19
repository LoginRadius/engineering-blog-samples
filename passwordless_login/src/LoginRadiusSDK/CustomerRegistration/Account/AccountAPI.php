<?php
 /**
 * @category            : CustomerRegistration
 * @link                : http://www.loginradius.com
 * @package             : AccountAPI
 * @author              : LoginRadius Team
 * @license             : https://opensource.org/licenses/MIT
 */

namespace LoginRadiusSDK\CustomerRegistration\Account;

use LoginRadiusSDK\Utility\Functions;
use LoginRadiusSDK\LoginRadiusException;

class AccountAPI extends Functions
{

    public function __construct($options = [])
    {
        parent::__construct($options);
    }
       


    /**
     * This API is used to retrieve all of the accepted Policies by the user, associated with their UID.
     * @param uid UID, the unified identifier for each user account
     * @return Complete Policy History data
     * 15.1.1
    */

    public function getPrivacyPolicyHistoryByUid($uid)
    {
        $resourcePath = "/identity/v2/manage/account/$uid/privacypolicy/history";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['apiSecret'] = Functions::getApiSecret();
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * This API is used to create an account in Cloud Storage. This API bypass the normal email verification process and manually creates the user. <br><br>In order to use this API, you need to format a JSON request body with all of the mandatory fields
     * @param accountCreateModel Model Class containing Definition of payload for Account Create API
     * @param fields The fields parameter filters the API response so that the response only includes a specific set of fields
     * @return Response containing Definition for Complete profile data
     * 18.1
    */

    public function createAccount($accountCreateModel, $fields = "")
    {
        $resourcePath = "/identity/v2/manage/account";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['apiSecret'] = Functions::getApiSecret();
        if ($fields != '') {
            $queryParam['fields'] = $fields;
        }
        return Functions::_apiClientHandler('POST', $resourcePath, $queryParam, $accountCreateModel);
    }
       


    /**
     * This API is used to retrieve all of the profile data, associated with the specified account by email in Cloud Storage.
     * @param email Email of the user
     * @param fields The fields parameter filters the API response so that the response only includes a specific set of fields
     * @return Response containing Definition for Complete profile data
     * 18.2
    */

    public function getAccountProfileByEmail($email, $fields = "")
    {
        $resourcePath = "/identity/v2/manage/account";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['apiSecret'] = Functions::getApiSecret();
        if ($email === '' || ctype_space($email)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('email'));
        }
        if ($fields != '') {
            $queryParam['fields'] = $fields;
        }
        $queryParam['email'] = $email;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * This API is used to retrieve all of the profile data associated with the specified account by user name in Cloud Storage.
     * @param userName UserName of the user
     * @param fields The fields parameter filters the API response so that the response only includes a specific set of fields
     * @return Response containing Definition for Complete profile data
     * 18.3
    */

    public function getAccountProfileByUserName($userName, $fields = "")
    {
        $resourcePath = "/identity/v2/manage/account";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['apiSecret'] = Functions::getApiSecret();
        if ($userName === '' || ctype_space($userName)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('userName'));
        }
        if ($fields != '') {
            $queryParam['fields'] = $fields;
        }
        $queryParam['userName'] = $userName;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * This API is used to retrieve all of the profile data, associated with the account by phone number in Cloud Storage.
     * @param phone The Registered Phone Number
     * @param fields The fields parameter filters the API response so that the response only includes a specific set of fields
     * @return Response containing Definition for Complete profile data
     * 18.4
    */

    public function getAccountProfileByPhone($phone, $fields = "")
    {
        $resourcePath = "/identity/v2/manage/account";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['apiSecret'] = Functions::getApiSecret();
        if ($phone === '' || ctype_space($phone)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('phone'));
        }
        if ($fields != '') {
            $queryParam['fields'] = $fields;
        }
        $queryParam['phone'] = $phone;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * This API is used to retrieve all of the profile data, associated with the account by uid in Cloud Storage.
     * @param uid UID, the unified identifier for each user account
     * @param fields The fields parameter filters the API response so that the response only includes a specific set of fields
     * @return Response containing Definition for Complete profile data
     * 18.5
    */

    public function getAccountProfileByUid($uid, $fields = "")
    {
        $resourcePath = "/identity/v2/manage/account/$uid";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['apiSecret'] = Functions::getApiSecret();
        if ($fields != '') {
            $queryParam['fields'] = $fields;
        }
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * This API is used to update the information of existing accounts in your Cloud Storage. See our Advanced API Usage section <a href='https://www.loginradius.com/docs/api/v2/customer-identity-api/advanced-api-usage/'>Here</a> for more capabilities.
     * @param accountUserProfileUpdateModel Model Class containing Definition of payload for Account Update API
     * @param uid UID, the unified identifier for each user account
     * @param fields The fields parameter filters the API response so that the response only includes a specific set of fields
     * @param nullSupport Boolean, pass true if you wish to update any user profile field with a NULL value, You can get the details
     * @return Response containing Definition for Complete profile data
     * 18.15
    */

    public function updateAccountByUid($accountUserProfileUpdateModel, $uid,
        $fields = "", $nullSupport = false)
    {
        $resourcePath = "/identity/v2/manage/account/$uid";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['apiSecret'] = Functions::getApiSecret();
        if ($fields != '') {
            $queryParam['fields'] = $fields;
        }
        if ($nullSupport != '') {
            $queryParam['nullSupport'] = $nullSupport;
        }
        return Functions::_apiClientHandler('PUT', $resourcePath, $queryParam, $accountUserProfileUpdateModel);
    }
       


    /**
     * This API is used to update the PhoneId by using the Uid's. Admin can update the PhoneId's for both the verified and unverified profiles. It will directly replace the PhoneId and bypass the OTP verification process.
     * @param phone Phone number
     * @param uid UID, the unified identifier for each user account
     * @param fields The fields parameter filters the API response so that the response only includes a specific set of fields
     * @return Response containing Definition for Complete profile data
     * 18.16
    */

    public function updatePhoneIDByUid($phone, $uid,
        $fields = "")
    {
        $resourcePath = "/identity/v2/manage/account/$uid/phoneid";
        $bodyParam = [];
        $bodyParam['phone'] = $phone;
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['apiSecret'] = Functions::getApiSecret();
        if ($fields != '') {
            $queryParam['fields'] = $fields;
        }
        return Functions::_apiClientHandler('PUT', $resourcePath, $queryParam, json_encode($bodyParam));
    }
       


    /**
     * This API use to retrive the hashed password of a specified account in Cloud Storage.
     * @param uid UID, the unified identifier for each user account
     * @return Response containing Definition for Complete PasswordHash data
     * 18.17
    */

    public function getAccountPasswordHashByUid($uid)
    {
        $resourcePath = "/identity/v2/manage/account/$uid/password";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['apiSecret'] = Functions::getApiSecret();
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * This API is used to set the password of an account in Cloud Storage.
     * @param password New password
     * @param uid UID, the unified identifier for each user account
     * @return Response containing Definition for Complete PasswordHash data
     * 18.18
    */

    public function setAccountPasswordByUid($password, $uid)
    {
        $resourcePath = "/identity/v2/manage/account/$uid/password";
        $bodyParam = [];
        $bodyParam['password'] = $password;
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['apiSecret'] = Functions::getApiSecret();
        return Functions::_apiClientHandler('PUT', $resourcePath, $queryParam, json_encode($bodyParam));
    }
       


    /**
     * This API deletes the Users account and allows them to re-register for a new account.
     * @param uid UID, the unified identifier for each user account
     * @return Response containing Definition of Delete Request
     * 18.19
    */

    public function deleteAccountByUid($uid)
    {
        $resourcePath = "/identity/v2/manage/account/$uid";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['apiSecret'] = Functions::getApiSecret();
        return Functions::_apiClientHandler('DELETE', $resourcePath, $queryParam);
    }
       


    /**
     * This API is used to invalidate the Email Verification status on an account.
     * @param uid UID, the unified identifier for each user account
     * @param emailTemplate Email template name
     * @param verificationUrl Email verification url
     * @return Response containing Definition of Complete Validation data
     * 18.20
    */

    public function invalidateAccountEmailVerification($uid, $emailTemplate = "",
        $verificationUrl = "")
    {
        $resourcePath = "/identity/v2/manage/account/$uid/invalidateemail";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['apiSecret'] = Functions::getApiSecret();
        if ($emailTemplate != '') {
            $queryParam['emailTemplate'] = $emailTemplate;
        }
        if ($verificationUrl != '') {
            $queryParam['verificationUrl'] = $verificationUrl;
        }
        return Functions::_apiClientHandler('PUT', $resourcePath, $queryParam);
    }
       


    /**
     * This API Returns a Forgot Password Token it can also be used to send a Forgot Password email to the customer. Note: If you have the UserName workflow enabled, you may replace the 'email' parameter with 'username' in the body.
     * @param email user's email
     * @param emailTemplate Email template name
     * @param resetPasswordUrl Url to which user should get re-directed to for resetting the password
     * @param sendEmail If set to true, the API will also send a Forgot Password email to the customer, bypassing any Bot Protection challenges that they are faced with.
     * @return Response containing Definition of Complete Forgot Password data
     * 18.22
    */

    public function getForgotPasswordToken($email, $emailTemplate = null,
        $resetPasswordUrl = null, $sendEmail = false)
    {
        $resourcePath = "/identity/v2/manage/account/forgot/token";
        $bodyParam = [];
        $bodyParam['email'] = $email;
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['apiSecret'] = Functions::getApiSecret();
        if ($emailTemplate != '') {
            $queryParam['emailTemplate'] = $emailTemplate;
        }
        if ($resetPasswordUrl != '') {
            $queryParam['resetPasswordUrl'] = $resetPasswordUrl;
        }
        if ($sendEmail != '') {
            $queryParam['sendEmail'] = $sendEmail;
        }
        return Functions::_apiClientHandler('POST', $resourcePath, $queryParam, json_encode($bodyParam));
    }
       


    /**
     * This API Returns an Email Verification token.
     * @param email user's email
     * @return Response containing Definition of Complete Verification data
     * 18.23
    */

    public function getEmailVerificationToken($email)
    {
        $resourcePath = "/identity/v2/manage/account/verify/token";
        $bodyParam = [];
        $bodyParam['email'] = $email;
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['apiSecret'] = Functions::getApiSecret();
        return Functions::_apiClientHandler('POST', $resourcePath, $queryParam, json_encode($bodyParam));
    }
       


    /**
     * The API is used to get LoginRadius access token based on UID.
     * @param uid UID, the unified identifier for each user account
     * @return Response containing Definition of Complete Token data
     * 18.24
    */

    public function getAccessTokenByUid($uid)
    {
        $resourcePath = "/identity/v2/manage/account/access_token";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['apiSecret'] = Functions::getApiSecret();
        if ($uid === '' || ctype_space($uid)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('uid'));
        }
        $queryParam['uid'] = $uid;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * This API Allows you to reset the phone no verification of an end user’s account.
     * @param uid UID, the unified identifier for each user account
     * @param smsTemplate SMS Template name
     * @return Response containing Definition of Complete Validation data
     * 18.27
    */

    public function resetPhoneIDVerificationByUid($uid, $smsTemplate = "")
    {
        $resourcePath = "/identity/v2/manage/account/$uid/invalidatephone";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['apiSecret'] = Functions::getApiSecret();
        if ($smsTemplate != '') {
            $queryParam['smsTemplate'] = $smsTemplate;
        }
        return Functions::_apiClientHandler('PUT', $resourcePath, $queryParam);
    }
       


    /**
     * This API is used to add/upsert another emails in account profile by different-different email types. If the email type is same then it will simply update the existing email, otherwise it will add a new email in Email array.
     * @param upsertEmailModel Model Class containing Definition of payload for UpsertEmail Property
     * @param uid UID, the unified identifier for each user account
     * @param fields The fields parameter filters the API response so that the response only includes a specific set of fields
     * @return Response containing Definition for Complete profile data
     * 18.29
    */

    public function upsertEmail($upsertEmailModel, $uid,
        $fields = "")
    {
        $resourcePath = "/identity/v2/manage/account/$uid/email";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['apiSecret'] = Functions::getApiSecret();
        if ($fields != '') {
            $queryParam['fields'] = $fields;
        }
        return Functions::_apiClientHandler('PUT', $resourcePath, $queryParam, $upsertEmailModel);
    }
       


    /**
     * Use this API to Remove emails from a user Account
     * @param email user's email
     * @param uid UID, the unified identifier for each user account
     * @param fields The fields parameter filters the API response so that the response only includes a specific set of fields
     * @return Response containing Definition for Complete profile data
     * 18.30
    */

    public function removeEmail($email, $uid,
        $fields = "")
    {
        $resourcePath = "/identity/v2/manage/account/$uid/email";
        $bodyParam = [];
        $bodyParam['email'] = $email;
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['apiSecret'] = Functions::getApiSecret();
        if ($fields != '') {
            $queryParam['fields'] = $fields;
        }
        return Functions::_apiClientHandler('DELETE', $resourcePath, $queryParam, json_encode($bodyParam));
    }
       


    /**
     * This API is used to refresh an access_token via it's associated refresh_token.
     * @param refreshToken LoginRadius refresh_token
     * @return Response containing Definition of Complete Token data
     * 18.31
    */

    public function refreshAccessTokenByRefreshToken($refreshToken)
    {
        $resourcePath = "/identity/v2/manage/account/access_token/refresh";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['apiSecret'] = Functions::getApiSecret();
        if ($refreshToken === '' || ctype_space($refreshToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('refreshToken'));
        }
        $queryParam['refresh_Token'] = $refreshToken;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * The Revoke Refresh Access Token API is used to revoke a refresh token or the Provider Access Token, revoking an existing refresh token will invalidate the refresh token but the associated access token will work until the expiry.
     * @param refreshToken LoginRadius refresh_token
     * @return Response containing Definition of Delete Request
     * 18.32
    */

    public function revokeRefreshToken($refreshToken)
    {
        $resourcePath = "/identity/v2/manage/account/access_token/refresh/revoke";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['apiSecret'] = Functions::getApiSecret();
        if ($refreshToken === '' || ctype_space($refreshToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('refreshToken'));
        }
        $queryParam['refresh_Token'] = $refreshToken;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * Note: This is intended for specific workflows where an email may be associated to multiple UIDs. This API is used to retrieve all of the identities (UID and Profiles), associated with a specified email in Cloud Storage.
     * @param email Email of the user
     * @param fields The fields parameter filters the API response so that the response only includes a specific set of fields
     * @return Complete user Identity data
     * 18.35
    */

    public function getAccountIdentitiesByEmail($email, $fields = "")
    {
        $resourcePath = "/identity/v2/manage/account/identities";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['apiSecret'] = Functions::getApiSecret();
        if ($email === '' || ctype_space($email)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('email'));
        }
        if ($fields != '') {
            $queryParam['fields'] = $fields;
        }
        $queryParam['email'] = $email;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * This API is used to delete all user profiles associated with an Email.
     * @param email Email of the user
     * @return Response containing Definition of Delete Request
     * 18.36
    */

    public function accountDeleteByEmail($email)
    {
        $resourcePath = "/identity/v2/manage/account";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['apiSecret'] = Functions::getApiSecret();
        if ($email === '' || ctype_space($email)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('email'));
        }
        $queryParam['email'] = $email;
        return Functions::_apiClientHandler('DELETE', $resourcePath, $queryParam);
    }
       


    /**
     * This API is used to update a user's Uid. It will update all profiles, custom objects and consent management logs associated with the Uid.
     * @param updateUidModel Payload containing Update UID
     * @param uid UID, the unified identifier for each user account
     * @return Response containing Definition of Complete Validation data
     * 18.41
    */

    public function accountUpdateUid($updateUidModel, $uid)
    {
        $resourcePath = "/identity/v2/manage/account/uid";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['apiSecret'] = Functions::getApiSecret();
        if ($uid === '' || ctype_space($uid)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('uid'));
        }
        $queryParam['uid'] = $uid;
        return Functions::_apiClientHandler('PUT', $resourcePath, $queryParam, $updateUidModel);
    }

}