<?php
	function db_connect(){
		$conn = mysqli_connect("localhost", "root", "12345678", "book");
		if(!$conn){
			echo "Can't connect database " . mysqli_connect_error($conn);
			exit;
		}
		return $conn;
	}

    function isbn($conn){
		$row = array();
		$query = "SELECT bk_ISBN,name FROM book_data";
		$result = mysqli_query($conn, $query);
		if(!$result){
		    echo "Can't retrieve data " . mysqli_error($conn);
		    exit;
		}

				for($i = 0; $i < mysqli_num_rows($result) ; $i++){
				array_push($row, mysqli_fetch_assoc($result));
			}
		return $row;
	}
	
	

	function select4LatestBook($conn){
		$row = array();
		$query = "SELECT bk_ISBN, bk_img,name,apply_date,apply_status FROM book_data WHERE apply_status ='1' ORDER BY bk_ID DESC ";
		$result = mysqli_query($conn, $query);
		if(!$result){
		    echo "Can't retrieve data " . mysqli_error($conn);
		    exit;
		}

				for($i = 0; $i < 8 ; $i++){
				array_push($row, mysqli_fetch_assoc($result));
			}
		return $row;
	}

	function AdminPrefer($conn){
		$row = array();
		$query = "SELECT bk_ISBN, bk_img,name FROM admin_prefer";
		$result = mysqli_query($conn, $query);
		if(!$result){
		    echo "Can't retrieve data " . mysqli_error($conn);
		    exit;
		}

		for($i = 0; $i < 8 ; $i++){
			array_push($row, mysqli_fetch_assoc($result));
		}

		return $row;
	}

	function sharer($conn){
		$row = array();
		$query = " SELECT comment.trade_lend,AVG(comment.comment_score),sharer.bk_ISBN,sharer.sharer_id,sharer.state,sharer.trade_lend,sharer.time,sharer.continue_lend,sharer.gmail,sharer.bk_state FROM comment LEFT JOIN sharer on sharer.trade_lend = comment.trade_lend GROUP BY comment.trade_lend";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Can't retrieve data " . mysqli_error($conn);
			exit;
		}
		for($i = 0; $i < (mysqli_num_rows($result)) ; $i++){
		 array_push($row, mysqli_fetch_assoc($result));
		}
		return $row;
	   }

	function getBookByIsbn($conn, $isbn){
		$query = "SELECT name, bk_author, bk_public FROM book_data WHERE bk_ISBN = '$isbn'";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Can't retrieve data " . mysqli_error($conn);
			exit;
		}
		return $result;
	}

	// function getOrderId($conn, $customerid){
	// 	$query = "SELECT orderid FROM orders WHERE customerid = '$customerid'";
	// 	$result = mysqli_query($conn, $query);
	// 	if(!$result){
	// 		echo "retrieve data failed!" . mysqli_error($conn);
	// 		exit;
	// 	}
	// 	$row = mysqli_fetch_assoc($result);
	// 	return $row['orderid'];
	// }

	// function insertIntoOrder($conn, $author, $total_price, $date, $ship_name, $ship_address, $ship_city, $ship_zip_code, $ship_country){
	// 	$query = "INSERT INTO orders VALUES 
	// 	('', '" . $customerid . "', '" . $total_price . "', '" . $date . "', '" . $ship_name . "', '" . $ship_address . "', '" . $ship_city . "', '" . $ship_zip_code . "', '" . $ship_country . "')";
	// 	$result = mysqli_query($conn, $query);
	// 	if(!$result){
	// 		echo "Insert orders failed " . mysqli_error($conn);
	// 		exit;
	// 	}
	// }

	// function getbookprice($isbn){
	// 	$conn = db_connect();
	// 	$query = "SELECT book_price FROM books WHERE book_isbn = '$isbn'";
	// 	$result = mysqli_query($conn, $query);
	// 	if(!$result){
	// 		echo "get book price failed! " . mysqli_error($conn);
	// 		exit;
	// 	}
	// 	$row = mysqli_fetch_assoc($result);
	// 	return $row['book_price'];
	// }

	// function getCustomerId($name, $address, $city, $zip_code, $country){
	// 	$conn = db_connect();
	// 	$query = "SELECT customerid from customers WHERE 
	// 	name = '$name' AND 
	// 	address= '$address' AND 
	// 	city = '$city' AND 
	// 	zip_code = '$zip_code' AND 
	// 	country = '$country'";
	// 	$result = mysqli_query($conn, $query);
	// 	// if there is customer in db, take it out
	// 	if($result){
	// 		$row = mysqli_fetch_assoc($result);
	// 		return $row['customerid'];
	// 	} else {
	// 		return null;
	// 	}
	// }

	// function setCustomerId($name, $address, $city, $zip_code, $country){
	// 	$conn = db_connect();
	// 	$query = "INSERT INTO customers VALUES 
	// 		('', '" . $name . "', '" . $address . "', '" . $city . "', '" . $zip_code . "', '" . $country . "')";

	// 	$result = mysqli_query($conn, $query);
	// 	if(!$result){
	// 		echo "insert false !" . mysqli_error($conn);
	// 		exit;
	// 	}
	// 	$customerid = mysqli_insert_id($conn);
	// 	return $customerid;
	// }

	// function getPubName($conn, $pubid){
	// 	$query = "SELECT publisher_name FROM publisher WHERE publisherid = '$pubid'";
	// 	$result = mysqli_query($conn, $query);
	// 	if(!$result){
	// 		echo "Can't retrieve data " . mysqli_error($conn);
	// 		exit;
	// 	}
	// 	if(mysqli_num_rows($result) == 0){
	// 		echo "Empty books ! Something wrong! check again";
	// 		exit;
	// 	}

	// 	$row = mysqli_fetch_assoc($result);
	// 	return $row['publisher_name'];
	// }

	function getAll($conn){
		$query = "SELECT * from book_data ORDER BY bk_ISBN DESC";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Can't retrieve data " . mysqli_error($conn);
			exit;
		}
		return $result;
	}
?>