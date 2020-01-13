<?php 

if(isset($_POST['btn-pay'])) {

	try {
	require("../db/db.php");
	$stmt = $conn->prepare("INSERT INTO sales(i_id, i_desc, qty, date, amount) SELECT i_id, i_desc, i_qty, curdate(), i_price FROM items_cart");
	$stmt->execute();

	// Update items in inventory
	$stmt = $conn->prepare("UPDATE items, items_cart SET items.i_qty = items.i_qty - (SELECT items_cart.i_qty FROM items_cart WHERE items.i_id = items_cart.i_id) WHERE items.i_id = items_cart.i_id");
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