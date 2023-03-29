<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Forgot Password</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
<?php
$account = $_POST["account"];
$password = $_POST["password"];



$link = mysqli_connect("localhost", "root", "12345678", "book");
$sql = "select * from `authority` where account='$account'";

$rs  = mysqli_query($link, $sql);
$record = mysqli_fetch_assoc($rs);
$nowDate = date('Y-m-d');
$endDate = date('Y-m-d', strtotime($record['report_date'] . ' + 30 days'));
$nowDatet = strtotime($nowDate);
$endDatet = strtotime($endDate);
echo "!23";
echo $endDate;
echo $nowDate;
echo $nowDatet;
echo $endDatet;


session_start();

// echo session_save_path();	
if ($record['account'] == $account && $record['password'] == $password) {
    echo "44";
    if ($record['report_count'] == 3) {
        echo "rrr";
        if ($nowDatet >= $endDatet) {
            echo "555";
            $sql2 = "UPDATE authority set report_count = '0' where account = '$account' ";
            $_SESSION['name'] = $record['name'];
            $_SESSION['account'] = $record['account'];
            if (mysqli_query($link, $sql2)) {

                if ($record['level'] == "admin") {
                    header('Location:http://localhost/crazy/back/charts.php');
                } else {
                    header('Location:http://localhost/crazy/SA/ogani-master/index.php');
                }
            }
        } elseif ($nowDatet < $endDatet) {
            echo "iii";
            echo "<script>alert(\"由於您的帳號已被檢舉超過三次，請在". $endDate ."之後再登入。謝謝您的配合。\"); location.href = 'index1.php';</script>";
            echo "<script>alert(\"由於您的帳號已被檢舉超過三次，請在 ". $endDate ."之後再登入。
                 謝謝您的配合\"); location.href = 'index1.php';</script>";
        }
    } else {
        $_SESSION['name'] = $record['name'];
        $_SESSION['account'] = $record['account'];

        if ($record['level'] == "admin") {
            header('Location:http://localhost/crazy/back/charts.php');
        } else {
            header('Location:http://localhost/crazy/SA/ogani-master/index.php');
        }
    }
} else if ($account != $record['account']) {

    echo "<script>alert('無此帳號，請先建立帳號'); location.href = 'login1.php';</script>";
} else {
    echo "<script>alert('密碼錯誤'); location.href = 'login1.php';</script>";
}



?>

<!-- //     $account = $_POST["account"];
                //     $password = $_POST["password"];
                 
                //     $link = mysqli_connect("localhost","root","12345678","book");
                //     $sql = "select * from `authority` where password='$password' and account='$account'";
                 
                
                //      $rs  =mysqli_query($link,$sql);
                
                
                    
                //      session_start();
                //  if(isset($_POST['account']) && isset($_POST['password'])){
                //                       if($_POST['account']== $_SESSION['account'] && $_POST['password'] == $_SESSION['password']){
                //                            if($record = mysqli_fetch_assoc($rs)){
                                            
                //                                     $_SESSION['name'] = $record['name'];
                //                                     $_SESSION['level'] = $record['level'];
                
                       
                //                                     if($_SESSION['level']=="admin"){
                //                                         header('Location:http://localhost/SA/back/index.html');
                //                                         }
                //                                      else{
                //                                          header('Location:http://localhost/SA/SA/SA/ogani-master/index.php');
                //                                         }
                //                                  }
                //                       }
                //                       else if($_POST['account']!=$_SESSION['account']){
                         
                //                         echo "<script>alert('無此帳號，請先建立帳號'); location.href = 'login1.php';</script>"; }
                //                       else{
                //                           echo "<script>alert('密碼錯誤'); location.href = 'login1.php';</script>"; 
                //                       }
                
                //                     ;}   -->
<!-- ?>         -->






</html>