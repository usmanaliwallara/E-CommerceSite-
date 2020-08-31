<?php
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"project");  

$id=$_GET["id"];

$res=mysqli_query($link,"select * from product where id=$id");
while ($row=mysqli_fetch_array($res)) 
{
	$img=$row["product_image"];
}

unlink($img);



mysqli_query($link,"delete from product where id=$id");
?>

<script type="text/javascript">
	window.location="admin.php"
</script>