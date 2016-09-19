<?php
/**
 * Using PhpStorm.
 * (c) 2016 xiurobert
 * Created on 9/19/2016 at 8:12 PM
 */
class Autoloader {
    static public function loader($className) {
        $filename = "inc/" . str_replace("\\", '/', $className) . ".php";

        if (file_exists($filename)) {
            include($filename);
            if (class_exists($className)) {
                return TRUE;
            }
        }
        return FALSE;
    }
}

spl_autoload_register('Autoloader::loader()');
