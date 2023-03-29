<!DOCTYPE HTML>
<html>
    <?php
     $method2="noreserve";
     $method3="gotolend";
     $reservebookname="";
     $reservelend="";
     $date=date('Y-m-d');

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
                    <li class="colorlib-active"><a href="work.php">書籍狀態</a></li>
                    <li><a href="point.php">積分</a></li>
                    <li><a href="readcomment.php">評價</a></li>
                    <!-- <li><a href="blog.php">檢舉</a></li> -->
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
                            <span class="heading-meta">書籍狀態(這裡是借閱狀態)</span>
                            <h4><a style="color:darkgray;" href="work.php">已出借書籍</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                                <a style="color:darkgray;" href="okok.php">可出借書籍</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                                <a style="color:darkgray;" href="borrow.php">借閱書籍</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                                <a class="colorlib-heading" href="reserve.php">預約清單</a>
                            </h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- DATA TABLE -->
                           

                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                    <thead>
                                        <tr>
                                            <th>書籍狀態</th>
                                            <th>書名</th>
                                            <th>預約狀態</th>

                                        </tr>
                                    </thead>
                                    
                                    <?php
                                    $link=mysqli_connect("localhost","root","12345678","book");
                                        $sql="select trade.trade_bookname,trade.trade_borrow,trade.trade_level ,sharer.state,sharer.trade_lend,trade.trade_date from trade,sharer where trade.trade_borrow= '$_SESSION[name]' and sharer.bk_name=trade.trade_bookname ";
                              
                                        $rs=mysqli_query($link,$sql);  
									   
							
                                        while($record=mysqli_fetch_row($rs)){   
                                          
                                           if($record[2]=='reserve' ||$record[2]=='overtime'){
                                             
                                           
                                           
                                                
                                            // if($_SESSION['name']==$record[3]){

                                            // }
                              

                                        
                                      ?>
                                   
                                    
                                    <tbody>
                                        
                                        <tr class="tr-shadow">
                                            <td>
                                                <span class="status--process">已預約</span>
                                            </td>

                                            <td class="desc"><?php echo $record[0]; ?></td>
                                            <td>
                                            <form method="post" action="dblink.php" > 
                                            <input type="hidden" name="reservebookname" value="<?php echo $record[0];?>">
                                            <input type="hidden" name="reservelend" value="<?php echo $record[4];?>">
                                                <?php if(strtotime($record[5])>=strtotime($date)||strtotime($record[5])=='-62169984000'){
                                                    
                                                    
                                
                                                if($record[3]=='2'){ 
                                                  
                                                    ?>

                    <button class="btn btn-primary btn-learn" name="method2" value="<?php echo $method2 ?>"
					
						   >
					   取消預約
				   </button>
				                <?php ;} elseif($record[3]=='3') { ?>
						  
				   <button class="btn btn-primary btn-learn" name="method3" value="gotolend"
					
						   >
                        已可借閱，我要借閱<!-- <input type="hidden" name="method3" value="overtime"> -->
                    
				   </button>
<?php ;}else{} } else{     echo"已過期限，請重新借閱或預約";
$sql2="update `trade` set trade.trade_level='overtime' where trade.trade_borrow='$_SESSION[name]' and trade.trade_level='reserve' and trade_bookname='$record[0]'";
$sql0="update `sharer` set sharer.state='1' WHERE sharer.trade_lend='$record[4]' and sharer.bk_name='$record[0]'";
			if(mysqli_query($link,$sql0))

			{ 
				if(mysqli_query($link,$sql2)) {
					
				}


			}
        }

// <?php
					
                
             
}
//  ?>
				
                                               
                                            </td>

                                        </tr>
                                       
                                        <tr class="spacer"></tr>
                                    </tbody>
                                </table>
                            </div>
                                </form>
                            <!-- END DATA TABLE -->
                        </div>
                    </div>
                </div>
            </div>
 <?php }
//  } 
 ?>
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