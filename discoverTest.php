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


<!-- HEADER -->
<header id="header">


    <nav class="navbar st-navbar navbar-fixed-top">


        <!--<div style="text-align:left; font-size:30px;font-family: 'Raleway'" ;>
            <a class="logo" href="index.php"><b>GO PORTLETHEN</b></a>
        </div>-->

        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#st-navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
        </button>
        <nav class="navbar st-navbar navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#st-navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="logo" href="index.php"><b style="font-size: 20px;">GOPORTLETHEN</b></a>
                </div>
                <div class="collapse navbar-collapse" id="st-navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li><a href="#clubs">Clubs</a></li>
                        <li><a href="discover.php">Discover</a></li>
                        <li><a href="healthNews.php">healthy living</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">


                        <?php
                        session_start();
                        if (isset($_POST["logout"])) {
                            session_destroy();
                        }

                        ini_set('display_errors', 1);
                        ini_set('display_startup_errors', 1);
                        error_reporting(E_ALL);


                        if (isset($_SESSION['loginStatus'])) {
                            if ($_SESSION['loginStatus'] === TRUE) {
                                //check the email and password
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
                                $sql_query = "SELECT * FROM users WHERE emailAddress='" . $_SESSION['emailAddress'] . "' AND password='" . $_SESSION['password'] . "' LIMIT 1";
                                // execute the SQL query
                                $result = $db->query($sql_query);

                                $rowsFound = $result->num_rows;

                                while ($row = $result->fetch_array()) {
                                    // print out fields from row of data
                                    $_SESSION['displayName'] = $row['displayName'];
                                }

                                if ($rowsFound === 1) {

                                    $_SESSION['loginStatus'] = TRUE;
                                }

                                if ($rowsFound === 0) {
                                    $_SESSION['loginStatus'] = FALSE;
                                }

                                $result->close();
                                // close connection to database
                                $db->close();
                            }
                        }


                        if (isset($_POST["signin"])) {
                            $_SESSION['emailAddress'] = $_POST["email"];
                            $_SESSION['password'] = $_POST["password"];

                            //check the email and password
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
                            $sql_query = "SELECT * FROM users WHERE emailAddress='" . $_SESSION['emailAddress'] . "' AND password='" . $_SESSION['password'] . "' LIMIT 1";
                            // execute the SQL query
                            $result = $db->query($sql_query);

                            $rowsFound = $result->num_rows;

                            while ($row = $result->fetch_array()) {
                                // print out fields from row of data
                                $_SESSION['displayName'] = $row['displayName'];
                            }

                            if ($rowsFound === 1) {

                                $_SESSION['loginStatus'] = TRUE;
                            }

                            if ($rowsFound === 0) {
                                $_SESSION['loginStatus'] = FALSE;
                            }

                            $result->close();
                            // cl ose connection to database
                            $db->close();
                        }

                        if (isset($_SESSION['loginStatus'])) {
                            //if user is logged in display username
                            if ($_SESSION['loginStatus'] === TRUE) {
                                echo("Logged in as " . $_SESSION['displayName']);
                                //if user login was false
                            } elseif ($_SESSION['loginStatus'] === FALSE && isset($_POST["signin"])) {
                                echo('<li style="margin: 14px;"><b>' . "INCORRECT USERNAME OR PASSWORD" . '</b></li>');
                            } elseif ($_SESSION['loginStatus'] === FALSE) {
                                echo('<li style="margin: 14px;"><b>' . "YOU ARE NOT LOGGED IN" . '</b></li>');
                            }
                        } else {
                            echo('<li style="margin: 14px;"><b>' . "YOU ARE NOT LOGGED IN" . '</b></li>');
                        }


                        //if the signup form in submitted from createUser.php
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

                            <?php
                            if (isset($_SESSION['loginStatus']) && $_SESSION['loginStatus'] === TRUE) {
                                ?>
                                <form action="index.php" method="post" style="margin-top:10px;">
                                    <input style="font-weight: 600;border-radius: 5px;background-color: lightgray;"
                                           type="submit" value="LOGOUT" name="logout" class="button">
                                </form>
                                <?php
                            } else {
                                ?>
                                <form action="createUser.php" style="margin-top:10px;" >
                                    <input style="font-weight: 600;border-radius: 5px;background-color: lightgray;"
                                           type="submit" value="SIGN IN/SIGN UP" class="button">
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


<div id="floating-panel">
    <b>Start: </b>
    <select id="start">
        <option value="57.057814, -2.135943">Portlethen Academy</option>
        <option value="57.068341, -2.146797">Golf Course</option>
        <option value="57.057554, -2.108243">Portlethen Bay</option>
        <option value="57.063092, -2.139899">Asda Superstore</option>
        <option value="57.057750, -2.135994">Swimming pool</option>
        <option value="57.061551, -2.128097">Train Station</option>
        <option value="57.056754, -2.116575">Portlethen Village</option>
        <option value="57.062477, -2.128828">Portlethon Primary</option>
        <option value="57.068889, -2.107275">Findon</option>
    </select>
    <b>End: </b>
    <select id="end">
        <option value="57.057814, -2.135943">Portlethen Academy</option>
        <option value="57.068341, -2.146797">Golf Course</option>
        <option value="57.057554, -2.108243">Portlethen Bay</option>
        <option value="57.063092, -2.139899">Asda Superstore</option>
        <option value="57.057750, -2.135994">Swimming pool</option>
        <option value="57.061551, -2.128097">Train Station</option>
        <option value="57.056754, -2.116575">Portlethen Village</option>
        <option value="57.062477, -2.128828">Portlethon Primary</option>
        <option value="57.068889, -2.107275">Findon</option>
    </select>
</div>


<!-- map -->
<section id="map" style="height:700px;">
    <div class="container">
        <div class="row">
            <body>
            <div id="maptwo"></div>
            <script>
                function initMap() {
                    var directionsService = new google.maps.DirectionsService;
                    var directionsDisplay = new google.maps.DirectionsRenderer;
                    var map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 15,
                        center: {lat: 57.062009, lng: -2.129583}
                    });
                    directionsDisplay.setMap(map);

                    var onChangeHandler = function() {
                        calculateAndDisplayRoute(directionsService, directionsDisplay);
                    };
                    document.getElementById('start').addEventListener('change', onChangeHandler);
                    document.getElementById('end').addEventListener('change', onChangeHandler);
                }

                function calculateAndDisplayRoute(directionsService, directionsDisplay) {
                    directionsService.route({
                        origin: document.getElementById('start').value,
                        destination: document.getElementById('end').value,
                        travelMode: 'WALKING'
                    }, function(response, status) {
                        if (status === 'OK') {
                            directionsDisplay.setDirections(response);
                        } else {
                            window.alert('Directions request failed due to ' + status);
                        }
                    });
                }
            </script>
            <script async defer
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAF5a7_Ocmo66Y7fVALFlbUovbS2I_LeJ4&callback=initMap">
            </script>
            </body>
        </div>
    </div>
</section>
<!-- /map -->


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
                <p class="contact-content">Lorem ipssum dolor sit amet, consectetur adipisicing elit. Quae voluptatum dolorum, possimus tenetur pariatur officia, quo commodi autem doloribus vero rerum aspernatur quidem temporibus.</p>
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