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

/**
 * Template Parsing Class
 * Stolen (nah) from http://www.broculos.net/2008/03/how-to-make-simple-html-template-engine.html#.V67pdZN97BI
 * All credits to the original creator
 */
class TemplateFromFile {
    protected $file;
    protected $values = array();

    /**
     * TemplateFromFile constructor.
     * @param $file string The path to the file you want to use
     */

    public function __construct($file) {
        $this->file = $file;
    }

    /**
     * Sets and defines the keys in your template file
     * @param $key string The key that you used as a string in your template file
     * @param $value mixed The value that you want to resolve the key to after creating the output
     */
    public function set($key, $value) {
        $this->values[$key] = $value;
    }

    /**
     * Outputs the contents of your file
     * @return mixed|string Puts the contents of your file out
     */
    public function output() {
        if (!file_exists($this->file)) {
            return "Error loading template file ($this->file).";
        }
        $output = file_get_contents($this->file);

        foreach ($this->values as $key => $value) {
            $tagToReplace = "{#$key}";
            $output = str_replace($tagToReplace, $value, $output);
        }

        return $output;
    }
}

class TemplateFromString {
    protected $string;
    protected $values = array();

    /**
     * TemplateFromString constructor.
     * @param $string string that you want to parse with the template parser
     */

    public function __construct($string) {
        $this->string = $string;
    }

    /**
     * Sets and defines the keys in your template string
     * @param $key string The key that you used as a string in your template string
     * @param $value mixed The value that you want to resolve the key to after creating the output
     */

    public function set($key, $value) {
        $this->values[$key] = $value;
    }


    /**
     * Outputs the contents of your string
     * @return mixed|string Puts the contents of your string out
     */

    public function output() {
        if ($this->string == "") {
            return "Error: You tried to put in a blank string. WHY!!!!";
        }
        $output = $this->string;

        foreach ($this->values as $key => $value) {
            $tagToReplace = "{#$key}";
            $output = str_replace($tagToReplace, $value, $output);
        }

        return $output;
    }
}