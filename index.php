<?php
/**
 * Using PhpStorm.
 * (c) 2016 xiurobert
 * Created on 4/28/2016 at 7:51 PM
 */


// Indent for HTML: 12 spaces (3x TAB)
include('inc/header.inc.php');
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

            <section id="intro" class="intro-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>Welcome to InfiniaPress!</h1>
                            <p>The open source productivity suite</p>
                            <a class="btn btn-success page-scroll" href="#about">About Infinia</a>
                        </div>
                    </div>
                </div>
            </section>

        <section id="about" class="about-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>About Infinia</h1>
                        <p>Please wait for the developers to populate this area</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="use" class="use-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Use Infinia</h1>
                        <p class="lead">There are many products bundled with Infinia</p>
                        <p>Please wait for the developers to populate this area</p>
                    </div>
                </div>
            </div>
        </section>

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
