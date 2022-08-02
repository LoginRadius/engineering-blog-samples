<?php
define('LR_API_KEY', 'cc7aa65f-b323-41a6-a22c-456e5e2f8328');
define('LR_API_SECRET', '4459ef40-c2e6-4e78-b5ca-6c93efc20dd4');  // Pass API Secret Key

//If you have Custom API Domain, then define 'API_DOMAIN' then replaced it with your custom API domain,
//otherwise no need to define these options in configuration.
// define('API_DOMAIN', 'https://api.loginradius.com'); 

require_once "./src/LoginRadiusSDK/Utility/Functions.php";
require_once "./src/LoginRadiusSDK/LoginRadiusException.php";
require_once "./src/LoginRadiusSDK/Clients/IHttpClientInterface.php";
require_once "./src/LoginRadiusSDK/Clients/DefaultHttpClient.php";
require_once "./src/LoginRadiusSDK/CustomerRegistration/Authentication/AuthenticationAPI.php";
require_once "./src/LoginRadiusSDK/CustomerRegistration/Authentication/OneTouchLoginAPI.php";
require_once "./src/LoginRadiusSDK/CustomerRegistration/Authentication/PasswordLessLoginAPI.php";
require_once "./src/LoginRadiusSDK/CustomerRegistration/Authentication/PhoneAuthenticationAPI.php";
require_once "./src/LoginRadiusSDK/CustomerRegistration/Authentication/RiskBasedAuthenticationAPI.php";
require_once "./src/LoginRadiusSDK/CustomerRegistration/Authentication/RiskBasedAuthenticationAPI.php";
require_once "./src/LoginRadiusSDK/CustomerRegistration/Authentication/SmartLoginAPI.php";

require_once "./src/LoginRadiusSDK/CustomerRegistration/Account/AccountAPI.php";
require_once "./src/LoginRadiusSDK/CustomerRegistration/Account/RoleAPI.php";
require_once "./src/LoginRadiusSDK/CustomerRegistration/Account/SottAPI.php";

require_once "./src/LoginRadiusSDK/CustomerRegistration/Advanced/ConfigurationAPI.php";
require_once "./src/LoginRadiusSDK/CustomerRegistration/Advanced/CustomObjectAPI.php";
require_once "./src/LoginRadiusSDK/CustomerRegistration/Advanced/CustomRegistrationDataAPI.php";
require_once "./src/LoginRadiusSDK/CustomerRegistration/Advanced/MultiFactorAuthenticationAPI.php";
require_once "./src/LoginRadiusSDK/CustomerRegistration/Advanced/CustomRegistrationDataAPI.php";
require_once "./src/LoginRadiusSDK/CustomerRegistration/Social/NativeSocialAPI.php";
require_once "./src/LoginRadiusSDK/CustomerRegistration/Social/SocialAPI.php";


?>
