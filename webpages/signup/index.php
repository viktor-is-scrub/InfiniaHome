<?php
/**
 * Using PhpStorm.
 * (c) 2016 xiurobert & Hundotte
 * Created on 5/19/2016 at 5:54 PM
 */


require_once dirname(__FILE__)."/../../inc/InfiniaAutoloader.php";

if (file_exists(dirname(__FILE__)."/InfiniaLegit.config.php")) {
    require_once(dirname(__FILE__)."/../../InfiniaLegit.config.php");
} else {
    require_once(dirname(__FILE__)."/../../inc/config.php");
}

$db = new mysqli($conf['db']['host'],
    $conf['db']['username'], $conf['db']['password'], $conf['db']['name'], $conf['db']['port']);

$usr = new User($db);

if ($usr->isLoggedIn() != "") {
    $usr->redirect("/infinia.php");

}

if (isset($_POST['signup-btn'])) {
    // If the signup button was clicked
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $email = trim($_POST['email']);
    $fullname = trim($_POST['fullname']);

    $code = hash("sha256", uniqid(rand()), true);

    $stmt = $usr->prepStmt("SELECT * FROM infinia_users WHERE email=?");
    if ($stmt !== false) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
    } else {
        exit("Server error. Please report this to the bug tracker with this error code: IFAP-QRR-3");
    }


    

    if ($stmt->num_rows > 0) {
        $msg = "
        <div class='alert alert-danger'>
    <button class='close' data-dismiss='alert'>&times;</button>
     <strong>Sorry!</strong>  The email you have specified already exists, please try another one!
     </div>
     ";
    } else {
        if ($usr->signup($username, $password, $email, $fullname, $code)) {
            $lsId = $usr->lastinsId();
            $key = base64_encode($lsId);
            $lsId = $key;

            // Send the email
            $message = $conf['SMTP']['body'];
            $altmessage = $conf['SMTP']['altbody'];
            $emailsubject = $conf['SMTP']['subject'];

            $emailusername = $conf['SMTP']['username'];
            $emailpwd = $conf['SMTP']['password'];
            $port = $conf['SMTP']['port'];
            $host = $conf['SMTP']['host'];

            $secure = $conf['SMTP']['secure'];

            // Login, Password, SMTP Host, SMTP Security Option, SMTP Port, SMTP to, Subject, message, from, altmsg
            $usr->send_mail($emailusername, $emailpwd, $host, $secure, $port, $email, $emailsubject, $message, $emailusername, $altmessage);
/* ** Temporarily stop custom email sending **

            if (!$usr->send_mail($emailusername, $emailpwd, $host, $secure, $port, $email, $emailsubject, $message, $emailusername, $altmessage)) {
                $usr->redirect("/error.php?err=sys-error");
            } else {
                $msg = "
     <div class='alert alert-success'>
       <button class='close' data-dismiss='alert'>&times;</button>
       <strong>Success!</strong>  We've sent an email to $email.
       Please click on the confirmation link in the email to continue the creation of your account.
       </div>
     ";
            }

*/          
        } else {
            $msg = "<div class='alert alert-danger'>
    <button class='close' data-dismiss='alert'>&times;</button>
     <strong>Sorry!</strong>  The email you have specified already exists, please try another one!
     </div>";
        }
    }

}



?>
<!DOCTYPE html>
    <html lang="en">
        <head>
            <title>Signup &lsaquo; InfiniaPress</title>
            <style>
                html{
                    font-family: Arial, "Helvetica Neue", Helvetica, sans-serif
                    color: white;
                    text-align: center
                }
                body{
                    background-color: #00ffec;
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
            <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
            <script type="text/javascript" src="../../assets/js/jquery-2.2.3.min.js"></script>
            <script type="text/javascript" src="../../assets/js/bootstrap.min.js"></script>
    </head>

<body>
  <br>
  <br>

    <h1 id='heading'>SIGN UP FOR INFINIA PRESS</h1>

    <?php if(isset($msg)){ echo $msg; } ?>
    <form method="post">
        <div class="field">
            <label for="name">Username: </label>
            <input type="text" id="name" name="username" id="box" formmethod="post" required>
        </div>
        <div class="field">
            <label for="email">Email: </label>
            <input type="text" id="email" name="email" id="box" formmethod="post" required>
        </div>
        <div class="field">
            <label for="password">Password: </label>
            <input type="password" id="password" name="password" id="box" formmethod="post" required>
        </div>
        <div class="field">
            <label for="fullname">Full name:</label>
            <input type="text" id="fullname" name="fullname" id="box" formmethod="post" required>
        </div>
        <br>
        <button id="signup" name="signup-btn" type="submit">Sign up</button>
    </form>


</body>
</html>

