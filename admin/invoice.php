<?php
$link = mysqli_connect("localhost","root","");
mysqli_select_db($link,"project");
$id=$_GET['id'];
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="short icon" href="images/favicon.png" type="image/gif">
	<title>Men's Wear</title>
</head>

<body>

	<div class="container">
		<table class="table table-hover mt-4 text-center">
			<thead class="bg-dark text-white">
				<tr>
					<th scope="col">Product Image</th>
					<th scope="col">Product Name</th>
					<th scope="col">Product Price</th>
					<th scope="col">Product Quantity</th>
					<th scope="col">Total</th>
				</tr>
			</thead>
			<tbody>

				<?php 
				$res=mysqli_query($link,"select * from confirm_order_product where order_id=$id");
				?>

				<?php
				while ($row=mysqli_fetch_array($res)) {
          		# code...
					echo "<tr>";
					echo "<td>"; ?> <img height="50" width="50" src="<?php echo $row["product_image"]; ?>"> <?php echo "</td>";
					echo "<td>"; echo $row["product_name"]; echo "</td>";
					echo "<td>"; echo $row["product_price"]; echo "</td>";
					echo "<td>"; echo $row["product_qty"]; echo "</td>";
					echo "<td>"; echo $row["product_total"]; echo "</td>";
					echo "</tr>";
				}
				?>
			</tbody>
			<tfoot>
				<tr>
					<th colspan="5">

						<?php
						$result=mysqli_query($link,"select SUM(product_total) as `totalsum` from confirm_order_product where order_id=$id");

						$data=mysqli_fetch_array($result);
						echo "Grand Total : ".$data['totalsum'];

						?>
						
					</th>
				</tr>
			</tfoot>
		</table>

	</div>
</body>

</html>
