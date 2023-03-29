<!DOCTYPE HTML>
<html>

<?php
$commentname = "";
$commentwrite = "";
$score = "";
$commentcontent = "";
$commentbook = "";
$commentwrite = "";
$method = "comment";
$reason = "";
$reportcontent = "";
$report_write = "";
$report_name = "";
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


	<style>
		.black_overlay {
			display: none;
			position: absolute;
			top: 0%;
			left: 0%;
			width: 100%;
			height: 100%;
			background-color: lightgray;
			z-index: 1001;
			-moz-opacity: 0.8;
			opacity: .80;
			filter: alpha(opacity=88);
		}

		.white_content {
			display: none;
			position: absolute;
			top: 25%;
			left: 25%;
			width: auto;
			height: auto;
			padding: 20px;
			border: 5px solid orange;
			background-color: white;
			z-index: 1002;
			overflow: auto;
		}
	</style>
</head>

<body>
	<div id="colorlib-page">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
		<aside id="colorlib-aside" role="complementary" class="border js-fullheight">
			<h1 id="colorlib-logo"><a href="index.php"><?php
														echo 'Hello!<br>' . $_SESSION['name']; ?></a></h1>
			<nav id="colorlib-main-menu" role="navigation">
				<ul>
					<li><a href="index1.php">回書籍首頁</a></li>
					<li><a href="index.php">會員首頁</a></li>
					<li class="colorlib-active"><a href="record.php">交易紀錄</a></li>
					<li><a href="work.php">書籍狀態</a></li>
					<li><a href="point.php">積分</a></li>
					<li><a href="readcomment.php">評價</a></li>
					<li><a href="contact.php">客服信箱</a></li>
					<li><a href="logout.php">登出</a></li>
				</ul>
			</nav>

		</aside>

		<div id="colorlib-main">
			<div class="colorlib-work">
				<div class="colorlib-narrow-content">
					<div class="col">
						<div class="col-md-12 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
							<span class="heading-meta">交易紀錄</span>
							<h4>

								<a href="record.php" class="colorlib-heading">交易紀錄</a>&nbsp;&nbsp;|&nbsp;&nbsp;
								<a style="color:darkgray;" href="report.php">被檢舉紀錄</a>

							</h4>

						</div>
					</div>

					<?php
					$link = mysqli_connect("localhost", "root", "12345678", "book");
					$sql = "select * from trade";
					$rs = mysqli_query($link, $sql);

					?>
					<div class="row">

						<div class="col-md-12">
							<!-- DATA TABLE -->
							<div class="table-responsive table-responsive-data2">
								<table class="table table-data2">
									<thead>
										<tr class="tr-shadow">
										<tr>
											<th>交易號碼</th>
											<th>書名</th>
											<th>借閱日期</th>
											<th>出借者姓名</th>
											<th>借閱者姓名</th>
											<th>檢舉此交易</th>
											<th>新增評價</th>
										</tr>
										</tr>
									</thead>

									<tbody>
										<?php

										while ($record = mysqli_fetch_row($rs)) {
											// $sql2 = "SELECT * FROM trade ";

											// $rs2 = mysqli_query($link, $sql2);
											if ($_SESSION['name'] == $record[3] || $_SESSION['name'] == $record[4]) {

										?>

												<tr class="tr-shadow">
													<form action="dblink.php" method="post">
														<td><span class="status--process" style="vertical-align: middle;"><?php echo $record[0] ?></span></td>
														<td class="desc"><input type="hidden" name="commentbook" value="<?php echo $record[1] ?>"><?php echo $record[1] ?></td>
														<td><?php echo $record[2] ?></td>
														<td><input type="hidden" name="commentname" value="<?php echo $record[3] ?>"><?php echo $record[3] ?></td>
														<td><input type="hidden" name="commentwrite" value="<?php echo $record[4] ?>"><?php echo $record[4] ?></td>
														<td>
															<?php

															if ($_SESSION['name'] == $record[4]) {
																if ($record[6] == '1') {
																	echo "您已填過評價了";
																} else {


															?>
																	<input type="number" class="form-control" placeholder="分數(0~5)" name="score" min="0" max="5" step="0.5" required>
																	<script>
																		$(document).ready(function() {
																			$('input').change(function() {
																				var n = $('input').val();
																				if (n < 0)
																					$('input').val(0);
																				if (n > 5)
																					$('input').val(5);
																			});
																		});
																	</script>
																	<textarea name="commentcontent" id="message" cols="30" rows="7" class="form-control" placeholder="評價內容"></textarea>
																	<input type="submit" name="method" class="btn btn-primary btn-send-message" value="新增評價" id="demo1">


															<?php
																}
															} else {
																echo "您在這筆交易為出租者，無法新增評價";
															}


															?>

														</td>
													</form>
													<form action="report-details.php" method="POST">
														<td>

															<input type=hidden name="report_write" value="<?php echo $_SESSION['name'] ?>">
															<input type="hidden" name="commentbook" value="<?php echo $record[1] ?>">
															<?php

															if ($_SESSION['name'] == $record[3]) {

																$report_name = $record[4];
															} else {
																$report_name = $record[3];
															}
															// echo $report_name;
															?>
															<input type=hidden name="report_name" value="<?php echo $report_name ?>">

															<input type="submit" class="btn btn-primary btn-send-message" value="檢舉"></a>
														</td>
													</form>
												</tr>
												</form>
										<?php

											}
										}


										mysqli_close($link);
										?>
										<script>
											document.getElementById("demo1").addEventListener("click", function() {
												confirm("確定新增評價?");
											});
										</script>
										&nbsp;&nbsp;&nbsp;
									</tbody>
								</table>
							</div>
							<!-- END DATA TABLE -->

						</div>
					</div>
				</div>
			</div>
			</form>

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

	<script src="vendor/jquery-3.2.1.min.js"></script>
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