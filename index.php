<?php
/**
 * Using PhpStorm.
 * (c) 2016 xiurobert and Keane Wong
 * Created on 4/28/2016 at 7:51 PM
 */


// Indent for HTML: 12 spaces (3x TAB)
include('inc/header.inc.php');


// Do not touch
require('inc/config.php');

// Very simple config checker
if ($conf['edited'] == false) {
    if ($conf_checker == false) {
        // Do nothing
    } else {
        die('Config is at default values! Please change the config file');
    }

}


require('inc/lsf-functions.php');
?>


            <!--<script src="/assets/lsf/scrollhax.js" type="text/javascript"></script>-->
            <!--
            <div id="page1">
                <a id="about" class="smooth"></a>
                InfiniaPress is an open-source, web-based productivity suite
            </div>
            <div id="page2">
                <a id="contact" class="smooth"></a>
                Fill in the form to contact us
                <form  id="contact" action="contact.php" method="POST">

                </form>
            </div>

            <div id="page3">
                <a id="use" class="smooth"></a>
                Products bundled into InfiniaPress include: Hansom, etc.
            </div>
            -->

            <span id="navigation-bar">
    <p>
        [whatever you want in here. Shift your navigation bar here]
        <!-- Place About, Contact, and what we discussed today-->
    </p>
</span>
<div id="top">
<img src="" width=40%>
<br><b id="greeting">Good morning</b><br>
<script>
    var d = new Date()
    var time = d.getHours()
    if(time < 10) {
        document.getElementById("greeting").innerHTML = "Good Morning"
    }else if (time < 18) {
        document.getElementById("greeting").innerHTML = "Good Afternoon"
    }else{
        document.getElementById("greeting").innerHTML = "Good Evening"
    }
</script>
</div>
<section id="about">
<div>
    <b id="ad">
        SIMPLICITY  <br><i id="admini">is    power</i>
        <p id="adtext">Productivity apps for your work and personal life</p>
    </b>
    <a href="<?php echo $conf['URL']['signup'] ?>"><button id="signup">Sign up</button></a>
</div>
</section>
        <section id="contact" class="contact-section">
            <div class="container">

                <!-- Script handling contacts -->

                <!-- Requires jQuery -->
                <script type="text/javascript" src="/assets/lsf/contact.js">

                </script>

                <div class="row">
                    <div class="col-lg-12">
                        <h1>Contact the developers</h1>
                        <form id="contact" method="post" action="back/contact_send.php">
                            <div class="field">
                                <label for="name">Name: </label>
                                <input type="text" id="name" name="name" required>
                            </div>

                            <div class="field">
                                <label for="email">Email: </label>
                                <input type="text" id="email" name="email" required>

                            </div>

                            <div class="field">
                                <label for="message">Message: </label>
                                <textarea id="message" name="message" required></textarea>

                            </div>
                            <div class="g-recaptcha" data-sitekey="6LekVx8TAAAAAFk9MAMMd0nTkyy9NJcQD87yhV2d"></div>
<?php
class ReCaptchaResponse
{
    public $success;
    public $errorCodes;
}
class ReCaptcha
{
    private static $_signupUrl = "https://www.google.com/recaptcha/admin";
    private static $_siteVerifyUrl =
        "https://www.google.com/recaptcha/api/siteverify?";
    private $_secret;
    private static $_version = "php_1.0";
    /**
     * Constructor.
     *
     * @param string $secret shared secret between site and ReCAPTCHA server.
     */
    function ReCaptcha($secret)
    {
        if ($secret == null || $secret == "") {
            die("To use reCAPTCHA you must get an API key from <a href='"
                . self::$_signupUrl . "'>" . self::$_signupUrl . "</a>");
        }
        $this->_secret=$secret;
    }
    /**
     * Encodes the given data into a query string format.
     *
     * @param array $data array of string elements to be encoded.
     *
     * @return string - encoded request.
     */
    private function _encodeQS($data)
    {
        $req = "";
        foreach ($data as $key => $value) {
            $req .= $key . '=' . urlencode(stripslashes($value)) . '&';
        }
        // Cut the last '&'
        $req=substr($req, 0, strlen($req)-1);
        return $req;
    }
    /**
     * Submits an HTTP GET to a reCAPTCHA server.
     *
     * @param string $path url path to recaptcha server.
     * @param array  $data array of parameters to be sent.
     *
     * @return array response
     */
    private function _submitHTTPGet($path, $data)
    {
        $req = $this->_encodeQS($data);
        $response = file_get_contents($path . $req);
        return $response;
    }
    /**
     * Calls the reCAPTCHA siteverify API to verify whether the user passes
     * CAPTCHA test.
     *
     * @param string $remoteIp   IP address of end user.
     * @param string $response   response string from recaptcha verification.
     *
     * @return ReCaptchaResponse
     */
    public function verifyResponse($remoteIp, $response)
    {
        // Discard empty solution submissions
        if ($response == null || strlen($response) == 0) {
            $recaptchaResponse = new ReCaptchaResponse();
            $recaptchaResponse->success = false;
            $recaptchaResponse->errorCodes = 'missing-input';
            return $recaptchaResponse;
        }
        $getResponse = $this->_submitHttpGet(
            self::$_siteVerifyUrl,
            array (
                'secret' => $this->_secret,
                'remoteip' => $remoteIp,
                'v' => self::$_version,
                'response' => $response
            )
        );
        $answers = json_decode($getResponse, true);
        $recaptchaResponse = new ReCaptchaResponse();
        if (trim($answers ['success']) == true) {
            $recaptchaResponse->success = true;
        } else {
            $recaptchaResponse->success = false;
            $recaptchaResponse->errorCodes = $answers [error-codes];
        }
        return $recaptchaResponse;
    }
}
// your secret key
$secret = "changeme";
 
// empty response
$response = null;
 
// check secret key
$reCaptcha = new ReCaptcha($secret);
if ($_POST["g-recaptcha-response"]) {
    $response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}
if ($response != null && $response->success) {
    echo "Hi " . $_POST["name"] . " (" . $_POST["email"] . "), thanks for submitting this request!";
  } else {
  }
?>
                            <div class="field">
                                <button type="submit">Send</button>
                            </div>
                        </form>

                        <div id="formMessages">

                        </div>
                    </div>
                </div>
            </div>
        </section>



<?php include('inc/footer.inc.php') ?>
