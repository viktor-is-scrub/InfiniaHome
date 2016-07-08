<?php
/**
 * InfiniaPress Library Loader System
 * Written by xiurobert
 * This is an extremely hardcoded program and it is not advised you use it in your code
 */


    /**
     * Function to make a Web Library e.g. Bootstrap, jQuery etc.
     * @deprecated
     * @param String $path Links to the path of the library, relative to the location of the current file
     * @param String $alias Give the library an alias
     */
    $libraries = Array();
    $PHPLibraries = Array();
    
    
    
    function addWebLibrary($path, $alias) {
        array_push($libraries, $alias);
        $libraries[$alias] = $path;
        if (strpos($path, ".js")) {
            $libraries[$alias][$path] = true;
        } else if (strpos($path, ".css")) {
            $libraries[$alias][$path] = false;
        } else {
            return "Error: Library is neither JavaScript nor CSS";
        }
        
    }
    
    function addPHPLibrary($path, $alias) {
        array_push($PHPLibraries, $alias);
        $PHPLibraries[$alias] = $path;
    }
    
    $JSWebLibSyntax = "";
    
    function includeWebLibrary($alias) {
        
    }
 