<?php 
include("db/db.php");

$sql = "SELECT i_id, i_desc, i_qty, i_price FROM items ORDER BY i_desc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	?>
<div class="table-wrapper-scroll-y my-custom-scrollbar">
<table id="myTable" class="table table-hover text-center table-bordered" >
  <thead class="thead-dark">
        <tr>
            <th class="text-warning font-weight-bold">ID</th>
            <th class="text-warning font-weight-bold">Articulo</th>
            <th class="text-warning font-weight-bold">Precio</th>
            <th class="text-warning font-weight-bold">Cantidad</th>
            <th class="text-warning font-weight-bold">Editar</th>
            <th class="text-warning font-weight-bold">Borrar</th>
        </tr>
  </thead>
<?php
    // output data of each row
    while($row = $result->fetch_assoc()) {
?>
	<tbody>
<?php //tabla datos bd
        echo "<th><b>" . $row["i_id"]. "</b></td><td><span class='text-primary  font-weight-bold'>" . $row["i_desc"]. "</span></td><td><p class=font-weight-bold>$" . $row["i_price"]. "</p></td><td><p class=font-weight-bold>".$row["i_qty"]. " KG</p></td>" ?> 
            
            <?php 
            //editar buttton
            echo '<td><a class="btn btn-warning btn-sm " onclick="window.open(`model/edit.php?id=' . $row["i_id"] . '`, `newwindow`, `width=400,height=480`); " ><i style="color:white;" class="fas fa-pencil-alt"></i></a></td>';?>
            <?php
             //borrar botton
            echo '<td><a class="btn btn-danger btn-sm" href=model/delete.php?id=' . $row["i_id"] .' ><i style="color:white;" class="fas fa-trash-alt"></i></a></td>'; ?> 
            <?php "</td>";
    }
?>
  	</tbody>
</table>
</div>
    <?php
} else {
    echo "No hay Articulos en la Base de Datos";
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
</style>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>