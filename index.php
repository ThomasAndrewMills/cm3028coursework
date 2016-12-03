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
                        <li><a href="#header">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#clubs">Clubs</a></li>
                        <li><a href="#our-team">Team</a></li>
                        <li><a href="discover.php">Discover</a></li>
                        <li><a href="healthNews.php">healthy living blog</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">




                        <?php

                        if(isset($_POST["signin"]))
                            echo "sign in has been submitted";
                        else if(isset($_POST["signup"])) {
                            echo "sign up has been submitted";


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
                                echo "New record created successfully";
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
								<h2>North Kincardineshire</h2>
								<p>Discover new places and plan your routes around Portlethen</p>
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
								<p>Discover sports and clubs in the Portlethen Community</p>
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
								<p>Discover the latest news and information to ensure a healthy lifestyle</p>
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

				<div class="col-md-4 col-sm-6 st-service">
					<h2><i class="fa fa-desktop"></i> Community Engagement</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta libero autem, magni veritatis, optio dolor.</p>
				</div>

				<div class="col-md-4 col-sm-6 st-service">
					<h2><i class="fa fa-cogs"></i> Keeping Active</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta libero autem, magni veritatis, optio dolor.</p>
				</div>

				<div class="col-md-4 col-sm-6 st-service">
					<h2><i class="fa fa-code"></i> Discover Portlethen</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta libero autem, magni veritatis, optio dolor.</p>
				</div>

				<div class="col-md-4 col-sm-6 st-service">
					<h2><i class="fa fa-dashboard"></i> Healthy Living</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta libero autem, magni veritatis, optio dolor.</p>
				</div>

				<div class="col-md-4 col-sm-6 st-service">
					<h2><i class="fa fa-life-ring"></i> Run by YOU</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta libero autem, magni veritatis, optio dolor.</p>
				</div>

			</div>
            <br>
            <br>
            <br>
		</div>
	</section>
	<!-- /SERVICES -->


	<!-- OUR WORKS -->
	<section id="clubs">
		<br>
		<br>
		<br>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title">
						<h1>Clubs</h1>
						<span class="st-border"></span>
					</div>
				</div>

				<div class="portfolio-wrapper" >
					<div class="col-md-12">
						<ul class="filter">  			
							<li><a class="active" href="#" data-filter="*">All</a></li>	
							<li><a href="#" data-filter=".wordpress">WordPress</a></li>
							<li><a href="#" data-filter=".html">HTML</a></li>
							<li><a href="#" data-filter=".graphic">graphic</a></li>
							<li><a href="#" data-filter=".php">PHP</a></li>
							<li><a href="#" data-filter=".bootstrap">bootstrap</a></li>
						</ul><!--/#portfolio-filter-->
					</div>
					
					<div class="portfolio-items">
						
						<div class="col-md-4 col-sm-6 work-grid wordpress graphic">
							<div class="portfolio-content">
								<img class="img-responsive" src="cluster/images/works/tennis.jpg" alt="">
								<div class="portfolio-overlay">
									<a href="cluster/images/works/tennis.jpg"><i class="fa fa-camera-retro"></i></a>
									<h5>Tennis Club</h5>
									<p>Join our tennis Club!</p>
								</div>
							</div>	
						</div>
						
						<div class="col-md-4 col-sm-6 work-grid html php bootstrap">
							<div class="portfolio-content">
								<img class="img-responsive" src="cluster/images/works/hockey.jpg" alt="">
								<div class="portfolio-overlay">
									<a href="cluster/images/works/hockey.jpg"><i class="fa fa-camera-retro"></i></a>
									<h5>Hockey Club</h5>
									<p>Join our Hockey Club!</p>
								</div>
							</div>	
						</div>
						
						<div class="col-md-4 col-sm-6 work-grid wordpress graphic">
							<div class="portfolio-content">
								<img class="img-responsive" src="cluster/images/works/football.jpg" alt="">
								<div class="portfolio-overlay">
									<a href="cluster/images/works/football.jpg"><i class="fa fa-camera-retro"></i></a>
									<h5>Footbal Club</h5>
									<p>Join our Football Club!</p>
								</div>
							</div>	
						</div>
						
						<div class="col-md-4 col-sm-6 work-grid html php bootstrap">
							<div class="portfolio-content">
								<img class="img-responsive" src="cluster/images/works/martialArts.jpg" alt="">
								<div class="portfolio-overlay">
									<a href="cluster/images/works/martialArts.jpg"><i class="fa fa-camera-retro"></i></a>
									<h5>Martial Arts</h5>
									<p>Join our Martial Arts Club!</p>
								</div>
							</div>	
						</div>
						
						<div class="col-md-4 col-sm-6 work-grid wordpress graphic php">
							<div class="portfolio-content">
								<img class="img-responsive" src="cluster/images/works/dance.jpg" alt="">
								<div class="portfolio-overlay">
									<a href="cluster/images/works/dance.jpg"><i class="fa fa-camera-retro"></i></a>
									<h5>Dance Club</h5>
									<p>Join our Dance Club!</p>
								</div>
							</div>	
						</div>
						
						<div class="col-md-4 col-sm-6 work-grid html bootstrap graphic">
							<div class="portfolio-content">
								<img class="img-responsive" src="cluster/images/works/athletics.jpg" alt="">
								<div class="portfolio-overlay">
									<a href="cluster/images/works/athletics.jpg"><i class="fa fa-camera-retro"></i></a>
									<h5>Athletics Club</h5>
									<p>Join our Athletics Club!</p>
								</div>
							</div>	
						</div>
						
					</div>				
				</div>
                <div style="margin-bottom: 100px;">
                    <a href="club.php"style="color:#5b5b5b;"><h2>Click here to view more clubs!</h2></a>
                    <span class="st-border"></span>
                </div>
			</div>
		</div>
	</section>
	<!-- /OUR WORKS -->




	<!-- OUR TEAM -->
	<section id="our-team">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title">
						<h1>Our Team</h1>
						<span class="st-border"></span>
					</div>
				</div>

				<div class="col-md-3 col-sm-6">
					<div class="team-member">
						<div class="member-image">
							<img class="img-responsive" src="cluster/images/members/profile1.jpg" alt="">
							<div class="member-social">
								<a href=""><i class="fa fa-facebook"></i></a>
								<a href=""><i class="fa fa-twitter"></i></a>
								<a href=""><i class="fa fa-google-plus"></i></a>
								<a href=""><i class="fa fa-linkedin"></i></a>
							</div>
						</div>
						<div class="member-info">
							<h4>John Smith</h4>
							<span>Co-ordinator</span>
						</div>
					</div>
				</div>

				<div class="col-md-3 col-sm-6">
					<div class="team-member">
						<div class="member-image">
							<img class="img-responsive" src="cluster/images/members/profile2.jpg" alt="">
							<div class="member-social">
								<a href=""><i class="fa fa-facebook"></i></a>
								<a href=""><i class="fa fa-twitter"></i></a>
								<a href=""><i class="fa fa-google-plus"></i></a>
								<a href=""><i class="fa fa-linkedin"></i></a>
							</div>
						</div>
						<div class="member-info">
							<h4>Bob Smith</h4>
							<span>Lead Developer</span>
						</div>
					</div>
				</div>

				<div class="col-md-3 col-sm-6">
					<div class="team-member">
						<div class="member-image">
							<img class="img-responsive" src="cluster/images/members/profile3.jpg" alt="">
							<div class="member-social">
								<a href=""><i class="fa fa-facebook"></i></a>
								<a href=""><i class="fa fa-twitter"></i></a>
								<a href=""><i class="fa fa-google-plus"></i></a>
								<a href=""><i class="fa fa-linkedin"></i></a>
							</div>
						</div>
						<div class="member-info">
							<h4>Boris Smith</h4>
							<span>Developer</span>
						</div>
					</div>
				</div>

				<div class="col-md-3 col-sm-6">
					<div class="team-member">
						<div class="member-image">
							<img class="img-responsive" src="cluster/images/members/profile4.jpg" alt="">
							<div class="member-social">
								<a href=""><i class="fa fa-facebook"></i></a>
								<a href=""><i class="fa fa-twitter"></i></a>
								<a href=""><i class="fa fa-google-plus"></i></a>
								<a href=""><i class="fa fa-linkedin"></i></a>
							</div>
						</div>
						<div class="member-info">
							<h4>John Doe</h4>
							<span>Marketer</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /OUR TEAM -->
	
	<!-- TESTIMONIAL -->
	<section id="testimonial">
		<div class="container">
			<div class="row">
				<div class="overlay"></div>
				<div class="col-md-8 col-md-offset-2 col-sm-12">
					<div class="st-testimonials">

						<div class="item active text-center">
							<p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet dolore nesciunt natus ullam possimus quas obcaecati suscipit voluptate facilis cum"</p>
							<div class="st-border"></div>
							<div class="client-info">
								<h5>Tom Roof</h5>
								<span>CEO of Domain.com</span>
							</div>
						</div>

						<div class="item text-center">
							<p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet dolore nesciunt natus ullam possimus quas obcaecati suscipit voluptate facilis cumconsectetur adipisicing elit. Amet dolore"</p>
							<div class="st-border"></div>
							<div class="client-info">
								<h5>Mustafiz</h5>
								<span>CEO of Domain.com</span>
							</div>
						</div>

						<div class="item text-center">
							<p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem autem possimus laborum, ducimus vel rerum asperiores delectus, suscipit voluptate mollitia, ullam perspiciatis voluptates!"</p>
							<div class="st-border"></div>
							<div class="client-info">
								<h5>Sean Hynes</h5>
								<span>CEO of Domain.com</span>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /TESTIMONIAL -->



	<!-- FUN FACTS -->
	<section id="fun-facts">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-3">
					<div class="fun-fact text-center">
						<h3><i class="fa fa-thumbs-o-up"></i> <span class="st-counter">10</span></h3>
						<p>Clubs</p>
					</div>
				</div>
				<div class="col-sm-6 col-md-3">
					<div class="fun-fact text-center">
						<h3><i class="fa fa-briefcase fa-6"></i> <span class="st-counter">50</span></h3>
						<p>Members</p>
					</div>
				</div>
				<div class="col-sm-6 col-md-3">
					<div class="fun-fact text-center">
						<h3><i class="fa fa-coffee"></i> <span class="st-counter">5</span></h3>
						<p>Club Genres</p>
					</div>
				</div>
				<div class="col-sm-6 col-md-3">
					<div class="fun-fact text-center">
						<h3><i class="fa fa-code"></i> <span class="st-counter">22</span></h3>
						<p>Locations of Interest</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /FUN FACTS -->

	
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