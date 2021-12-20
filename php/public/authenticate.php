<?php
declare(strict_types=1);
use Firebase\JWT\JWT;
require_once('../vendor/autoload.php');

// Validate the credentials in the database, or in other data store.
// For the purposes of this application, we'll consider that the credentials are valid.
$hasValidCredentials = true;

// extract credentials from the request
if ($hasValidCredentials) {
    $secret_Key  = '68V0zWFrS72GbpPreidkQFLfj4v9m3Ti+DXc8OB0gcM=';
    $date   = new DateTimeImmutable();
    $expire_at     = $date->modify('+6 minutes')->getTimestamp();      // Add 60 seconds
    $domainName = "your.domain.name";
    $username   = "username";                                           // Retrieved from filtered POST data

    // Create the token as an array
    $request_data = [
        'iat'  => $date->getTimestamp(),        // Issued at: time when the token was generated
        'iss'  => $domainName,                  // Issuer
        'nbf'  => $date->getTimestamp(),        // Not before
        'exp'  => $expire_at,                      // Expire
        'userName' => $username,                // User name
    ];

    // Encode the array to a JWT string.
    echo JWT::encode(
        $request_data,      //Data to be encoded in the JWT
        $secret_Key, // The signing key
        'HS512'     // Algorithm used to sign the token, see https://tools.ietf.org/html/draft-ietf-jose-json-web-algorithms-40#section-3
    );
}
