<?php

// Userspace

require_once 'inc/class.user.php';
if (file_exists("InfiniaLegit.config.php")) {
    require_once('InfiniaLegit.config.php');
} else {
    require_once 'inc/config.php';
}



// Check if user is logged in

if (!$u->isLoggedIn()) {

    // This should be filled with the HTML
    $pgTitle = "Apps < InfiniaPress";


} else {
    $u->redirect("webpages/login.php");
}

?>
<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="x-ua-compatible" content="ie-edge">
            <meta name="viewport" content="width=device-width, intial-scale=1">

            <title><?php echo $pgTitle ?></title>

            <link rel="stylesheet" href="assets/css/bootstrap.min.css">

            <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->

            <script src="assets/js/jquery-2.2.3.min.js"></script>
            <script src="assets/js/bootstrap.min.js"></script>
        </head>
        <body>
        Warning: This webpage has not been populated by Keane yet!
        </body>

    </html>
