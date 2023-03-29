<?php
  $method=$_POST["method"];
  $id= $_POST["id"];
 $lend=$_POST["lend"];
 $bookname=$_POST["bookname"];

 $link=mysqli_connect("localhost","root","12345678","book");
  mysqli_select_db($link,"book");

	


  if (isset($method)) 
  {
    if($method=="delete")

    {

	   $sql="delete from sharer where sharer_id='$id'";
    
	   if(mysqli_query($link,$sql))
		{ 
			header('location:okok.php');
		  

		}else{header('localtion:record.php');}
  }
  else{
    if($method=="return"){
        $sql="UPDATE `sharer` SET sharer.state='1' WHERE sharer.lend='$lend' AND sharer.bk_name='$bookname'";
          if(mysqli_query($link,$sql))
		          { 
			            header('location:okok.php');
		  
              }       
              else{header('localtion:record.php');}
            }
  }
  }




?>

 