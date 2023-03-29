<?php
session_start();

$method=$_POST["method"];
$time = $_POST["time"];
$conlend = $_POST["conlend"];
$bkstate = $_POST["bk_state"];
$gmail = $_POST["gmail"];
$isbn=$_POST["bookisbn"];
$name=$_SESSION['name'];
$bk_name=$_POST['bk_name'];

echo $bk_name;
require_once "./functions/database_functions.php";
$conn = db_connect();
$rowww =sharer($conn);

mysqli_select_db($conn,"book");
$count=0;

foreach($rowww as $book) { 
	if($name==$book['trade_lend'] && $isbn==$book['bk_ISBN']){ 
		$count++;
	}}

 if($method=="sharer"){
	
	if($count!=0){ 
		header('location: add-false.php');

	}
	else{
		$sql="insert into sharer values (' ','1','$bk_name','$isbn','$name','$time','$conlend','$gmail','$bkstate','0')";

		echo $sql;
 
		if(mysqli_query($conn,$sql))
		 {
			header('location: sharer-suss.php');
		 }
		 else{
			 echo("Errorcode: " . mysqli_errno($conn));
		 }
	}}

?>