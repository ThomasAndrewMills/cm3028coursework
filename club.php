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

</head>
<body>

<!-- PRELOADER
<div id="st-preloader">
    <div id="pre-status">
        <div class="preload-placeholder"></div>
    </div>
</div>
 /PRELOADER -->


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

<!-- SERVICES -->
<section id="services">
    <div class="container">
        <div class="row">
            <div style="float:left;width:auto;display: inline-block;max-width: 700px;margin-right:50px;">
                <div class="col-md-12">
                    <div class="section-title">

                        <?php
                        ini_set('display_errors', 1);
                        ini_set('display_startup_errors', 1);
                        error_reporting(E_ALL);

                        $clubid = $_GET["id"];


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
                        $sql_query = "SELECT * FROM clubs WHERE clubID = " . $clubid . "";
                        // execute the SQL query
                        $result = $db->query($sql_query);

                        //$rowsFound = $result->num_rows;
                        $clubDescription = "";
                        $activity = "";
                        $genre = "";
                        $meetingPlaceInfo = "";
                        $website = "";
                        $contactName = "";
                        $contactEmailAddress = "";
                        while ($row = $result->fetch_array()) {
                            // print out fields from row of data
                            echo("<h1>" . $row['name'] . "</h1>");
                            $clubDescription = $row['description'];
                            $activity = $row['activity'];
                            $genre = $row['genre'];
                            $meetingPlaceInfo = $row['meetingPlaceInfo'];
                            $website = $row['website'];
                            $contactName = $row['contactName'];
                            $contactEmailAddress = $row['contactEmailAddress'];
                        }
                        ?>
                        <span class="st-border"></span>
                    </div>
                </div>




                <?php

                echo('
                <div id="post-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        ');






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
                $sql_query = "SELECT * FROM media;";
                // execute the SQL query
                $result = $db->query($sql_query);

                //$rowsFound = $result->num_rows;
                while ($row = $result->fetch_array()) {
                    // print out fields from row of data

                    $counter = 0;
                    if(counter ===0){
                        echo('<div class="item active">
                               <img src="get_image.php?mediaID=' . $row['mediaID'] .'" alt="' . $row['caption'] . '">
                          </div>');
                    } else {
                        echo('<div class="item">
                               <img src="get_image.php?mediaID=' . $row['mediaID'] .'" alt="' . $row['caption'] . '">
                          </div>');
                    }
                    $counter++;
                }



                echo('  <a class="post-carousel-left" href="#post-carousel" data-slide="prev"><i
                                    class="fa fa-angle-left"></i></a>
                        <a class="post-carousel-right" href="#post-carousel" data-slide="next"><i
                                    class="fa fa-angle-right"></i></a>
                    </div>
                </div>');



                ?>





                <?php
                //get and display events

                echo("<div>
                    <h3>About the club</h3>
                    <p>" . $clubDescription . "</p></div>");
                ?>










                <h3 style="margin-top: 90px;">Upcoming events</h3>
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
                $sql_query = "SELECT * FROM events WHERE clubID = " . $clubid . "";
                // execute the SQL query
                $result = $db->query($sql_query);

                //$rowsFound = $result->num_rows;

                while ($row = $result->fetch_array()) {
                    // print out fields from row of data
                    echo("
                        <div style='margin-left:10px;margin-right:10px;background-color: #5bc0de;'>
                            <div style='float:left;display: display: inline;'>
                                <h5>" . $row['Title'] . "</h5>
                            </div>
                            <div style='float:right;display: display: inline;'>
                                <h5>" . $row['Date'] . "</h5>
                            </div>
                            <div style='float:left;'>
                                <p style='font-weight:bold;color:#707070;'>" . $row['Description'] . "</p>
                            </div>
                        </div>
                    ");
                }
                echo('</div>
                    <div style=\'display: inline-block;width:auto;float:left;max-width: 400px;margin-top:150px;\'>');

                if (isset($_SESSION['emailAddress'])) {
                    echo('<a href="#">
                              <form action="club.php?id=' . $clubid . '" method="post" style="display:inline;">
                                    <input style="margin-left:5px;display: inline;font-weight: 600;border-radius: 5px;background-color: #63ffb2;" type="submit" name="joinClub" class="button" value="Join Club">
                              </form>
                          </a>
                          <a href="editClub.php">
                              <div style="margin-left:5px;display: inline;font-weight: 600;border-radius: 5px;background-color: #63ffb2;padding-top:9px;padding-bottom:9px;" class="button">
                                   Edit Club
                              </div>
                          </a>
                          ');
                }

                echo("
                
            
            
                <h4 class='sidebar-title'>Activity</h4>
                <p>" . $activity . "</p>
                <h4 class=\"sidebar-title\">Genre</h4>
                <p>" . $genre . "</p>
                <h4 class=\"sidebar-title\">Times & Location</h4>
                <p>" . $meetingPlaceInfo . "</p>
                <h4 class=\"sidebar-title\">Website</h4>
                <a><p>" . $website . "</p></a>
                <h4 class=\"sidebar-title\">Contact Information</h4>
                <p>" . $contactName . "</p>
                <p>" . $contactEmailAddress . "</p>
            </div>
            
        ");
                ?>
            </div>
        </div>
    </div>
</section>
<!-- /SERVICES -->


<!-- FOOTER -->
<footer id="footer">
    <div class="container">
        <div class="row">
            <!-- SOCIAL ICONS -->
            <div class="col-sm-6 col-sm-push-6 footer-social-icons">
                <span>Follow us:</span>
                <a href="https://www.facebook.com/Portlethen-Sports-Club-703745156314817/club.php"><i
                            class="fa fa-facebook"></i></a>
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