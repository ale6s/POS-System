<?php 

if(isset($_POST['btn-pay'])) {

	try {
	require("../db/db.php");
	$stmt = $conn->prepare("INSERT INTO sales(i_id, i_desc, qty, date, amount) SELECT i_id, i_desc, i_qty, curdate(), i_price FROM items_cart");
	$stmt->execute();
	 
	$stmt = $conn->prepare("UPDATE items SET i_qty = (SELECT i_qty FROM items WHERE i_id = '114') - (SELECT i_qty FROM items_cart WHERE i_id = '114') WHERE i_id = '114'");
	$stmt->execute();

	$stmt = $conn->prepare("DELETE FROM items_cart");
	$stmt->execute();
	header ('Location: ../index.php');
	}
	catch(PDOException $e) {
		echo 'ERROR: ' . $e->getMessage();
	}
}

 ?>