<!DOCTYPE HTML>
<html>
<?php
// $link2 = mysqli_connect("localhost", "root", "12345678", "book");
// $sql2 = "select sum(point_plus) from point";
// $sql3 = "select point from authority where name = '$_SESSION[name]'";
// $rs2 = mysqli_query($link2, $sql2);
// $rs3 = mysqli_query($link2,$sql3);
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
					<li class="colorlib-active"><a href="point.php">積分</a></li>
					<li><a href="readcomment.php">評價</a></li>
					<li><a href="contact.php">客服信箱</a></li>
					<li><a href="logout.php">登出</a></li>
				</ul>
			</nav>
		</aside>

		<div id="colorlib-main">
			<div class="colorlib-about">
				<div class="colorlib-narrow-content">
					<div class="row row-bottom-padded-md">
						<div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
							<div class="about-desc">
								<span class="heading-meta">積分</span>
								<h2 class="colorlib-heading">積分數</h2>
							</div>
							<div id="colorlib-counter" class="colorlib-counters" style="background-image: url(images/cover_bg_1.jpg);" data-stellar-background-ratio="0.5">
								<div class="overlay"></div>
								<div class="colorlib-narrow-content">
									<div class="row">
										<?php
										session_start();
										$link = mysqli_connect("localhost", "root", "12345678", "book");
										$sql = "  SELECT point_plus, (sum(point_plus)+50) from point
										where
										((point.point_level = 'reserve') and (point.point_borrow = '$_SESSION[name]'))
										or
										((point.point_level = 'done') and (point.point_lend = '$_SESSION[name]') or (point.point_borrow = '$_SESSION[name]'))";
										// $sql = "select point from authority where name = '$_SESSION[name]'";
										$rs2 = mysqli_query($link, $sql);
										
										while ($record2 = mysqli_fetch_row($rs2)) {
											
											
										?>
											<div class="col-md-12 text-center animate-box">
												<span class="icon"><i class="flaticon-engineer"></i></span>
												<?php
												if($rs2==null){
													?>
												<span class="colorlib-counter js-counter" data-from="0" data-to="50" data-speed="5000" data-refresh-interval="50">	
												<?php
												}else{
													?>
													<span class="colorlib-counter js-counter" data-from="0" data-to=<?php echo $record2[1] ?>  data-speed="5000" data-refresh-interval="50">	
														<?php
												}
												?></span>
												<span class="colorlib-counter-label">目前積分</span>
											<?php
										

										}
											?>
											</div>
									</div>

								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 animate-box" data-animate-effect="fadeInLeft">
							<h2 class="colorlib-heading">積分增減紀錄</h2>
						</div>
						<div class="row m-t-30">
							<div class="col-md-12">
								<!-- DATA TABLE-->
								<div class="table-responsive m-b-40">
									<table class="table table-borderless table-data3">
										<thead>
											<tr>
												<th style="text-align: center;">日期</th>
												<th style="text-align: center;">書名</th>
												<th style="text-align: center;">積分增減</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$link = mysqli_connect("localhost", "root", "12345678", "book");
											$sql = "select point_date,point_bookname, point_lend, point_borrow,point_plus,point_level from point";
											$rs = mysqli_query($link, $sql);
											// $temp1 = ($_SESSION['name']==$record[3])&&($record[5]=="reserve");
											// $temp2 = (($_SESSION['name']==$record[2])||($_SESSION['name']==$record[3]))&&($recor[5]=="done");
											while ($record = mysqli_fetch_row($rs)) {
												if ( (($_SESSION['name']==$record[3])&&($record[5]=="reserve"))||(($_SESSION['name'] == $record[2]) || ($_SESSION['name'] == $record[3])) && ($record[5] == "done")) {
													// if ($record[4] == "done") {
											?>
													<tr>
														<td style="text-align: center;"><?php echo $record[0] ?> </td>
														<td style="text-align: center;"><?php echo $record[1] ?></td>
														<?php
														if ($record[4] >= 0) {
														?>
															<td class="process" style="text-align: center;"><?php echo $record[4] ?></td>
														<?php
														} else {
														?>
															<td class="denied" style="text-align: center;"><?php echo $record[4] ?></td>
														<?php
														}
														?>

														<!-- <td class="denied">-5</td> -->
													</tr>
											<?php
												}
											}



											?>
										</tbody>

									</table>
								</div>
								<!-- END DATA TABLE-->
							</div>
						</div>
						<div class="col-md-4 animate-box" data-animate-effect="fadeInLeft">
							<h2 class="colorlib-heading">積分增減規則</h2>
						</div>
						<div class="col-md-12 animate-box" data-animate-effect="fadeInRight">
							<div class="fancy-collapse-panel">
								<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
									<div class="panel panel-default">
										<div class="panel-heading" role="tab" id="headingOne">
											<h4 class="panel-title">
												<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">會有初始積分嗎?
												</a>
											</h4>
										</div>
										<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
											<div class="panel-body">
												<div class="row">
													<div class="col-md-12">
														<p>最初註冊積分為<strong>50</strong>點。</p>
													</div>

												</div>
											</div>
										</div>
									</div>
									<div class="panel panel-default">
										<div class="panel-heading" role="tab" id="headingTwo">
											<h4 class="panel-title">
												<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">如何增加積分?
												</a>
											</h4>
										</div>
										<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
											<div class="panel-body">
												<p>每當交易成功，出借方及借閱方皆可獲得<strong>5</strong>點。 </p>

											</div>
										</div>
									</div>
									<div class="panel panel-default">
										<div class="panel-heading" role="tab" id="headingThree">
											<h4 class="panel-title">
												<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">甚麼時候會被扣點?
												</a>
											</h4>
										</div>
										<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
											<div class="panel-body">
												
													<p>預約書籍&nbsp;&nbsp;:&nbsp;&nbsp;扣<strong>10</strong>點</p>
													
												

											</div>
										</div>
									</div>
								</div>
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
	<script type="text/javascript" class="init">
		$(document).ready(function() {
			$('#example').DataTable();
		});
	</script>

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