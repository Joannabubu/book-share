<?php
$method=$_POST["method"];
$score=$_POST["score"];
$commentcontent=$_POST["commentcontent"];

echo$method;
$link=mysqli_connect("localhost","root","12345678","book");

mysqli_select_db($link,"book");


 if($method=="comment")

    {

		$sql="insert into comment (comment_id,comment_content) values ('','$commentcontent')";
		$sqll="insert into sharer (comment_score) values ('$score')";
		echo $sql;
		echo $sqll;
		$rs1 = mysqli_query($link, $sql);
		$rs2 = mysqli_query($link, $sqll);
		if(($rs1&&$rs2)){
	  
			header('location: record.php');
		  

		
		}
 }
?>