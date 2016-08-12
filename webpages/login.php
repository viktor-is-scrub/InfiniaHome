<?php
/**
 * Using PhpStorm.
 * (c) 2016 xiurobert
 * Created on 7/15/2016 at 9:10 PM
 */
session_start();

require_once '../inc/class.user.php';
if (file_exists("../InfiniaLegit.config.php")) {
    require_once('../InfiniaLegit.config.php');
} else {
    require_once '../inc/config.php';
}

require '../inc/lsf-functions.php';

$db = new mysqli(
    $conf['db']['host'], $conf['db']['username'], $conf['db']['password'], $conf['db']['name'], $conf['db']['port']
);
$u = new User($db);

if ($u->isLoggedIn() != "") {
    $u->redirect("../infinia.php");
}


// Note to Keane: This is the name="login-btn" for the login button
if (isset($_POST['login-btn'])) {

    // This can be both a username or email
    // Again name="username-email" etc.
    $login_info = trim($_POST['username-email']);
    $password = trim($_POST['password']);
    

    if ($u->login($login_info, $password, $db)) {
        $u->redirect("../../infinia.php");
    }
}

?>
<!DOCTYPE html>
    <html lang="en">
        <head>
            <title>Login to InfiniaPress</title>
            <style>
                html{
                    font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
                    text-align: center;
                }
                #heading{
                    font-family: "Helvetica Neue";
                    font-size: 90px;
                }
                #signup{
                    border-radius: 50%;
                    background-color: #00FF04;
                    border-color: #00FF04;
                    color: white;
                    font-size: 40px;
                    transition-duration: 0.4s;
                    width: 25%;
                    height: 80px;
                }
                #signup:hover{
                    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
                    background-color: red;
                    border-color: red;
                }
                input, select {
                    padding: 12px 20px;
                    margin: 8px 0;
                    display: inline-block;
                    border: 1px solid #ccc;
                    border-radius: 4px;
                    box-sizing: border-box;
                }
                label{
                    font-size: 35px;
                }
            </style>

            <?php throwNoJs(); ?>
            <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
            <script type="text/javascript" src="../assets/js/jquery-2.2.3.min.js"></script>
            <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
            <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->
        </head>
        <body>
            <h1 id='heading'>SIGN IN TO INFINIA PRESS</h1>
            <form id="login" method="post" >
                <div class="field">
                    <label for="name">Username or email: </label>
                    <input type="text" name="username" id="box" formmethod="post" required>
                </div>
                <div class="field">
                    <label for="password">Password: </label>
                    <input type="password" name="password" id="box" formmethod="post" required>
                </div>
                <br>
                <button id="signup" name="login-btn" type="submit">Sign in</button>
            </form>

        </body>
    </html>
