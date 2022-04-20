<?php
include 'adminCheck.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./adminStyle.css?v=2.9">
    <title>Admin</title>
    <style>
        .order {
            background: #464646;
            text-align: center;
            pointer-events: none;
        }

        .order a {
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
            <table>
                <tr>
                    <th>OrderID</th>
                    <th>Customer</th>
                    <th>Email</th>
                    <th>PhoneNumber</th>
                    <th>CPU</th>
                    <th>Cooler</th>
                    <th>Motherboard</th>
                    <th>Memory</th>
                    <th>PowerSupply</th>
                    <th>GPU</th>
                    <th>Case</th>
                    <th>Storage</th>
                </tr>

                <?php
                $connect = mysqli_connect('localhost', 'root', '', 'hexa_pc_building');
                $select = "Select * from OrderPC";
                $run = mysqli_query($connect, $select) or die(mysqli_error($connect));
                $count = mysqli_num_rows($run);

                for ($i = 0; $i < $count; $i++) {
                    $row = mysqli_fetch_array($run);

                    $orderid = $row[0];
                    $fname = $row[2];
                    $lname = $row[3];

                    $userid = $row[1];
                    $runselectuser = mysqli_query($connect, "SELECT * FROM User WHERE UserID=' $userid'");
                    $datauser = mysqli_fetch_array($runselectuser);
                    $email = $datauser["Email"];
                    $phone = $datauser["PhoneNumber"];

                    $cpuid = $row["CPUID"];
                    $runselectcpu = mysqli_query($connect, "SELECT * FROM Product WHERE ProductID='$cpuid'");
                    $dataproduct1 = mysqli_fetch_array($runselectcpu);
                    $cpu = $dataproduct1["ProductName"];

                    $coolerid = $row["CPUCoolerID"];
                    $runselectcooler = mysqli_query($connect, "SELECT * FROM Product WHERE ProductID='$coolerid'");
                    $dataproduct2 = mysqli_fetch_array($runselectcooler);
                    $cooler = $dataproduct2["ProductName"];

                    $boardid = $row["MotherBoardID"];
                    $runselectboard = mysqli_query($connect, "SELECT * FROM Product WHERE ProductID='$boardid'");
                    $dataproduct3 = mysqli_fetch_array($runselectboard);
                    $board = $dataproduct3["ProductName"];

                    $memoryid = $row["MemoryID"];
                    $runselectmemory = mysqli_query($connect, "SELECT * FROM Product WHERE ProductID='$memoryid'");
                    $dataproduct4 = mysqli_fetch_array($runselectmemory);
                    $memory = $dataproduct4["ProductName"];

                    $powerid = $row["PowerSupplyID"];
                    $runselectpower = mysqli_query($connect, "SELECT * FROM Product WHERE ProductID='$powerid'");
                    $dataproduct5 = mysqli_fetch_array($runselectpower);
                    $power = $dataproduct5["ProductName"];

                    $gpuid = $row["GPUID"];
                    $runselectgpu = mysqli_query($connect, "SELECT * FROM Product WHERE ProductID='$gpuid'");
                    $dataproduct6 = mysqli_fetch_array($runselectgpu);
                    $gpu = $dataproduct6["ProductName"];

                    $caseid = $row["CaseID"];
                    $runselectcase = mysqli_query($connect, "SELECT * FROM Product WHERE ProductID='$caseid'");
                    $dataproduct7 = mysqli_fetch_array($runselectcase);
                    $case = $dataproduct7["ProductName"];

                    $storageid = $row["StorageID"];
                    $runselectstorage = mysqli_query($connect, "SELECT * FROM Product WHERE ProductID='$storageid'");
                    $dataproduct8 = mysqli_fetch_array($runselectstorage);
                    $storage = $dataproduct8["ProductName"];

                    echo "
                    <tr class='tr'>
			 			<td>$orderid</td>
			 			<td>$fname $lname</td>
			 			<td>$email</td>
			 			<td>$phone</td>
                        <td>$cpu</td>
                        <td>$cooler</td>
                        <td>$board</td>
                        <td>$memory</td>
                        <td>$power</td>
                        <td>$gpu</td>
                        <td>$case</td>
                        <td>$storage</td>
			 		</tr>
                    ";
                }
                ?>
            </table>
        </div>
    </div>

</body>

</html>