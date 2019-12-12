<!DOCTYPE html>
<html lang="en" id="bg">
<?php include("view/head.php") ?>
<style>
#bg {background-image: url("img/dark_wood.png");}
</style>
<body>
                  <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                      <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><i class="fas fa-cash-register" style="font-size:40px;"></i> Vender</a>

                      <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="fas fa-edit" style="font-size:40px;"></i>Editar Articulo</a>

                      <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"><i class="fas fa-chart-line" style="font-size:40px;"></i><b> Reporte</a>
                    </div>
                  </nav>

                  <div class="tab-content" id="bg">
                    <div class="col-sm-12 tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <?php include("view/sale.php"); ?>
                    </div>

                    <div class=" tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                      <?php include("view/table.php"); ?>
                    </div>

                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                      <?php include("view/reportview.php") ?>
                    </div>
                  </div>
</body>
</html>