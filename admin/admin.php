<?php
session_start();
if ($_SESSION ["admin"] == "")
{
  ?>
  <script type="text/javascript">
    window.location = "admin_login.php";
  </script>

  <?php 
}

$link = mysqli_connect("localhost","root","");
mysqli_select_db($link,"project");
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

  <!-- nav -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Men's Wear</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link btn btn-danger text-white" href="logout.php">
            Logout <i class="fa fa-sign-out" aria-hidden="true"></i></a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- tab pane -->
    <div class="container-fluid">
     <div class="row">
      <div class="col-3 bg-dark" style="height: 90vh;">
       <div class="text-center mt-4">
        <img src="images/admin.png" class="img-fluid"  style="width: 50%">
        <h4 class="text-white mt-4">UsmanAliWallara</h4>
      </div>

      <div class="nav flex-column nav-pills pt-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><span><i class="fa fa-tachometer mr-2 " aria-hidden="true"></i></span> Dashboard</a>
        <a class="nav-link " id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false"><span><i class="fa fa-shopping-bag mr-2" aria-hidden="true"></i></span> Products</a>
        <a class="nav-link" id="v-pills-orders-tab" data-toggle="pill" href="#v-pills-orders" role="tab" aria-controls="v-pills-orders" aria-selected="false"><span><i class="fa fa-money mr-2" aria-hidden="true"></i></span> Orders</a>
      </div>
    </div>

    <div class="col-9">
      <div class="tab-content" id="v-pills-tabContent">
        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
          <h3 class="mt-4">Welcome to Admin Panel</h3>
        </div>
        <div class="tab-pane fade pt-3" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
          <h3 style="display: inline-block;">Products</h3>
          <!-- <button class="btn btn-danger" style="display: inline-block;float: right;"><i class="fa fa-plus"></i> Add Product</button> -->
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-danger" style="display: inline-block;float: right;" data-toggle="modal" data-target="#staticBackdrop">
            <i class="fa fa-plus"></i> Add Product
          </button>

          <!-- Modal -->
          <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Add Product</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form name="form1" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Product Name</label>
                      <input type="text" name="pnm" class="form-control" id="exampleFormControlInput1" placeholder="Enter Product Name" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Category</label>
                      <select class="form-control" id="exampleFormControlSelect1" name="pcat">
                        <option value="" selected disabled hidden>Select Category:</option>
                        <option value="watches">Watches</option>
                        <option value="glasses">Glasses</option>
                        <option value="shoes">Shoes</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Price</label>
                      <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Product Price" name="pprice">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput2">Quantity</label>
                      <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="Enter Product Quantity" name="pqty">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Product Image</label>
                      <input type="file" class="form-control-file" id="exampleFormControlInput1" placeholder="Add Product Image" name="pimage">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Description</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="pta"></textarea>
                    </div>



                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <!-- <button type="button" class="btn btn-danger">Add Product</button> -->
                      <input class="btn btn-danger" type="submit" name="submit1" value="Add Product">
                    </div>
                  </form>
                  <?php
                  if(isset ($_POST["submit1"]))
                  {
                    $v1 = rand(1111,9999);
                    $v2 = rand(1111,9999);

                    $v3 = $v1.$v2;
                    $v3 = md5($v3);


                    $fnm = $_FILES["pimage"] ["name"];
                    $dst = "./product_image/".$v3.$fnm;
                    $dst1 = "product_image/".$v3.$fnm;
                    move_uploaded_file($_FILES ["pimage"] ["tmp_name"] , $dst);

                    mysqli_query($link,"insert into product values('','$_POST[pnm]','$_POST[pprice]','$_POST[pqty]','$dst1','$_POST[pcat]','$_POST[pta]')");
                  }

                  ?>

                </div>

              </div>
            </div>
          </div>

          <div class="overflow-auto" style="height: 78vh;">
            <table class="table table-hover mt-4">
             <thead class="bg-dark text-white">
               <tr>
                 <th scope="col">Image</th>
                 <th scope="col">Name</th>
                 <th scope="col">Price</th>
                 <th scope="col">Quantity</th>
                 <th scope="col">Category</th>
                 <th scope="col">Description</th>
                 <th scope="col"> Action </th>
                 <!-- <th> </th> -->

               </tr>
             </thead>

             <?php
             $res = mysqli_query($link,"select * from product order by id desc");


             echo "<tbody>";
             while ($row=mysqli_fetch_array($res)) 
             {
              echo "<tr>";
              echo "<td>"; ?> <img src="<?php echo $row["product_image"]; ?>" height="100" width="100"><?php echo "</td>";
              echo "<td>"; echo $row["product_name"]; echo "</td>";
              echo "<td>"; echo $row["product_price"]; echo "</td>";
              echo "<td>"; echo $row["product_qty"]; echo "</td>";
              echo "<td>"; echo $row[5]; echo "</td>";
              echo "<td>"; echo $row["product_des"]; echo "</td>";
              echo "<td>"; ?> <a href="delete.php?id=<?php echo $row["id"]; ?>"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a> <?php  ?> <a class="text-danger ml-3" href="edit.php?id=<?php echo $row["id"]; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> <?php echo "</td>";
              echo "</tr>";
            }


            echo "</tbody>";


            ?>
          </table>


        </div>


      </div>

      <div class="tab-pane fade" id="v-pills-orders" role="tabpanel" aria-labelledby="v-pills-orders-tab">
        <h3 style="display: inline-block;" class="my-3">Orders</h3>


        <div class="overflow-auto" style="height: 78vh;">
          <table class="table table-hover mt-4">
           <thead class="bg-dark text-white">
             <tr>
               <th scope="col">Name</th>
               <th scope="col">Email</th>
               <th scope="col">Address</th>
               <th scope="col">City</th>
               <th scope="col">Zip</th>
               <th scope="col">Contact No</th>
               <th scope="col">Details</th>
             </tr>
           </thead>

           <?php
           $res = mysqli_query($link,"select * from checkout_address order by id desc");


           echo "<tbody>";
           while ($row=mysqli_fetch_array($res)) {
   # code...
            echo "<tr>";
            echo "<td>"; echo $row["firstname"]; echo " "; echo $row["lastname"]; echo "</td>";
            // echo "<td>"; echo $row["lastname"]; echo "</td>";
            echo "<td>"; echo $row["email"]; echo "</td>";
            echo "<td>"; echo $row["address"]; echo "</td>";
            echo "<td>"; echo $row["city"]; echo "</td>";
            echo "<td>"; echo $row["pincode"]; echo "</td>";
            echo "<td>"; echo $row["contactno"]; echo "</td>";
            echo "<td>"; 

            ?>

            <a target="_blank" href="invoice.php?id=<?php echo $row["id"]; ?>"> view</a>

            <?php
            echo "</td>";

            echo "</tr>";
          }


          echo "</tbody>";


          ?>
        </table>


      </div>


    </div>

  </div>
</div>
</div>

</div>

</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>

</html>

