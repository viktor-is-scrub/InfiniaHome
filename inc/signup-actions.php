<?php

/**
 *Signup Handler
 *@author xiurobert <xiurobert@gmail.com>
 *@copyright Copyright (c) 2016, Infinia Press Open Source Foundation
 */

 
 require 'config.php';
 
 $sql = mysqli_connect($conf['db']['host'], $conf['db']['username'], $conf['db']['password'], $conf['db']['name']);
 
 function signup($username, $password, $email, $fullname) {
    
 }