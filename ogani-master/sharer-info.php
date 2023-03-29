<?php
    session_start();
    if(!isset($_SESSION['name'])) {
        header("location:login1.php");
    }
  ?>
  
<?php
$id = "";
$time  = "";
$conlend = "";
$gmail  = "";
$bkstate  = "";
$method = "sharer";
$bk_name="";

  require_once "./functions/database_functions.php";
  $book_isbn = $_GET['bookisbn'];
  $conn = db_connect();
  $query = "SELECT * FROM book_data WHERE bk_ISBN = '$book_isbn'";
  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "error 404" . mysqli_error($conn);
    exit;
  }

  $row = mysqli_fetch_assoc($result);
  if(!$row){
    header('Location:http://localhost/crazy/SA/ogani-master/okok.php');
    exit;
  }

  $bk_name=$row['name'];

  $title = "出借者資訊";
  require "./template/header.php";
?>

<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>出借者資訊</h2>
                        <div class="breadcrumb__option">
                            <span>感謝有你，讓OGANI變得更好</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <form method="post" action="dblink-sharer.php">
    <input type=hidden name="method" value="<?php echo $method ?>">
    <input type=hidden name="bk_name" value="<?php echo $bk_name ?>">
                    <section class="product-details spad">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-3 col-md-6">
                                    <div class="product__details__pic">
                                        <div class="product__details__pic__item">
                                        <img class="img-responsive img-thumbnail" src="./bootstrap/img/<?php echo $row['bk_img']; ?>">
                                        </div>
                                    </div>
                            </div>
                            
                            <div class="col-lg-9 col-md-6">
                                <div class="checkout__form">
                                    <h4>填寫資訊</h4>
                                        <div class="row">
                                            <div class="col-lg-11 col-md-6">
                                                <div class="checkout__input">
                                                    <h5><b>書名:<?php echo $row['name']; ?></b></h5>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="checkout__input">
                                                            <p>願意提供時長<span>*</span><br> </p>
                                                            <select name="time" required>
                                                                <option value="一個月" >一個月</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="checkout__input">
                                                            <p>可否續借<span>*</span></p>
                                                            <select name="conlend" required>
                                                                <option value="" selected disabled>選擇可否續借</option>
                                                                <option value="可以">可以</option>
                                                                <option value="不要">不要</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div><br>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="checkout__input">
                                                        <p>書本狀態<span>*</span></p>
                                                        <select name="bk_state" required>
                                                            <option value="" selected disabled>選擇狀態</option>
                                                            <option value="九成新">九成新</option>
                                                            <option value="八成新">八成新</option>
                                                            <option value="不新">不新</option>
                                                            <option value="有缺頁">有缺頁</option>
                                                            <option value="不新，也有缺頁">不新，也有缺頁</option>
                                                        </select>
                                                    </div>
                                                </div>
                                         
                                            </div>
                                            <div class="checkout__input"><br><br>
                                                <p>聯絡資訊<span>*</span></p>
                                                <input type="text" name="gmail" placeholder="請輸入gmail"  required>
                                            </div>
                                                <div class="col-lg-6">
                                                    <div class="checkout__input"><br><br>
                                                    
            <input type="hidden" name="bookisbn" value="<?php echo $book_isbn;?>">
            <input type="submit" name="add" value="提交表單" class="btn btn-primary">
          
            
            
                                  
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    *OGANI為免費交易平台，提供使用者租借及出借服務，不負保管書籍狀態的責任。
                                                </div><br>
                                            </div>
                                        </div>
                                       
                                </div>
                            </div>
                        </div>
                   
                 </section>  </form>

                
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