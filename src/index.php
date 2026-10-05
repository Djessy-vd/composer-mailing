<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

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
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        
    } else {
        echo("<h1>verzend je bericht om de mail te krijgen<h1/>");
    }

    ?>
</body>
</html>

