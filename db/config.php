<?php

require_once 'vendor/autoload.php';
session_start();

// init configuration
$clientID = '837007103942-jr4t61mr2h5d007p13sitc7ene3lo0ba.apps.googleusercontent.com';
$clientSecret = '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';
// $redirectUri = 'https://aggregate-agro.herokuapp.com/googlemain.php';
$redirectUri = 'http://localhost/agrotech/googlemain.php';

// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");
?>