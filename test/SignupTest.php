<?php
/**
 * Using PhpStorm.
 * (c) 2016 xiurobert
 * Created on 9/7/2016 at 8:58 AM
 */

require '../inc/class.user.php';

use PHPUnit\Framework\TestCase;

class SignupTest extends TestCase {
    public function testDatabaseConnection() {
        $test_details = json_decode(file_get_contents("../test_info.json"), true);

        $dbconn = new mysqli($test_details['host'], $test_details['username'], $test_details['password'], $test_details['database'], $test_details['port']);
        $test = new User($dbconn);
    }

    public function testSignup() {
        $test_details = json_decode(file_get_contents("../test_info.json"), true);

        $dbconn = new mysqli($test_details['host'], $test_details['username'], $test_details['password'], $test_details['database'], $test_details['port']);
        $test = new User($dbconn);

        $fakeusername = $test['test_username'];
        $fakepassword = $test['test_password'];
        $fakeemail = $test['test_email'];
        $fakename = $test['test_name'];
        $fakecode = hash("sha256", uniqid(rand()), true);

        $test->signup($fakeusername, $fakepassword, $fakeemail, $fakename, $fakecode);


    }

    public function testEmailSend() {
        $test_details = json_decode(file_get_contents("../test_info.json"), true);

        $dbconn = new mysqli($test_details['host'], $test_details['username'], $test_details['password'], $test_details['database'], $test_details['port']);
        $test = new User($dbconn);

        //test->send_mail();
    }
}