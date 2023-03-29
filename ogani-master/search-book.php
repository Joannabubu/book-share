<?php
  session_start();
  $count = 0;
  // connecto database
  require_once "./functions/database_functions.php";
  $conn = db_connect();

  $query = "SELECT * FROM book_data";
  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;
  }

  $title = "查詢書籍";
  require_once "./template/header.php";

  $per_page = 12;
  $type = $_GET['type'];
  $page = $_GET['page'];

  if (empty($page)) {
    $page = 1;
  }

  if ($page == 1) {
    $start = 0;
  } else {
    $start  = ($page - 1) * $per_page;
  }

  if ($fetch_count_result % $per_page != 0 && $fetch_count_result > 0) {
    $total_page = (int) ($fetch_count_result / $per_page) + 1;
  } elseif ($fetch_count_result < $per_page) {
    $total_page = 1;
  } else {
    $total_page = (int) ($fetch_count_result / $per_page);
  }

?>

<section class="hero">
        <div class="container">
            <div class="row">
            <div class="col-lg-3">
                    <div class="hero__search">
                        <div class="hero__search__form">
                        <form action="search-book.php" method="POST">
                            <input type="text" placeholder="關鍵字搜尋" name="name" />
                            <input type="submit" class="site-btn" name="submit" >搜尋</input>   
                        </form>
                        </div>
                    </div>
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>所有類別</span>
                        </div>
                        <ul>
                            <li><a href="all-books.php?page=1&type=人文史地">人生史地</a></li>
                            <li><a href="all-books.php?page=1&type=文學小說">文學小說</a></li>
                            <li><a href="all-books.php?page=1&type=商業與經濟">商業與經濟</a></li>
                            <li><a href="all-books.php?page=1&type=科學與科普">科學與科普</a></li>
                            <li><a href="all-books.php?page=1&type=醫學">醫學</a></li>
                            <li><a href="all-books.php?page=1&type=語言">語言</a></li>
                            <li><a href="all-books.php?page=1&type=藝術與設計">藝術與設計</a></li>
                            <li><a href="all-books.php?page=1&type=生活與旅遊">生活與旅遊</a></li>
                            <li><a href="all-books.php?page=1&type=大專院校教科書">大專院校教科書</a></li>
                            <li><a href="all-books.php?page=1&type=考試用書">考試用書</a></li>
                            <li><a href="all-books.php?page=1&type=心理勵志">心理勵志</a></li>
                            <li><a href="all-books.php?page=1&type=漫畫">漫畫</a></li>
                            <li><a href="all-books.php?page=1&type=圖文書">圖文書</a></li>
                            <li><a href="all-books.php?page=1&type=兒童圖書">兒童圖書</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="container"><h2>搜尋結果如下</h2><br>
                    <?php 
                    if($_REQUEST['submit']){
                        $name = $_POST['name'];
                        
                        if(empty($name)){
                            $make = '<h4>請輸入點內容在搜尋好嗎大哥!</h4>';
                        }else{
                            $make = '<h4>您來得太早了，我們已經在新增這本書籍的路上啦!</h4>';
                            $sele = "SELECT * FROM book_data WHERE name LIKE '%$name%'";
                            $result = mysqli_query($conn,$sele);
                            
                            if($row = mysqli_num_rows($result) > 0){?>

                                <?php for($i = 0; $i < mysqli_num_rows($result); $i++){ ?>
                                    <div class="row">
                                      <?php while($query_row = mysqli_fetch_assoc($result)){ ?>
                                        <div class="featured__item">
                                        <div class="featured__item__pic set-bg"  >
                                        <img class="img-responsive img-thumbnail" src="./bootstrap/img/<?php echo $query_row['bk_img']; ?>">
                                        <ul class="featured__item__pic__hover">
                                        <li><div class="test2">
                                        <a href="book.php?bookisbn=<?php echo $query_row['bk_ISBN']; ?>">
                                        <i class="fa fa-book-bookmark"></i></a>
                                        </div></li>
                                        <li><div class="test3"><a href="sharer-info.php"><i class="fa fa-plus"></i></a></div></li></ul>
                                        </div>
                                        <div class="featured__item__text">
                                        <?php echo '<h6>'.$query_row['name'].'</h6>'; ?></div>
                                      </div>
                                      <?php
                                        $count++;
                                        if($count >= 4){
                                            $count = 0;
                                            break;
                                          }
                                        } ?> 
                              </div>
                                      <?php
                                    } ?>
                    
                         <?php
                        }else{
                        echo'';
                        
                        print ($make);
                        }
                        mysqli_free_result($result);
                        mysqli_close($conn);
                        }
                        }

                        for($i = 1; $i <= $total_page; $i++): ?>
                            <?php if (empty($type)): ?>
                              <a href="all-books.php?page=<?php echo $i;?>"><?php echo $i; ?></a>
                              <?php else: ?>
                                <a href="all-books.php?page=<?php echo $i;?>&type=<?php echo $type;?>"><?php echo $i; ?></a>
                              <?php endif; ?>
                                    <?php endfor; ?>
                        
                        </div>
      
        <br><br><div class="section-title">
        <a href="add-books.php" class="primary-btn">找不到你想租借的書籍?<br>點我新增您的愛書資訊</a>
        </div>
      </div>
      </div>
        </div>
    </section>

                   
    <!-- Breadcrumb Section End -->

    <!-- Banner Begin -->
    
    <!-- Banner End -->
    <!-- Checkout Section Begin -->
    
    <!-- Checkout Section End -->、
   

    <!-- Footer Section Begin -->
    
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>



</body>

</html>