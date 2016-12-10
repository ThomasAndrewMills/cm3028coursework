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

<!-- PRELOADER -->
<div id="st-preloader">
    <div id="pre-status">
        <div class="preload-placeholder"></div>
    </div>
</div>
<!-- /PRELOADER -->


<!-- HEADER -->
<header id="header">
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
                <a class="logo" href="index.php"><b>GOPORTLETHEN</b></a>
            </div>

            <div class="collapse navbar-collapse" id="st-navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#header">Home</a></li>
                    <li><a href="#services">About</a></li>
                    <li><a href="#clubs">Clubs</a></li>
                    <li><a href="#our-team">Team</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="healthNews.php">Blog</a></li>
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
            <div style="float:left;width:65%;background-color: #5bc0de;display: inline-block;">
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

                        while ($row = $result->fetch_array()) {
                            // print out fields from row of data
                            echo("<h1>" . $row['name'] . "</h1>");
                        }
                        ?>
                        <span class="st-border"></span>
                    </div>
                </div>


                <?php
                //get and display events

                echo("<h2>About the club</h2>
                    <p>" . $row['description'] . "</p>");
                ?>

                <h2>Upcoming events</h2>
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
                    echo("<div style='margin-left:10px;margin-right:10px;'><h4>" . $row['Title'] . $row['Date'] . "</h4>
                      <p style='font-weight:bold;color:#707070;'>" . $row['Description'] . "</p></div>
            ");
                }


                echo("");
                ?>
            </div>
            <div style="display: inline-block;float:right;width:250px;background-color: #de9c5f;">
                <h4 class="sidebar-title">Post an Article</h4>
                <ul>
                    <a href="createNewsStory.php">Click here to post a new article.</a>
                </ul>
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