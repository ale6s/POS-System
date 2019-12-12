
<div class="container-fluid">
	<div class="row">
  <div class="col-lg-5">
  <?php include("model/cart.php"); ?>
  </div>
<!---****************** agregar articulo php******************************** -->
<div class="col-lg-7 ">
	<br>
	<?php 
include("db/db.php");

$sql = "SELECT i_id, i_desc, i_qty, i_price FROM items ORDER BY i_desc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	?>

<input type="text" class="mb-1 w-100 form-control" id="myInput1" placeholder="Buscar Articulo..." >

<div class="table-wrapper-scroll-y my-custom-scrollbar">
<table class="table table-hover  text-center">
  <thead class="thead-dark">
        <tr>
            <th class="text-warning font-weight-bold">Articulo</th>
            <th class="text-warning font-weight-bold">Precio</th>
            <th class="text-warning font-weight-bold">Cantidad</th>
            <th class="text-warning font-weight-bold">Agregar al Carrito</th>
        </tr>
  </thead>
<?php
    // output data of each row
    while($row = $result->fetch_assoc()) {
?>

    <tbody id="myTable1" >
<?php
        echo "<td class=font-weight-bold><b class='text-primary'>" . $row["i_desc"]. "</b><td><p class=font-weight-bold>$" . $row["i_price"]. "</p></td><td><p class=font-weight-bold>".$row["i_qty"]. " KG</p></td></td>" ?> 
        
           <?php
           //<button data-toggle="modal" data-target="#sell" class="btn btn-primary btn-sm" href="#"><i class="fas fa-cart-plus fa-2x"></i></button> </td>
          echo '<td><a class="btn btn-success btn-sm " onclick="window.open(`model/add-cart.php?id=' . $row["i_id"] . '`, `newwindow`, `width=400,height=480`); "><i style="color:white;" class="fas fa-cart-plus fa-2x"></i></a></td>';
    }
?>
  	</tbody>
</table>






</div>
    <?php
} else {
    echo "No hay Articulos en la Base de Datos";
}
$conn->close();

 ?>
</div>

	</div>		
</div>

<!--search item in the index page-->
<script>
$(document).ready(function(){
  $("#myInput1").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable1 tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
