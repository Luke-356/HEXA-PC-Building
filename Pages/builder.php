<?php
session_start();
if (isset($_GET["action"])) {
    if ($_GET["action"] == "deleteCPU") {
        unset($_SESSION["add_cpu"]);
        unset($_SESSION["cpu_id"]);
    } else if ($_GET["action"] == "deleteGPU") {
        unset($_SESSION["add_gpu"]);
        unset($_SESSION["gpu_id"]);
    } else if ($_GET["action"] == "deleteCooler") {
        unset($_SESSION["add_cooler"]);
        unset($_SESSION["cooler_id"]);
    } else if ($_GET["action"] == "deleteMotherboard") {
        unset($_SESSION["add_motherboard"]);
        unset($_SESSION["motherboard_id"]);
    } else if ($_GET["action"] == "deleteMemory") {
        unset($_SESSION["add_memory"]);
        unset($_SESSION["memory_id"]);
    } else if ($_GET["action"] == "deletePower") {
        unset($_SESSION["add_power"]);
        unset($_SESSION["power_id"]);
    } else if ($_GET["action"] == "deleteCase") {
        unset($_SESSION["add_case"]);
        unset($_SESSION["case_id"]);
    } else if ($_GET["action"] == "deleteStorage") {
        unset($_SESSION["add_storage"]);
        unset($_SESSION["storage_id"]);
    }
}

