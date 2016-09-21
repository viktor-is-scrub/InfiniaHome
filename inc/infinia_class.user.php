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


    protected $conn;

    protected $user_name;
    protected $user_id;
    protected $user_code;
    protected $user_email;
    protected $user_fullname;


    public function __construct($conn) {

        if ($conn->connect_errno) {
            echo "Could not connect to the signup handler. Please try again later!";
            exit("Signup handler error - IFAP-331 errcode.lightningsf.tk");
        } else {
            $this->conn = $conn;
        }
    }

    /**
     * Statement preparation function
     * @param $query
     * @param $conn mysqli The database connect you want to use
     * @return mysqli_stmt $pquery The MySQL Statement executed
     */
    
    public function prepStmt($query) {

        $pquery = $this->conn->prepare($query);
        // In case the query is false
        if ($pquery == false) {
            exit("Severe Warning: Signup servers have an error. Report this error code: IFAP-QRR-1-userclass");
        }
        return $pquery;




    }

    /**
     * Returns the last insert ID (unique ID for the last inserted row)
     * @param $conn mysqli The mysqli connection to the database
     * @return mixed $lsid (This may return a string)
     */

    public function lastinsId() {
        $lsid = $this->conn->insert_id;
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
     * @return mixed Stuff
     */
    public function signup($username, $password, $email, $fullname, $code) {

        // Define userid as local variable
        $userid = "";


        if ($username == "" || $password == "" || $email == "" || $fullname == "") {
            exit("That field can't be blank!");
        }
        try {

            // PASSWORD HASHING FUNCTION
            // NOTE: Don't try anything fishy here...

            $GLOBALS['hPword'] = password_hash($password, PASSWORD_DEFAULT);


            $signupquery = $this->conn->prepare(
                "INSERT INTO users(username,email,password,fullname,tokencode)
                            VALUES(?, ?, ?, ?, ?)"
            );

            if ($signupquery !== false){
                $signupquery->bind_param("sssss", $username, $email, $GLOBALS['hPword'], $fullname, $code);
                $signupquery->execute();


                // $this-> binds local variables to member variables (basically all those variables that
                // don't exist in functions


                //return Array(
                //   "usr_signup_username" => $username,
                //   "usr_signup_email" => $email,
                //   "usr_signup_fullname" => $fullname,
                //   "usr_signup_id" => $id
                //);

                $this->user_name = $username;
                $this->user_email = $email;
                $this->user_fullname = $fullname;
                $this->user_code = $code;

                $userid_query = $this->conn->prepare("SELECT id FROM users WHERE username = ? ");
                if ($userid_query != false) {
                    $userid_query->bind_param("s", $username);
                    $userid_query->execute();

                    $userid_query->store_result();

                    if ($userid_query->num_rows == 1) {
                        $userid_query->bind_result($userid);
                        $this->user_id = $userid;
                    } else {

                        // If a value was entered into the database manually
                        exit("Fatal server error. Please report this issue to the bug tracker with this error code: IFAP-DBACC-1");
                    }
                } else {
                    exit("Server error. Please report this issue to the bug tracker with this error code: IFAP-QRR-4");
                }

                return $signupquery;
            } else {
                exit("Server error. Please report this to the bug tracker with this error code: IFAP-QRR-3");

            }

        } catch (mysqli_sql_exception $e) {
            // Do nothing now
            header("Location: /index.php?s=sys-error");
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
    
    public function login($username, $password) {
        $APP_ROOT = getenv('INFINIA_ROOT');


        // Function provided by nice people on stackoverflow for those
        // who don't have mysqlnd.
        // Thanks Stackoverflow
        function get_result($Statement) {
            $RESULT = array();
            $Statement->store_result();
            for ( $i = 0; $i < $Statement->num_rows; $i++ ) {
                $Metadata = $Statement->result_metadata();
                $PARAMS = array();
                while ( $Field = $Metadata->fetch_field() ) {
                    $PARAMS[] = &$RESULT[ $i ][ $Field->name ];
                }
                call_user_func_array( array( $Statement, 'bind_result' ), $PARAMS );
                $Statement->fetch();
            }
            return $RESULT;
        }

        try {
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE (username=? OR email=?)");
            if ($stmt !== false) {
                $stmt->bind_param("ss", $username, $username);
                $stmt->execute();

                $result = get_result($stmt);
                $stmt->store_result();
            } else {
                exit ("Server error. Please report this to the bug tracker with this error code: IFAP-QRR-3");
            }


            // This complicated function is needed because goddamn MySQLI and not PDO :(
            

            if ($stmt->num_rows >= 1) {
                // I'm pretty sure it works the same way if I had used the mysqlnd function.
                while ($data = array_shift($result)) {
                    // use $data[] and loop through results
                    if ($data['registered'] = "Y") {
                        // If the user is registered and confirmed


                        if (password_verify($password, $data['password'])) {
                            // Check the user's password against the hashed one

                            $_SESSION['userSess'] = $data['id']; // Starts a session with the user's ID
                            // This makes easier for other apps to verify the user has been logged in
                            // :D
                            return true;

                        } else {
                            header("Location: /index.php?s=user-error");
                            exit;

                        }
                    } else {
                        header("Location: /index.php?s=user-unconfirmed");
                        exit;
                    }
                }
            } else {
                header("Location: /index.php?s=user-error");
                exit;
            }





        } catch (mysqli_sql_exception $e) {
            // Do nothing for now
            header("Location: /index.php?s=sys-error");
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
     * Self-explanatory. Redirects the user to a chosen URL. "/" represents the web root
     * @param $url string The URL to send the user to. / REPRESENTS THE WEB ROOT
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
     * @param $altmsg string Alternative message in case HTML one cannot be sent
     *
     * @param $usr_name string The user's name generated by the signup() function
     * @param $usr_fullname string The user's fullname ditto ditto
     * @param $usr_email string ditto ditto email ditto
     * @param $usr_code string ditto ditto signup confirmation code ditto ditto
     * @param $usr_id int ditto ditto id generated by the db
     */
    public function send_mail(
        $username, $password, $host, $security, $port, $to, $subject, $message, $from, $altmsg,

        $usr_name, $usr_fullname, $usr_email, $usr_code, $usr_id
    ) 
    {
      
        // Include necessary things
        require_once "PHPMailerAutoload.php";
        require_once "InfiniaAutoloader.php";
      
        
        $m = new PHPMailer();
        $m->isSMTP();
        $m->SMTPDebug = false;
        //$m->Debugoutput = 'html';

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


        $msg = new TemplateFromString($message);
        
        $msg->set("user_name",$usr_name);
        $msg->set("user_id", $usr_id);
        $msg->set("user_code", $usr_code);
        $msg->set("user_fullname", $usr_fullname);
        $msg->set("user_email", $usr_email);
        
        
        $alt_msg = new TemplateFromString($altmsg);
        
        $alt_msg->set("user_name", $usr_name);
        $alt_msg->set("user_id", $usr_id);
        $alt_msg->set("user_code", $usr_code);
        $alt_msg->set("user_fullname", $usr_fullname);
        $alt_msg->set("user_email", $usr_email);


        
        $m->Subject = $subject;
        $m->Body = $msg->output();
        $m->AltBody = $alt_msg->output();

        $m->send();



    }
 }



 
