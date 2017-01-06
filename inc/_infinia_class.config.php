<?php
/**
 * Using PhpStorm.
 * (c) 2016 xiurobert
 * Created on 9/19/2016 at 7:57 PM
 *
 *
 * InfiniaPress Configuration Storage.
 *
 * The old config.php is now deprecated
 */



class Config
{
    private static $SMTP_Config_vars = Array();
    private static $DB_Config_vars = Array();
    private static $SITE_Config_vars = Array();

    public function setSMTPVar($key, $value) {
        $arr = self::$SMTP_Config_vars;

        $arr[$key] = $value;

        self::$SMTP_Config_vars = $arr;

        // That's all. You expected more?
    }

    public function setDBVar($key, $value) {
        $arr = self::$DB_Config_vars;

        $arr[$key] = $value;

        self::$DB_Config_vars = $arr;
    }

    public function setSITEVar($key, $value) {
        $arr = self::$SITE_Config_vars;

        $arr[$key] = $value;

        self::$DB_Config_vars = $arr;
    }


    public function getDBVar($key) {
        $arr = self::$DB_Config_vars;

        return $arr[$key];
    }

    public function getSMTPVar($key) {
        $arr = self::$SMTP_Config_vars;

        return $arr[$key];
    }

    public function getSITEVar($key) {
        $arr = self::$SITE_Config_vars;

        return $arr[$key];
    }
}