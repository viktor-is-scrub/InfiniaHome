<?php
/**
 * Using PhpStorm.
 * (c) 2016 xiurobert
 * Created on 9/19/2016 at 8:12 PM
 *
 *
 * InfiniaPress Autoloader
 *
 * @reference ./PHPMailerAutoload.php
 *
 * @package InfiniaPress
 * @author xiurobert <me@derpz.tk>
 * @link https://github.com/InfiniaPress/InfiniaHome InfiniaPress Home page project | Github
 */

function Infinia_load_class($classname) {

    // Don't __DIR__ (PHP Magic Constant __DIR__ is not in PHP 5.3)

    $filename = dirname(__FILE__).DIRECTORY_SEPARATOR.'infinia_class.'.strtolower($classname).'.php';

    if (is_readable($filename)) {
        require $filename;
    }


}

if (version_compare(PHP_VERSION, '5.1.2', '>=')) {
    //SPL autoloading was introduced in PHP 5.1.2
    if (version_compare(PHP_VERSION, '5.3.0', '>=')) {
        spl_autoload_register('Infinia_load_class', true, true);
    } else {
        spl_autoload_register('Infinia_load_class');
    }
} else {
    /**
     * Fall back to traditional autoload for old PHP versions
     * @param string $classname The name of the class to load
     */
    function __autoload($classname)
    {
        Infinia_load_class($classname);
    }
}

