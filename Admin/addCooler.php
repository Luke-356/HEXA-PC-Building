<?php
$connect = mysqli_connect('localhost', 'root', '', 'hexa_pc_building');
include 'adminCheck.php';

if (isset($_POST['cpuSubmit'])) {
    $name = $_POST['txtName'];
    $rpm = $_POST['txtRPM'];
    $noice = $_POST['txtNoice'];
    $color = $_POST['txtColor'];
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
        echo " Sorry, your image was not uploaded. Please Try Again.";
    } else {
        if (move_uploaded_file($_FILES["txtImage"]["tmp_name"], $target_file)) {
            // if everything is ok, try to upload file
            $insert = "INSERT INTO `product`(`ProductID`, `ProductType`, `ProductName`, `FanRPM`, `NoiceLevel`, `Color`, `Price`, `Image`) 
            VALUES (NULL,'CPU Cooler','$name','$rpm','$noice','$color','$price','$fileName')";
            $run = mysqli_query($connect, $insert);

            if ($run) {
                echo "<script>alert('CPU Cooler Added Successfully')</script>";
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
    <link rel="stylesheet" href="./adminStyle.css?v=1.48">
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
    <title>Admin</title>
</head>

<body>
    <div class="admin-wrap">
        <?php
        include 'adminHeader.php'
        ?>

        <div class="admin-content">
            <div class="add-product-wrap">
                <div class="header-back-btn">
                    <h2>Add CPU Cooler</h2>
                    <a href="productRedirect.php">Back</a>
                </div>

                <form method="POST" class="product-form" enctype="multipart/form-data">
                    <div class="cpu-input">
                        <div class="addProDiv">
                            <label for="Name">Cooler Name</label>
                            <input type="text" name="txtName" id="Name" required>
                        </div>

                        <div class="addProDiv">
                            <label for="RMP">Fan RPM</label>
                            <input type="number" name="txtRPM" id="RPM" placeholder="RPM" required>
                        </div>

                        <div class="addProDiv">
                            <label for="Noice">Noice Level</label>
                            <input type="number" name="txtNoice" id="Noice" placeholder="dB" step="0.01" required>
                        </div>

                        <div class="addProDiv">
                            <label for="Color">Color</label>
                            <input type="text" name="txtColor" id="Color" required>
                        </div>

                        <div class="addProDiv">
                            <label for="Price">Price</label>
                            <input type="number" name="txtPrice" id="Price" placeholder="Dollar" step="0000.01" required>
                        </div>

                        <div class="addProDiv">
                            <label for="Image">Image</label>
                            <input type="file" name="txtImage" id="Image" class="ImageCPU" required>
                        </div>
                    </div>

                    <button type="submit" name="cpuSubmit" id="submit">Submit</button>

                </form>
            </div>
        </div>
    </div>
</body>

<script src="./jquery.js"></script>

</html>