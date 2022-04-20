<?php
include 'adminCheck.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./adminStyle.css?v=2.8">
    <title>Choose Product to add</title>
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
        include('adminHeader.php');
        ?>

        <div class="admin-content">

            <div class="add-product-wrap">

                <div class="header-back-btn">
                    <h2>Choose A Product To Add</h2>
                    <!-- <a href="products.php">Back</a> -->
                </div>

                <div class="product-grid">
                    <div class="cpulink">
                        CPU
                    </div>
                    <div class="coolerlink">
                        CPU Cooler
                    </div>
                    <div class="boardlink">
                        Motherboard
                    </div>
                    <div class="ramlink">
                        Memory
                    </div>
                    <div class="powerlink">
                        PowerSupply
                    </div>
                    <div class="gpulink">
                        GPU
                    </div>
                    <div class="caselink">
                        Case
                    </div>
                    <div class="storagelink">
                        Storage
                    </div>
                </div>

            </div>

        </div>
    </div>

    <script>
        const cpuLink = document.getElementsByClassName("cpulink");
        cpuLink[0].addEventListener("click", () => {
            window.location.href = "addCPU.php";
        });

        const coolerLink = document.getElementsByClassName("coolerlink");
        coolerLink[0].addEventListener("click", () => {
            window.location.href = "addCooler.php";
        });

        const boardLink = document.getElementsByClassName("boardlink");
        boardLink[0].addEventListener("click", () => {
            window.location.href = "addMotherboard.php";
        });

        const gpuLink = document.getElementsByClassName("gpulink");
        gpuLink[0].addEventListener("click", () => {
            window.location.href = "addGPU.php";
        });

        const ramLink = document.getElementsByClassName("ramlink");
        ramLink[0].addEventListener("click", () => {
            window.location.href = "addMemory.php";
        });

        const powerLink = document.getElementsByClassName("powerlink");
        powerLink[0].addEventListener("click", () => {
            window.location.href = "addPowerSupply.php";
        });

        const caseLink = document.getElementsByClassName("caselink");
        caseLink[0].addEventListener("click", () => {
            window.location.href = "addCase.php";
        });

        const storageLink = document.getElementsByClassName("storagelink");
        storageLink[0].addEventListener("click", () => {
            window.location.href = "addStorage.php";
        });
    </script>

</body>

</html>