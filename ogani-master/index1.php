<?php
  if(!isset($_SESSION)){
  session_start();
  }
  $count = 0;
  // connecto database
  
  $title = "ogani主頁";
  require_once "./template/header.php";
  require_once "./functions/database_functions.php";
  $conn = db_connect();
  $row = select4LatestBook($conn);
?>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <!-- Header Section Begin -->
   
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                </div>
                
                <div class="col-lg-12">
                    <div class="hero__item set-bg" data-setbg="img/hero/banner.jpg">
                        <div class="hero__text">
                            <span>共享書籍</span>
                            <h2>環保方便 <br /></h2>
                            <p>找不到要看的書？來Ogani尋寶！</p>
                            <a href="all-books.php" class="primary-btn">瀏覽書籍</a>
                        </div>
                    </div>
                
                </div>
                    
            </div>
        </div>
    </section>
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>最新書籍</h2>
                    </div>
                    
                </div>
            </div>
            <div class="row">
            <?php foreach($row as $book) { ?>
      	<div class="col-md-3" style="text-align:center">
          

          <div class="featured__item">
          <div class="featured__item__pic set-bg"  >
          <img class="img-responsive img-thumbnail" src="./bootstrap/img/<?php echo $book['bk_img']; ?>">
          <?php echo '<ul class="featured__item__pic__hover">'; ?>
          <?php echo '<li><div class="test2">'; ?> 
          <a href="book-details.php?bookisbn=<?php echo $book['bk_ISBN']; ?>">
          <?php echo '<i class="fa fa-book-bookmark"></i>'; ?> </a>
          <?php echo '</div></li>'; ?>
          <?php echo '<li><div class="test3">'; ?> 
          <a href="sharer-info.php?bookisbn=<?php echo $book['bk_ISBN']; ?>">
          <i class="fa fa-plus"></i></a></div></li>
          <?php echo '</ul>'; ?>
          <?php echo '</div>'; ?>
          <?php echo '<div class="featured__item__text" style="text-align:center">'; ?>
          <?php echo '<h6>'.$book['name'].'</h6>'; ?>
          <?php echo '</div>'; ?>
          <?php echo '</div>'; ?>

        </div> 
        <?php } ?>
      </div>
      
        </div>
    </section>

    <!-- Categories Section End -->
    <div class="section-title">
        <a href="add-books.php" class="primary-btn">找不到你想租借的書籍?<br>點我新增您的愛書資訊</a>
    </div>
    
    <?php
  if(isset($conn)) {mysqli_close($conn);}
  require_once "./template/footer.php";
?>
   
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>

