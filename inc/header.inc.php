<?php
/**
 * Using PhpStorm.
 * (c) 2016 xiurobert and Keane Wong
 * Created on 4/28/2016 at 9:08 PM
 */

?>
<!DOCTYPE html>
    <html lang="en">
        <head>
            <noscript>
                <!-- If you're a dick and don't enable javascript, we'll FORCE YOU to enable javascript -->
                <meta http-equiv="refresh" content="0;URL='infiniapress.tk/webpages/noscript.php" />    
            </noscript>
            

            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <title>Welcome to InfiniaPress!</title>

            <meta name="author" content="InfiniaDev Team">
            <meta name="description" content="InfiniaPress open-source Productivity suite">

            <!-- bs CSS -->
            <link rel="stylesheet" href="assets/css/bootstrap.min.css">

            <!-- jQ -->
            <script type="text/javascript" src="assets/js/jquery-2.2.3.min.js"></script>

            <!-- Bs JS -->
            <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

            <!-- custom CSS & JS -->
            <link rel="stylesheet" href="assets/lsf/scrolling-nav.css">
            <link rel="stylesheet" href="assets/lsf/contact.css">

            <script type="text/javascript" src="assets/lsf/scrolling-nav.js"></script>
            
            <script src='https://www.google.com/recaptcha/api.js'></script>



            <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->


            <style>
                html {
                    position: relative;
                    min-height: 100%;
                    font-family: "arial";
                    text-align: center
                }
                .se-pre-con {
        		position: fixed;
        		left: 0px;
        		top: 0px;
        		width: 100%;
        		height: 100%;
        		z-index: 999999999999999999999999999999999999999999999999999999999999999999999999999999999999;
        		background: white;
        		font-size: 80px;
        		text-align: center
    		}
                nav{
                    position: fixed;
                }
                body {
                    /* Margin bottom by footer height */
                    margin-top: 70px;
                    margin-bottom: 60px;
                }
                .footer {
                    position: absolute;
                    width: 100%;
                    /* Set the fixed height of the footer here */
                    height: 60px;
                    background-color: #f5f5f5;
                    font-size: 20px;
                }
                #greeting{
                text-shadow:
     		    -1px -1px 0 #000,
      		    1px -1px 0 #000,
      		    -1px 1px 0 #000,
       		    1px 1px 0 #000;
                    font-size: 80px;
                    color: white;
                    opacity: 0.9;
                    z-index: -1;
                }
                #navigation-bar{
                    position: fixed;
                    background: #eaeaea;
                    width: 100%;
                    height: 60px;
                    top: 0;
                    left: 0;
                }
                #top{
                    background-size: cover;
                    background-image: url("http://digitalresult.com/wp-content/uploads/2016/01/sunset-hd-wallpapers-15.jpeg");
                }
                #ad{
                    color: white;
                    font-size: 90px;
                    line-height: 100px;
                }
                #admini{
                    font-size: 40px;
                }
                #welcome{
                    color: white;
                text-shadow:
     		    -1px -1px 0 #000,
      		    1px -1px 0 #000,
      		    -1px 1px 0 #000,
       		    1px 1px 0 #000;
                    font-size: 40px;
                }
                #about{
                text-shadow:
     		    -1px -1px 0 #000,
      		    1px -1px 0 #000,
      		    -1px 1px 0 #000,
       		    1px 1px 0 #000;
                    background-size: cover;
                    background-image: url("assets/imgres/water-landscape.png");
                }
                #adtext{
                    font-family: "times new roman";
                    font-size: 25px;
                }
                #signup{
                    border-radius: 50%;
                    background-color: #00FF04;
                    border-color: #00FF04;
                    color: white;
                    font-size: 40px;
                    transition-duration: 0.4s;
                    width: 25%;
                    height: 80px;
                }
                #signup:hover{
                    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
                    background-color: red;
                    border-color: red;
                }
                .app{
                    background-color:#ececec;
					transition-duration: 0.5s;
                }
                .app:hover{
                    background-color: #c7c7c7;
                }
            </style>
        </head>
        <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
            <nav class="navbar navbar-fixed-top navbar-default" role="navigation">
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
                            <li class="hidden"><a class="page-scroll" href="#page-top"></a></li>
                            <li><a class="page-scroll" href="#about">About</a></li>
                            <li><a class="page-scroll" href="#apps">Apps</a></li>
                        <?php // To add a nav link use a # for href. ?>
                        </ul>
                    </div>
                </div>
            </nav>



