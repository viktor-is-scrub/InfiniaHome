<?php
/**
 * Using PhpStorm.
 * (c) 2016 xiurobert
 * Created on 4/30/2016 at 11:51 AM
 */


// Values have been bleeped for a reason, please change the settings in Config.php

require '../inc/config.php';

// Very simple config checker
if ($conf['edited'] == false) {
    if ($conf_checker == false) {
        // Do nothing
    } else {
        die('Config is at default values! Please change the config file');
    }

}

define(SMTPHOST, $conf['SMTP']['host']);
define(SMTPUSER, $conf['SMTP']['username']);
define(SMPTPASS, $conf['SMTP']['password']);




require('../inc/PHPMailerAutoload.php');


// %SRC%[http://blog.teamtreehouse.com/create-ajax-contact-form]

// Only process POST reqeusts.

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form fields and remove whitespace.
    $name = strip_tags(trim($_POST["name"]));
    $name = str_replace(array("\r","\n"),array(" "," "),$name);
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    // Check that data was sent to the mailer.
    if ( empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Set a 400 (bad request) response code and exit.
        http_response_code(400);
        echo "Oops! There was a problem with your submission. Please complete the form and try again.";
        exit;
    }

    // Setup Mail instance
    $mail = new PHPMailer();


    $mail->isSMTP();
    $mail->Host = SMTPHOST;



    if ($conf['SMTP']['secure'] == false) {
        $mail->SMTPAuth = false;
    } else if (strcasecmp($conf['SMTP']['secure'], 'TLS') == 0 ) {
        // If it is TLS
        $mail->SMTPSecure = str_ireplace('tls','tls',$conf['SMTP']['secure']);

        $mail->Username = SMTPUSER;
        $mail->Password = SMTPPASS;
    } else if (strcasecmp($conf['SMTP']['secure'], 'SSL') == 0) {
        // If it is SSL
        $mail->SMTPSecure = str_ireplace('ssl','ssl',$conf['SMTP']['secure']);

        $mail->Username = SMTPUSER;
        $mail->Password = SMTPPASS;
    }

    $mail->setFrom(SMTPUSER, 'Noreply');


    foreach ($conf['SMTP']['tosendto'] as $value) {
        // For each email address
        $mail->addAddress($value);
    }

    $mail->addReplyTo($email);
    $mail->isHTML(true);



    $mail->Subject = $conf['SMTP']['subject'].$email;
    $mail->Body = $conf['SMTP']['body'];
    $mail->AltBody = $conf['SMTP']['altbody'];


    // Send the email.
    if ($mail->send()) {
        // Set a 200 (okay) response code.
        http_response_code(200);
        echo "Thank You! Your message has been sent.";
    } else {
        // Set a 500 (internal server error) response code.
        http_response_code(500);
        echo "Oops! Something went wrong and we couldn't send your message.";
    }

} else {
    // Not a POST request, set a 403 (forbidden) response code.
    http_response_code(403);
    echo "There was a problem with your submission, please try again.";
}