<!DOCTYPE HTML>
<?php
$name = "";
$email = "";
$title = "";
$content = "";
$method = "customer_service";

?>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Balay Template</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content="" />
	<meta property="og:image" content="" />
	<meta property="og:url" content="" />
	<meta property="og:site_name" content="" />
	<meta property="og:description" content="" />
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">

	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="css/member.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	<link href="CoolAdmin-master/css/theme.css" rel="stylesheet" media="all">
	<link href="CoolAdmin-master/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="all">
	<link href="CoolAdmin-master/css/font-face.css" rel="stylesheet" media="all">

</head>

<body>
	<div id="colorlib-page">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
		<aside id="colorlib-aside" role="complementary" class="border js-fullheight">
			<h1 id="colorlib-logo"><a href="index.php"><?php session_start();
														echo 'Hello!<br>' . $_SESSION['name']; ?></a></h1>
			<nav id="colorlib-main-menu" role="navigation">
				<ul>
					<li><a href="index1.php">回書籍首頁</a></li>
					<li><a href="index.php">會員首頁</a></li>
					<li><a href="record.php">交易紀錄</a></li>
					<li><a href="work.php">書籍狀態</a></li>
					<li><a href="point.php">積分</a></li>
					<li><a href="readcomment.php">評價</a></li>
					<li class="colorlib-active"><a href="contact.php">客服信箱</a></li>
					<li><a href="logout.php">登出</a></li>
				</ul>
			</nav>



		</aside>

		<div id="colorlib-main">

			<div class="colorlib-contact">
				<div class="colorlib-narrow-content">
					<div class="row">
						<div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
							<span class="heading-meta">聯絡我們</span>
							<h2 class="colorlib-heading">客服信箱</h2>
						</div>
					</div>
					<div class="row">
						<div class="col-md-5">
							<div class="colorlib-feature colorlib-feature-sm animate-box" data-animate-effect="fadeInLeft">
								<div class="colorlib-icon">
									<i class="icon-globe-outline"></i>
								</div>
								<div class="colorlib-text">
									<p><a href="#">info@domain.com</a></p>
								</div>
							</div>

							<div class="colorlib-feature colorlib-feature-sm animate-box" data-animate-effect="fadeInLeft">
								<div class="colorlib-icon">
									<i class="icon-map"></i>
								</div>
								<div class="colorlib-text">
									<p>天主教輔仁大學</p>
								</div>
							</div>

							<div class="colorlib-feature colorlib-feature-sm animate-box" data-animate-effect="fadeInLeft">
								<div class="colorlib-icon">
									<i class="icon-phone"></i>
								</div>
								<div class="colorlib-text">
									<p><a href="tel://">02 2905 2000</a></p>
								</div>
							</div>
						</div>
						<div class="col-md-7 col-md-push-1">
							<div class="row">
								<div class="col-md-10 col-md-offset-1 col-md-pull-1 animate-box" data-animate-effect="fadeInLeft">
									<form action="dblink.php" method="post">
										<input type=hidden name="method" value="<?php echo $method ?>">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="姓名" name="name" required>
										</div>
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Email" name="email" required>
										</div>
										<div class="form-group">
											<input type="text" class="form-control" placeholder="主旨" name="title">
										</div>
										<div class="form-group">
											<textarea name="content" id="message" cols="30" rows="7" class="form-control" placeholder="內容"></textarea>
										</div>
										<div class="form-group">
											<input type="submit" class="btn btn-primary btn-send-message" value="發送訊息" id="demo1">
											<script>
												document.getElementById("demo1").addEventListener("click", function() {
													confirm("確定發送訊息?");
												});
											</script>
										</div>
									</form>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>




		</div>
	</div>

	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Sticky Kit -->
	<script src="js/sticky-kit.min.js"></script>
	<!-- Owl carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Counters -->
	<script src="js/jquery.countTo.js"></script>
	<!-- Google Map -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
	<script src="js/google_map.js"></script>


	<!-- MAIN JS -->
	<script src="js/main.js"></script>

</body>

</html>