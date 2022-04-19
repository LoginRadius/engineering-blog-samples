<?php
 /**
 * @category            : CustomerRegistration
 * @link                : http://www.loginradius.com
 * @package             : AuthenticationAPI
 * @author              : LoginRadius Team
 * @license             : https://opensource.org/licenses/MIT
 */

namespace LoginRadiusSDK\CustomerRegistration\Authentication;

use LoginRadiusSDK\Utility\Functions;
use LoginRadiusSDK\LoginRadiusException;

class AuthenticationAPI extends Functions
{

    public function __construct($options = [])
    {
        parent::__construct($options);
    }
       


    /**
     * This API is used to retrieve the list of questions that are configured on the respective LoginRadius site.
     * @param email Email of the user
     * @return Response containing Definition for Complete SecurityQuestions data
     * 2.1
    */

    public function getSecurityQuestionsByEmail($email)
    {
        $resourcePath = "/identity/v2/auth/securityquestion/email";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        if ($email === '' || ctype_space($email)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('email'));
        }
        $queryParam['email'] = $email;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * This API is used to retrieve the list of questions that are configured on the respective LoginRadius site.
     * @param userName UserName of the user
     * @return Response containing Definition for Complete SecurityQuestions data
     * 2.2
    */

    public function getSecurityQuestionsByUserName($userName)
    {
        $resourcePath = "/identity/v2/auth/securityquestion/username";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        if ($userName === '' || ctype_space($userName)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('userName'));
        }
        $queryParam['userName'] = $userName;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * This API is used to retrieve the list of questions that are configured on the respective LoginRadius site.
     * @param phone The Registered Phone Number
     * @return Response containing Definition for Complete SecurityQuestions data
     * 2.3
    */

    public function getSecurityQuestionsByPhone($phone)
    {
        $resourcePath = "/identity/v2/auth/securityquestion/phone";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        if ($phone === '' || ctype_space($phone)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('phone'));
        }
        $queryParam['phone'] = $phone;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * This API is used to retrieve the list of questions that are configured on the respective LoginRadius site.
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @return Response containing Definition for Complete SecurityQuestions data
     * 2.4
    */

