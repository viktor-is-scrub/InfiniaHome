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



            <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->


            <style>
                html {
                    position: relative;
                    min-height: 100%;
                }
                body {
                    /* Margin bottom by footer height */
                    margin-bottom: 60px;
                }
                .footer {
                    position: absolute;
                    bottom: 0;
                    width: 100%;
                    /* Set the fixed height of the footer here */
                    height: 60px;
                    background-color: #f5f5f5;
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
                        <a class="navbar-brand page-scroll" href="index.php">InfiniaPress</a>
                    </div>

                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                        <ul class="nav navbar-nav">
                            <li class="hidden"><a href="page-scroll"</li>
                            <li><a class="page-scroll" href="#about">About</a></li>
                            <li><a class="page-scroll" href="#use">Use</a></li>
                            <li><a class="page-scroll" href="#contact">Contact</a></li>
                        <?php // To add a nav link use a # for href. ?>
                        </ul>
                    </div>
                </div>
            </nav>



