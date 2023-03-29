<?php
    session_start();
    if(!isset($_SESSION['name'])) {
        header("location:login1.php");
    }
  ?>

<?php
$method = "add-books";
$isbn = "";
$title  = "";
$author = "";
$tran  = "";
$sort  = "";
$lang = "";
$publish  = "";
$datee = "";
$intro="";
$apply_date = date("Y-m-d");
$img="";

$bk_name="";
 // require_once "./functions/login1.php";
 $title = "新增書籍";
 require "./template/header.php";
 require "./functions/database_functions.php";
 $conn = db_connect();

 

//   add image
  if(isset($_FILES['img']) && $_FILES['img']['name'] != ""){
   $image = $_FILES['img']['name'];
   $directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
   $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "bootstrap/img/";
   $uploadDirectory .= $image;
   $imgg = move_uploaded_file($_FILES['img']['tmp_name'], $uploadDirectory);
  }

  // find publisher and return pubid
  // if publisher is not in db, create new
  
 
 
?>


<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>新增書籍</h2>
                        <div class="breadcrumb__option">
                            <span>感謝有你，讓OGANI變得更好</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <form method="post" action="dblink-add.php">
    <input type=hidden name="method" value="<?php echo $method ?>">
    <input type=hidden name="imgg" value="<?php echo $imgg ?>">
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4>書籍資訊</h4>
                    <div class="row">
                        <div class="col-lg-12 col-md-6">
                            <div class="checkout__input">
                                <p>書名<span>*</span></p>
                                <input style="color:black" type="text" name="title" required>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>作者<span>*</span></p>
                                        <input style="color:black" type="text" name="author" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>譯者</p>
                                        <input style="color:black" type="text" name="tran">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>ISBN<span>*</span></p>
                                <input style="color:black" type="text" name="isbn">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>出版社<span>*</span></p>
                                    <input style="color:black" type="text" name="publish" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                <div class="checkout__input">
                                        <p>出版日期<span>*</span></p>
                                    <input style="color:black" type="date" name="datee" placeholder="YYYY / MM / DD" required>
                                    </div>
                                </div>
                            </div><br>
                            <div class="row">
                            <div class="col-lg-3">
                            <div class="checkout__input">
                                        <p>書籍類別<span>*</span></p>
                                        <select name="sort" required>
                                            <option value="" selected disabled>選擇類別</option>
                                            <option value="人生史地">人生史地</option>
                                            <option value="商業與經濟">商業與經濟</option>
                                            <option value="科學與科普">科學與科普</option>
                                            <option value="醫學">醫學</option>
                                            <option value="語言">語言</option>
                                            <option value="社會科學">社會科學</option>
                                            <option value="藝術與設計">藝術與設計</option>
                                            <option value="生活與旅遊">生活與旅遊</option>
                                            <option value="大專院校教科書">大專院校教科書</option>
                                            <option value="考試用書">考試用書</option>
                                            <option value="文學小說">文學小說</option>
                                            <option value="漫畫">漫畫</option>
                                            <option value="圖文書">圖文書</option>
                                            <option value="兒童圖書">兒童圖書</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    
                                    <div class="checkout__inputtt">
                                <p>封面照<span>*</span></p>
                                <input type="file" name="img" required>    
                                </div>
                                    
                                </div>
                                <div class="col-lg-3">
                                </div>
                                <div class="col-lg-3" style="text-align:right">
                                <p style="color:white" >書籍類別</p>
                                <?php if($boook['state']=="1") { ?>
                                          <input type="submit" name="add" value="可租借" class="btn btn-primary"><?php } ?>
                                       <?php if($boook['state']=="2") {?>
                                        <input type="submit" name="add" value="可預約" class="btn btn-primary"><?php } ?>
                            <input type="submit" name="add" value="確認新增" class="btn btn-primary">
                            </div></div>              
                        </div>
                    </div>
                
            </div>
        </div>
    </section></form>
 <br/>
    <!-- Checkout Section End -->

    <!-- Footer Section Begin -->
    <?php
 if(isset($conn)) {mysqli_close($conn);}
 require_once "./template/footer.php";
?>
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