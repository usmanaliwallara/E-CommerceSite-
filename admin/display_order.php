<?php
include "header.php";
include "menu.php";
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "project");
?>

<div class="grid_10">
    <div class="box round first">
        <h2>
            Display Order</h2>

        <div class="block">

            <?php
            $res = mysqli_query($link, "select * from confirm_order_product order by id desc");
            echo "<table border='1'>";
            echo "<tr>";
            echo "<td style='font-weight:bold'>"; echo "firstname"; echo "</td>";
            echo "<td style='font-weight:bold'>"; echo "lastname"; echo "</td>";
            echo "<td style='font-weight:bold'>"; echo "email"; echo "</td>";
            echo "<td style='font-weight:bold'>"; echo "address"; echo "</td>";
            echo "<td style='font-weight:bold'>"; echo "city"; echo "</td>";
            echo "<td style='font-weight:bold'>"; echo "pincode"; echo "</td>";
            echo "<td style='font-weight:bold'>"; echo "contactno"; echo "</td>";
            echo "<td style='font-weight:bold'>"; echo "view order"; echo "</td>";
            echo "</tr>";

            while($row=mysqli_fetch_array($res))
            {
                echo "<tr>";
                echo "<td>"; echo $row["firstname"]; echo "</td>";
                echo "<td>"; echo $row["lastname"]; echo "</td>";
                echo "<td>"; echo $row["email"]; echo "</td>";
                echo "<td>"; echo $row["address"]; echo "</td>";
                echo "<td>"; echo $row["city"]; echo "</td>";
                echo "<td>"; echo $row["pincode"]; echo "</td>";
                echo "<td>"; echo $row["contactno"]; echo "</td>";
                echo "<td>"; ?> <a href="display_order_1.php?id=<?php echo $row["id"]; ?>">View Order</a> <?php echo "</td>";
                echo "</tr>";
            }
            echo "</table>";

            ?>

        </div>
    </div>
    <?php
    include "footer.php";

    ?>
     