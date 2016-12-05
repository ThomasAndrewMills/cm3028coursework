<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <title>Go Portlethen</title>

    <!-- Main CSS file -->
    <link rel="stylesheet" href="cluster/css/bootstrap.min.css" />
    <link rel="stylesheet" href="cluster/css/owl.carousel.css" />
    <link rel="stylesheet" href="cluster/css/magnific-popup.css" />
    <link rel="stylesheet" href="cluster/css/font-awesome.css" />
    <link rel="stylesheet" href="cluster/css/style.css" />
    <link rel="stylesheet" href="cluster/css/responsive.css" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="cluster/images/icon/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="cluster/images/icon/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="cluster/images/icon/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="cluster/images/icon/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="cluster/images/icon/apple-touch-icon-57-precomposed.png">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Begin Cookie Consent plugin by Silktide - http://silktide.com/cookieconsent -->
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js"></script>
    <script>
        window.addEventListener("load", function(){
            window.cookieconsent.initialise({
                "palette": {
                    "popup": {
                        "background": "#3c404d",
                        "text": "#d6d6d6"
                    },
                    "button": {
                        "background": "#8bed4f"
                    }
                },
                "theme": "edgeless",
                "position": "bottom-right",
                "content": {
                    "message": "Our website uses cookies to make your browsing experience better. By using our site you agree to our use of cookies.",
                    "dismiss": "Close and don't show again"
                }
            })});
    </script>


    <!--Linking the website to to the jQuery library-->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

</head>
<body>

<!-- PRELOADER -->
<!--<div id="st-preloader">
    <div id="pre-status">
        <div class="preload-placeholder"></div>
    </div>
</div>-->
<!-- /PRELOADER -->









                    //-------------------------







                    //-------------------------
                    if (isset($_POST["signup"])) {
                        $name = $_POST["name"];
                        $password = $_POST["password"];
                        $emailAddress = $_POST["emailAddress"];
                        $displayName = $_POST["displayName"];


                        // connect to server and select database
                        $db = new mysqli(
                            "eu-cdbr-azure-west-a.cloudapp.net",
                            "bd2505ec24d031",
                            "a0a7a671",
                            "goportlethendb"
                        );
                        // test if connection was established, and print any errors
                        if ($db->connect_errno) {
                            die('Connectfailed[' . $db->connect_error . ']');
                        }
                        // create a SQL query as a string
                        $sql_query = "INSERT INTO users (name, password, emailAddress,displayName)
                                          VALUES ('$name', '$password', '$emailAddress','$displayName')";
                        // execute the SQL query
                        if ($db->query($sql_query) === TRUE) {
                            echo "Signup successful!";
                        } else {
                            echo "Error: " . $sql_query . "<br>" . $db->error;
                        }

                        $db->close();
                    }
                    ?>
                    <li>
                        <form action="createUser.php" style="margin-top:10px;">
                            <input style="font-weight: 600;border-radius: 5px;background-color: lightgray;" type="submit" value="SIGN IN/SIGN UP">
                        </form>
                        <?php
                        if($_SESSION['loginStatus'] === TRUE){
                            ?>
                            <form action="index.php" method="post" style="margin-top:10px;">
                                <input style="font-weight: 600;border-radius: 5px;background-color: lightgray;" type="submit" value="LOGOUT" name="logout">
                            </form>
                            <?php
                        }
                        ?>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </nav>
</header>
<!-- /HEADER -->






<!-- SERVICES -->
<section id="about">
    <div class="container">
        <div class="row">
            <span>map:</span>
            <iframe src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d5159.784833468939!2d-2.138763790380598!3d57.06142452334523!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e2!4m5!1s0x48841ab90acc3fe1%3A0xb0453db6dd8efa82!2sBurnside+Park!3m2!1d57.0647538!2d-2.1301532!4m5!1s0x48841adafc0e618b%3A0x9a05970434f4edd!2sPortlethen+Swimming+Pool%2C+Oak+Dr%2C+Portlethen%2C+Aberdeen+AB12+4UR!3m2!1d57.05667!2d-2.1344160999999997!5e0!3m2!1sen!2suk!4v1480949772901" width="800" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
            <div class="col-md-12">
                <div class="section-title">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /SERVICES -->


