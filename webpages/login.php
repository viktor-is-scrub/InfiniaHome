<?php
/**
 * Using PhpStorm.
 * (c) 2016 xiurobert
 * Created on 7/15/2016 at 9:10 PM
 */
session_start();

require_once '../inc/class.user.php';
require_once '../inc/config.php';

$db = new mysqli(
    $conf['db']['host'], $conf['db']['username'], $conf['db']['password'], $conf['db']['name'], $conf['db']['port']
);
$u = new User($db);

if ($u->isLoggedIn() != "") {
    $u->redirect("../index.php");
}


// Note to Keane: This is the name="login-btn" for the login button
if (isset($_POST['login-btn'])) {

    // This can be both a username or email
    // Again name="username-email" etc.
    $login_info = trim($_POST['username-email']);
    $password = trim($_POST['password']);

    if ($u->login($login_info, $password)) {
        $u->redirect("../../infinia.php");
    }
}

?>
<!DOCTYPE html>
    <html lang="en">
        <head>
            <title>Login to InfiniaPress</title>

            <?php throwNoJs(); ?>
            <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
            <script type="text/javascript" src="../../assets/js/jquery-2.2.3.min.js"></script>
            <script type="text/javascript" src="../../assets/js/bootstrap.min.js"></script>
            <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->
        </head>
        <body>
        <?php //TODO: Finish off rest of login message boxes?>
        </body>
    </html>
