<?php
/**
 * Using PhpStorm.
 * (c) 2016 xiurobert and Keane Wong
 * Created on 4/28/2016 at 7:51 PM
 */


// Indent for HTML: 12 spaces (3x TAB)
require_once(dirname(__FILE__)."/inc/header.inc.php");
require_once(dirname(__FILE__)."/inc/InfiniaAutoloader.php");

if (file_exists(dirname(__FILE__)."/InfiniaLegit.config.php")) {
    require_once(dirname(__FILE__)."/InfiniaLegit.config.php");
} else {
    require_once(dirname(__FILE__)."/inc/config.php");
}


if ($conf['edited'] == false) {
    die('Config is at default values! Please change the config file');
}

// Pages that can be passed to index.php via GET
$pgs = Array (
    "user-error",
    "user-unconfirmed",
    "sys-error"
);
?>

<div class="se-pre-con">
    <div class="loader">Loading</div>
    <script>
        $(document).ready(function() {
            $(".se-pre-con").fadeOut("slow");
        });
    </script>
</div>

<section id="about" data-scroll>
    <div class="ad center">
        <p id="ad">SIMPLICITY IS POWER</p>
        <p>Prepare to be blown away</p>
    </div>
</section>

<section id="apps" data-scroll>
    <ul class="collapsible" data-collapsible="accordion">
        <li>
            <div class="collapsible-header center"><b>PASSENGER PIGEON</b><br><img src="assets/imgres/passenger_pigeon_1.png" height="250px"></div>
            <div class="collapsible-body center"><p>An elegant chat app with file sharing capabilities</p></div>
        </li>
        <li>
            <div class="collapsible-header center"><b>HANSOM</b><br><img src="assets/imgres/hansom_1.png" height="250px"></div>
            <div class="collapsible-body center"><p>A powerful note-taking application for memory</p></div>
        </li>
        <li>
            <div class="collapsible-header center"><b>SPECTRUM (Singapore only)</b><br></div>
            <div class="collapsible-body center"><p>All the train lines, in your pocket</p></div>
        </li>
    </ul>
</section>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/577f4551074866632d96d55b/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->



<?php include(dirname(__FILE__).'/inc/footer.inc.php'); ?>
