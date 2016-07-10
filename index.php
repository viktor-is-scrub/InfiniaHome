<?php
/**
 * Using PhpStorm.
 * (c) 2016 xiurobert and Keane Wong
 * Created on 4/28/2016 at 7:51 PM
 */
// Indent for HTML: 12 spaces (3x TAB)
include('inc/header.inc.php');
// Do not touch
require('inc/config.php');

// Very simple config checker
if ($conf['edited'] == false) {
    if ($conf_checker == false) {
        // Do nothing
    } else {
        die('Config is at default values! Please change the config file');
    }
}
require('inc/lsf-functions.php');
?>


            <!--<script src="/assets/lsf/scrollhax.js" type="text/javascript"></script>-->
            <!--
            <div id="page1">
                <a id="about" class="smooth"></a>
                InfiniaPress is an open-source, web-based productivity suite
            </div>
            <div id="page2">
                <a id="contact" class="smooth"></a>
                Fill in the form to contact us
                <form  id="contact" action="contact.php" method="POST">
                </form>
            </div>
            <div id="page3">
                <a id="use" class="smooth"></a>
                Products bundled into InfiniaPress include: Hansom, etc.
            </div>
            -->

            <span id="navigation-bar">
    <p>
        <!--[whatever you want in here. Shift your navigation bar here]-->
        <!-- Place About, Contact, and what we discussed today-->
    </p>
</span>
<div id="top">
<img src="assets/imgres/infinia-logo.png" width=40%>
<br><b id="greeting">Good morning</b><br>
<b id="welcome">Welcome to Infinia Press</b><br>
<script>
    var viewPortWidth = $(window).width();
    if (viewPortWidth > 800) {$("button").css("font-size", "20px")}
    console.log(viewPortWidth)
    var d = new Date()
    var time = d.getHours()
    if(time < 10) {
        document.getElementById("greeting").innerHTML = "Good Morning"
    }else if (time < 18) {
        document.getElementById("greeting").innerHTML = "Good Afternoon"
    }else{
        document.getElementById("greeting").innerHTML = "Good Evening"
    }
</script>
</div>
<section id="about">
<div>
    <b id="ad">
        SIMPLICITY  <br><i id="admini">is    power</i><br>
        <b id="adtext">Productivity apps for your work and personal life</b>
    </b>
    <br>
    <a href="<?php echo $conf['URL']['signup'] ?>"><button id="signup">Sign up</button></a>
</div>
</section>
<section id="apps">
	<div style="background-color:#ececec; padding:2% 0 2% 0; border-top:5px solid black; border-bottom: 5px solid black;">
		<h1>PASSENGER PIGEON</h1>
		<p>An elegant chat app with file sharing capabilities</p>
		<img src="assets/imgres/passenger_pigeon_1.png" height="250px">
	</div>
	<div style="background-color:#ececec; padding:2% 0 2% 0; border-top:5px solid black; border-bottom: 5px solid black;">
		<h1>HANSOM</h1>
		<p>A powerful note=taking application for memory</p>
		<img src="assets/imgres/hansom_1.png" height="250px">
	</div>
	<div style="background-color:#ececec; padding:2% 0 2% 0; border-top:5px solid black; border-bottom: 5px solid black;">
		<h1>TRACKTION</h1>
		<p>A beautiful timer for keeping track</p>
	</div>
</section>
<div class="se-pre-con">LOADING...</div>
<script>$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");
	});</script>
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
