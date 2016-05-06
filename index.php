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
        [whatever you want in here. Shift your navigation bar here]
    </p>
</span>
<div id="top">
<img src="" width=40%>
<br><b id="greeting">Good morning</b><br>
<script>
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
<div id="intro">
    <b id="ad">
        SIMPLICITY  <br><i id="admini">is    power</i>
        <p id="adtext">Productivity apps for your work and personal life</p>
    </b>
    <a href="http://signup.infiniapress.tk"><button id="signup">Sign up</button></a>
</div>

        <section id="contact" class="contact-section">
            <div class="container">

                <!-- Script handling contacts -->

                <!-- Requires jQuery -->
                <script type="text/javascript" src="/assets/lsf/contact.js">

                </script>

                <div class="row">
                    <div class="col-lg-12">
                        <h1>Contact the developers</h1>
                        <form id="contact" method="post" action="back/contact_send.php">
                            <div class="field">
                                <label for="name">Name: </label>
                                <input type="text" id="name" name="name" required>
                            </div>

                            <div class="field">
                                <label for="email">Email: </label>
                                <input type="text" id="email" name="email" required>

                            </div>

                            <div class="field">
                                <label for="message">Message: </label>
                                <textarea id="message" name="message" required></textarea>

                            </div>


                            <div class="field">
                                <button type="submit">Send</button>
                            </div>
                        </form>

                        <div id="formMessages">

                        </div>
                    </div>
                </div>
            </div>
        </section>



<?php include('inc/footer.inc.php') ?>
