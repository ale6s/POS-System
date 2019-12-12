
<div class="container">
    <div class=" row">

  <input class="mb-2 ml-3 w-75 form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar Articulos...">
        <!-- Trigger the modal with a button -->
  <button type="button" class="mb-2 btn btn-success btn-md ml-5 float-right" data-toggle="modal" data-target="#myModal2">
    <i class="fas fa-plus"></i>
    </button>


  <!-- **********************Modal for add new item*************************-->
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content ">
        <div class="modal-header">
       	<h4 class="modal-title">Agregar Nuevo Item</h4>
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-times fa-2x"></i></button>
        </div>

        <div class="modal-body">
          <form action="model/add.php" method="POST">
		<div class="form-group">
          	<span for="item">Articulo</span>
          	<input type="text" class="form-control" name="item">
		</div>

		<div class="form-group">
          	<span for="price">Precio</span>
          	<input type="number" value="1" type="text" class="form-control" name="price">
		</div>

		<div class="form-group">
          	<span for="Cantidad">Cantidad en KG</span>
          	<input type="number" value="1" class="form-control" name="qty">
		</div>
        
        </div>

        <div class="modal-footer">
          <input type="submit" class="btn btn-success" name="btn-sub" value="Agregar">
        </div>
         </form>
      </div>
      
    </div>
  </div>
</div>


  <!-- **********************shwo table *************************-->

    <?php include("model/show.php"); ?>
</div>
