<?php
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"project");
$id = $_GET["id"];
$res = mysqli_query($link,"select * from product where id=$id");
while ($row=mysqli_fetch_array($res)) 
{
	$product_name = $row["product_name"];
	$product_price = $row["product_price"];
	$product_qty = $row["product_qty"];
	$product_img = $row["product_image"];
	$product_category = $row["product_category"];
	$product_des = $row["product_des"];
}
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
<style type="text/css">
	.nav-pills .nav-link.active,
	.nav-pills .show>.nav-link {
		background: #DC3545;
	}

	.nav-link {
		color: #ffff;
	}
</style>

<body>

	<div class="container mt-5">
		<form name="form1" action="" method="post" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header bg-dark text-white">
							<h5 class="float-left">Edit Product</h5>
							<a href="admin.php" class="text-white"><h4 class="float-right">x</h4></a>
						</div>
						
						<div class="card-body">
							<div class="row">

								<div class="col-md-3">
									<img class="img-fluid" src="<?php echo $product_img; ?>" alt="Card image cap">
									
								</div>
								<div class="col-md-9">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="exampleFormControlInput1">Product Name</label>
												<input type="text" name="pnm" class="form-control" id="exampleFormControlInput1" value="<?php echo $product_name; ?>" placeholder="Enter Product Name">
											</div>

										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="exampleFormControlSelect1">Category</label>
												<select class="form-control" id="exampleFormControlSelect1" name="pcategory">
													<option value="" selected disabled hidden>Select Category:</option>
													<option value="watches">Watches</option>
													<option value="glasses">Glasses</option>
													<option value="shoes">Shoes</option>
												</select>
											</div>

										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="exampleFormControlInput1">Price</label>
												<input type="text" class="form-control" value="<?php echo $product_price; ?>" id="exampleFormControlInput1" placeholder="Enter Product Price" name="pprice">
											</div>

										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="exampleFormControlInput2">Quantity</label>
												<input type="text" class="form-control" value="<?php echo $product_qty; ?>" id="exampleFormControlInput2" placeholder="Enter Product Quantity" name="pqty">
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label for="exampleFormControlInput1">Product Image</label>
												<input type="file" class="form-control-file" id="exampleFormControlInput1" value="<?php echo $product_image; ?>" placeholder="Add Product Image" name="pimage">
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<label for="exampleFormControlTextarea1">Description</label>
												<textarea class="form-control" id="exampleFormControlTextarea1" value="" rows="3" name="pta"><?php echo $product_des; ?></textarea>
											</div>
										</div>

										<div class="col-md-3">
											<input class="btn btn-danger btn-block" type="submit" name="submit1" value="Update" style="display: inline-block;float: left;">

										</div>

									</div>
									
								</div>
								
							</div>
						</div>
						<div class="card-footer bg-dark text-white">
							<p class="text-center">Developed by Usman Ali Wallara</p>
						</div>
					</div>

				</div>

			</div>
		</form>		
	</div>


	

	<?php
	if (isset($_POST["submit1"])) 
	{
		$fnm = $_FILES["pimage"] ["name"];

		if ($fnm == "") 
		{
			mysqli_query($link,"update product set product_name='$_POST[pnm]', product_price='$_POST[pprice]', product_qty='$_POST[pqty]', product_category='$_POST[pcategory]', product_des='$_POST[pta]' where id=$id");
		}
		else
		{
			$v1 = rand(1111,9999);
			$v2 = rand(1111,9999);

			$v3 = $v1.$v2;
			$v3 = md5($v3);


			$fnm = $_FILES["pimage"] ["name"];
			$dst = "./product_image/".$v3.$fnm;
			$dst1 = "product_image/".$v3.$fnm;
			move_uploaded_file($_FILES ["pimage"] ["tmp_name"] , $dst);

			mysqli_query($link,"update product set product_image='$dst1', product_name='$_POST[pnm]', product_price='$_POST[pprice]', product_qty='$_POST[pqty]', product_category='$_POST[pcategory]', product_des='$_POST[pta]' where id=$id");


		}
		?>
		<script type="text/javascript">
			window.location = "admin.php";
		</script>
		<?php
	}

	?>

</body>
</html>