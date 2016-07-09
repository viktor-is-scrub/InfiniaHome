<?php

/**
 *Signup Handler
 *@author xiurobert <xiurobert@gmail.com>
 *@copyright Copyright (c) 2016, Infinia Press Open Source Foundation
 */

 /**
  *Note to Keane: Please integrate this with the ajax functions. I will write a POST handler soon
  */

 


 
class User {

    private $sql;

    public function __construct() {
        require_once 'config.php';
        $sql = new mysqli($conf['db']['host'], $conf['db']['username'], $conf['db']['password'], $conf['db']['name']);

        if ($sql->connect_errno) {
            echo "Could not connect to the signup handler. Please try again later!";
            exit("Signup handler error - IFAP-331 errcode.lightningsf.tk");
        }
    }
    
    public function queryDB($query) {
        $pquery = $sql::prepare ($query);
        
    }
    
    public function signup($username, $password, $email, $fullname) {
    
    }
    
    public function login($username, $password) {
        
    }
 }



 
