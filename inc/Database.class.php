<?php

/**
 * Created by PhpStorm.
 * User: Sophia
 * Date: 10/07/2016
 * Time: 07:12
 */
class Database {


    public function __construct() {
        require 'config.php';
        global private $host = $conf['db']['host'];
        $port = $conf['db']['port'];

        $passsword = $conf['db']['password'];
        $username = $conf['db']['username'];

        $dbname = $conf['db']['name'];

    }

    public function connectDb() {
        $this->dbconn() = null;
        try {
            $this->dbconn() = new mysqli($host, $username, $password, $dbname, $port);
        } catch ($this->mysqli_connect_errno()) {
            // COnfused
        }
    }

}