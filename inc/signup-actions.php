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
     * Source: http://www.codingcage.com/2015/09/login-registration-email-verification-forgot-password-php.html
     * @param $username string The username preferred
     * @param $password string The preferred password (WILL BE HASHED!!)
     * @param $email string The email address
     * @param $fullname string Full name of user
     * @param $conn mysqli The MySQL database connection
     * @return mysqli_stmt $signupquery Return the query used for signup
     */
    public function signup($username, $password, $email, $fullname, $code, $conn) {
        try {

            // PASSWORD HASHING FUNCTION
            // NOTE: Don't try anything fishy here...
            $pword = password_hash($password, PASSWORD_DEFAULT);


            $signupquery = $conn->prepare(
                "INSERT INTO users(username,email,password,fullname,tokencode)
                            VALUES(:user_name, :user_mail, :user_pass,:full_name, :active_code)"
            );

            $signupquery->bind_param(":user_name", $username);
            $signupquery->bind_param(":user_mail", $email);
            $signupquery->bind_param(":user_pass", $pword);
            $signupquery->bind_param(":full_name", $fullname);
            $signupquery->bind_param(":active_code", $code);
            $signupquery->execute();
            return $signupquery;
        } catch (mysqli_sql_exception $e) {
            // Do nothing now
            echo "There was an error trying to sign you up! Please contact InfiniaPress staff";
        }
    }
    
    public function login($username, $password, $conn) {
        try {

        } catch (mysqli_sql_exception $e) {
            // Do nothing for now
        }
    }
 }



 
