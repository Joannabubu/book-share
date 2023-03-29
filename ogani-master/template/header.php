<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $title; ?></title>



    <!-- aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa -->
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="https://cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">

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
  <div id="preloder">
        <div class="loader"></div>
    </div>


    <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li>最佳書籍共享平台</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="https://www.facebook.com"><i class="fa fa-facebook"></i></a>
                                <a href="https://twitter.com/?lang=en"><i class="fa fa-twitter"></i></a>
                                <a href="https://www.instagram.com/?hl=en"><i class="fa fa-instagram"></i></a>
                                <a href="https://www.pinterest.com"><i class="fa fa-pinterest"></i></a>
                            </div>
                            <div class="header__top__right__auth">
                            <?php if(!isset($_SESSION['name'])) {
                                    echo '<a href="login1.php"><i class="fa fa-user"></i> 登入</a>';
                                     }
                                     if(isset($_SESSION['name'])) {
                                        echo '<a href="logout.php"><i class="fa fa-user"></i>'.$_SESSION['name'].' ,登出 </a>';
                                         }
                                     ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
<!-- aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa -->
<!-- aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa -->

    <?php
      if(isset($title) && $title == "ogani主頁" || isset($title) && $title == "新增書籍"|| isset($title) && $title == "出借者資訊"||isset($title) && $title == "書籍詳細資訊"  ) {
    ?>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./index1.php"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li><a href="./index1.php">首頁</a></li>
                            <li><a href="./all-books.php">所有書籍</a></li>
                            <li><a href="add-books.php">新增書籍</a></li>
                            <li><a href="./index.php">會員中心</a></li>
                            
                        </ul>
                        
                    </nav>
                
                </div>
                
                    <div class="hero__search">
                        <div class="hero__search__form">
                        <form action="search-book.php" method="POST">
                            <div>
                            <input type="text" placeholder="關鍵字搜尋" name="name" ></input>  
                            
                            <input type="submit" class="site-btn" name="submit" value="搜尋"></input>
                            </div>  
                            </form>
                        </div>
                        <div class="hero__search__phone">
                        </div>
                    </div>
                 </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    <?php } ?>



    <!-- Header Section Begin -->
    <?php
      if(isset($title) && $title == "所有書籍" || isset($title) && $title == "查詢書籍") {
    ?>
        
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./index1.php"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li><a href="./index1.php">首頁</a></li>
                            <li><a href="./all-books.php">所有書籍</a></li>
                            <li><a href="add-books.php">新增書籍</a></li>
                            <li><a href="./index.php">會員中心</a></li>                            
                        </ul>                       
                    </nav>                
                </div>                    
                 </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>

    <?php } ?>

      <div class="container" id="main" >