if (isset($_SESSION['UserID'])) {
    if (isset($_POST["btnCheck"])) {
        echo "<script>   
                window.location.assign('checkOut.php');
            </script>";
    }
} else {
    if (isset($_POST["btnCheck"])) {
        echo "<script>   
                alert('Please Login');
                window.location.assign('login.php');
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
    <link rel="stylesheet" href="./styles/style.css?v=2.2">
    <title>PC Builder</title>
    <style>
        .product-img {
            width: 100px;
        }

        /* .container {
            position: relative;
        }

        .footer-container {
            position: absolute;
            bottom: 0;
            width: 100%;
        } */

        .container {
            margin-bottom: 8rem;
        }

        .builder-body {
            margin-top: 5rem;
        }
    </style>
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

                if (isset($_SESSION["add_cpu"]) || isset($_SESSION["add_cooler"]) || isset($_SESSION["add_motherboard"]) || isset($_SESSION["add_memory"]) || isset($_SESSION["add_power"]) || isset($_SESSION["add_gpu"]) || isset($_SESSION["add_case"]) || isset($_SESSION["add_storage"])) {
                    echo '<div class="builder-contents">';
                    //CPU 
                    if (!empty($_SESSION["add_cpu"])) {
                        foreach ($_SESSION["add_cpu"] as $keys => $values) {
                ?>
                            <div>
                                <img src='../Admin/ProductImages/<?php echo $values['cpu_image'] ?>' class="product-img">
                                <p><?php echo $values["cpu_name"]; ?></p>
                                <span> <?php echo "$ ";
                                        echo $values["cpu_price"]; ?></span>
                                <a href="builder.php?action=deleteCPU" style="margin-top: 1rem;"><span>Remove</span></a>
                            </div>


                        <?php
                        }
                    } else {
                        ?>
                        <div>
                            <img src="../Images/ps_cpu.svg" alt="cpu-icon" class="builder-img">
                            <p>CPU</p>
                            <a href="addCPU.php"><span>Add</span> <img src="../Images/plus-blue.svg" class="builder-plus"></a>
                        </div>
                        <?php
                    }

                    //Cooler 
                    if (!empty($_SESSION["add_cooler"])) {
                        foreach ($_SESSION["add_cooler"] as $keys => $values) {
                        ?>
                            <div>
                                <img src='../Admin/ProductImages/<?php echo $values['cooler_image'] ?>' class="product-img">
                                <p><?php echo $values["cooler_name"]; ?></p>
                                <span> <?php echo "$ ";
                                        echo $values["cooler_price"]; ?></span>
                                <a href="builder.php?action=deleteCooler" style="margin-top: 1rem;"><span>Remove</span></a>
                            </div>


                        <?php
                        }
                    } else {
                        ?>
                        <div>
                            <img src="../Images/bi_fan.svg" alt="fan-icon" class="builder-img">
                            <p>CPU Cooler</p>
                            <a href="addCooler.php"><span>Add</span> <img src="../Images/plus-blue.svg" class="builder-plus"></a>
                        </div>
                        <?php
                    }

                    //Motherboard
                    if (!empty($_SESSION["add_motherboard"])) {
                        foreach ($_SESSION["add_motherboard"] as $keys => $values) {
                        ?>
                            <div>
                                <img src='../Admin/ProductImages/<?php echo $values['motherboard_image'] ?>' class="product-img">
                                <p><?php echo $values["motherboard_name"]; ?></p>
                                <span> <?php echo "$ ";
                                        echo $values["motherboard_price"]; ?></span>
                                <a href="builder.php?action=deleteMotherboard" style="margin-top: 1rem;"><span>Remove</span></a>
                            </div>


                        <?php
                        }
                    } else {
                        ?>
                        <div>
                            <img src="../Images/bi_motherboard.svg" alt="motherboard-icon" class="builder-img">
                            <p>Mother Board</p>
                            <a href="addMotherboard.php"><span>Add</span> <img src="../Images/plus-blue.svg" class="builder-plus"></a>
                        </div>
                        <?php
                    }

                    //Memory
                    if (!empty($_SESSION["add_memory"])) {
                        foreach ($_SESSION["add_memory"] as $keys => $values) {
                        ?>
                            <div>
                                <img src='../Admin/ProductImages/<?php echo $values['memory_image'] ?>' class="product-img">
                                <p><?php echo $values["memory_name"]; ?></p>
                                <span> <?php echo "$ ";
                                        echo $values["memory_price"]; ?></span>
                                <a href="builder.php?action=deleteMemory" style="margin-top: 1rem;"><span>Remove</span></a>
                            </div>


                        <?php
                        }
                    } else {
                        ?>
                        <div>
                            <img src="../Images/ps_ram.svg" alt="ram-icon" style="margin-bottom: -0.2rem;" class="builder-img">
                            <p>Memory</p>
                            <a href="addMemory.php"><span>Add</span> <img src="../Images/plus-blue.svg" class="builder-plus"></a>
                        </div>
                        <?php
                    }

                    //PowerSupply
                    if (!empty($_SESSION["add_power"])) {
                        foreach ($_SESSION["add_power"] as $keys => $values) {
                        ?>
                            <div>
                                <img src='../Admin/ProductImages/<?php echo $values['power_image'] ?>' class="product-img">
                                <p><?php echo $values["power_name"]; ?></p>
                                <span> <?php echo "$ ";
                                        echo $values["power_price"]; ?></span>
                                <a href="builder.php?action=deletePower" style="margin-top: 1rem;"><span>Remove</span></a>
                            </div>


                        <?php
                        }
                    } else {
                        ?>
                        <div>
                            <img src="../Images/ic_baseline-settings-power.svg" alt="powersuppy-icon" class="builder-img">
                            <p>Power Supply</p>
                            <a href="addPowerSupply.php"><span>Add</span> <img src="../Images/plus-blue.svg" class="builder-plus"></a>
                        </div>
                        <?php
                    }

                    //GPU
                    if (!empty($_SESSION["add_gpu"])) {
                        foreach ($_SESSION["add_gpu"] as $keys => $values) {
                        ?>
                            <div>
                                <img src='../Admin/ProductImages/<?php echo $values['gpu_image'] ?>' class="product-img">
                                <p><?php echo $values["gpu_name"]; ?></p>
                                <span> <?php echo "$ ";
                                        echo $values["gpu_price"]; ?></span>
                                <a href="builder.php?action=deleteGPU" style="margin-top: 1rem;"><span>Remove</span></a>
                            </div>
                        <?php
                        }
                    } else {
                        ?>
                        <div>
                            <img src="../Images/bi_gpu-card.svg" alt="gpu-icon" class="builder-img">
                            <p>GPU</p>
                            <a href="addGPU.php"><span>Add</span> <img src="../Images/plus-blue.svg" class="builder-plus"></a>
                        </div>
                        <?php
                    }

                    //Case
                    if (!empty($_SESSION["add_case"])) {
                        foreach ($_SESSION["add_case"] as $keys => $values) {
                        ?>
                            <div>
                                <img src='../Admin/ProductImages/<?php echo $values['case_image'] ?>' class="product-img">
                                <p><?php echo $values["case_name"]; ?></p>
                                <span> <?php echo "$ ";
                                        echo $values["case_price"]; ?></span>
                                <a href="builder.php?action=deleteCase" style="margin-top: 1rem;"><span>Remove</span></a>
                            </div>


                        <?php
                        }
                    } else {
                        ?>
                        <div>
                            <img src="../Images/ant-design_container-twotone.svg" alt="case-icon" class="builder-img">
                            <p>Case</p>
                            <a href="addCase.php"><span>Add</span> <img src="../Images/plus-blue.svg" class="builder-plus"></a>
                        </div>
                        <?php
                    }

                    //Storage
                    if (!empty($_SESSION["add_storage"])) {
                        foreach ($_SESSION["add_storage"] as $keys => $values) {
                        ?>
                            <div>
                                <img src='../Admin/ProductImages/<?php echo $values['storage_image'] ?>' class="product-img">
                                <p><?php echo $values["storage_name"]; ?></p>
                                <span> <?php echo "$ ";
                                        echo $values["storage_price"]; ?></span>
                                <a href="builder.php?action=deleteStorage" style="margin-top: 1rem;"><span>Remove</span></a>
                            </div>


                        <?php
                        }
                    } else {
                        ?>
                        <div>
                            <img src="../Images/carbon_vmdk-disk.svg" alt="storage-icon" class="builder-img">
                            <p>Storage</p>
                            <a href="addStorage.php"><span>Add</span> <img src="../Images/plus-blue.svg" class="builder-plus"></a>
                        </div>
                    <?php
                    }

                    echo '</div>';

                    if (isset($_SESSION["add_cpu"]) && isset($_SESSION["add_cooler"]) && isset($_SESSION["add_motherboard"]) && isset($_SESSION["add_memory"]) && isset($_SESSION["add_power"]) && isset($_SESSION["add_gpu"]) && isset($_SESSION["add_case"]) && isset($_SESSION["add_storage"])) {
                        $totalPrice = $_SESSION["cpu_price"] + $_SESSION["case_price"] + $_SESSION["cooler_price"] + $_SESSION["gpu_price"] + $_SESSION["memory_price"] + $_SESSION["mother_price"] + $_SESSION["power_price"] + $_SESSION["storage_price"];
                        $_SESSION["total_price"] = $totalPrice;
                    ?>
                        <form method="post">
                            <div class="check-out-div">
                                <div class="price-head">
                                    <p>Total Price : $ <?php echo $totalPrice ?></p>
                                </div>

                                <div class="free-ship">
                                    <p>+ Free Delivery +</p>
                                </div>

                                <div class="check-out">
                                    <img src="../Images/angle-double-right.svg">
                                    <button type="submit" name="btnCheck" class="checkBtn">Checkout</button>
                                </div>
                            </div>
                        </form>
                    <?php
                    }
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
                            <a href="addCooler.php"><span>Add</span> <img src="../Images/plus-blue.svg" class="builder-plus"></a>
                        </div>
                        <div>
                            <img src="../Images/bi_motherboard.svg" alt="motherboard-icon" class="builder-img">
                            <p>Mother Board</p>
                            <a href="addMotherboard.php"><span>Add</span> <img src="../Images/plus-blue.svg" class="builder-plus"></a>
                        </div>
                        <div>
                            <img src="../Images/ps_ram.svg" alt="ram-icon" style="margin-bottom: -0.2rem;" class="builder-img">
                            <p>Memory</p>
                            <a href="addMemory.php"><span>Add</span> <img src="../Images/plus-blue.svg" class="builder-plus"></a>
                        </div>
                        <div>
                            <img src="../Images/ic_baseline-settings-power.svg" alt="powersuppy-icon" class="builder-img">
                            <p>Power Supply</p>
                            <a href="addPowerSupply.php"><span>Add</span> <img src="../Images/plus-blue.svg" class="builder-plus"></a>
                        </div>
                        <div>
                            <img src="../Images/bi_gpu-card.svg" alt="gpu-icon" class="builder-img">
                            <p>GPU</p>
                            <a href="addGPU.php"><span>Add</span> <img src="../Images/plus-blue.svg" class="builder-plus"></a>
                        </div>
                        <div>
                            <img src="../Images/ant-design_container-twotone.svg" alt="case-icon" class="builder-img">
                            <p>Case</p>
                            <a href="addCase.php"><span>Add</span> <img src="../Images/plus-blue.svg" class="builder-plus"></a>
                        </div>
                        <div>
                            <img src="../Images/carbon_vmdk-disk.svg" alt="storage-icon" class="builder-img">
                            <p>Storage</p>
                            <a href="addStorage.php"><span>Add</span> <img src="../Images/plus-blue.svg" class="builder-plus"></a>
                        </div>
                    </div>
                <?php
                }
                ?>
            </form>

        </div>
    </div>
    <!-- <script src="../Admin/jquery.js"></script> -->
    <!-- <script>
        const checkBtn = document.getElementsByClassName("checkBtn");
        checkBtn[0].addEventListener("click", () => {
            window.location.href = "checkOut.php";
        });
    </script> -->
    <?php
    include("footer.php");
    ?>
</body>

</html>