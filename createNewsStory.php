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

    @import url("http://fonts.googleapis.com/css?family=Raleway:200,300,600,700&subset=latin,latin-ext");

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


        <div style="text-align:center; font-size:30px;font-family: "Raleway";>
        <a class="logo"  href="index.php"><b>GOPORTLETHEN</b></a>
        </div>

        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#st-navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <div class="container">

            <br>
            <div class="collapse navbar-collapse" id="st-navbar-collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="index.php#about">About</a></li>
                    <li><a href="index.php#clubs">Clubs</a></li>
                    <li><a href="index.php#our-team">Team</a></li>
                    <li><a href="discover.php">Discover</a></li>
                    <li><a href="healthNews.php">healthy living blog</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <form action="createUser.php" style="margin-top:10px;">
                            <input style="font-weight: 600;border-radius: 5px;background-color: lightgray;" type="submit" value="SIGN IN/SIGN UP">
                        </form>
                    </li>
                    <?php
                    session_start();
                    ?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </nav>
</header>
<!-- /HEADER -->
<br>
<br>
<br>
<br>



<!-- SERVICES -->
<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <br>
                <br>
                <br>
                <br>
                <div style="float:left;width:570px;">
                    <div class="section-title">
                        <h1>Post an Article</h1>
                        <span class="st-border"></span>

                        <form action="healthNews.php" method="post">
                            <br>
                            <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
                            <script>tinymce.init({selector: 'textarea'});</script>
                            <form action="createarticle" method="post">
                                <input type="text" name="articleName" placeholder="Article Name">
                                <textarea name="articleText"></textarea>
                                <input type="submit">
                            </form>
                        </form>


                    </div>

                </div>
                <div style="float:right;width:490px;">
                    <div class="section-title">
                        <h1>heading</h1>
                        <span class="st-border"></span>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
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