<!-- CONTACT -->
<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h1>Contact us</h1>
                    <span class="st-border"></span>
                </div>
            </div>
            <div class="col-sm-4 contact-info">
                <p class="contact-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae voluptatum dolorum, possimus tenetur pariatur officia, quo commodi autem doloribus vero rerum aspernatur quidem temporibus.</p>
                <p class="st-address"><i class="fa fa-map-marker"></i> <strong>E71 8th Ave, New York NY 21001, US</strong></p>
                <p class="st-phone"><i class="fa fa-mobile"></i> <strong>+00 123-456-789</strong></p>
                <p class="st-email"><i class="fa fa-envelope-o"></i> <strong>email@yourdomain.com</strong></p>
                <p class="st-website"><i class="fa fa-globe"></i> <strong>www.yourdomain.com</strong></p>

            </div>
            <div class="col-sm-7 col-sm-offset-1">
                <form action="cluster/php/send-contact.php" class="contact-form" name="contact-form" method="post">
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="text" name="name" required="required" placeholder="Name*">
                        </div>
                        <div class="col-sm-6">
                            <input type="email" name="email" required="required" placeholder="Email*">
                        </div>
                        <div class="col-sm-6">
                            <input type="text" name="subject" placeholder="Subject">
                        </div>
                        <div class="col-sm-6">
                            <input type="text" name="website" placeholder="Website">
                        </div>
                        <div class="col-sm-12">
                            <textarea name="message" required="required" cols="30" rows="7" placeholder="Message*"></textarea>
                        </div>
                        <div class="col-sm-12">
                            <input type="submit" name="submit" value="Send Message" class="btn btn-send">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- /CONTACT -->

<!-- FOOTER -->
<footer id="footer">
    <div class="container">
        <div class="row">
            <!-- SOCIAL ICONS -->
            <div class="col-sm-6 col-sm-push-6 footer-social-icons">
                <span>Follow us:</span>
                <a href="https://www.facebook.com/Portlethen-Sports-Club-703745156314817/"><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-twitter"></i></a>
            </div>
            <!-- /SOCIAL ICONS -->
            <div class="col-sm-6 col-sm-pull-6 copyright">
                <p>&copy; 2015 <a href="">ShapedTheme</a>. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>
<!-- /FOOTER -->


<!-- Scroll-up -->
<div class="scroll-up">
    <ul><li><a href="#header"><i class="fa fa-angle-up"></i></a></li></ul>
</div>


<!-- JS -->
<script type="text/javascript" src="cluster/js/jquery.min.js"></script><!-- jQuery -->
<script type="text/javascript" src="cluster/js/bootstrap.min.js"></script><!-- Bootstrap -->
<script type="text/javascript" src="cluster/js/jquery.parallax.js"></script><!-- Parallax -->
<script type="text/javascript" src="cluster/js/smoothscroll.js"></script><!-- Smooth Scroll -->
<script type="text/javascript" src="cluster/js/masonry.pkgd.min.js"></script><!-- masonry -->
<script type="text/javascript" src="cluster/js/jquery.fitvids.js"></script><!-- fitvids -->
<script type="text/javascript" src="cluster/js/owl.carousel.min.js"></script><!-- Owl-Carousel -->
<script type="text/javascript" src="cluster/js/jquery.counterup.min.js"></script><!-- CounterUp -->
<script type="text/javascript" src="cluster/js/waypoints.min.js"></script><!-- CounterUp -->
<script type="text/javascript" src="cluster/js/jquery.isotope.min.js"></script><!-- isotope -->
<script type="text/javascript" src="cluster/js/jquery.magnific-popup.min.js"></script><!-- magnific-popup -->
<script type="text/javascript" src="cluster/js/scripts.js"></script><!-- Scripts -->


</body>
</html>