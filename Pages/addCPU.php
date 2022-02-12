<?php
$connect = mysqli_connect('localhost', 'root', '', 'hexa_pc_building');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css?v=1.6">
    <title>Add CPU</title>
    <style>
        td img {
            width: 100px;
        }
    </style>
</head>

<body onunload="func()">
    <div class="container">
        <?php
        include 'header.php';
        ?>

        <?php
        $select = "SELECT * FROM product WHERE ProductType='CPU' ORDER BY ProductID Desc";
        $run = mysqli_query($connect, $select);
        $count = mysqli_num_rows($run);

        echo "<div class='view-product-container'>";
        if ($count > 0) {
            echo "<h2>Choose CPU</h2>";
            while ($data = mysqli_fetch_array($run)) {
                echo "<form method='POST'>";
                echo "<table class='view-table'>";
                echo "<tr>";
                echo "<th>";
                echo "Image";
                echo "</th>";
                echo "<th>";
                echo "ProductName";
                echo "</th>";
                echo "<th>";
                echo "CoreCount";
                echo "</th>";
                echo "<th>";
                echo "CoreClock";
                echo "</th>";
                echo "<th>";
                echo "BoostClock";
                echo "</th>";
                echo "<th>";
                echo "TDP";
                echo "</th>";
                echo "<th>";
                echo "Price";
                echo "</th>";
                echo "</tr>";

                echo "<tr>";
                echo "<td>";
                echo "<img src='../Admin/ProductImages/" . $data['Image'] . "' >";
                echo "</td>";
                echo "<td>" . $data['ProductName'] . "</td>";
                echo "<td>" . $data['CoreCount'] . "</td>";
                echo "<td>" . $data['CoreClock'] . "</td>";
                echo "<td>" . $data['BoostClock'] . "</td>";
                echo "<td>" . $data['TDB'] . "</td>";
                echo "<td>$ " . $data['Price'] . "</td>";
                echo "<td>";
                echo "<button>";
                echo "Add";
                echo "</button>";
                echo "</td>";
                echo "</tr>";
                echo "</table>";
                echo "</form>";
            }
        }
        echo "</div>";
        ?>
    </div>
</body>

</html>