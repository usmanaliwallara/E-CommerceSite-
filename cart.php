<?php
include("header.php");

if(isset($_COOKIE['item']))
{
	foreach($_COOKIE['item'] as $name1 => $value)
	{
		if(isset($_POST["delete$name1"]))
		{
			setcookie("item[$name1]","",time() - 1800);
		?>
		<script type="text/javascript">
		window.location.href = window.location.href;
		</script>
		<?php

		}
	}
}

?>

<div class="container">
	<table class="table my-5">

		<?php
		$d=0;
		if(isset($_COOKIE['item']))
		{
			$d=$d+1;

		}
		if ($d==0) 
		{
			echo "<br>";
			echo "<br>";
			echo "<h1>No product in the Cart</h1>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";

		}
		else
		{
			?>
			<thead style="background-color: #051e3e;" class="text-white">
				<tr>
					<th scope="col">Item</th>
					<th scope="col"> </th>
					<th scope="col">Product Quantity</th>
					<th scope="col">Product Price</th>
					<th scope="col">Total Price</th>
					<th scope="col"> </th>
				</tr>
			</thead>
			<tbody>	 
				<?php
				foreach ($_COOKIE['item'] as $name1 => $value) 
				{
					$values11=explode("__", $value);

					?>
					<tr>
						<td class="cart_product">
							<a href=""><img src="./admin/<?php echo $values11[0]; ?>" height="100" width="100"></a>
						</td>
						<td class="cart_description">
							<h4><?php echo $values11[1]; ?></h4>
						</td>
						<td class="cart_quantity">
							<p><?php echo $values11[3]; ?></p>
						</td>
						<td class="cart_price">
							<p>$<?php echo $values11[2]; ?></p>
						</td>
						<td class="cart_total">
							<p>$<?php echo $values11[4]; ?></p>
						</td>
						
						<form action="" method="post" name="submit1">
							<td>
							<button class="btn" type="submit" name="delete<?php echo $name1; ?>" value ="delete" id="s3">
								<i class="fa fa-trash text-danger" aria-hidden="true"></i>
							</button>
		  					</td>
						</form>	
					</tr>
					
					<?php

				}
				$tot=0;
				if (is_array($_COOKIE['item'])) 
				{
				
					foreach ($_COOKIE['item'] as $name1 => $value) 
					{
						$values11=explode("__", $value);
						$tot = $tot+$values11[4];
					}

				}

				?>

			</tbody>
			<tfoot style="background-color: #051e3e;">
				<tr>
					<td colspan="5" class="text-white">
						<h5>Grand Total : <?php echo  "$".$tot;?></h5>
					</td>
					<td>
						<a href="checkout.php" target="_blank">
							<button type="button" class="btn btn-danger">Checkout</button>
						</a>
					</td>
				</tr>
			</tfoot>
		</table>
		<?php

		
	}

	?>
</table>
	
</div>


<?php
include("footer.php");
?>