<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Cluster - Creative Portfolio HTML Template</title>

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
                        <li><a href="#header">Home</a></li>
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
                                <form action="createUser.php" style="margin-top:10px;">
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


<!-- PAGE HEADER -->
<section id="page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h1>Healthy Living Blog</h1>
                    <span class="st-border"></span>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /PAGE HEADER -->


<!-- BLOG -->
<section id="blog">
    <div class="container">
        <div class="row">
            <div class="col-md-9">


                <?php
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);


                if (isset($_POST["createNews"])) {
                    $articleTitle = $_POST["articleTitle"];
                    $articleText = $_POST["articleText"];
                    $articleAuthor = $_SESSION["emailAddress"];


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
                    $sql_query = "INSERT INTO healthnews (title, content, emailAddress)
                                          VALUES ('$articleTitle', '$articleText', '$articleAuthor');";
                    // execute the SQL query
                    if ($db->query($sql_query) === TRUE) {
                        echo "Upload successful!";
                    } else {
                        echo "Error: " . $sql_query . "<br>" . $db->error;
                    }

                    $db->close();
                }


                if (isset($_POST["editArticle"])) {
                    $articleTitle = $_POST["articleTitle"];
                    $articleText = $_POST["articleText"];
                    $articalID = $_POST["articalID"];
                    $articleAuthor = "AUTHOR";


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
                    $sql_query = "UPDATE healthnews SET title='" . $articleTitle . "', content='" . $articleText . "' WHERE articleID='" . $articalID ."';";
                    // execute the SQL query
                    if ($db->query($sql_query) === TRUE) {
                        echo "Upload successful!";
                    } else {
                        echo "Error: " . $sql_query . "<br>" . $db->error;
                    }

                    $db->close();
                }


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
                $sql_query = "SELECT * FROM healthnews LIMIT 20";
                // execute the SQL query
                $result = $db->query($sql_query);

                //$rowsFound = $result->num_rows;

                while ($row = $result->fetch_array()) {
                    // print out fields from row of data
                    echo(
                        '<div class="single-blog"style="display: block;">
						<article style="-webkit-box-shadow: 0px 0px 18px 5px rgba(0,0,0,0.4);-moz-box-shadow: 0px 0px 18px 5px rgba(0,0,0,0.4);box-shadow: 0px 0px 18px 5px rgba(0,0,0,0.4);">
							<div class="post-thumb"><img class="img-responsive" src="cluster/images/blog/01.jpg" alt=""></div>
							<div style="padding:5px;">
                                <div style="float:left;display:block;width:100%;margin:5px;">
                                        <a href="editNewsStory.php?id=' . $row['articleID'] . '">
                                            <div style="display: inline;font-weight: 600;border-radius: 5px;background-color: #63ffb2;" class="button">
                                                Edit Article
                                            </div>
                                        </a>
                                    <form action="#" style="display: inline;">
                                        <input style="font-weight: 600;border-radius: 5px;background-color: #63ffb2;" type="submit" value="Delete Article" class="button">
                                    </form>
                                </div>
                                
                                <div style="float:left;display:block;width:100%;">
                                    <h4 class="post-title" style="">' . $row['title'] . '</h4>
                                </div>
                                
                                <div class="post-meta text-uppercase" style="display:block;">
                                    <span>By <a href="">' . $row['emailAddress'] . '</a></span>
                                    <span>' . $row['date'] . '</span>
                                </div>						
                                
                                <div class="post-article" style="display: block;">
                                    ' . $row['content'] . '
                                </div>
							</div>
						</article>
					</div>
					<br>
					<hr style="border-top: 1px solid #646464;display: block;">');
                }


                $result->close();
                // close connection to database
                $db->close();
                ?>

            </div>
            <div class="col-md-3">
                <div class="sidebar-widget">
                    <h4 class="sidebar-title">Post an Article</h4>
                    <form action="createNewsStory.php" style="margin-top:10px;">
                        <input style="font-weight: 600;border-radius: 5px;background-color: #63ffb2;" type="submit"
                               value="Create Article" class="button">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /BLOG -->

<!-- FOOTER -->
<footer id="footer">
    <div class="container">
        <div class="row">
            <!-- SOCIAL ICONS -->
            <div class="col-sm-6 col-sm-push-6 footer-social-icons">
                <span>Follow us:</span>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-google-plus"></i></a>
                <a href=""><i class="fa fa-pinterest-p"></i></a>
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