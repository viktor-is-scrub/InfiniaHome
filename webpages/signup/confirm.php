<?php
/**
 * Using PhpStorm.
 * (c) 2016 xiurobert
 * Created on 7/15/2016 at 7:54 PM
 */

require_once "../../inc/class.user.php";

if (file_exists("../../InfiniaLegit.config.php")) {
    require_once('../../InfiniaLegit.config.php');
} else {
    require_once '../../inc/config.php';
}

$db = new mysqli($conf['db']['host'], $conf['db']['username'], $conf['db']['password']
, $conf['db']['name'], $conf['db']['port']);

$u = new User($db);

if (empty($_GET['id']) && empty($_GET['id'])) {
    $u->redirect("../../index.php?s=broken-confirmation-link");
}

if (isset($_GET['id']) && isset($_GET['code'])) {
    $id = base64_decode($_GET['id']);
    $code = $_GET['code'];

    $statusReged = "Y";
    $statusnReged = "N";

    $stmt = $u->prepStmt("SELECT id,registered FROM users WHERE id=? AND tokencode=? LIMIT 1", $db);
    if ($stmt !== false) {
        $stmt->bind_param("is", $id, $code);
        $stmt->execute();
    } else {
        exit ("Server error. Please report this to the bug tracker with this error code: IFAP-QRR-3");
    }



    $rowz = $stmt->get_result();

    // MySQLi wins in row counting. xD
    if ($rowz->num_rows > 0) {
        if ($rowz['registered'] == $statusnReged) {
            $stmt = $u->prepStmt("UPDATE users SET registered=? WHERE id=?", $db);

            $stmt->bind_param("si", $statusReged, $id);
            if ($stmt->execute()) {
                $msg = "<div class='alert alert-success'>
       <button class='close' data-dismiss='alert'>&times;</button>
       <strong>Thank you</strong>  Your account has now been activated. Click <a href='/webpages/login.php'>here</a> to login
          </div>
            ";
            } else {
                echo "
                <div class='alert alert-danger'>
                <button class='close' data-dismiss='alert'>&times;</button>
                <strong>Error</strong> There was an error trying to connect to the signup servers
            </div>
                ";
            }



        } else {
            $msg = "
            <div class='alert alert-danger'>
                <button class='close' data-dismiss='alert'>&times;</button>
                <strong>Error</strong> This link is no longer valid or your account has already been activated
            </div>
            ";
        }
    } else {
        $msg = "
        <div class='alert alert-danger'>
            <button class='close' data-dismiss='alert'>&times;</button>
            <strong>Error</strong> No account was found with this signup query!
        </div>
        ";
    }


}

?>
<!DOCTYPE html>
    <html lang="en">
<head>

    <title>Confirm your account &#65124; InfiniaPress</title>

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
    <div class="container">
        <?php if (isset($msg)) { echo $msg; } ?>
    </div>
</body>
</html>
