<?php
/**
 * Using PhpStorm.
 * (c) 2016 xiurobert
 * Created on 9/7/2016 at 8:58 AM
 */
namespace InfiniaPress\Tests\SignupTest;

require '../inc/infinia_class.user.php';

use PHPUnit\Framework\TestCase;

class SignupTest extends TestCase {
    public function testDatabaseConnection() {
        $test_details = json_decode(file_get_contents("../test_info.json"), true);

        $dbconn = new mysqli($test_details['database']['host'], $test_details['database']['username'], $test_details['database']['password'], $test_details['database']['database_name'], $test_details['database']['port']);
        $test = new User($dbconn);
    }

    public function testSignup() {
        $test_details = json_decode(file_get_contents("../test_info.json"), true);

        $dbconn = new mysqli($test_details['database']['host'], $test_details['database']['username'], $test_details['database']['password'], $test_details['database']['database_name'], $test_details['database']['port']);
        $test = new User($dbconn);

        $fakeusername = $test_details['dummy_user']['username'];
        $fakepassword = $test_details['dummy_user']['password'];
        $fakeemail = $test_details['dummy_user']['email'];
        $fakename = $test_details['dummy_user']['name'];
        $fakecode = hash("sha256", uniqid(rand()), true);

        $test->signup($fakeusername, $fakepassword, $fakeemail, $fakename, $fakecode);


    }

    public function testEmailSend() {
        $test_details = json_decode(file_get_contents("../test_info.json"), true);

        $dbconn = new mysqli($test_details['database']['host'], $test_details['database']['username'], $test_details['database']['password'], $test_details['database']['database_name'], $test_details['database']['port']);
        $test = new User($dbconn);

        //$test->send_mail();
    }
}