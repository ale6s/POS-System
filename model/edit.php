
<?php
include("../view/head.php");
if(isset($_POST['btn-sub-edit'])) {
$id = $_POST['id'];
$item = $_POST['item'];
$qty = $_POST['price'];
$price = $_POST['qty'];

try {
require("../db/db.php");
$stmt = $conn->prepare("UPDATE items SET i_desc='$item', i_price='$price', i_qty='$qty' WHERE i_id='$id'");
$stmt->execute();
echo "<script>window.opener.location.reload();window.close(); </script>";
}
catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

}else if (isset($_GET['id'])) {
try {
require ("../db/db.php");
$id = $_GET['id'];
$sql = "SELECT i_id, i_desc, i_qty, i_price from items where i_id='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$item = $row['i_desc'];
$price = $row['i_price'];
$qty = $row['i_qty'];
}
catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
}

?>



    <div class="modal-dialog">
    
      <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Editar <spam class="text-warning font-weight-bold"><?php echo $item; ?></spam></h4>

        </div>


        <div class="modal-body">
    <form action="" method="POST">
        <input type="hidden" value="<?php echo $id; ?>" name="id">
        <div class="form-group">
            <label for="item" class="font-weight-bold">Articulo</label>
            <input type="text" class="form-control" name="item" value="<?php echo $item; ?>">
        </div>

        <div class="form-group">
            <label for="price" class="font-weight-bold">Precio</label>
            <input type="number" type="text" class="form-control" name="price" value="<?php echo $price; ?>">
        </div>

        <div class="form-group">
            <label for="Cantidad" class="font-weight-bold">Cantidad en KG</label>
            <input type="number" class="form-control" name="qty" value="<?php echo $qty; ?>">
        </div>
         


        <div class="modal-footer">
          <input type="submit" id="cancel_edit" class="btn btn-warning font-weight-bold" name="btn-sub-edit" value="Hacer Cambio">
        </div>
    </form>
      </div>
      
    </div>
  </div>