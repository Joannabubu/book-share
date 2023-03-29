<!DOCTYPE HTML>
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
            <h1 id="colorlib-logo"><a href="index.html"><?php session_start();
                                                        echo 'Hello!<br>' . $_SESSION['name']; ?></a></h1>
            <nav id="colorlib-main-menu" role="navigation">
                <ul>
                    <li><a href="index1.php">回書籍首頁</a></li>
                    <li><a href="index.php">會員首頁</a></li>
                    <li><a href="record.php">交易紀錄</a></li>
                    <li class="colorlib-active"><a href="work.php">書籍狀態</a></li>
                    <li><a href="point.php">積分</a></li>
                    <li><a href="readcomment.php">評價</a></li>
                    <!-- <li><a href="blog.html">檢舉</a></li> -->
                    <li><a href="contact.php">客服信箱</a></li>
                    <li><a href="login1.php">登出</a></li>
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

                                <a href="record.php" style="color:darkgray;">交易紀錄</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                                <a href="report.php" class="colorlib-heading">被檢舉紀錄</a>

                            </h4>

                        </div>
                    </div>
                    <div class="row">
                        
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <div class="table-responsive m-b-40">
                                    <div class="table-responsive table-responsive-data2">
                                        <table class="table table-data2">
                                            <thead>
                                                <tr>
                                                    <th>交易書名</th>
                                                    <th>檢舉人</th>
                                                    <th>檢舉原因</th>
                                                    <th>檢舉內容</th>
                                                    <th>檢舉日期</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $link = mysqli_connect("localhost", "root", "12345678", "book");
                                                $sql = "select * from report";
                                                $rs = mysqli_query($link, $sql);
                                                session_start();

                                                while ($record = mysqli_fetch_row($rs)) {
                                                    if ($_SESSION['name'] == "$record[3]") {
                                                        if ($record[8] == "1") {

                                                ?>
                                                            <tr class="tr-shadow">
                                                                <!-- <td>
                                                <span class="status--process">借閱中</span>
                                            </td> -->
                                            
                                                                <td><?php echo $record[1] ?></td>
                                                                <td class="desc"><?php echo $record[2] ?></td>
                                                                <td><?php echo $record[5] ?></td>
                                                                <td><?php echo $record[6] ?></td>
                                                                <td><?php echo $record[7] ?> </td>
                                                                <td><input type="hidden" name="account" value = "<?php echo $_SESSION['account']?>">

                                                            </tr>
                                                            <tr class="spacer"></tr>
                                                <?php
                                                        }
                                                    }
                                                }
                                                ?>
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                                <!-- END DATA TABLE -->
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
												<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">被檢舉會有懲罰嗎?
												</a>
											</h4>
										</div>
										<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
											<div class="panel-body">
												<div class="row">
													<div class="col-md-12">
														<p>會。<br>
                                                        如果被檢舉超過<strong>3</strong>次。則帳號會被停權<strong>30</strong>天。</p>
													</div>

												</div>
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
                            <p><a href="contact.html" class="btn btn-primary btn-learn">客服信箱</a></p>
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