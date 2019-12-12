<?php 
//*-------------------------------reset cart--------------------
if(isset($_POST['reset'])) {
require("../db/db.php");
$stmt = $conn->prepare("DELETE FROM items_cart");
$stmt->execute();
header("Refresh: 1; url=../index.php");
}
 ?>