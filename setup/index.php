<?php
/**
 * Using PhpStorm.
 * (c) 2016 xiurobert
 * Created on 9/19/2016 at 8:08 PM
 *
 *
 * ------------------------------------------------------------
 * InfiniaPress's Web Based Setup Utility
 *
 */

$phpIsOk = true;
$phpIsOkHtml = "";




?>

<!DOCTYPE html>
<html>
    <head>
        <title>Setup &#12298; InfiniaPress&#8482;</title>
    </head>
    <body>
        <h1>
            Welcome to InfiniaPress
        </h1>
        <p>
            Before we begin, please click on the button below to check that your server
            is compatible with InfiniaPress
        </p>
        <button id="check-sys" type="submit" formaction="index.php?a=csys">
            Check server
        </button>
        <div id="output">
            PHP Version: <?php echo phpversion();
            if (version_compare(phpversion(), "5.4", "<")) {
                $phpIsOk = false;
                echo '<img src="https://openclipart.org/image/2400px/svg_to_png/167549/Kliponious-green-tick.png" height="50">';
            } else {
                
            }
            ?>
            
        </div>
        
    </body>
</html>

