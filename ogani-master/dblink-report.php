<?php

session_start();
$method=$_POST["method"];
$time = $_POST["time"];
$conlend = $_POST["conlend"];
$bkstate = $_POST["bk_state"];
$gmail = $_POST["gmail"];
$lend = $_SESSION["name"];




$link=mysqli_connect("localhost","root","12345678","book");

mysqli_select_db($link,"book");

echo "123";

 if($method=="sharer"){
    $sql="insert into sharer (id,state,trade_lend,time, continue_lend, gmail,bk_state) values ('','1','$lend',$time','$conlend','$gmail','$bk_state')";

    echo $sql;

    if(mysqli_query($link,$sql))
  {

     header('location: index1.php');

  }
 }

// $method=$_POST["method"];
// $time = $_POST["time"];
// $conlend = $_POST["conlend"];
// $bkstate = $_POST["bk_state"];
// $gmail = $_POST["gmail"];






// $link=mysqli_connect("localhost","root","12345678","book");

// mysqli_select_db($link,"book");

// echo "123";

//  if($method=="sharer"){
// 	   $sql="insert into sharer (time, continue_lend, gmail,bk_state) values ('$time','$conlend','$gmail','$bk_state')";

// 	   echo $sql;

// 	   if(mysqli_query($link,$sql))
// 		{

// 		   header('location: index1.php');

// 		}
// 	}


// $method=$_POST["method1"];
// $reason=$_POST["reason"];
// $reportcontent=$_POST["reportcontent"];


// $link=mysqli_connect("localhost","root","12345678","book");

// mysqli_select_db($link,"book");


//  if($method=="report")

//     {

// 	   $sql="insert into report (report_reason,report_content) values ('$reason','$reportcontent')";

// 	   echo $sql;

// 	   if(mysqli_query($link,$sql))
// 		{

// 		   header('location:record.php');

// 		}
//  }
?>