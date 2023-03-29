<?php
  session_start();
  $book_isbn = $_GET['bk_ISBN'];
  // connecto database
  require_once "./functions/database_functions.php";
  $conn = db_connect();

  $query = "SELECT * FROM book_data WHERE bk_ISBN = '$book_isbn'";
  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;
  }

  $row = mysqli_fetch_assoc($result);
  if(!$row){
    echo "Empty book";
    exit;
  }

  $title = $row['name'];
  require_once "./template/header.php";
?>
      <!-- Example row of columns -->
      
      <div class="row">
        <div class="col-md-3 text-center">
          <img class="img-responsive img-thumbnail" src="./bootstrap/img/<?php echo $row['bk_img']; ?>">
        </div>
        <div class="col-md-6">
          <h4><?php echo $row['name']; ?></h4><br/>
          <table class="table">
          	<?php foreach($row as $key => $value){
              if( $key == "bk_ID" || $key == "bk_img" || $key == "name" || $key == "apply_date"){
                continue;
              }
              switch($key){
                case "bk_ISBN":
                  $key = "ISBN";
                  break;
                case "bk_author":
                  $key = "Author";
                  break;
                case "bk_trans":
                  $key = "translator";
                  break;
                case "bk_public":
                  $key = "publishing_house";
                  break;
                case "bk_lang":
                  $key = "language";
                  break;
                case "bk_type":
                   $key = "sort";
                   break;
              }
            ?>
            <tr>
              <td><?php echo $key; ?></td>
              <td><?php echo $value; ?></td>
            </tr>
            <?php 
              } 
              if(isset($conn)) {mysqli_close($conn); }
            ?>
          </table>
          <!-- <form method="post" action="cart.php">
            <input type="hidden" name="bookisbn" value="">
            <input type="submit" value="Purchase / Add to cart" name="cart" class="btn btn-primary">
          </form> -->
       	</div>
      </div>
<?php
  require "./template/footer.php";
?>