<?php 

$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"project");
include("header.php"); 

?>


   <!-- content -->
    <div class="container my-5">
        <h3 class="text-center mb-4">Check Out</h3>
        <form name="form1" action="" method="post">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputName">First Name</label>
                <input type="text" class="form-control" name="firstname" required>
            </div>
            <div class="form-group col-md-4">
                <label for="inputName">Last Name</label>
                <input type="text" class="form-control" name="lastname" required>
            </div>
            <div class="form-group col-md-4">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            
        </div>
        <div class="form-group">
            <label for="inputAddress">Address</label>
            <input type="text" class="form-control" name="address" required>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputCity">City</label>
                <input type="text" class="form-control" name="city" required>
            </div>
            <div class="form-group col-md-4">
                <label for="inputZip">Zip</label>
                <input type="text" class="form-control" name="pincode" required>
            </div>
            <div class="form-group col-md-4">
                <label for="inputCity">Contact No</label>
                <input type="text" class="form-control" name="cno"required>
            </div>
        </div>

        <input type="submit" name="submit1" class="btn btn-danger" value="Order">
    </form>
     
    </div>
 <?php
if (isset($_POST["submit1"])) 
{
    mysqli_query($link,"insert into checkout_address values('','$_POST[firstname]','$_POST[lastname]','$_POST[email]','$_POST[address]','$_POST[city]','$_POST[pincode]','$_POST[cno]')");

    ?>
    <script type="text/javascript">
        alert("Your order placed Successfully");
    </script>
    <?php
}


$res=mysqli_query($link,"select id from checkout_address order by id desc limit 1");
while ($row=mysqli_fetch_array($res)) 
{
    # code...
    $id=$row["id"];
}   

if (isset($_COOKIE['item'])) 
{

    foreach ($_COOKIE['item'] as $name1 => $value) 
    {
    # code...
        $values11=explode("__", $value);
        mysqli_query($link,"insert into confirm_order_product values('','$id','$values11[1]','$values11[2]','$values11[3]','$values11[0]','$values11[4]')");
    }
}
?>
  


<?php 
include("footer.php"); 
?>