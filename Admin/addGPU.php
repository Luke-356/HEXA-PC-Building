<?php
$connect = mysqli_connect('localhost', 'root', '', 'hexa_pc_building');
include 'adminCheck.php';

if (isset($_POST['gpuSubmit'])) {
    $name = $_POST['txtName'];
    $memory = $_POST['txtMemory'];
    $clock = $_POST['txtCoreC'];
    $boost = $_POST['txtBoostC'];
    $price = $_POST['txtPrice'];

    $target_dir = "ProductImages/";
    $fileName = $_FILES["txtImage"]["name"];
    $target_file = $target_dir . basename($_FILES["txtImage"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["txtImage"]["tmp_name"]);
    if ($check !== false) {
        // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "<script>   
    		alert('File is not an image.');
    	</script>";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your image was not uploaded. Please Try Again.";
    } else {
        if (move_uploaded_file($_FILES["txtImage"]["tmp_name"], $target_file)) {
            // if everything is ok, try to upload file

            $insert = "INSERT INTO `product`(`ProductID`, `ProductType`, `ProductName`, `Memory`, `CoreClock`, `BoostClock`, `Price`, `Image`) 
            VALUES (NULL,'GPU','$name','$memory','$clock','$boost','$price','$fileName')";
            $run = mysqli_query($connect, $insert);

            if ($run) {
                echo "<script>alert('Add Product Successful')</script>";
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./adminStyle.css?v=1.45">
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
    <title>Document</title>
</head>

<body>
    <div class="admin-wrap">
        <?php
        include 'adminHeader.php'
        ?>

        <div class="admin-content">
            <div class="products-wrap">
                <h1>Add GPU</h1>
                <div class="add-product">
                    <button class="add-product-link">Add Product</button>
                    <div class="product-choice">
                        <a href="addCPU.php">CPU</a>
                        <a href="addGPU.php">GPU</a>
                    </div>
                </div>
            </div>

            <form method="post" class="gpu-form" enctype="multipart/form-data">
                <div class="gpu-input">
                    <div class="addProDiv">
                        <label for="Name">GPU Name</label>
                        <input type="text" name="txtName" id="Name" required>
                    </div>

                    <div class="addProDiv">
                        <label for="Memory">Memory</label>
                        <input type="number" name="txtMemory" id="Memory" placeholder="GB" required>
                    </div>

                    <div class="addProDiv">
                        <label for="CoreC">Core Clock</label>
                        <input type="number" name="txtCoreC" id="CoreC" placeholder="MHz" required>
                    </div>

                    <div class="addProDiv">
                        <label for="BoostC">Boost Clock</label>
                        <input type="number" name="txtBoostC" id="BoostC" placeholder="MHz" required>
                    </div>

                    <div class="addProDiv">
                        <label for="Price">Price</label>
                        <input type="number" name="txtPrice" id="Price" placeholder="Dollar" required>
                    </div>

                    <div class="addProDiv">
                        <label for="Image">Image</label>
                        <input type="file" name="txtImage" id="Image" class="ImageGPU" required>
                    </div>
                </div>

                <a href="products.php">Back</a>
                <button type="submit" name="gpuSubmit" id="submit">Submit</button>
            </form>
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