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
     * Statement preparation function
     * @param $query
     * @param $conn mysqli The database connect you want to use
     * @return mysqli_stmt $pquery The MySQL Statement executed
     */
    
    public function prepStmt($query, $conn) {

        $pquery = $conn->prepare($query);
        return $pquery;




    }

    /**
     * Returns the last insert ID (unique ID for the last inserted row)
     * @param $conn mysqli The mysqli connection to the database
     * @return mixed $lsid (This may return a string)
     */

    public function lastinsId($conn) {
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
     * @return mixed $signupquery/false Returns either a mysqli_stmt or false
     */
    public function signup($username, $password, $email, $fullname, $code, $conn) {
        $currdir = __DIR__;


        try {

            // PASSWORD HASHING FUNCTION
            // NOTE: Don't try anything fishy here...

            $GLOBALS['hPword'] = password_hash($password, PASSWORD_DEFAULT);


            $signupquery = $conn->prepare(
                "INSERT INTO users(username,email,password,fullname,tokencode)
                            VALUES(:user_name, :user_mail, :user_pass,:full_name, :active_code)"
            );

            if ($signupquery !== false){
                $signupquery->bind_param(":user_name", $username);
                $signupquery->bind_param(":user_mail", $email);
                $signupquery->bind_param(":user_pass", $pword);
                $signupquery->bind_param(":full_name", $fullname);
                $signupquery->bind_param(":active_code", $code);

                $signupquery->execute();

                return $signupquery;
            } else {
                exit("Server error. Please report this to the bug tracker with this error code: IFAP-QRR-3");

            }

        } catch (mysqli_sql_exception $e) {
            // Do nothing now
            header("Location: $currdir/../index.php?s=sys-error");
            // We shall force Keane to make a beautiful error page. Yay
            return false;
        }

    }

    /**
     * @param $username string The username or emailentered by the user
     * @param $password string The password entered by the user
     * @param $conn mysqli Connection to the DB
     * @return boolean Tell if the login was successful
     */
    
    public function login($username, $password, $conn) {
        $currdir = __DIR__;
        try {
            $stmt = $conn->prepare("SELECT * FROM users WHERE (username=:user_id OR email=:email )");
            if ($stmt !== false) {
                $stmt->bind_param(":user_id", $username);
                $stmt->bind_param(":email", $username);
                $stmt->execute();
            } else {
                exit ("Server error. Please report this to the bug tracker with this error code: IFAP-QRR-3");
            }


            // This complicated function is needed because goddamn MySQLI and not PDO :(
            $result = $stmt->get_result(); // Allows the result to be worked with

            if ($stmt->num_rows >= 1) {
                while ($data = $result->fetch_assoc()) {
                    // use $data[] and loop thru results
                    if ($data['registered'] = "Y") {
                        // If the user is registered and confirmed


                        if (password_verify($password, $data['password'])) {
                            // Check the user's password against the hashed one

                            $_SESSION['userSess'] = $data['id']; // Starts a session with the user's ID
                            // This makes easier for other apps to verify the user has been logged in
                            // :D
                            return true;

                        } else {
                            header("Location: $currdir/../index.php?s=user-error");
                            exit;

                        }
                    } else {
                        header("Location: $currdir/../index.php?s=user-unconfirmed");
                        exit;
                    }
                }
            } else {
                header("Location: $currdir/../index.php?s=user-error");
                exit;
            }





        } catch (mysqli_sql_exception $e) {
            // Do nothing for now
            header("Location: $currdir/../index.php?s=sys-error");
        }
    }

    /**
     * Check if the user is logged in. Honestly, do I have to PHPDoc everything?
     * @return bool If the user is logged in or not.
     */

    public function isLoggedIn() {
        if (isset($_SESSION['userSess']) && $_SESSION['userSess']!="") {
            return true;
        } else {
            return false;
        }
    }


    /**
     * Self-explanatory. Redirects the user to a chosen URL
     * @param $url string The URL to send the user to. THIS MUST BE RELATIVE TO THE FILE INCLUDED IN
     */
    public function redirect($url) {
        header("Location: $url");
    }

    /**
     * Logs the damn user out. SO EZ!!! OMG WHY DID I PHPDOC THIS
     */

    public function logout() {
        session_destroy();
        $_SESSION['userSess'] = false;
        
    }

    /**
     * An email sending function using PHPMailer
     * @param $username string The username to send the emails from
     * @param $password string The password to the account to send emails
     * @param $host string The Email server host
     * @param $security mixed Whether to use security or not, and what type of security
     * @param $port int The email server's port
     * @param $to string The email recepient
     * @param $subject string The subject of the email
     * @param $message string The message of the Email in HtML
     * @param $from string the sender of the email
     *
     * @param $altmsg string Alternative message in case HTML one cannot be sent
     */
    public function send_mail(
        $username, $password, $host, $security, $port, $to, $subject, $message, $from, $altmsg
    ) {
        require_once "class.phpmailer.php";
        $m = new PHPMailer();
        $m->isSMTP();
        $m->SMTPDebug = false;

        if ($security == false) {
            $m->SMTPAuth = false;
        } else if ($security == "tls" || $security == "ssl") {
            $m->SMTPAuth = true;
            $m->SMTPSecure = $security;
        } else {
            echo "Invalid Email details provided.";
            exit;
        }

        $m->Host = $host;
        $m->Port = $port;

        $m->Username = $username;
        $m->Password = $password;

        $m->addAddress($to);

        $m->setFrom($from, "No reply < InfiniaPress");
        $m->addReplyTo($from, "No reply < InfiniaPress");

        $m->Subject = $subject;
        $m->Body = $message;
        $m->AltBody = $altmsg;

        $m->send();



    }
 }



 
