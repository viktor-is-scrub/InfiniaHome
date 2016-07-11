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

    /**
     * User constructor.
     * @param $conn mysqli
     */



    public function __construct($conn) {

        if ($conn->connect_errno) {
            echo "Could not connect to the signup handler. Please try again later!";
            exit("Signup handler error - IFAP-331 errcode.lightningsf.tk");
        }
    }

    /**
     * @param $query
     * @param $conn mysqli The database connect you want to use
     * @return mysqli_stmt $pquery The MySQL Statement executed
     */
    
    public function queryDB($query, $conn) {

        if (!$pquery = $conn->prepare($query)) {
            echo "Warning: System error in trying to execute function!";
            exit("System error in trying to execute function!");
        } else {
            $conn->query($pquery);
        }

        return $pquery;

    }

    /**
     * Returns the last insert ID (unique ID for the last inserted row)
     * @param $conn mysqli The mysqli connection to the database
     * @return mixed $lsid (This may return a string)
     */

    public function prevId($conn) {
        $lsid = $conn->insert_id;
        return $lsid;
    }

    /**
     * Signs up a user for InfiniaPress
     * @param $username string The username preferred
     * @param $password string The preferred password (WILL BE HASHED!!)
     * @param $email string The email address
     * @param $fullname string Full name of user
     * @param $conn mysqli The MySQL database connection
     * @return mysqli_stmt $signupquery Return the query used for signup
     */
    public function signup($username, $password, $email, $fullname, $conn) {
        try {
            $pword = password_hash($password, PASSWORD_DEFAULT);

            // TODO:
            //return $signupquery;
        } catch (mysqli_sql_exception $e) {
            // Do nothing now
        }
    }
    
    public function login($username, $password, $conn) {
        
    }
 }



 
