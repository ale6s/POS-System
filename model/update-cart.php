
<?php
include("../view/head.php");
if(isset($_POST['btn-sub-update'])) {
$id = $_POST['id'];
$qty = $_POST['qty'];

try {
require("../db/db.php");
$stmt = $conn->prepare("UPDATE items_cart SET i_qty='$qty' WHERE i_id='$id'");
$stmt->execute();
echo "<script>window.opener.location.reload(); window.close(); </script>";
}
catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

}else if (isset($_GET['id'])) {
try {
require ("../db/db.php");
$id = $_GET['id'];
$sql = "SELECT i_qty, i_desc FROM items_cart WHERE i_id='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$qty= $row['i_qty'];
$desc= $row['i_desc'];
}

catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
}

?>

    <div class="modal-dialog">
    
      <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title ">Actualizar <spam class="text-warning font-weight-bold"><?php echo $desc; ?></spam></h4>
        </div>


        <div class="modal-body">
    <form action="" method="POST">
        <input type="hidden" value="<?php echo $id; ?>" name="id">

        <div class="form-group">
            <label for="Cantidad" class="font-weight-bold" >Cantidad en KG</label>
            <input type="number" class="form-control" name="qty" value="<?php echo $qty; ?>">
        </div>
         


        <div class="modal-footer">
          <input type="submit" id="cancel_edit" class="btn btn-warning font-weight-bold" name="btn-sub-update" value="Hacer Cambio">
        </div>
    </form>
      </div>
      
    </div>
  </div>