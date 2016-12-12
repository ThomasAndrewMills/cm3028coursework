<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <title>Go Portlethen</title>

    <!-- Main CSS file -->
    <link rel="stylesheet" href="cluster/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="cluster/css/owl.carousel.css"/>
    <link rel="stylesheet" href="cluster/css/magnific-popup.css"/>
    <link rel="stylesheet" href="cluster/css/font-awesome.css"/>
    <link rel="stylesheet" href="cluster/css/style.css"/>
    <link rel="stylesheet" href="cluster/css/responsive.css"/>

    <!-- Favicon -->
    <link rel="shortcut icon" href="cluster/images/icon/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
          href="cluster/images/icon/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
          href="cluster/images/icon/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
          href="cluster/images/icon/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="cluster/images/icon/apple-touch-icon-57-precomposed.png">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Begin Cookie Consent plugin by Silktide - http://silktide.com/cookieconsent -->
    <link rel="stylesheet" type="text/css"
          href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css"/>
    <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js"></script>
    <script>
        window.addEventListener("load", function () {
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
            })
        });
    </script>

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
                    <a class="logo" href="index.php"><b style="font-size: 20px;">GO PORTLETHEN</b></a>
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
                        //if the signup form in submitted from createUser.php
                        if (isset($_POST["createClub"])) {
                            $phoneNumber            = $_POST["phoneNumber"];
                            $contactName            = $_POST["contactName"];
                            $website                = $_POST["website"];
                            $meetingPlaceInfo       = $_POST["meetingPlaceInfo"];
                            $contactEmailAddress    = $_POST["contactEmailAddress"];
                            $activity               = $_POST["activity"];
                            $genre                  = $_POST["genre"];
                            $aboutClub              = $_POST["aboutClub"];
                            $clubName               = $_POST["clubName"];
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
                            $sql_query = "INSERT INTO clubs (name, about, genre, activity, contactEmailAddress, meetingPlaceInfo, website, contactName, phoneNumber)
                                          VALUES ('$clubName','$aboutClub','$genre','$activity','$contactEmailAddress','$meetingPlaceInfo','$website','$contactName','$phoneNumber')";
                            // execute the SQL query
                            if ($db->query($sql_query) === TRUE) {
                                echo "Club creation successful!";
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


<!-- SLIDER -->
<section id="slider">
    <div id="home-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="item active" style="background-image: url(cluster/images/slider/01.jpg)">
                <div class="carousel-caption container">
                    <div class="row">
                        <div class="col-sm-7">
                            <h1>Discover</h1>
                            <h2>North Kincardineshireohtrughtrsuhgjdog</h2>
                            <p style="color:white;font-weight: normal;">Discover new places and plan your routes around Portlethen</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item" style="background-image: url(cluster/images/slider/02.jpg)">
                <div class="carousel-caption container">
                    <div class="row">
                        <div class="col-sm-7">
                            <h1>Sports in your area</h1>
                            <h2>stay active</h2>
                            <p style="color:white;font-weight: normal;">Discover sports and clubs in the Portlethen Community</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item" style="background-image: url(cluster/images/slider/03.jpg)">
                <div class="carousel-caption container">
                    <div class="row">
                        <div class="col-sm-7">
                            <h1>health and wellbeing</h1>
                            <h2>be healthy</h2>
                            <p style="color:white;font-weight: normal;">Discover the latest news and information to ensure a healthy lifestyle</p>
                        </div>
                    </div>
                </div>
            </div>
            <a class="home-carousel-left" href="#home-carousel" data-slide="prev"><i class="fa fa-angle-left"></i></a>
            <a class="home-carousel-right" href="#home-carousel" data-slide="next"><i class="fa fa-angle-right"></i></a>
        </div>
    </div> <!--/#home-carousel-->
</section>
<!-- /SLIDER -->


<!-- SERVICES -->
<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <br>
                    <br>
                    <br>
                    <br>
                    <h1>What is Go Portlethen?</h1>
                    <span class="st-border"></span>
                </div>
            </div>

            <?php
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
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
            $sql_query = "SELECT * FROM introductorytext";
            // execute the SQL query
            $result = $db->query($sql_query);
            //$rowsFound = $result->num_rows;
            while ($row = $result->fetch_array()) {
                // print out fields from row of data
                echo("
                    <div style='display: inline-block;width: 320px;height: 150px;'>
                        <h5>" . $row['heading'] . "</h5>
                        <p style=\"font-weight:normal;\">" . $row['text'] . "</p>
                    </div>");
            }
            ?>

        </div>
        <br>
        <br>
        <br>
    </div>
</section>
<!-- /SERVICES -->

<!-- FUN FACTS -->
<section id="fun-facts">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <div class="fun-fact text-center">
                    <!--GETTING AMOUNT OF CLUBS-->
                    <?php
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
                    $sql_query = "SELECT * FROM clubs;";
                    // execute the SQL query
                    $result = $db->query($sql_query);
                    $rowsFound = $result->num_rows;
                    echo('<h3><span class="st-counter">' . $rowsFound . '</span></h3>');
                    ?>
                    <p>Clubs</p>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="fun-fact text-center">
                    <!--GETTING AMOUNT OF USERS-->
                    <?php
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
                    $sql_query = "SELECT * FROM users;";
                    // execute the SQL query
                    $result = $db->query($sql_query);
                    $rowsFound = $result->num_rows;
                    echo('<h3><span class="st-counter">' . $rowsFound . '</span></h3>');
                    ?>
                    <p>Members</p>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="fun-fact text-center">
                    <!--GETTING AMOUNT OF GENRES-->
                    <?php
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
                    $sql_query = "SELECT * FROM genre;";
                    // execute the SQL query
                    $result = $db->query($sql_query);
                    $rowsFound = $result->num_rows;
                    echo('<h3><span class="st-counter">' . $rowsFound . '</span></h3>');
                    ?>
                    <p>Club Genres</p>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="fun-fact text-center">
                    <h3><span class="st-counter">0</span></h3>
                    <p>Locations of Interest</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /FUN FACTS -->

<!-- OUR WORKS -->
<section id="clubs">
    <br>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h1>WHY WONT THIS WORK!!!</h1>
                    <span class="st-border"></span>
                    <form action="createClub.php" style="margin-top:10px;">
                        <input style="font-weight: 600;border-radius: 5px;background-color: #63ffb2;" type="submit" value="Create Club" class="button">
                    </form>
                </div>
            </div>

            <div class="portfolio-wrapper">
                <div class="col-md-12">
                    <ul class="filter">
                        <li><a class="active" href="#" data-filter="*">All</a></li>

                        <?php
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
                        $sql_query = "SELECT * FROM genre";
                        // execute the SQL query
                        $result = $db->query($sql_query);
                        //$rowsFound = $result->num_rows;
                        while ($row = $result->fetch_array()) {
                            echo('
                                <li><a href="#" data-filter=".' . $row['genre'] . '">' . $row['genre'] . '</a></li>
                            ');
                        }
                        ?>

                    </ul><!--/#portfolio-filter-->
                </div>

                <div class="portfolio-items">
                    <?php
                    ini_set('display_errors', 1);
                    ini_set('display_startup_errors', 1);
                    error_reporting(E_ALL);
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
                    $sql_query = "SELECT * FROM clubs";
                    // execute the SQL query
                    $result = $db->query($sql_query);
                    //$rowsFound = $result->num_rows;
                    while ($row = $result->fetch_array()) {
                        // print out fields from row of data
                        echo('
                            
                                
                                <div class="col-md-4 col-sm-6 work-grid ' . $row['genre'] . '">
                                    <a href="club.php?id='. $row['clubID'] .'">
                                    <div class="portfolio-content">
                                        <img class="img-responsive" src="cluster/images/works/tennis.jpg" alt="">
                                        <div class="portfolio-overlay">
                                            <br><br>' . $row['name'] . '<br>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                                
                            ');
                    }
                    ?>


                </div>
            </div>
        </div>
    </div>
</section>
<!-- /OUR WORKS -->





<!-- TESTIMONIAL -->
<section id="testimonial">
    <div class="container">
        <div class="row">
            <div class="overlay"></div>
            <div class="col-md-8 col-md-offset-2 col-sm-12">
                <div class="st-testimonials">

                    <?php
                    ini_set('display_errors', 1);
                    ini_set('display_startup_errors', 1);
                    error_reporting(E_ALL);
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
                    $sql_query = "SELECT * FROM testimonials";
                    // execute the SQL query
                    $result = $db->query($sql_query);
                    //$rowsFound = $result->num_rows;
                    while ($row = $result->fetch_array()) {
                        // print out fields from row of data
                        echo("<div class='item active text-center'>
                                    <p style='color:white;font-weight: normal;'>" . $row['testimonial'] ."</p>
                                    <div class=\"st-border\"></div>
                                    <div class=\"client-info\">
                                        <h5>" . $row['name'] . "</h5>
                                        <span></span>
                                    </div>
                            </div>");
                    }
                    ?>


                </div>
            </div>
        </div>
    </div>
</section>
<!-- /TESTIMONIAL -->

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
                <p class="st-phone"><i class="fa fa-mobile"></i> <strong>+00 123-456-789</strong></p>
                <p class="st-email"><i class="fa fa-envelope-o"></i> <strong>goportlethen@email.com</strong></p>
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
                <a href="https://www.facebook.com/"><i
                        class="fa fa-facebook"></i></a>
                <a href="https://www.twitter.com/"><i class="fa fa-twitter"></i></a>
            </div>
            <!-- /SOCIAL ICONS -->
            <div class="col-sm-6 col-sm-pull-6 copyright">
                <p>&copy; 2015 <a href="">ShapedTheme</a>. All Rights Reserved.</p>
                <p> Logo <a href='http://www.freepik.com/free-vector/watercolor-running-man_715978.htm'>esigned by Freepik</a> </p>
            </div>
        </div>
    </div>
</footer>
<!-- /FOOTER -->



<!-- Scroll-up -->
<div class="scroll-up">
    <ul>
        <li><a href="#header"><i class="fa fa-angle-up"></i></a></li>
    </ul>
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