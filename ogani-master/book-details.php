<?php
session_start();
if (!isset($_SESSION['name'])) {
  header("location:login1.php");
}
?>
<?php
$method = "borrow";
$id = "";
$state = "";
//  session_start();
// require_once "./functions/login1.php";
$title = "書籍詳細資訊";
require "./template/header.php";
require "./functions/database_functions.php";
$book_isbn = $_GET['bookisbn'];
$conn = db_connect();
$query = "SELECT * FROM book_data WHERE bk_ISBN = '$book_isbn'";
$result = mysqli_query($conn, $query);
if (!$result) {
  echo "error 404" . mysqli_error($conn);
  exit;
}
$row = mysqli_fetch_assoc($result);

if (!$row) {
  echo "empty";
  exit;
}
$roww = AdminPrefer($conn);

$sql5 = " SELECT * FROM sharer";
$rs5 = mysqli_query($conn, $sql5);
$rowww = mysqli_fetch_assoc($result);

// $sql2 = "SELECT AVG(comment.comment_score) FROM comment LEFT JOIN sharer on  sharer.trade_lend = comment.trade_lend WHERE bk_ISBN ='$book_isbn' GROUP BY trade_lend HAVING count(*)>1";
// $rs2 = mysqli_query($conn, $sql2);
// $score = mysqli_fetch_assoc($rs2);
// echo"123";
// echo $score;


?>

<!-- Blog Details Section Begin -->
<div class="row">
  <div class="col-md-3 text-center">
    <img class="img-responsive img-thumbnail" src="./bootstrap/img/<?php echo $row['bk_img']; ?>">
  </div>
  <div class="col-md-6">
    <h4><?php echo $row['name']; ?></h4>
    <table class="table">
      <?php foreach ($row as $key => $value) {
        if ($key == "name" || $key == "bk_img" || $key == "bk_ID" || $key == "bk_lang" || $key == "bk_adddate" || $key == "apply_date" || $key == "apply_status" || $key == "apply_applicant") {
          continue;
        }
        switch ($key) {
          case "bk_ISBN":
            $key = "ISBN";
            break;
          case "bk_author":
            $key = "作者";
            break;
          case "bk_trans":
            $key = "譯者";
            break;
          case "bk_intro":
            $key = "書籍簡介";
            break;
          case "bk_public":
            $key = "出版社";
            break;
          case "bk_publicdate":
            $key = "出版日期";
            break;
          case "bk_type":
            $key = "書籍類別";
            break;
        }
      ?>
        <tr>
          <td><?php echo $key; ?></td>
          <td><?php echo $value; ?></td>
        </tr>

      <?php
      }

      ?>
    </table>

  </div>
</div>
<form method="post" action="index1.php" enctype="multipart/form-data">
  <section class="checkout spad">
    <div class="container">
      <div class="checkout__form">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="product__details__tab">
                <ul class="nav nav-tabs" role="tablist">
                  <h1 id="here"></h1>
                  <li class="nav-item">
                    <h3>可提供書籍者</h3>
                  </li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tabs-1" role="tabpanel">
                  </div>
                  <!-- Shoping Cart Section Begin -->
                  <section class="shoping-cart spad">
                    <div class="container">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="shoping__cart__table">
                            <table>
                              <thead>
                                <tr>
                                  <th class="shoping__product">提供者</th>
                                  <th>狀態</th>
                                  <th>書籍狀態</th>
                                  <th>租借時間</th>
                                  <th>可否延長</th>
                                  <th>評價</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                $link = mysqli_connect("localhost", "root", "12345678", "book");
                                $sql = "SELECT * FROM sharer";
                                $rs = mysqli_query($link, $sql);
                                // $sql2 = "SELECT AVG(comment_score) from comment where trade_lend ='$_record[4]'";
                                // $sql = "SELECT sharer_id,state,bk_name,bk_ISBN,trade_lend,time,continue_lend,gmail,bk_state,comment_score,AVG(comment_score) FROM sharer GROUP BY trade_lend";
                                // $rs2 = mysqli_query($link, $rs2);
                                while ($record = mysqli_fetch_row($rs)) {

                                  if ($book_isbn == $record[3]) {
                                  
                                    if($record[1]=="1"||$record[1]=="0"){
                                ?>
                                    <tr>
                                      <td class="shoping_cart_item"><?php echo $record[4] ?></td>
                                      <td>
                                        <p>
                                          <a href="jump.php?gmail=<?php echo $record[7] ?>&bookisbn=<?php echo $record[3] ?>">
                                            <?php
                                            if ($record[1] == '1') {
                                              echo "可出借";
                                            } else {
                                              echo "可預約";
                                            }
                                            ?>
                                            <input type="hidden" name="state" value="<?php echo $record[1] ?>">

                                          </a>
                                        </p>
                                      </td>
                                      <td class="shoping_cart_item"><?php echo $record[8] ?></td>
                                      <td class="shoping_cart_item"><?php echo $record[5] ?></td>
                                      <td class="shoping_cart_item"><?php echo $record[6] ?></td>
                                      <?php
                                       
                                       $link = mysqli_connect("localhost", "root", "12345678", "book");
                                       $sql2 = "SELECT trade_lend,AVG(comment_score) from comment GROUP BY trade_lend";
                                       $rs2 = mysqli_query($link, $sql2); 
                                       while ($record1 = mysqli_fetch_row($rs2)) {
                                       
                                         if ($record[4] == $record1[0]) {
                                          
                                      ?>
                                        <td class="shoping_cart_item"><?php echo $record1[1] ?></td>
                                    </tr>
                              <?php
                                         }}}
                                    }}
                                  
                              ?>

                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>
                  <!-- Shoping Cart Section End -->
                  <div class="tab-pane" id="tabs-3" role="tabpanel">
                    <!-- Comment Area Start -->

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</form>
<!-- Product Details Section End -->

<!-- Related Product Section Begin -->
<section class="related-product">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="section-title related__product__title">
          <h2>管理員推薦</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <?php foreach ($roww as $book) { ?>
        <div class="col-md-3" style="text-align:center">
          <div class="featured__item">
            <div class="featured__item__pic set-bg">
              <img class="img-responsive img-thumbnail" src="./bootstrap/img/<?php echo $book['bk_img']; ?>">
              <?php echo '<ul class="featured__item__pic__hover">'; ?>
              <?php echo '<li><div class="test2">'; ?>
              <a href="book-details.php?bookisbn=<?php echo $book['bk_ISBN']; ?>">
                <?php echo '<i class="fa fa-book-bookmark"></i>'; ?> </a>
              <?php echo '</div></li>'; ?>
              <?php echo '<li><div class="test3">'; ?>
              <a href="sharer-info.php?bookisbn=<?php echo $book['bk_ISBN']; ?>">
                <i class="fa fa-plus"></i></a>
            </div>
            </li>
            <?php echo '</ul>'; ?>
            <?php echo '</div>'; ?>
            <?php echo '<div class="featured__item__text" style="text-align:center">'; ?>
            <?php echo '<h6>' . $book['name'] . '</h6>'; ?>
            <?php echo '</div>'; ?>
            <?php echo '</div>'; ?>

          </div>
        <?php } ?>
        </div>

    </div>
  </div>
</section>
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