<?php 

if(isset($_POST['btn-sub'])) {
$item = $_POST['item'];
$price = $_POST['price'];
$qty = $_POST['qty'];

	try {
	require("../db/db.php");
	$stmt = $conn->prepare("INSERT INTO items SET i_desc='$item', i_price='$qty', i_qty='$price'");
	$stmt->execute();
	header ('Location: ../index.php');
	}
	catch(PDOException $e) {
		echo 'ERROR: ' . $e->getMessage();
	}
}


 ?>