<?php
$method = $_POST["method"];
$name = $_POST["name"];
$account = $_POST["account"];
$password = $_POST["password"];
$level = "user";

$link = mysqli_connect("localhost", "root", "12345678", "book");

mysqli_select_db($link, "book");
if (isset($_POST['submit'])){
	$sql = "select * from authority where name = '$name'";
	$res = mysqli_query($link,$sql);
	$pass = mysqli_fetch_row($res);
	if($pass){
		echo "<script>alert('使用者名稱已存在!'); location.href = 'register.php';</script>";
	} else{
		$sqll = "insert into authority (name, account, password, level,point) values ('$name','$account','$password','$level','50')";
		$retval = mysqli_query($link,$sqll);
		if(!$retval){
			die('註冊失敗'.mysqli_error($link));
		}
		echo "<script>alert('註冊成功！'); location.href = 'login1.php';</script>";
	}

}
?>