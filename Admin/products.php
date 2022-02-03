<?php
include 'adminCheck.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./adminStyle.css?v=1.45">
    <title>Admin</title>
    <style>
        .product {
            background: #464646;
            text-align: center;
            pointer-events: none;
        }

        .product a {
            color: white;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="admin-wrap">
        <?php
        include 'adminHeader.php'
        ?>

        <div class="admin-content">
            <div class="products-wrap">
                <h1>All Products</h1>
                <div class="add-product">
                    <button class="add-product-link">Add Product</button>
                    <div class="product-choice">
                        <a href="addCPU.php">CPU</a>
                        <a href="addGPU.php">GPU</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="./jquery.js"></script>
<script>
    $(document).ready(function() {
        $(".product-choice").hide();
        $(".add-product-link").click(function() {
            console.log("hola");
            $(".product-choice").toggle();
        });
    });
</script>

</html>