    public function getSecurityQuestionsByAccessToken($accessToken)
    {
        $resourcePath = "/identity/v2/auth/securityquestion/accesstoken";
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['access_token'] = $accessToken;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * This api validates access token, if valid then returns a response with its expiry otherwise error.
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @return Response containing Definition of Complete Token data
     * 4.1
    */

    public function authValidateAccessToken($accessToken)
    {
        $resourcePath = "/identity/v2/auth/access_token/validate";
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['access_token'] = $accessToken;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * This api call invalidates the active access token or expires an access token's validity.
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @param preventRefresh Boolean value that when set as true, in addition of the access_token being invalidated, it will no longer have the capability of being refreshed.
     * @return Response containing Definition of Complete Validation data
     * 4.2
    */

    public function authInValidateAccessToken($accessToken, $preventRefresh = false)
    {
        $resourcePath = "/identity/v2/auth/access_token/invalidate";
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        $queryParam['apiKey'] = Functions::getApiKey();
        if ($preventRefresh != '') {
            $queryParam['preventRefresh'] = $preventRefresh;
        }
        $queryParam['access_token'] = $accessToken;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * This api call provide the active access token Information
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @return Response containing Definition of Token Information
     * 4.3
    */

    public function getAccessTokenInfo($accessToken)
    {
        $resourcePath = "/identity/v2/auth/access_token";
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['access_token'] = $accessToken;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * This API retrieves a copy of the user data based on the access_token.
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @param fields The fields parameter filters the API response so that the response only includes a specific set of fields
     * @return Response containing Definition for Complete profile data
     * 5.2
    */

    public function getProfileByAccessToken($accessToken, $fields = "")
    {
        $resourcePath = "/identity/v2/auth/account";
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        $queryParam['apiKey'] = Functions::getApiKey();
        if ($fields != '') {
            $queryParam['fields'] = $fields;
        }
        $queryParam['access_token'] = $accessToken;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * This API sends a welcome email
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @param welcomeEmailTemplate Name of the welcome email template
     * @return Response containing Definition of Complete Validation data
     * 5.3
    */

    public function sendWelcomeEmail($accessToken, $welcomeEmailTemplate = null)
    {
        $resourcePath = "/identity/v2/auth/account/sendwelcomeemail";
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        $queryParam['apiKey'] = Functions::getApiKey();
        if ($welcomeEmailTemplate != '') {
            $queryParam['welcomeEmailTemplate'] = $welcomeEmailTemplate;
        }
        $queryParam['access_token'] = $accessToken;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * This API is used to update the user's profile by passing the access_token.
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @param userProfileUpdateModel Model Class containing Definition of payload for User Profile update API
     * @param emailTemplate Email template name
     * @param fields The fields parameter filters the API response so that the response only includes a specific set of fields
     * @param nullSupport Boolean, pass true if you wish to update any user profile field with a NULL value, You can get the details
     * @param smsTemplate SMS Template name
     * @param verificationUrl Email verification url
     * @return Response containing Definition of Complete Validation and UserProfile data
     * 5.4
    */

    public function updateProfileByAccessToken($accessToken, $userProfileUpdateModel,
        $emailTemplate = null, $fields = "", $nullSupport = false,
        $smsTemplate = null, $verificationUrl = null)
    {
        $resourcePath = "/identity/v2/auth/account";
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        $queryParam['apiKey'] = Functions::getApiKey();
        if ($emailTemplate != '') {
            $queryParam['emailTemplate'] = $emailTemplate;
        }
        if ($fields != '') {
            $queryParam['fields'] = $fields;
        }
        if ($nullSupport != '') {
            $queryParam['nullSupport'] = $nullSupport;
        }
        if ($smsTemplate != '') {
            $queryParam['smsTemplate'] = $smsTemplate;
        }
        if ($verificationUrl != '') {
            $queryParam['verificationUrl'] = $verificationUrl;
        }
        $queryParam['access_token'] = $accessToken;
        return Functions::_apiClientHandler('PUT', $resourcePath, $queryParam, $userProfileUpdateModel);
    }
       


    /**
     * This API will send a confirmation email for account deletion to the customer's email when passed the customer's access token
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @param deleteUrl Url of the site
     * @param emailTemplate Email template name
     * @return Response containing Definition of Delete Request
     * 5.5
    */

    public function deleteAccountWithEmailConfirmation($accessToken, $deleteUrl = null,
        $emailTemplate = null)
    {
        $resourcePath = "/identity/v2/auth/account";
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        $queryParam['apiKey'] = Functions::getApiKey();
        if ($deleteUrl != '') {
            $queryParam['deleteUrl'] = $deleteUrl;
        }
        if ($emailTemplate != '') {
            $queryParam['emailTemplate'] = $emailTemplate;
        }
        $queryParam['access_token'] = $accessToken;
        return Functions::_apiClientHandler('DELETE', $resourcePath, $queryParam);
    }
       


    /**
     * This API is used to delete an account by passing it a delete token.
     * @param deletetoken Delete token received in the email
     * @return Response containing Definition of Complete Validation data
     * 5.6
    */

    public function deleteAccountByDeleteToken($deletetoken)
    {
        $resourcePath = "/identity/v2/auth/account/delete";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        if ($deletetoken === '' || ctype_space($deletetoken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('deletetoken'));
        }
        $queryParam['deletetoken'] = $deletetoken;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * This API is used to allow a customer with a valid access_token to unlock their account provided that they successfully pass the prompted Bot Protection challenges. The Block or Suspend block types are not applicable for this API. For additional details see our Auth Security Configuration documentation.You are only required to pass the Post Parameters that correspond to the prompted challenges.
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @param unlockProfileModel Payload containing Unlock Profile API
     * @return Response containing Definition of Complete Validation data
     * 5.15
    */

    public function unlockAccountByToken($accessToken, $unlockProfileModel)
    {
        $resourcePath = "/identity/v2/auth/account/unlock";
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['access_token'] = $accessToken;
        return Functions::_apiClientHandler('PUT', $resourcePath, $queryParam, $unlockProfileModel);
    }
       


    /**
     * This API is used to check the email exists or not on your site.
     * @param email Email of the user
     * @return Response containing Definition Complete ExistResponse data
     * 8.1
    */

    public function checkEmailAvailability($email)
    {
        $resourcePath = "/identity/v2/auth/email";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        if ($email === '' || ctype_space($email)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('email'));
        }
        $queryParam['email'] = $email;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * This API is used to verify the email of user. Note: This API will only return the full profile if you have 'Enable auto login after email verification' set in your LoginRadius Admin Console's Email Workflow settings under 'Verification Email'.
     * @param verificationToken Verification token received in the email
     * @param fields The fields parameter filters the API response so that the response only includes a specific set of fields
     * @param url Mention URL to log the main URL(Domain name) in Database.
     * @param welcomeEmailTemplate Name of the welcome email template
     * @return Response containing Definition of Complete Validation, UserProfile data and Access Token
     * 8.2
    */

    public function verifyEmail($verificationToken, $fields = "",
        $url = null, $welcomeEmailTemplate = null)
    {
        $resourcePath = "/identity/v2/auth/email";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        if ($verificationToken === '' || ctype_space($verificationToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('verificationToken'));
        }
        if ($fields != '') {
            $queryParam['fields'] = $fields;
        }
        if ($url != '') {
            $queryParam['url'] = $url;
        }
        if ($welcomeEmailTemplate != '') {
            $queryParam['welcomeEmailTemplate'] = $welcomeEmailTemplate;
        }
        $queryParam['verificationToken'] = $verificationToken;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * This API is used to verify the email of user when the OTP Email verification flow is enabled, please note that you must contact LoginRadius to have this feature enabled.
     * @param emailVerificationByOtpModel Model Class containing Definition for EmailVerificationByOtpModel API
     * @param fields The fields parameter filters the API response so that the response only includes a specific set of fields
     * @param url Mention URL to log the main URL(Domain name) in Database.
     * @param welcomeEmailTemplate Name of the welcome email template
     * @return Response containing Definition of Complete Validation, UserProfile data and Access Token
     * 8.3
    */

    public function verifyEmailByOTP($emailVerificationByOtpModel, $fields = "",
        $url = null, $welcomeEmailTemplate = null)
    {
        $resourcePath = "/identity/v2/auth/email";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        if ($fields != '') {
            $queryParam['fields'] = $fields;
        }
        if ($url != '') {
            $queryParam['url'] = $url;
        }
        if ($welcomeEmailTemplate != '') {
            $queryParam['welcomeEmailTemplate'] = $welcomeEmailTemplate;
        }
        return Functions::_apiClientHandler('PUT', $resourcePath, $queryParam, $emailVerificationByOtpModel);
    }
       


    /**
     * This API is used to add additional emails to a user's account.
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @param email user's email
     * @param type String to identify the type of parameter
     * @param emailTemplate Email template name
     * @param verificationUrl Email verification url
     * @return Response containing Definition of Complete Validation data
     * 8.5
    */

    public function addEmail($accessToken, $email,
        $type, $emailTemplate = null, $verificationUrl = null)
    {
        $resourcePath = "/identity/v2/auth/email";
        $bodyParam = [];
        $bodyParam['email'] = $email;
        $bodyParam['type'] = $type;
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        $queryParam['apiKey'] = Functions::getApiKey();
        if ($emailTemplate != '') {
            $queryParam['emailTemplate'] = $emailTemplate;
        }
        if ($verificationUrl != '') {
            $queryParam['verificationUrl'] = $verificationUrl;
        }
        $queryParam['access_token'] = $accessToken;
        return Functions::_apiClientHandler('POST', $resourcePath, $queryParam, json_encode($bodyParam));
    }
       


    /**
     * This API is used to remove additional emails from a user's account.
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @param email user's email
     * @return Response containing Definition of Delete Request
     * 8.6
    */

    public function removeEmail($accessToken, $email)
    {
        $resourcePath = "/identity/v2/auth/email";
        $bodyParam = [];
        $bodyParam['email'] = $email;
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['access_token'] = $accessToken;
        return Functions::_apiClientHandler('DELETE', $resourcePath, $queryParam, json_encode($bodyParam));
    }
       


    /**
     * This API retrieves a copy of the user data based on the Email
     * @param emailAuthenticationModel Model Class containing Definition of payload for Email Authentication API
     * @param emailTemplate Email template name
     * @param fields The fields parameter filters the API response so that the response only includes a specific set of fields
     * @param loginUrl Url where the user is logging from
     * @param verificationUrl Email verification url
     * @return Response containing User Profile Data and access token
     * 9.2.1
    */

    public function loginByEmail($emailAuthenticationModel, $emailTemplate = null,
        $fields = "", $loginUrl = null, $verificationUrl = null)
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
     * @param verificationUrl Email verification url
     * @return Response containing User Profile Data and access token
     * 9.2.2
    */

    public function loginByUserName($userNameAuthenticationModel, $emailTemplate = null,
        $fields = "", $loginUrl = null, $verificationUrl = null)
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
        if ($verificationUrl != '') {
            $queryParam['verificationUrl'] = $verificationUrl;
        }
        return Functions::_apiClientHandler('POST', $resourcePath, $queryParam, $userNameAuthenticationModel);
    }
       


    /**
     * This API is used to send the reset password url to a specified account. Note: If you have the UserName workflow enabled, you may replace the 'email' parameter with 'username'
     * @param email user's email
     * @param resetPasswordUrl Url to which user should get re-directed to for resetting the password
     * @param emailTemplate Email template name
     * @return Response containing Definition of Complete Validation data
     * 10.1
    */

    public function forgotPassword($email, $resetPasswordUrl,
        $emailTemplate = null)
    {
        $resourcePath = "/identity/v2/auth/password";
        $bodyParam = [];
        $bodyParam['email'] = $email;
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        if ($resetPasswordUrl === '' || ctype_space($resetPasswordUrl)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('resetPasswordUrl'));
        }
        if ($emailTemplate != '') {
            $queryParam['emailTemplate'] = $emailTemplate;
        }
        $queryParam['resetPasswordUrl'] = $resetPasswordUrl;
        return Functions::_apiClientHandler('POST', $resourcePath, $queryParam, json_encode($bodyParam));
    }
       


    /**
     * This API is used to reset password for the specified account by security question
     * @param resetPasswordBySecurityAnswerAndEmailModel Model Class containing Definition of payload for ResetPasswordBySecurityAnswerAndEmail API
     * @return Response containing Definition of Validation data and access token
     * 10.3.1
    */

    public function resetPasswordBySecurityAnswerAndEmail($resetPasswordBySecurityAnswerAndEmailModel)
    {
        $resourcePath = "/identity/v2/auth/password/securityanswer";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        return Functions::_apiClientHandler('PUT', $resourcePath, $queryParam, $resetPasswordBySecurityAnswerAndEmailModel);
    }
       


    /**
     * This API is used to reset password for the specified account by security question
     * @param resetPasswordBySecurityAnswerAndPhoneModel Model Class containing Definition of payload for ResetPasswordBySecurityAnswerAndPhone API
     * @return Response containing Definition of Validation data and access token
     * 10.3.2
    */

    public function resetPasswordBySecurityAnswerAndPhone($resetPasswordBySecurityAnswerAndPhoneModel)
    {
        $resourcePath = "/identity/v2/auth/password/securityanswer";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        return Functions::_apiClientHandler('PUT', $resourcePath, $queryParam, $resetPasswordBySecurityAnswerAndPhoneModel);
    }
       


    /**
     * This API is used to reset password for the specified account by security question
     * @param resetPasswordBySecurityAnswerAndUserNameModel Model Class containing Definition of payload for ResetPasswordBySecurityAnswerAndUserName API
     * @return Response containing Definition of Validation data and access token
     * 10.3.3
    */

    public function resetPasswordBySecurityAnswerAndUserName($resetPasswordBySecurityAnswerAndUserNameModel)
    {
        $resourcePath = "/identity/v2/auth/password/securityanswer";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        return Functions::_apiClientHandler('PUT', $resourcePath, $queryParam, $resetPasswordBySecurityAnswerAndUserNameModel);
    }
       


    /**
     * This API is used to set a new password for the specified account.
     * @param resetPasswordByResetTokenModel Model Class containing Definition of payload for ResetToken API
     * @return Response containing Definition of Validation data and access token
     * 10.7.1
    */

    public function resetPasswordByResetToken($resetPasswordByResetTokenModel)
    {
        $resourcePath = "/identity/v2/auth/password/reset";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        return Functions::_apiClientHandler('PUT', $resourcePath, $queryParam, $resetPasswordByResetTokenModel);
    }
       


    /**
     * This API is used to set a new password for the specified account.
     * @param resetPasswordByEmailAndOtpModel Model Class containing Definition of payload for ResetPasswordByEmailAndOtp API
     * @return Response containing Definition of Validation data and access token
     * 10.7.2
    */

    public function resetPasswordByEmailOTP($resetPasswordByEmailAndOtpModel)
    {
        $resourcePath = "/identity/v2/auth/password/reset";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        return Functions::_apiClientHandler('PUT', $resourcePath, $queryParam, $resetPasswordByEmailAndOtpModel);
    }
       


    /**
     * This API is used to set a new password for the specified account if you are using the username as the unique identifier in your workflow
     * @param resetPasswordByUserNameModel Model Class containing Definition of payload for ResetPasswordByUserName API
     * @return Response containing Definition of Validation data and access token
     * 10.7.3
    */

    public function resetPasswordByOTPAndUserName($resetPasswordByUserNameModel)
    {
        $resourcePath = "/identity/v2/auth/password/reset";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        return Functions::_apiClientHandler('PUT', $resourcePath, $queryParam, $resetPasswordByUserNameModel);
    }
       


    /**
     * This API is used to change the accounts password based on the previous password
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @param newPassword New password
     * @param oldPassword User's current password
     * @return Response containing Definition of Complete Validation data
     * 10.8
    */

    public function changePassword($accessToken, $newPassword,
        $oldPassword)
    {
        $resourcePath = "/identity/v2/auth/password/change";
        $bodyParam = [];
        $bodyParam['newPassword'] = $newPassword;
        $bodyParam['oldPassword'] = $oldPassword;
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['access_token'] = $accessToken;
        return Functions::_apiClientHandler('PUT', $resourcePath, $queryParam, json_encode($bodyParam));
    }
       


    /**
     * This API is used to link up a social provider account with the specified account based on the access token and the social providers user access token.
     * @param accessToken Access_Token
     * @param candidateToken Access token of the account to be linked
     * @return Response containing Definition of Complete Validation data
     * 12.1
    */

    public function linkSocialIdentities($accessToken, $candidateToken)
    {
        $resourcePath = "/identity/v2/auth/socialidentity";
        $bodyParam = [];
        $bodyParam['candidateToken'] = $candidateToken;
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['access_token'] = $accessToken;
        return Functions::_apiClientHandler('PUT', $resourcePath, $queryParam, json_encode($bodyParam));
    }
       


    /**
     * This API is used to unlink up a social provider account with the specified account based on the access token and the social providers user access token. The unlinked account will automatically get removed from your database.
     * @param accessToken Access_Token
     * @param provider Name of the provider
     * @param providerId Unique ID of the linked account
     * @return Response containing Definition of Delete Request
     * 12.2
    */

    public function unlinkSocialIdentities($accessToken, $provider,
        $providerId)
    {
        $resourcePath = "/identity/v2/auth/socialidentity";
        $bodyParam = [];
        $bodyParam['provider'] = $provider;
        $bodyParam['providerId'] = $providerId;
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['access_token'] = $accessToken;
        return Functions::_apiClientHandler('DELETE', $resourcePath, $queryParam, json_encode($bodyParam));
    }
       


    /**
     * This API is called just after account linking API and it prevents the raas profile of the second account from getting created.
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @param fields The fields parameter filters the API response so that the response only includes a specific set of fields
     * @return Response containing Definition for Complete SocialUserProfile data
     * 12.3
    */

    public function getSocialIdentity($accessToken, $fields = "")
    {
        $resourcePath = "/identity/v2/auth/socialidentity";
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        $queryParam['apiKey'] = Functions::getApiKey();
        if ($fields != '') {
            $queryParam['fields'] = $fields;
        }
        $queryParam['access_token'] = $accessToken;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * This API is used to set or change UserName by access token.
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @param username Username of the user
     * @return Response containing Definition of Complete Validation data
     * 13.1
    */

    public function setOrChangeUserName($accessToken, $username)
    {
        $resourcePath = "/identity/v2/auth/username";
        $bodyParam = [];
        $bodyParam['username'] = $username;
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['access_token'] = $accessToken;
        return Functions::_apiClientHandler('PUT', $resourcePath, $queryParam, json_encode($bodyParam));
    }
       


    /**
     * This API is used to check the UserName exists or not on your site.
     * @param username UserName of the user
     * @return Response containing Definition Complete ExistResponse data
     * 13.2
    */

    public function checkUserNameAvailability($username)
    {
        $resourcePath = "/identity/v2/auth/username";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        if ($username === '' || ctype_space($username)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('username'));
        }
        $queryParam['username'] = $username;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * This API is used to update the privacy policy stored in the user's profile by providing the access_token of the user accepting the privacy policy
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @param fields The fields parameter filters the API response so that the response only includes a specific set of fields
     * @return Response containing Definition for Complete profile data
     * 15.1
    */

    public function acceptPrivacyPolicy($accessToken, $fields = "")
    {
        $resourcePath = "/identity/v2/auth/privacypolicy/accept";
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        $queryParam['apiKey'] = Functions::getApiKey();
        if ($fields != '') {
            $queryParam['fields'] = $fields;
        }
        $queryParam['access_token'] = $accessToken;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * This API will return all the accepted privacy policies for the user by providing the access_token of that user.
     * @param accessToken Uniquely generated identifier key by LoginRadius that is activated after successful authentication.
     * @return Complete Policy History data
     * 15.2
    */

    public function getPrivacyPolicyHistoryByAccessToken($accessToken)
    {
        $resourcePath = "/identity/v2/auth/privacypolicy/history";
        $queryParam = [];
        if ($accessToken === '' || ctype_space($accessToken)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('accessToken'));
        }
        $queryParam['apiKey'] = Functions::getApiKey();
        $queryParam['access_token'] = $accessToken;
        return Functions::_apiClientHandler('GET', $resourcePath, $queryParam);
    }
       


    /**
     * This API creates a user in the database as well as sends a verification email to the user.
     * @param authUserRegistrationModel Model Class containing Definition of payload for Auth User Registration API
     * @param sott LoginRadius Secured One Time Token
     * @param emailTemplate Email template name
     * @param fields The fields parameter filters the API response so that the response only includes a specific set of fields
     * @param options PreventVerificationEmail (Specifying this value prevents the verification email from being sent. Only applicable if you have the optional email verification flow)
     * @param verificationUrl Email verification url
     * @param welcomeEmailTemplate Name of the welcome email template
     * @return Response containing Definition of Complete Validation, UserProfile data and Access Token
     * 17.1.1
    */

    public function userRegistrationByEmail($authUserRegistrationModel, $sott,
        $emailTemplate = null, $fields = "", $options = "",
        $verificationUrl = null, $welcomeEmailTemplate = null)
    {
        $resourcePath = "/identity/v2/auth/register";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        if ($sott === '' || ctype_space($sott)) {
            throw new LoginRadiusException(Functions::paramValidationMsg('sott'));
        }
        if ($emailTemplate != '') {
            $queryParam['emailTemplate'] = $emailTemplate;
        }
        if ($fields != '') {
            $queryParam['fields'] = $fields;
        }
        if ($options != '') {
            $queryParam['options'] = $options;
        }
        if ($verificationUrl != '') {
            $queryParam['verificationUrl'] = $verificationUrl;
        }
        if ($welcomeEmailTemplate != '') {
            $queryParam['welcomeEmailTemplate'] = $welcomeEmailTemplate;
        }
        $queryParam['sott'] = $sott;
        return Functions::_apiClientHandler('POST', $resourcePath, $queryParam, $authUserRegistrationModel);
    }
       


    /**
     * This API creates a user in the database as well as sends a verification email to the user.
     * @param authUserRegistrationModelWithCaptcha Model Class containing Definition of payload for Auth User Registration by Recaptcha API
     * @param emailTemplate Email template name
     * @param fields The fields parameter filters the API response so that the response only includes a specific set of fields
     * @param options PreventVerificationEmail (Specifying this value prevents the verification email from being sent. Only applicable if you have the optional email verification flow)
     * @param smsTemplate SMS Template name
     * @param verificationUrl Email verification url
     * @param welcomeEmailTemplate Name of the welcome email template
     * @return Response containing Definition of Complete Validation, UserProfile data and Access Token
     * 17.2
    */

    public function userRegistrationByCaptcha($authUserRegistrationModelWithCaptcha, $emailTemplate = null,
        $fields = "", $options = "", $smsTemplate = null,
        $verificationUrl = null, $welcomeEmailTemplate = null)
    {
        $resourcePath = "/identity/v2/auth/register/captcha";
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        if ($emailTemplate != '') {
            $queryParam['emailTemplate'] = $emailTemplate;
        }
        if ($fields != '') {
            $queryParam['fields'] = $fields;
        }
        if ($options != '') {
            $queryParam['options'] = $options;
        }
        if ($smsTemplate != '') {
            $queryParam['smsTemplate'] = $smsTemplate;
        }
        if ($verificationUrl != '') {
            $queryParam['verificationUrl'] = $verificationUrl;
        }
        if ($welcomeEmailTemplate != '') {
            $queryParam['welcomeEmailTemplate'] = $welcomeEmailTemplate;
        }
        return Functions::_apiClientHandler('POST', $resourcePath, $queryParam, $authUserRegistrationModelWithCaptcha);
    }
       


    /**
     * This API resends the verification email to the user.
     * @param email user's email
     * @param emailTemplate Email template name
     * @param verificationUrl Email verification url
     * @return Response containing Definition of Complete Validation data
     * 17.3
    */

    public function authResendEmailVerification($email, $emailTemplate = null,
        $verificationUrl = null)
    {
        $resourcePath = "/identity/v2/auth/register";
        $bodyParam = [];
        $bodyParam['email'] = $email;
        $queryParam = [];
        $queryParam['apiKey'] = Functions::getApiKey();
        if ($emailTemplate != '') {
            $queryParam['emailTemplate'] = $emailTemplate;
        }
        if ($verificationUrl != '') {
            $queryParam['verificationUrl'] = $verificationUrl;
        }
        return Functions::_apiClientHandler('PUT', $resourcePath, $queryParam, json_encode($bodyParam));
    }

}