<?php
/**
 * Using PhpStorm.
 * (c) 2016 xiurobert
 * Created on 5/6/2016 at 8:03 PM
 */

// Template parser
// CITE: http://stackoverflow.com/questions/6842225/how-create-custom-variables-inside-html

function TemplateFunction ($template, $replaces) {
    // $template = file_get_contents(TEMPLATES_LOCATION . $template);
    if (is_array($replaces)) {
        foreach($replaces as $replacekey => $replacevalue){
            $template = str_replace('${' . $replacekey . '}', $replacevalue, $template);
        }
    }
    return $template;
}


