<?php
session_start();
$connect = mysqli_connect('localhost', 'root', '', 'hexa_pc_building');

if (isset($_POST['btn-add'])) {
    if (isset($_SESSION["add_motherboard"])) {
        $product_array_id = array_column($_SESSION["add_motherboard"], "motherboard_id");
        if (!in_array($_GET["id"], $product_array_id)) {
            unset($_SESSION["add_motherboard"]);
            $product_array = array(
                'motherboard_id'               =>     $_GET["id"],
                'motherboard_name'               =>     $_GET["name"],
                'motherboard_image'               =>     $_GET["image"],
                'motherboard_price'          =>     $_GET["price"]
            );
            $_SESSION["add_motherboard"][0] = $product_array;
            echo '<script>window.location.assign("builder.php");</script>';
        } else {
            echo '<script>alert("This Motherboard is already added")</script>';
        }
    } else {
        $product_array = array(
            'motherboard_id'               =>     $_GET["id"],
            'motherboard_name'               =>     $_GET["name"],
            'motherboard_image'               =>     $_GET["image"],
            'motherboard_price'          =>     $_GET["price"]
        );
        $_SESSION["add_motherboard"][0] = $product_array;
        $_SESSION["motherboard_id"] = $_GET["id"];
        $_SESSION["mother_price"] = $_GET["price"];
        echo '<script>window.location.assign("builder.php");</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css?v=2.8">
    <title>Add GPU</title>
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

        <?php
        $select = "SELECT * FROM product WHERE ProductType='Motherboard' ORDER BY ProductID Desc";
        $run = mysqli_query($connect, $select);
        $count = mysqli_num_rows($run);

        echo "<div class='view-product-container'>";
        if ($count > 0) {
        ?>
            <h2>Choose Motherboard</h2>

            <?php
            echo '<div class="view-product-grid">';
            while ($data = mysqli_fetch_array($run)) {
            ?>
                <form method='POST' action="addMotherboard.php?id=<?php echo $data['ProductID'] ?> & name=<?php echo $data['ProductName'] ?> & image=<?php echo $data['Image'] ?> & price=<?php echo $data['Price'] ?>">

                    <div class='view-product-wrap'>
                        <img src='../Admin/ProductImages/<?php echo $data['Image'] ?>'>
                        <p><?php echo $data['ProductName'] ?></p>
                        <!-- <td><?php echo $data['CoreClock'] ?></td>
                            <td><?php echo $data['Memory'] ?> GHz</td>
                            <td><?php echo $data['BoostClock'] ?> GHz</td>
                            <td><?php echo $data['TDB'] ?> W</td> -->
                        <p>$<?php echo $data['Price'] ?></p>

                        <div class="btn-flex">
                            <button type="submit" name="btn-add" class="add-btn">Add</button>
                            <button>Detail</button>
                        </div>
                    </div>

                </form>
        <?php
            }
            echo '</div>';
        } else {
            echo "<script>
            alert('There are no products!');
            window.location.assign('builder.php');
        </script>";
        }
        echo "</div>";
        ?>
    </div>

    <?php
    include("footer.php");
    ?>
</body>

</html>