<?php
session_start();
$method=$_POST["method"];
$name=$_SESSION['name'];
$isbn = $_POST["isbn"];
$title  = $_POST["title"];
$author = $_POST["author"];
$tran  = $_POST["tran"];
$sort  = $_POST["sort"];
$publish  = $_POST["publish"];
$datee = $_POST["datee"];
$apply_date = date("Y-m-d");
$img=$_POST["img"];

if(isset($_FILES['img']) && $_FILES['img']['name'] != ""){
	$image = $_FILES['img']['name'];
	$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
	$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "bootstrap/img/";
	$uploadDirectory .= $image;
	$imgg = move_uploaded_file($_FILES['img']['tmp_name'], $uploadDirectory);
   }


echo $method;
$link=mysqli_connect("localhost","root","12345678","book");
mysqli_select_db($link,"book");


	
	
if($method=="add-books"){
	$query = "INSERT INTO book_data(bk_ID,bk_ISBN,name,bk_author,bk_trans,bk_public,bk_publicdate,bk_type,bk_img,apply_date,apply_status,apply_applicant) VALUES ('','$isbn ', '$title', ' $author ', ' $tran', ' $publish','$datee', ' $sort ', '$img','$apply_date','0','$name')";
	echo $query;
	$result = mysqli_query($link, $query);
	if(!$result){
	 echo "資料新增失敗，請再試一次 " . mysqli_error($conn);
	 exit;
	} else {
	 header("location: add-suss.php");
	}
}
?>