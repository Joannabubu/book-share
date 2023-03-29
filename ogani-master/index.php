<!DOCTYPE HTML>
<html>
<?php
if (!isset($_SESSION)) {
	session_start();
}
if (!isset($_SESSION['name'])) {
	header("location:login1.php");
}
?>

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
	<?php
	session_start();

	?>
	<div id="colorlib-page">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
		<aside id="colorlib-aside" role="complementary" class="border js-fullheight">
			<h1 id="colorlib-logo">
				<a href="index.php"><?php session_start();
									echo 'Hello!<br>' . $_SESSION['name']; ?></a>
			</h1>
			<nav id="colorlib-main-menu" role="navigation">
				<ul>
					<li><a href="index1.php">回書籍首頁</a></li>
					<li class="colorlib-active"><a href="index.php">會員首頁</a></li>
					<li><a href="record.php">交易紀錄</a></li>
					<li><a href="work.php">書籍狀態</a></li>
					<li><a href="point.php">積分</a></li>
					<li><a href="readcomment.php">評價</a></li>
					<li><a href="contact.php">客服信箱</a></li>
					<li><a href="logout.php">登出</a></li>
				</ul>
			</nav>




		</aside>



		<div id="colorlib-main">
			<?php
			$link = mysqli_connect("localhost", "root", "12345678", "book");
			// $sql = "select trade.trade_borrow,count(trade.trade_bookname) from trade join authority on trade.trade_borrow=authority.name where authority.name = '$_SESSION[name]'";
			// $rs = mysqli_query($link, $sql);
			// session_start();
			// while ($record = mysqli_fetch_row($rs)) {
			// 	if ($_SESSION['name'] == $record[0]) {

			?>
			<div id="colorlib-counter" class="colorlib-counters" style="background-image: url(images/cover_bg_1.jpg);opacity: 0.8;" data-stellar-background-ratio="0.5">
				<div style="padding: 160px 0px 160px;">
					<div class="overlay"></div>
					<div class="colorlib-narrow-content">
						<div class="row">
						</div>
						<div class="row">
							<?php
							session_start();
							$sql2 = "SELECT AVG(comment.comment_score) FROM comment WHERE comment.trade_lend='$_SESSION[name]'";
							$rs2 = mysqli_query($link, $sql2);

							while ($record2 = mysqli_fetch_row($rs2)) {


							?>
								<div class="col-md-4 text-center animate-box">
									<span class="icon"><i class="flaticon-skyline"></i></span>
									<span class="colorlib-counter js-counter" data-from="0" data-to=<?php echo $record2[0] ?> data-speed="5000" data-refresh-interval="50"></span>
									<span class="colorlib-counter-label"><strong>我的評價分數</strong></span>
								<?php } ?>

								</div>
								<div class="col-md-4 text-center animate-box">
									<?php
									session_start();
									$link = mysqli_connect("localhost", "root", "12345678", "book");
									$sql = "  SELECT point_plus, (sum(point_plus)+50) from point
										where
										((point.point_level = 'reserve') and (point.point_borrow = '$_SESSION[name]'))
										or
										((point.point_level = 'done') and (point.point_lend = '$_SESSION[name]') or (point.point_borrow = '$_SESSION[name]'))";
									$rs3 = mysqli_query($link, $sql);
									while ($record3 = mysqli_fetch_row($rs3)) {
									?>
										<span class="icon"><i class="flaticon-engineer"></i></span>
										<?php
										if ($record[1] != null) {
										?>
											<span class="colorlib-counter js-counter" data-from="0" data-to=<?php echo "50" ?> data-speed="5000" data-refresh-interval="50">50
											<?php
										} else {
											?>
												<span class="colorlib-counter js-counter" data-from="0" data-to=<?php echo $record3[1] ?> data-speed="5000" data-refresh-interval="50">
												<?php
											}
												?></span>
												<span class="colorlib-counter-label"><strong>積分數</strong></span>
											<?php
										}
											?>
								</div>
								<div class="col-md-4 text-center animate-box">
									<?php

									$sql = "select trade.trade_borrow,count(trade.trade_bookname) from trade join authority on trade.trade_borrow=authority.name where authority.name = '$_SESSION[name]' and trade.trade_level = 'lend'";
									$rs = mysqli_query($link, $sql);

									while ($record = mysqli_fetch_row($rs)) {

									
									?>
										<span class="icon"><i class="flaticon-architect-with-helmet"></i></span>
										<?php
										
										if ($_SESSION['name'] == $record[0]) {
											
												
											
										?>
											<span class="colorlib-counter js-counter" data-from="0" data-to=<?php echo $record[1] ?> data-speed="5000" data-refresh-interval="50">
											<?php
										}else{
											?>
											<span class="colorlib-counter js-counter" data-from="0" data-to="0" data-speed="5000" data-refresh-interval="50">
												<?php
										}
											?>
											</span>
											<span class="colorlib-counter-label"><strong>已借閱書籍</strong></span>
										<?php
										}
									
										?>
								</div>

						</div>
					</div>
				</div>
			</div>

			<div id="get-in-touch" class="colorlib-bg-color">
				<div class="colorlib-narrow-content">
					<div class="row">
						<div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
							<h2>給我們一點建議吧!</h2><br>
							<p><a href="contact.php" class="btn btn-primary btn-learn">客服信箱</a></p>
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


	<!-- MAIN JS -->
	<script src="js/main.js"></script>

</body>

</html>