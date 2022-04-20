<?php
session_start();
$connect = mysqli_connect('localhost', 'root', '', 'hexa_pc_building');
if (isset($_POST['btnOrder'])) {
    $uid = $_SESSION['UserID'];
    $fName = $_POST["txtFName"];
    $lName = $_POST["txtLName"];
    $address = $_POST["txtAdd"];
    $price = $_SESSION["total_price"];
    $cpu = $_SESSION["cpu_id"];
    $cooler = $_SESSION["cooler_id"];
    $board = $_SESSION["motherboard_id"];
    $memory = $_SESSION["memory_id"];
    $power = $_SESSION["power_id"];
    $gpu = $_SESSION["gpu_id"];
    $case = $_SESSION["case_id"];
    $storage = $_SESSION["storage_id"];
    $insert = "INSERT INTO `OrderPC`(`OrderID`, `UserID`, `FirstName`, `LastName`, `Address`, `Price`, `CPUID`, `CPUCoolerID`, `MotherBoardID`, `MemoryID`, `PowerSupplyID`, `GPUID`, `CaseID`, `StorageID`)
    VALUES (NULL,'$uid','$fName','$lName','$address','$price','$cpu','$cooler','$board','$memory','$power','$gpu','$case','$storage')";
    $run = mysqli_query($connect, $insert);
    if ($run) {
        unset($_SESSION["add_cpu"]);
        unset($_SESSION["cpu_id"]);
        unset($_SESSION["add_gpu"]);
        unset($_SESSION["gpu_id"]);
        unset($_SESSION["add_cooler"]);
        unset($_SESSION["cooler_id"]);
        unset($_SESSION["add_motherboard"]);
        unset($_SESSION["motherboard_id"]);
        unset($_SESSION["add_memory"]);
        unset($_SESSION["memory_id"]);
        unset($_SESSION["add_power"]);
        unset($_SESSION["power_id"]);
        unset($_SESSION["add_case"]);
        unset($_SESSION["case_id"]);
        unset($_SESSION["add_storage"]);
        unset($_SESSION["storage_id"]);
        echo "<script>
            alert('Order Successful');
            window.location.assign('builder.php');
            </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css?v=2.6">
    <title>CheckOut</title>
    <style>
        textarea {
            width: 100%;
            font-size: 1rem;
            margin-top: 0.5rem;
            border: none;
            background-color: #e4e4e4;
            padding: 1rem 0.5rem 1rem 0.5rem;
            border-radius: 6px;
            resize: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <!--navigation-->
        <?php
        include 'header.php';
        ?>

        <div class="login-wrap">
            <form method="POST" class="register-form">
                <h2>Checkout</h2>
                <div class="inputs">
                    <label for="txtFName">First Name</label> <br>
                    <input type="text" id="txtFName" name="txtFName" required>
                </div>

                <div class="inputs">
                    <label for="txtLName">Last Name</label> <br>
                    <input type="text" id="txtLName" name="txtLName" required>
                </div>

                <div class="inputs">
                    <label for="txtAdd">Address</label> <br>
                    <textarea name="txtAdd" id="txtAdd" cols="30" rows="8" required></textarea>
                </div>

                <div class="total-price">
                    <p>Total Price : <span>$<?php echo $_SESSION["total_price"] ?></span></p>
                </div>

                <button name="btnOrder" type="submit">Place Order</button>
            </form>
        </div>
    </div>
</body>

<?php
include("footer.php");
?>

</html>