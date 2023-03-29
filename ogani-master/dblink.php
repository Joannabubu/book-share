<?php
$method=$_POST["method"];
$method1=$_POST["method1"];
$method2=$_POST["method2"];
$method3=$_POST["method3"];

$name = $_POST["name"];
$account = $_POST["account"];
$password = $_POST["password"];

$email=$_POST["email"];
$title=$_POST["title"];
$content=$_POST["content"];

$reportreason=$_POST["reportreason"];
$reportcontent=$_POST["reportcontent"];
$reportwrite=$_POST["reportwrite"];
$reportbookname=$_POST["reportbookname"];
$reportaccount = $_SESSION['account'];

$score=$_POST["score"];
$commentcontent=$_POST["commentcontent"];
$commentname = $_POST["commentname"];
$commentbook = $_POST["commentbook"];
$commentwrite = $_POST["commentwrite"];
$report_write=$_POST["report_write"];
$reportname=$_POST["reportname"];
$reservebookname=$_POST["reservebookname"];
$date=  date("Y-m-d");
$reservelend=$_POST["reservelend"];





$link=mysqli_connect("localhost","root","12345678","book");

mysqli_select_db($link,"book");


if (isset($_POST["method"])){
 echo $method;
 if($method=='customer_service')

    { $sql="insert into customer_service (service_name,service_email,service_title, service_content) values ('$name','$email','$title','$content')";

    echo $sql;

    if(mysqli_query($link,$sql))
  {
  echo "yesyes";
     header('location: index.php');

  } 
  
 }
 else{
 

 $sql="insert into comment (comment_id,trade_lend,comment_write,comment_book,comment_score,comment_content) values ('','$commentname','$commentwrite','$commentbook','$score','$commentcontent')";
 $sql2="update trade set trade.comment_times='1' WHERE trade.trade_borrow = '$commentwrite' and trade.trade_bookname = '$commentbook' "; 

 echo $sql;
 if(mysqli_query($link,$sql))
  {
 
  echo $sql2;
  if(mysqli_query($link,$sql2)){
   echo"1";
   

   header('location: record.php');
  }else{echo"2";
   header('location: record.php');
  }
  }
  }


}

echo "234";


 if (isset($_POST["method1"])){
    
 if($method1 =="report")

    {
       echo "666";
    $sql="insert into report (report_id,report_reason,report_content,report_name,reported_account,report_write,report_bookname,report_date) values ('','$reportreason','$reportcontent','$reportname','$reportaccount','$reportwrite','$reportbookname','$date')";

    echo $sql;

    if(mysqli_query($link,$sql))
  {
     echo "555";
     header('location: record.php');

  }
 }}

 if (isset($_POST["method2"])){
	if($method2 =="noreserve")
   
	   {
   
		  $sql="DELETE FROM trade where trade.trade_borrow='$_SESSION[name]' and trade.trade_level='reserve'";
   
		  echo $sql;
   
		  if(mysqli_query($link,$sql))
		   {
			   echo $sql;
			  header('location: reserve.php');
   
		   }
	}}
   
	if (isset($_POST["method3"])){
		$sql2="DELETE FROM trade where trade.trade_borrow='$_SESSION[name]' and trade.trade_level='reserve' and trade_bookname='$reservebookname'";
		if($method3 =="gotolend")
	   
		   { 
			  $sql="insert into trade (trade_id,trade_bookname,trade_date,trade_lend,trade_borrow,trade_level) values ('','$reservebookname','$date','$reservelend','$_SESSION[name]','lend')";
			  $sql3="update `sharer` set sharer.state='0' WHERE sharer.trade_lend='$reservelend' and sharer.bk_name='$reservebookname'";
	   
			  if(mysqli_query($link,$sql))
			   {
				   echo $sql;
				
				  if(mysqli_query($link,$sql2))
				  {
					  echo $sql;
					  if(mysqli_query($link,$sql3)){
					 header('location: reserve.php');}
		  
				  }
			   }
		}
		else{
			$sql0="update `sharer` set sharer.state='1' WHERE sharer.trade_lend='$_SESSION[name]' and sharer.bk_name='$reservebookname'";
			if(mysqli_query($link,$sql2))

			{ echo "2i2i";
				if(mysqli_query($link,$sql0)) {
					echo"slls";
				}


			}

		}
	}
	   
	

?>