<?php

session_start();
if (!isset($_SESSION['name'])) {
  header("location:login1.php");
}
?>
<?php
$method = "borrow";
$id = "";
$book = "";
$date = "";
$lend = "";
$state = "";

$title = "書籍詳細資訊";
require "./template/header.php";
$gmail = $_GET['gmail'];
$book_isbn = $_GET['bookisbn'];
require "./functions/database_functions.php";
$conn = db_connect();
$query = "SELECT * FROM sharer WHERE gmail = '$gmail' and bk_ISBN = '$book_isbn'";
$result = mysqli_query($conn, $query);
if (!$result) {
  echo "error 404" . mysqli_error($conn);
  exit;
}
$rowww = mysqli_fetch_assoc($result);

if (!$rowww) {
  echo "empty";
  exit;
}
$queryy = "SELECT * FROM book_data WHERE bk_ISBN = '$book_isbn'";
$resultt = mysqli_query($conn, $queryy);
if (!$resultt) {
  echo "error 404" . mysqli_error($conn);
  exit;
}
$roww = mysqli_fetch_assoc($resultt);

if (!$roww) {
  echo "empty";
  exit;
}

$book1 = $roww['name'];
$date1 = date("Y-m-d");
$lend1 = $rowww['trade_lend'];
$id1 = $rowww['sharer_id'];
$state1 = $rowww['state'];


?>
<form method="post" action="dblink-borrow.php" enctype="multipart/form-data">
  <input type=hidden name="method" value="<?php echo $method ?>">
  <input type=hidden name="id" value="<?php echo $id1 ?>">
  <input type=hidden name="book" value="<?php echo $book1 ?>">
  <input type=hidden name="date" value="<?php echo $date1 ?>">
  <input type=hidden name="lend" value="<?php echo $lend1 ?>">
  <input type=hidden name="state" value="<?php echo $state1 ?>">
  <input type="hidden" name="bookisbn" value="<?php echo $book_isbn; ?>">
  <input type="hidden" name="gmail" value="<?php echo $gmail; ?>">


  <div class="row">

    <?php
    if ($roww['bk_ISBN'] == $book_isbn) {
    ?>
      <div class="col-md-3 text-center">
        <img class="img-responsive img-thumbnail" src="./bootstrap/img/<?php echo $roww['bk_img']; ?>"> <br><br>
        <h4>《<?php echo $roww['name']; ?>》</h4><br>
      </div>
      <div class="col-md-9">



        <h5 style="line-height:200%"><mark class="yellow">注意事項 :</mark><br></h5>
        <h5 style="line-height:150%">
          感謝您使用OGANI借書<br>
          在借閱前，OGANI想先提醒您 : <br>
          按下確認租借的按鈕後，代表交易正式開始<br>
          一旦租借服務開始，請自行聯繫出借者<br>
          若按下確認鍵而沒有聯繫出借者導致交易無法順利進行<br>
          將會影響到您的評分喔!<br>
          *OGANI為免費交易平台，提供使用者租借及出借服務，請好好愛惜書籍。
        </h5><br>

        <h5 style="line-height:350%"><mark class="yellow">確定要進行交易嗎?</mark><br></h5>
        <input type="submit" name="yes" value="確定租借" class="btn btn-primary">
        <input type="submit" name="no" value="取消租借" class="btn btn-primary">
      </div>
  </div>
<?php  } ?>
<input type="hidden" name="gmail" value="<?php echo $gmail; ?>">
</form>
<!-- Product Details Section End -->

<!-- Related Product Section Begin -->

<!-- Related Product Section End -->


<!-- Footer Section Begin -->
<?php
if (isset($conn)) {
  mysqli_close($conn);
}
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