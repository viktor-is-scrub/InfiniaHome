<?php
/**
 * Using PhpStorm.
 * (c) 2016 xiurobert
 * Created on 5/19/2016 at 5:54 PM
 */


require '../../inc/parse_sql.php';


$db = new mysqli($conf['db']['host'],
    $conf['db']['username'], $conf['db']['password'], $conf['db']['name'], $conf['db']['port']);

if ($db->connect_errno) {
    echo "Oops, an error occurred
     while trying to connect to the signup servers and your request could not be processed!
     Please try again later!";

    exit(1);
}



