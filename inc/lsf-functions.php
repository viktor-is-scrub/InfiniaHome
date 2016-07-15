<?php
/**
 * Using PhpStorm.
 * (c) 2016 xiurobert
 * Created on 5/6/2016 at 8:11 PM
 */


// This is a suite of functions by LightningSF

/**
 * @deprecated
 * Echos a variable name
 * @param $varname String
 */

function put_var($varname) {
    if(isset(${$varname})) {
        echo ${$varname};
    }
}

/**
 * Throws a horrible noscript meta tag to redirect the user
 */
function throwNoJs() {
    $nstxt = "<noscript><meta http-equiv='refresh' content='0; url=/webpages/noscript.php' /> </noscript>";
    echo $nstxt;
}