<?php
/**
 * Using PhpStorm.
 * (c) 2016 xiurobert and Keane Wong
 * Created on 4/28/2016 at 7:51 PM
 */


// Indent for HTML: 12 spaces (3x TAB)
include("inc/header.inc.php");
// Do not touch
require("inc/config.php");
// Very simple config checker
if ($conf['edited'] == false) {
    if ($conf_checker == false) {
        // Do nothing
    } else {
        die('Config is at default values! Please change the config file');
    }
}
require("inc/lsf-functions.php");
// Pages that can be passed to index.php via GET
$parts = Array (
    "user-error",
    "user-unconfirmed",
	  "sys-error"
);
?>


<div class="se-pre-con"><br><br><br>Loading<i class="fa fa-spinner" aria-hidden="true"></i></div>
<script>$(window).load(function() {
		$(".se-pre-con").fadeOut("slow");
		var viewPortWidth = $(window).width();
    		if (viewPortWidth < 800) {$("button").css("font-size", "20px")}
    		console.log(viewPortWidth)
		// Animate loader off screen
	});
</script>
<!-- We are redoing our UI. The old UI is available in /old-ui.html-->

<section id="about">
    <div>
        <b id="ad">SIMPLICITY IS POWER</b>
        <br/>
        <b id="adtext">The simplest productivity suite ever</b>
    </div>
</section>

<section id="apps">
    <ul class="collapsible" data-collapsible="accordion">
        <li>
            <div class="collapsible-header"><h1>PASSENGER PIGEON</h1><img src="assets/imgres/passenger_pigeon_1.png" height="250px"></div>
            <div class="collapsible-body"><p>An elegant chat app with file sharing capabilities</p></div>
        </li>
        <li>
            <div class="collapsible-header"><h1>HANSOM</h1><img src="assets/imgres/hansom_1.png" height="250px"></div>
            <div class="collapsible-body"><p>A powerful note-taking application for memory (lol cant even fix a stupid obnoxious spacing)</p></div>
        </li>
        <li>
            <div class="collapsible-header"><h1>TRACKTION</h1></div>
            <div class="collapsible-body"><p>The timer that fixes everything</p></div>
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



<?php include('inc/footer.inc.php') ?>
