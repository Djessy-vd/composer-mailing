<?php

use League\OAuth2\Client\Provider\Google;

require '../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__, 'data.env');
$dotenv->load();

$provider = new Google([
    'clientId' => $_ENV['GOOGLE_CLIENT_ID'],
    'clientSecret' => $_ENV['GOOGLE_CLIENT_SECRET'],
    'redirectUri' => 'http://localhost/composer-mailing/src/oauth2callback.php',
]);

if (!isset($_GET['code'])) {
    exit('Geen autorisatiecode ontvangen.');
}

$token = $provider->getAccessToken('authorization_code', [
    'code' => $_GET['code']
]);

$refreshToken = $token->getRefreshToken();

file_put_contents(
    __DIR__ . '/data.env',
    "\nGOOGLE_REFRESH_TOKEN=" . $refreshToken . "\n",
    FILE_APPEND
);

echo 'Google succesvol gekoppeld!';