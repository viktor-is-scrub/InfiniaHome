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
 * If this section was changed and the rest of the script crashes your server it
 * is ALL YOUR FAULT. This product comes WITHOUT WARRANTY and NO, we will NOT fix your
 * server for you. (Just do a system wipe on the /var/www/)
 *
 * ******************************************************
 *
 */
// Change to true if your config has been edited
$conf['edited'] = false;






// SMTP Configuration for signup confirmation
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

// Subject of the Email

$conf['SMTP']['subject'] = 'Confirm your account < InfiniaPress';

// Body of the email
// Uses embed HTML

// Variables allowed:
// $name -> Name of the sender
// $email -> Email of the sender
// $message -> Sender's message

// TODO: Makeover this crappy html

$conf['SMTP']['body'] = <<<SUB
EDIT THIS PLZ
SUB;

// Alternative body if HTML email cannot be sent

$conf['SMTP']['altbody'] = <<<BOD
EDIT THIS PLZ

BOD;




/**
 * TODO: Configuration for URLs
 */



// The Link for the signup


$conf['URL']['signup'] = "signuplink.example.com";



// Link for the Image

// Should be in assets

// NOTE: This url is used in the CSS/HTML


$conf['URL']['logo'] = "assets/imgres/infinia-logo.png";




// DATABASE CONFIG
/**
 * This section is used to configure the login/signup database.
 */


// Database host
$conf['db']['host'] = "host.somedbhost.com";


// Database server port. usually 3306. Leave this if you don't know
$conf['db']['port'] = 3306;

// Name of your database. This database SHOULD ALREADY BE CREATED
$conf['db']['name'] = "changeme";

// username to access database

$conf['db']['username'] = "changeme";


// Password to access database

$conf['db']['password'] = "changeme";



