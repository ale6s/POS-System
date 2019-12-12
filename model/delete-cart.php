<?php 

if(isset($_GET['id'])) {
try {
require("../db/db.php");
$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM items_cart WHERE i_id='$id'");
$stmt->execute();
header ('Location: ../index.php');
}
catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
}

 ?>