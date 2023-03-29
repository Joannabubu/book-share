<?php
    session_start();
    if(!isset($_SESSION['name'])) {
        header("location:login1.php");
    }
?>
<?php

 //  session_start();
 // require_once "./functions/login1.php";
 $title = "書籍詳細資訊";
 require "./template/header.php";
 require "./functions/database_functions.php";
 $gmail = $_GET['gmail'];
 $book_isbn = $_GET['bookisbn'];
 $conn = db_connect();
 $query = "SELECT * FROM sharer WHERE gmail = '$gmail'";
 $result = mysqli_query($conn, $query);
  if(!$result){
    echo "error 404" . mysqli_error($conn);
    exit;
  }
  $rowww = mysqli_fetch_assoc($result);

  if(!$rowww){
    echo "empty";
    exit;
  }
  $queryy = "SELECT * FROM book_data WHERE bk_ISBN = '$book_isbn'";
  $resultt = mysqli_query($conn, $queryy);
   if(!$resultt){
     echo "error 404" . mysqli_error($conn);
     exit;
   }
   $roww = mysqli_fetch_assoc($resultt);
 
   if(!$roww){
     echo "empty";
     exit;
   }
?>

    <!-- Blog Details Section Begin --> 
      <div class="row" >
      <?php
                      if ($roww['bk_ISBN'] == $book_isbn) {		
										?>
      <div class="col-md-3 text-center">
          <img class="img-responsive img-thumbnail" src="./bootstrap/img/<?php echo $roww['bk_img']; ?>"> <br><br>
          <h4>《<?php echo $roww['name']; ?>》</h4><br>
        </div>
        <div class="col-md-9" >
        
        <h5 style="line-height:200%"><mark class="yellow">貼心小提醒 :</mark><br></h5>
        <h5 style="line-height:150%">
          您已完成OGANI的租借程序啦!<br>
          請自行與書籍主人聯繫，預祝交易愉快!</h5><br>

          
         
          <h5 style="line-height:200%"><mark class="yellow">注意事項 :</mark><br></h5>
        <h5 style="line-height:150%">
          請於一周內連繫對方<br>
          在交談過程中一定一定要記得使用禮貌又溫暖的文字唷!</h5><br>

          <h5 style="line-height:200%"><mark class="yellow">出借者資訊 :</mark><br></h5>
          <h5 style="line-height:150%"><i class="fa-solid fa-user"></i>&nbsp; 出借者名字 : <?php echo $rowww['trade_lend']; ?><br>
          <i class="fa-solid fa-envelope"></i>&nbsp; 出借者郵件 : <?php echo $rowww['gmail']; ?></h5><br>
      </div></div>
<?php  }?>
      <input type="hidden" name="gmail" value="<?php echo $gmail;?>">
     
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
   
    <!-- Related Product Section End -->


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
