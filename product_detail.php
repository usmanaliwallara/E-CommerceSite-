<?php
$id = $_GET["id"];
$link = mysqli_connect("localhost","root","");
mysqli_select_db($link,"project");

if(isset($_POST["submit1"]))
{
	$d=0; 
	if(isset($_COOKIE['item']))
	{
		foreach ($_COOKIE['item'] as $name => $value) 
		{
			$d=$d+1;
		}
		$d=$d+1;
	}
	else
	{
		$d=$d+1;
	}


	$res3 = mysqli_query($link, "select * from product where id=$id");
	while($row3 = mysqli_fetch_array($res3))
	{
		$img1=$row3["product_image"];
		$nm=$row3["product_name"];
		$price=$row3["product_price"];
		$qty="1";
		$total=$price*$qty;
	}

	if(isset($_COOKIE['item']))
	{
		foreach ($_COOKIE['item'] as $name1 => $value) 
		{
			$values11=explode("__", $value);
			$found=0;
			if ($img1==$values11[0]) 
			{
				$found=$found+1;
				$qty=$values11[3]+1;

				$tb_qty;
				$res = mysqli_query($link, "select * from product where product_image = '$img1'");
				while ($row = mysqli_fetch_array($res))
				{
					$tb_qty = $row["product_qty"];
				}
				if ($tb_qty < $qty) 
				{
					?>
					<script type="text/javascript">
						alert("This much Quantity is not available");
					</script>
					<?php
				}
				else
				{
					$total=$values11[2] * $qty;
					setcookie("item[$name1]",$img1."__".$nm."__".$price."__".$qty."__".$total,time()+1800);

				}

			}
			
		}
		if ($found==0)  
		{
			$tb_qty;
			$res = mysqli_query($link, "select * from product where product_image = '$img1'");
			while ($row = mysqli_fetch_array($res))
			{
				$tb_qty = $row["product_qty"];
			}
			if ($tb_qty < $qty) 
			{
				?>
				<script type="text/javascript">
					alert("This much Quantity is not available");
				</script>
				<?php
			}
			else
			{	
				setcookie("item[$d]",$img1."__".$nm."__".$price."__".$qty."__".$total,time()+1800);
			}
		}
		

	}
	
	else
	{
		$tb_qty;
		$res = mysqli_query($link, "select * from product where product_image = '$img1'");
		while ($row = mysqli_fetch_array($res))
		{
			$tb_qty = $row["product_qty"];
		}
		if ($tb_qty < $qty) 
		{
			?>
			<script type="text/javascript">
				alert("This much Quantity is not available");
			</script>
			<?php
		}
		else
		{
			setcookie("item[$d]",$img1."__".$nm."__".$price."__".$qty."__".$total,time()+1800);
		}
	}
	// setcookie("item[$d]",$img1."__".$nm."__".$price,time()+1800);
}

?>

<?php
include("header.php"); 
?>

<?php

$res=mysqli_query($link,"select * from product where id=$id");

while ($row=mysqli_fetch_array($res)) 
{
	?>

	<div class="my-5">
		<form name="form1" action="" method="post" >
			<div class=" container mb-3 mt-4">
				<div class="row">
					<div class="col-md-6">
						<img src="./admin/<?php echo $row["product_image"]; ?>" class="img-fluid" alt="...">
					</div>
					<div class="col-md-6">
						<div class="card-body">
							<h3 class="card-title"><?php echo $row["product_name"]; ?> - $<?php echo $row["product_price"]; ?></h3>
							
							<h5>Quantity:</h5>
							<p><?php echo $row["product_qty"]; ?></p>
							<h5>Description:</h5>
							<p class="card-text"><?php echo $row["product_des"]; ?></p>
							<input class="btn btn-danger " type="submit" name="submit1"  value="Add to Cart">
							<!-- <a href="#" class="btn btn-danger"><i class="fa fa-shopping-cart" style="font-size:20px"></i> Add to Cart</a> -->
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>





	<?php
	# code...
}

?>


<?php 
include("footer.php"); 
?>