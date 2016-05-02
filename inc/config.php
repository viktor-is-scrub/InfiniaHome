<?php
/**
 * Using PhpStorm.
 * (c) 2016 xiurobert
 * Created on 5/2/2016 at 7:29 PM
 */

$conf = Array();


// SMTP Configuration for contact me sender

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


$conf['SMTP']['Subject'] = 'Contact from: ';
