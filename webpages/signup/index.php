<?php
/**
 * Using PhpStorm.
 * (c) 2016 xiurobert
 * Created on 5/19/2016 at 5:54 PM
 */


require '../../inc/parse_sql.php';
require '../../inc/config.php';


$db = new mysqli($conf['db']['host'],
    $conf['db']['username'], $conf['db']['password'], $conf['db']['name'], $conf['db']['port']);

if ($db->connect_errno) {
    echo "Oops, an error occurred
     while trying to connect to the signup servers and your request could not be processed!
     Please try again later!";

    exit(1);

    /**
     * WARNING: THE BELOW WILL BE LEFT AS UNSTYLED HTML BECAUSE I AM TOO LAZY TO WRITE
     * THE CSS. PLEASE CONTACT OUR FRONTEND DEV FOR THE CSS. THESE ARE JUST THE BARE BONES
     */
}

?>
<!DOCTYPE html>
    <html lang="en">
        <head>
            <title>Signup &lsaquo; InfiniaPress</title>
        </head>


        <body>
            <form method="post">
                <input type="text" name="Username" />
                <input type="password" name="Password" />
                <!-- Fancy styling needed please -->
                <!-- please update whenever possible -->
            </form>
        </body>
</html>

