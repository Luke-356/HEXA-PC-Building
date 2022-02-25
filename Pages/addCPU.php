<?php
session_start();
$connect = mysqli_connect('localhost', 'root', '', 'hexa_pc_building');
if (isset($_POST['btn-add'])) {
    if (isset($_SESSION["add_product"])) {
    } else {
        $product_array = array();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css?v=2.9">
    <title>Add CPU</title>
    <style>
        .view-product-wrap img {
            width: 100px;
        }
    </style>
</head>

<body onunload="func()">
    <div class="container">
        <?php
        include 'header.php';
        ?>

        <div class='view-product-container'>
            <?php
            $select = "SELECT * FROM product WHERE ProductType='CPU' ORDER BY ProductID Desc";
            $run = mysqli_query($connect, $select);
            $count = mysqli_num_rows($run);

            if ($count > 0) {
            ?>
                <h2>Choose CPU</h2>
                <form method='POST' action="addCPU.php?id=''">
                    <div class="view-product-grid">
                        <?php
                        while ($data = mysqli_fetch_array($run)) {
                        ?>

                            <div class='view-product-wrap'>
                                <img src='../Admin/ProductImages/<?php echo $data['Image'] ?>'>
                                <p><?php echo $data['ProductName'] ?></p>
                                <!-- <td><?php echo $data['CoreCount'] ?></td>
                            <td><?php echo $data['CoreClock'] ?> GHz</td>
                            <td><?php echo $data['BoostClock'] ?> GHz</td>
                            <td><?php echo $data['TDB'] ?> W</td> -->
                                <p>$<?php echo $data['Price'] ?></p>
                                <input type="hidden" name="hidden-name" value="<?php echo $data['ProductName'] ?>">
                                <input type="hidden" name="hidden-price" value="<?php echo $data['Price'] ?>">
                                <div class="btn-flex">
                                    <button type="submit" name="btn-add" class="add-btn">Add</button>
                                    <button>Detail</button>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        echo "<script>
                        alert('There are no products!');
                        window.location.assign('builder.php');
                    </script>";
                    }
                    ?>
                    </div>
                </form>
        </div>
    </div>
</body>

</html>