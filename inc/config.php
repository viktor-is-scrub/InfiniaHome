<?php
/**
 * Using PhpStorm.
 * (c) 2016 xiurobert
 * Created on 5/2/2016 at 7:29 PM
 */


// WARN: Do not touch anything before the <dT>
//
$conf = Array();


// Development. Disables the config checker for preview purposes
$conf_checker = false;




// <dT>



// ONLY CHANGE IF YOU HAVE EDITED YOUR CONFIG
/********************************************************
 * WARNING WARNING WARNING WARNING
 *
 * ******************************************************
 * I am not responsible if you change this and your config is completely untouched.
 *
 * ******************************************************
 *
 */
// Change to true if your config has been edited
$conf['edited'] = false;




// SMTP Configuration for contact me sender
/**
 * The details for the SMTP config can be found in your web host's control panel
 *
 * cPanel: Email Accounts > some_email@example.com > configure mail client > read the SMTP information
 */

// The SMTP host. Your web host will provide this


$conf['SMTP']['host'] = 'changeme';


// The SMTP username. Usually the email address
$conf['SMTP']['username'] = 'changeme';

// The SMTP password. Self-explanatory. Your email address password
$conf['SMTP']['password'] = 'changeme';


// The SMTP port. Defaults to 25.
$conf['SMTP']['port'] = 25;

// Security level for SMTP. Allowed: TLS, SSL, None
// [Code]
// TLS: 'tls'
// SSL: 'ssl'
// None: false

// Default is none
// If it is none, the username and password will be ignored
$conf['SMTP']['secure'] = false;



// Recipients of email
// Use array syntax here

$conf['SMTP']['tosendto'] = Array(
    'some_user@example.com',
    'some_other@example.com'
);


// Subject of the Email

$conf['SMTP']['subject'] = 'Contact from: ';

// Body of the email
// Uses embed HTML

// Variables allowed:
// $name -> Name of the sender
// $email -> Email of the sender
// $message -> Sender's message

$conf['SMTP']['body'] = <<<SUB
<p>This is an enquiry from $name</p>
<p>Name: <b>$name</b></p>
<p>Email: <b>$email</b></p>
<p>Message: $message</p>
<p>
<i> This message is an automated message. Please do not reply to it</i>
</p>

SUB;

// Alternative body if HTML email cannot be sent

$conf['SMTP']['altbody'] = <<<BOD
Enquiry from $name\n
Name: $name\n
Email: $email\n
Message: $message\n
\n
\n
This is an automated message. Please do not reply


BOD;




/**
 * TODO: Configuration for URLs
 */



// The Link for the signup


$conf['URL']['signup'] = "signuplink.example.com";



// Link for the Image

// Should be in assets


$conf['URL']['logo'] = "assets/imgres/infinia-logo.png";



/**
 * Configuration for others
 */


// ReCaptcha public key

$conf['reCAPTCHA']['publickey'] = "changeme";

// ReCaptcha private key

$conf['reCAPTCHA']['privatekey'] = "changeme";



