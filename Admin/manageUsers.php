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
        .user {
            background: #464646;
            text-align: center;
            pointer-events: none;
        }

        .user a {
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
                    <th>UserID</th>
                    <th>UserName</th>
                    <th>Email</th>
                    <th>PhoneNumber</th>
                    <th>Address</th>
                </tr>

                <?php
                $connect = mysqli_connect('localhost', 'root', '', 'hexa_pc_building');
                $select = "Select * from user";
                $run = mysqli_query($connect, $select) or die(mysqli_error($connect));
                $count = mysqli_num_rows($run);

                for ($i = 0; $i < $count; $i++) {
                    $row = mysqli_fetch_array($run);
                    $userid = $row[0];
                    $username = $row[1];
                    $email = $row[2];
                    $phonenumber = $row[3];
                    $address = $row[4];

                    echo "
                    <tr class='tr'>
			 			<td>$userid</td>
			 			<td>$username</td>
			 			<td>$email</td>
			 			<td>$phonenumber</td>
			 			<td>$address</td>
			 		</tr>
                    ";
                }
                ?>
            </table>
        </div>
    </div>

</body>

</html>