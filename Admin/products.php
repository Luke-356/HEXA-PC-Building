<?php
include 'adminCheck.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./adminStyle.css?v=1.4">
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
                <a href="productRedirect.php" class="add-product-link">Add Product</a>
            </div>
        </div>
    </div>
</body>

<script src="./jquery.js"></script>

</html>