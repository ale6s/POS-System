
<?php 
include("db/db.php");

$sql = "SELECT i_id, i_desc, i_qty, i_price FROM items_cart ORDER BY i_desc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	?>
<div class="table-wrapper-scroll-y my-custom-scrollbar" style="background-color:white; border-radius:5px;">
<table class="table text-center">
<thead class="thead-light">
        <tr>
            <th class="font-weight-bold">Articulo</th>
            <th class="font-weight-bold">Precio</th>
            <th class=" font-weight-bold">Cantidad en MG</th>
            <th class=" font-weight-bold">Editar Cantidad</th>
            <th class=" font-weight-bold">Borrar</th>
        </tr>
  </thead>
<?php
    // output data of each row
    while($row = $result->fetch_assoc()) {
?>
	<tbody>
<?php //tabla datos base
        echo "<td class=text-primary><p class=font-weight-bold>" . $row["i_desc"]. "</p><td><p class=font-weight-bold>$" . $row["i_price"]. "</p></td><td><p class=font-weight-bold>".$row["i_qty"]. " MG</p></td></td>" ?> 
            
                                                                               <!-- button  > -->
            <?php 
            //editar buttton
            echo '<td><a style="margin-bottom:10px;" class="col-lg-12 btn btn-warning btn-sm" onclick="window.open(`model/update-cart.php?id=' . $row["i_id"] . '`, `newwindow`, `width=400,height=480`); "><i style="color:white;" class="fas fa-pencil-alt"></i></a></td>';
             //borrar botton
            echo '<td><a class="col-lg-12 btn btn-danger btn-sm" href=model/delete-cart.php?id=' . $row["i_id"] .'><i style="color:white;" class="fas fa-trash-alt"></i></a></td>'; ?> 
            <?php
    }
?>

      </tbody>
</table>
</div>
<div class="container">

  <form method="post" action="model/reset-cart.php">
        <div class="row justify-content-md-center">
        <div class="col col-lg-start">
        <input type="submit" value="reset" name="reset" class="btn btn-danger">
        </div>
          <div class="col-md-end ">


          <!--Sum total sale Show total sales --> 
            <h2 class="font-weight-bold">Total: 
                <?php 
                include("view/head.php");
                include("db/db.php");
                $sql = "SELECT SUM(i_price * i_qty) as 'total' FROM items_cart";
                $result=mysqli_query($conn,$sql);
                $row=mysqli_fetch_assoc($result);
                $total = $row['total'];
                echo "<span class=text-danger>$", $total, "</span>";
                ?>
            </h2>
<!-- --------------end of total -->

          </div>
        </div>  
  </form>
</div>
<button data-toggle="modal" data-target="#pay" id="pay-btn" class="btn btn-success font-weight-bold btn-lg col-sm-12" >Pagar</button>
    <?php
    //check is there are items in the cart
} else {
  ?>
  <div class="table-wrapper-scroll-y my-custom-scrollbar" style="background-color:white; border-radius:5px;">
  <table class="table">
  <thead class="thead-light">
        <tr>
            <th class="font-weight-bold">Articulo</th>
            <th class="font-weight-bold">Precio</th>
            <th class="font-weight-bold">Cantidad en MG</th>
            <th class="font-weight-bold">Action</th>
        </tr>
  </thead>
    <td><h5 class="font-weight-bold text-danger" >No hay Articulos en el Carrito</h5></td>
</table>
</div>
  <?php
}
 ?>


<style>
.my-custom-scrollbar {
  position: relative;
  height: 640px;
  overflow: auto;
}
.table-wrapper-scroll-y {
  display: block;
}
#employees-table td,
#employees-table th
{
    border: 2px solid gray;
}
</style>

  <!-- **********************Modal for add new item to the shopping cart*************************-->
  <div class="modal fade" id="sell" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content w-75">
        <div class="modal-header">
       	<h4 class="modal-title">Agregar al Carrito</h4>
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-times fa-2x"></i></button>
        </div>

        <div class="modal-body">
<form action="model/add-cart.php" method="POST">
		<div class="form-group">
          	<span for="item">Cantidad En KG</span>
          	<input type="number" class="form-control w-50" name="sell-qty">
		</div>

        <div class="modal-footer">
          <input type="submit" class="btn btn-success" name="sellbtn" value="Agregar">
        </div>

</form>
      </div>
      
    </div>
  </div>
</div>

<!-- **********************Modal to pay*************************-->
<div class="modal fade" id="pay" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content w-75">
        <div class="modal-header">
       	<h4 class="modal-title  font-weight-bold">Pagar <i class="far fa-money-bill-alt green"></i></h4>
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-times fa-2x"></i></button>
        </div>

        <div class="modal-body">
<form action="model/add-sale.php" method="POST">
		<div class="form-group">
        <h3 class="font-weight-bold">Total:                
        <?php 
                include("view/head.php");
                include("db/db.php");
                $sql = "SELECT SUM(i_price * i_qty) as 'total' FROM items_cart";
                $result=mysqli_query($conn,$sql);
                $row=mysqli_fetch_assoc($result);
                $total = $row['total'];
                echo "<span class=text-danger>$</span><span class=text-danger id=total>", $total, "</span>";
        ?>
        </h3> <br>
        <input type="number" class="form-control w-50" id="paying" oninput="change()" placeholder="Pagando con $""><br>
        <h3 class="font-weight-bold">Cambio: <span class=text-danger>$</span><span id="change" class="text-danger">0</span> </h3>
		</div>
    
    <div class="modal-footer">
          <input type="submit" class="btn btn-success font-weight-bold" name="btn-pay" value="pagar">
    </div>

</form>
      </div>
      
    </div>
  </div>
</div>

<!--------------------------update change when paying------------------>
<script>
function change() 
{
  var total = document.getElementById("total").innerHTML;
  var paying = document.getElementById("paying").value;
  var change = parseFloat(paying) - total;
  if (!isNaN(change)){
    document.getElementById("change").innerHTML = change;
}else{
  document.getElementById("change").innerHTML = "0";
}
}
</script>