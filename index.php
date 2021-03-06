<?php
/**
 * Using PhpStorm.
 * (c) 2016 xiurobert and Keane Wong
 * Created on 4/28/2016 at 7:51 PM
 */

require_once(dirname(__FILE__)."/inc/InfiniaAutoloader.php");
date_default_timezone_set("Asia/Singapore");

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


<!DOCTYPE html>
<html lang="en">
<head>
    
  <noscript>
      <meta http-equiv="refresh" content="0;URL='infinia.press/webpages/noscript.php" />
  </noscript>


  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Welcome to InfiniaPress!</title>

  <meta name="author" content="InfiniaDev Team">
  <meta name="description" content="InfiniaPress open-source Productivity suite">
    
  <!-- jQuery -->
  <script type="text/javascript" src="assets/js/jquery-2.2.3.min.js"></script>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

  <!-- custom CSS & JS. -->
  <link rel="stylesheet" href="assets/css/infinia.css">

  <!-- Smooth Scrolling JS from SmoothScrollJS -->
  <script type="text/javascript" src="assets/js/smooth-scroll.min.js"></script>

  <!-- Materialized CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>

  <!-- Font Awesome from Font Awesome -->
  <link rel="stylesheet" href="assets/css/font-awesome.min.css">
  
  <!-- Custom font -->
  <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">

  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    
    
  <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
  
  <style>
    html * {
      font-family: Arial !important;
    }
    #missionInfo {
      font-size: 25px;
    }
    #about {
      -webkit-text-stroke-width: 1px;
      -webkit-text-stroke-color: black;
      background: rgba(0,0,0,.5);
      background-image: url('http://666a658c624a3c03a6b2-25cda059d975d2f318c03e90bcf17c40.r92.cf1.rackcdn.com/unsplash_527bf56961712_1.JPG');
      
      padding-top: 5%;
    }
    #about h1{
      color: white;
    }
    #about p{
      color: white;
    }
    #about b{
      color: white;
    }
  </style>
</head>

<div id="loader-wrapper">
    <div class="loader">Prepare to be blown away.</div>
    <script>
        $(document).ready(function() {
          $("#bgimage").parallax();
          $(".loader").animate({
             opacity: 0,
             top: "20px"
          }, 1000, function(){
              $(".loader").fadeOut("fast");
              $("body").animate({
                opacity: 1,
                top: "0px",
            }, 1000);
         });
           
        });
    </script>
</div>
  
  
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
<nav class="navbar navbar-fixed-top navbar-inverse" role="navigation">
    <div class="container">
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand page-scroll" href="#page-top">InfiniaPress</a>
        </div>

        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li class="hidden"><a data-scroll class="page-scroll" href="#page-top"></a></li>
                <li><a data-scroll class="page-scroll" href="#about">About Infinia</a></li>
                <li><a data-scroll class="page-scroll" href="#mission">Our Mission</a></li>
                <li><a data-scroll class="page-scroll" href="#apps">The Apps</a></li>
                <li><a href="/webpages/signup/index.php">Sign up</a></li>
                <li><a href="/webpages/login.php">Log in</a></li>
            </ul>
        </div>
    </div>
</nav>

<section id="about" data-scroll>
    <h1 id="informhead">Welcome to InfiniaPress</h1>
    <b id="inform">The world's first and only open source web productivity suite.</b>
    <p id="informini">Completely free, forever.</p>
</section>
<div id="bgimage"></div>  
<section id="mission" data-scroll>
  <h1>
    Our Mission 
  </h1>
  <p id="missionInfo">
    We've been where you were. Amazing software, but for massive prices. So, we've created software of the same sublime quality, for free. Forever.
  </p>
</section>

<section id="apps" data-scroll>
    <ul class="collapsible popout appz" data-collapsible="accordion">
        <li>
            <div class="collapsible-header center"><b>PASSENGER PIGEON</b><br /><img src="assets/imgres/passenger_pigeon_1.png" height="250px"></div>
            <div class="collapsible-body center"><p>An elegant chat app with file sharing capabilities</p></div>
        </li>
        <li>
            <div class="collapsible-header center"><b>HANSOM</b><br /><img src="assets/imgres/hansom_1.png" height="250px"></div>
            <div class="collapsible-body center"><p>A powerful note-taking application for memory</p></div>
        </li>
        <li>
            <div class="collapsible-header center"><b>SPECTRUM [Singapore Only]</b><br /></div>
            <div class="collapsible-body center"><p>The ultimate MRT tracking app</p></div>
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



<footer class="footer">
    <div class="container center">
        <p class="text-muted">
            &copy; InfiniaTeam <?php echo date('Y') ?>.
        </p>
    </div>
</footer>

<script type="text/javascript">
    smoothScroll.init();
</script>

</body>
</html>

