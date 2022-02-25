<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css?v=1.5">
    <title>PC Builder</title>
</head>

<body>
    <div class="container">
        <?php
        include 'header.php';
        ?>

        <div class="builder-body">
            <h1>Custom Builder</h1>

            <form action="" method="post">
                <?php
                if (!empty($_SESSION["add_product"])) {
                    echo "notempty";
                ?>
                    <div class="check-out-div">
                        <div class="price-head">
                            <p>Total Price</p>
                        </div>

                        <div class="free-ship">
                            <p>+ Free Shipping +</p>
                        </div>

                        <div class="check-out">
                            <img src="../Images/angle-double-right.svg">
                            <button>Checkout</button>
                        </div>
                    </div>
                <?php
                } else {
                ?>
                    <div class="builder-contents">
                        <div>
                            <img src="../Images/ps_cpu.svg" alt="cpu-icon" class="builder-img">
                            <p>CPU</p>
                            <a href="addCPU.php"><span>Add</span> <img src="../Images/plus-blue.svg" class="builder-plus"></a>
                        </div>
                        <div>
                            <img src="../Images/bi_fan.svg" alt="fan-icon" class="builder-img">
                            <p>CPU Cooler</p>
                            <a href=""><span>Add</span> <img src="../Images/plus-blue.svg" class="builder-plus"></a>
                        </div>
                        <div>
                            <img src="../Images/bi_motherboard.svg" alt="motherboard-icon" class="builder-img">
                            <p>Mother Board</p>
                            <a href=""><span>Add</span> <img src="../Images/plus-blue.svg" class="builder-plus"></a>
                        </div>
                        <div>
                            <img src="../Images/ps_ram.svg" alt="ram-icon" style="margin-bottom: -0.2rem;" class="builder-img">
                            <p>Memory</p>
                            <a href=""><span>Add</span> <img src="../Images/plus-blue.svg" class="builder-plus"></a>
                        </div>
                        <div>
                            <img src="../Images/ic_baseline-settings-power.svg" alt="powersuppy-icon" class="builder-img">
                            <p>Power Supply</p>
                            <a href=""><span>Add</span> <img src="../Images/plus-blue.svg" class="builder-plus"></a>
                        </div>
                        <div>
                            <img src="../Images/bi_gpu-card.svg" alt="gpu-icon" class="builder-img">
                            <p>GPU</p>
                            <a href="addGPU.php"><span>Add</span> <img src="../Images/plus-blue.svg" class="builder-plus"></a>
                        </div>
                        <div>
                            <img src="../Images/ant-design_container-twotone.svg" alt="case-icon" class="builder-img">
                            <p>Case</p>
                            <a href=""><span>Add</span> <img src="../Images/plus-blue.svg" class="builder-plus"></a>
                        </div>
                        <div>
                            <img src="../Images/carbon_vmdk-disk.svg" alt="storage-icon" class="builder-img">
                            <p>Storage</p>
                            <a href=""><span>Add</span> <img src="../Images/plus-blue.svg" class="builder-plus"></a>
                        </div>
                    </div>
                <?php
                }
                ?>
            </form>

        </div>
    </div>
    <script src="../Admin/jquery.js"></script>
    <script>
        // $(".check-out-div").hide();
        // console.log("object");
    </script>
</body>

</html>