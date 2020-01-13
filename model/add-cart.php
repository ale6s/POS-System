<?php 
include("../view/head.php");
require ("../db/db.php");
$id = $_GET['id'];

$sql = "SELECT i_desc, i_price FROM items WHERE i_id='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$desc = $row['i_desc'];
$price= $row['i_price'];



if(isset($_POST['sellbtn'])) {
require("../db/db.php");

$qty = $_POST['sell-qty'];
try {
	
	$stmt = $conn->prepare("INSERT INTO items_cart SET  i_id='$id', i_desc='$desc', i_price='$price', i_qty='$qty' ");
  $stmt->execute();
  echo "<script>window.opener.location.reload(); window.close(); </script>";

	}
	catch(PDOException $e) {
		echo 'ERROR: ' . $e->getMessage();
	}
	
	}

 ?>


 
  <!-- **********************Modal for add new item to the shopping cart*************************-->
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
       	<h4 class="modal-title">Agregar <spam class="text-warning font-weight-bold"><?php echo $desc; ?></spam> al Carrito</h4>
        </div>

        <div class="modal-body">
<form action="" method="POST" >
<input type="hidden" value="<?php echo $id; ?>" name="id">
		<div class="form-group">
          	<span for="item" class="font-weight-bold">Cantidad En KG </span>
          	<input type="number" value="1" class="form-control w-50" name="sell-qty">
		</div>

        <div class="modal-footer">
          <input id='insert' type="submit" class="btn btn-success" name="sellbtn" value="Agregar al carro">
        </div>

</form>
      </div>
      
    </div>
  </div>

