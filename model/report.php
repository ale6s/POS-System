
<?php
include("../view/head.php");
if(isset($_POST['salesbtn'])) {
$from=$_POST['dayfrom'];
$to=$_POST['dayto'];
?>
<div class="container">
<h2 class="text-center text-capitalize mt-5 mb-5 font-weight-bold">Total Sales from <span class="text-primary"> <?php echo $from; ?></span> to <span class="text-primary"><?php echo $to; ?></span></h2>
<table class="table table-bordered table-hover" >
	<thead class="thead-dark">
      <tr>
	  	<th class="text-center text-warning font-weight-bold">Item</th>
        <th class="text-center text-warning font-weight-bold">Quantity</th>
		<th class="text-center text-warning font-weight-bold">Date</th>
		<th class="text-center text-warning font-weight-bold">Sub-Total</th>
      </tr>
    </thead>
	 <?php

// fetch and show table report date selected 	
require ("../db/db.php");
$sql = "SELECT i_desc, qty, amount, date FROM sales WHERE date BETWEEN '$from' AND '$to' ORDER BY date";
$result=mysqli_query($conn,$sql);


while($row=mysqli_fetch_assoc($result)) {
$id = $row['i_desc'];
$qty = $row['qty'];
$amount = $row['amount'];
$date = $row['date'];
?>
<tr align="center">
	<td class="font-weight-bold"><?php echo $id; ?></td>
	<td class="font-weight-bold"><?php echo $qty, " KG"; ?></td>
	<td class="font-weight-bold"><?php echo $date; ?></td>
	<td class="font-weight-bold"><?php echo "$", $amount; ?></td>
</tr>

<?php
}
}
?>

<tbody>
<td  colspan="3" align="right" class="font-weight-bold table-danger" > Total: </td>
<th class="font-weight-bold table-danger" align="center"><?php 


//Sum total sale Show total sales 


require ("../db/db.php");
$sql = "SELECT SUM(amount) as 'total' FROM sales WHERE date BETWEEN '$from' AND '$to'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$total = $row['total'];
echo "$", $total;

?> </th>
</tbody>
	 </table> </br> </br>



<!-- Return to main menu  --->	 
	 <form action="../index.php">
<button class="btn btn-danger"> Regresar al Menu Principal </button>
	</form>
	</div>
