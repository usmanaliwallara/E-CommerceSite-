<?php 
include("header.php"); 
include("description.php");
$link = mysqli_connect("localhost","root","");
mysqli_select_db($link,"project");
?>

<h1>Glasses</h1>
<div class="container">
	<section class="text-gray-700 body-font">
		<div class="row">
			<?php
			$res = mysqli_query($link,"select * from product where product_category='glasses'");
			while($row = mysqli_fetch_array($res))
			{
				?>

				<div class="col-sm-4 mb-5">
					<div class="card" style="width: 18rem;">
						<img src="./admin/<?php echo $row["product_image"]; ?>" class="card-img-top" alt="..." height="250px" width="260px">
						<div class="card-body">
							<h5 class="card-title"><?php echo $row["product_name"]; ?></h5>
							<h5>$<?php echo $row["product_price"]; ?></h5>
							<p class="card-text"><?php custom_echo($row['product_des'],10);?></p>
							<a href="product_detail.php?id=<?php echo $row["id"]; ?>" class="btn btn-outline-danger  my-sm-0 btn-block">Details</a>
						</div>
					</div>
				</div>

				<?php
			}

			?>

		</div>
	</section>
</div>





<?php
include("footer.php"); 
?>