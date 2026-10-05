<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use League\OAuth2\Client\Provider\Google;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

$mail = new PHPMailer(true);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="./index.php" method="post">
        <input type="text" placeholder="name" name="name">
        <br>
        <input type="email" placeholder="email" name="email">
        <br>
        <input type="text" placeholder="omschrijving" name="omschrijving">
        <br>
        <input type="text" placeholder="klacht" name="klacht">
        <br>
        <input type="submit">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__, 'data.env');
    $dotenv->load();

    $clientId = $_ENV['GOOGLE_CLIENT_ID'];
    $clientSecret = $_ENV['GOOGLE_CLIENT_SECRET'];

    $name = $_POST['name'];
    $email = $_POST['email'];
    $omschrijving = $_POST['omschrijving'];
    $klacht = $_POST['klacht'];

    $provider = new Google([
        'clientId' => $clientId,
        'clientSecret' => $clientSecret,
        'redirectUri' => 'http://localhost/composer-mailing/src/oauth2callback.php',
    ]);

    $authorizationUrl = $provider->getAuthorizationUrl([
    'scope' => [
        'https://www.googleapis.com/auth/gmail.send'
    ],
    'access_type' => 'offline',
    'prompt' => 'consent'
    ]);

    echo '<pre>';
    echo $authorizationUrl;
    echo '</pre>';

} else {
    echo("<h1>Verzend je bericht om de mail te krijgen</h1>");
}

    ?>
</body>
</html>

