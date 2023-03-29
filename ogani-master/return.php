<?php
$method=$_POST["method"];
$id=$_POST["trade_id"];
 $lend=$_POST["lend"];
 $bookname=$_POST["bookname"];
 $borrow=$_POST["borrow"];
 $date= date("Y-m-d");

 $link=mysqli_connect("localhost","root","12345678","book");
  mysqli_select_db($link,"book");

  if (isset($method)) 
  {
    if($method=="return"){ 
      $check="select sharer.state from sharer  WHERE sharer.trade_lend='$lend' and sharer.bk_name='$bookname'";
      $sql0="update `sharer` set sharer.state='3' WHERE sharer.trade_lend='$lend' and sharer.bk_name='$bookname'";
      $sql="update `sharer` set sharer.state='1' WHERE sharer.trade_lend='$lend' and sharer.bk_name='$bookname'";
      $sql2="update `trade` set trade.trade_level='done', trade.trade_returndate='$date' WHERE trade.trade_id='$id' and trade.trade_borrow='$borrow' and trade.trade_lend='$lend'";
      $sql3="update `sharer` set sharer.trade_returndate='$date' WHERE  sharer.trade_lend='$lend' and sharer.bk_name='$bookname'";
      $sql4="update `trade` set trade.trade_date=DATE_ADD('$date', INTERVAL 1 week) WHERE trade.trade_lend='$lend' and trade.trade_bookname='$bookname' and trade.trade_level='reserve'";//預約開始算7天輸入預約trade_date欄位，判斷預約狀態
      $sql5="insert into point (point_date, point_bookname, point_borrow, point_lend, point_level, point_plus) values ('$date','$bookname','$lend','$borrow','done','+5')";
     
      $rs=mysqli_query($link,$check);  
      		   
							
      while($record=mysqli_fetch_row($rs)){   
       
         if($record[0]=='2'){
      


          if(mysqli_query($link,$sql0)){
            echo $sql4;
            
              if( mysqli_query($link,$sql2))
         
		          {      echo $sql2;
                if( mysqli_query($link,$sql3)){
                  echo "only 3";
                  if(mysqli_query($link,$sql4)){
                echo $sql4;
                    header('location:work.php');
                }
              }
              }       
              else { 
                 echo "sql3 wrong";
                }
              
            } else {echo "sql wrong"; } }
            else{
              if(mysqli_query($link,$sql)){
                echo "good";
                
                  if( mysqli_query($link,$sql2))
             
                  {      echo "better";
                    if( mysqli_query($link,$sql3)){
                      echo "keepgoing";
                      
                      header('location:work.php');
            }
          }
        }
  }}
  if(mysqli_query($link,$sql5)){
    echo $sql5;
    header('location:work.php');
  }		
}}
 
  




?>

 