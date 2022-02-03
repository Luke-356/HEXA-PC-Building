<?php
session_start();
$connect = mysqli_connect('localhost', 'root', '', 'hexa_pc_building');
if (isset($_POST['btn-cpu'])) {
    $_SESSION['product'] = "cpu";
    echo "<script>   
    window.location.assign('viewProducts.php');
    </script>";
} else if (isset($_POST['btn-cooler'])) {
    $_SESSION['product'] = "cooler";
    echo "<script>   
    window.location.assign('viewProducts.php');
    </script>";
} else if (isset($_POST['btn-board'])) {
    $_SESSION['product'] = "board";
    echo "<script>   
    window.location.assign('viewProducts.php');
    </script>";
} else if (isset($_POST['btn-ram'])) {
    $_SESSION['product'] = "ram";
    echo "<script>   
    window.location.assign('viewProducts.php');
    </script>";
} else if (isset($_POST['btn-supply'])) {
    $_SESSION['product'] = "supply";
    echo "<script>   
    window.location.assign('viewProducts.php');
    </script>";
} else if (isset($_POST['btn-gpu'])) {
    $_SESSION['product'] = "gpu";
    echo "<script>   
    window.location.assign('viewProducts.php');
    </script>";
} else if (isset($_POST['btn-case'])) {
    $_SESSION['product'] = "case";
    echo "<script>   
    window.location.assign('viewProducts.php');
    </script>";
} else if (isset($_POST['btn-storage'])) {
    $_SESSION['product'] = "storage";
    echo "<script>   
    window.location.assign('viewProducts.php');
    </script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css?v=1.45">
    <title>PC Builder</title>
</head>

<body>
    <div class="container">
        <?php
        include 'header.php';
        ?>

        <div class="builder-body">
            <h1>Custom Builder</h1>

            <form class="builder-contents" method="POST">
                <div>
                    <img src="../Images/ps_cpu.svg" alt="cpu-icon" class="builder-img">
                    <p>CPU</p>
                    <button type="submit" name="btn-cpu"><span>Add</span> <img src="../Images/plus-blue.svg" class="builder-plus"></button>
                </div>
                <div>
                    <img src="../Images/bi_fan.svg" alt="fan-icon" class="builder-img">
                    <p>CPU Cooler</p>
                    <button type="submit" name="btn-cooler"><span>Add</span> <img src="../Images/plus-blue.svg" class="builder-plus"></button>
                </div>
                <div>
                    <img src="../Images/bi_motherboard.svg" alt="motherboard-icon" class="builder-img">
                    <p>Mother Board</p>
                    <button type="submit" name="btn-board"><span>Add</span> <img src="../Images/plus-blue.svg" class="builder-plus"></button>
                </div>
                <div>
                    <img src="../Images/ps_ram.svg" alt="ram-icon" style="margin-bottom: -0.2rem;" class="builder-img">
                    <p>Memory</p>
                    <button type="submit" name="btn-ram"><span>Add</span> <img src="../Images/plus-blue.svg" class="builder-plus"></button>
                </div>
                <div>
                    <img src="../Images/ic_baseline-settings-power.svg" alt="powersuppy-icon" class="builder-img">
                    <p>Power Supply</p>
                    <button type="submit" name="btn-supply"><span>Add</span> <img src="../Images/plus-blue.svg" class="builder-plus"></button>
                </div>
                <div>
                    <img src="../Images/bi_gpu-card.svg" alt="gpu-icon" class="builder-img">
                    <p>GPU</p>
                    <button type="submit" name="btn-gpu"><span>Add</span> <img src="../Images/plus-blue.svg" class="builder-plus"></button>
                </div>
                <div>
                    <img src="../Images/ant-design_container-twotone.svg" alt="case-icon" class="builder-img">
                    <p>Case</p>
                    <button type="submit" name="btn-case"><span>Add</span> <img src="../Images/plus-blue.svg" class="builder-plus"></button>
                </div>
                <div>
                    <img src="../Images/carbon_vmdk-disk.svg" alt="storage-icon" class="builder-img">
                    <p>Storage</p>
                    <button type="submit" name="btn-storage"><span>Add</span> <img src="../Images/plus-blue.svg" class="builder-plus"></button>
                </div>
                <div class="price-head">
                    <p>Total Price</p>
                </div>

                <div class="free-ship">
                    <p>+ Free Shipping +</p>
                </div>

                <div class="check-out">
                    <button>Checkout</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>