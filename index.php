<?php 
include("header.php"); 
$link = mysqli_connect("localhost","root","");
mysqli_select_db($link,"project");
?>

<!-- Carousal -->

<div class="mb-4">
    <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" >
            <div class="carousel-item active" data-interval="10000">
                <img src="images/1.jpg" class="d-block w-100" alt="..." >
            </div>
            <div class="carousel-item" data-interval="2000">
                <img src="images/2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="images/3.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="images/4.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<?php

function custom_echo($x, $length)
{
  if(strlen($x)<=$length)
  {
    echo $x;
}
else
{
    $y=substr($x,0,$length) . '...';
    echo $y;
}
}
?>

<!-- Cards -->

<div class="container">
    <h1 class="text-center my-5">Hot Deals</h1>
    <section class="text-gray-700 body-font">
        <div class="row">
            <?php
            $res = mysqli_query($link,"select * from product");
            while($row = mysqli_fetch_array($res))
            {
                ?>

                <div class="col-md-4 mb-5">
                    <div class="card">
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

<div class="bg-light pb-5">
<h2 class="mb-5 text-danger">Our Famous Brands</h2>
<div class="container text-center">
    <div class="row" style="color: #051e3e">
         <div class="col-md-2">
             <i class="fa fa-google" style="font-size: 60px"  aria-hidden="true"></i>
         </div>
         <div class="col-md-2">
            <i class="fa fa-amazon" style="font-size: 60px"  aria-hidden="true"></i>
             
         </div>
         <div class="col-md-2">
             <i class="fa fa-credit-card-alt" style="font-size: 60px" aria-hidden="true"></i>
         </div>
         <div class="col-md-2">
            <i class="fa fa-paypal" style="font-size: 60px"  aria-hidden="true"></i>
             
         </div>
         <div class="col-md-2">
            <i class="fa fa-apple" style="font-size: 60px"  aria-hidden="true"></i>
             
         </div>
         <div class="col-md-2">
             <i class="fa fa-android" style="font-size: 60px"  aria-hidden="true"></i>
         </div>
    </div>
</div>

</div>

<?php
include("footer.php"); 
?>