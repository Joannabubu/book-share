<?php
session_start();

$method=$_POST["method"];
$name=$_SESSION['name'];
$book=$_POST["book"];
$date = $_POST["date"];
$lend=$_POST["lend"];
$id=$_POST["id"];
$state=$_POST["state"];
$gmail=$_POST["gmail"];
$isbn=$_POST["bookisbn"];
echo $method;
$link=mysqli_connect("localhost","root","12345678","book");
mysqli_select_db($link,"book");
echo $state;


	
	
if($method=="borrow"){
	echo "rrr";
	if($name==$lend){
		header('location: nonono.php');
	}

	else{
		
	if($state=="1"){
		echo "123";
		$sql="UPDATE sharer SET state='0' WHERE sharer_id='$id'";
		$sql2 = "INSERT INTO trade VALUES ('','$book','$date','$lend','$name','lend','0','0')";
    $rs1 = mysqli_query($link, $sql);
    $rs2 = mysqli_query($link, $sql2);
	echo "345";
		echo $sql2;
		if($rs1&&$rs2)
		 {
			header('location:email.php?gmail='.$gmail.'&bookisbn='.$isbn.'');
			exit;
		 }
		 else{
			 echo mysqli_error($link);
		 }
	}
	if ($state == "0") {
		$sql3 = "UPDATE sharer SET state='2' WHERE sharer_id='$id'";
		$sql4 = "INSERT INTO trade VALUES ('','$book','$date','$lend','$name','reserve','0','0')";
		$sql5 = "insert into point (point_id, point_date, point_bookname, point_lend, point_borrow, point_level, point_plus) values ('','$date','$book','$lend','$name','reserve','-10')";
		$rs3 = mysqli_query($link, $sql3);
		$rs4 = mysqli_query($link, $sql4);
		$r35 = mysqli_query($link, $sql5);
		echo $sql3;
		echo $sql4;
		echo $sql5;
		if (($rs3) && ($rs4)) {
			if ($rs5) {
				echo "123";
				header('location: reserve-suss.php');
			}
			echo "456";
			header('location: reserve-suss.php');
		} else {
			echo mysqli_error($link);
		}
	}
}
}
?>