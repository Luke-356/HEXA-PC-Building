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
        .rating {
            background: #464646;
            text-align: center;
            pointer-events: none;
        }

        .rating a {
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
                    <th>RatingID</th>
                    <th>UserName</th>
                    <th>Rating</th>
                    <th>RatingText</th>
                </tr>

                <?php
                $connect = mysqli_connect('localhost', 'root', '', 'hexa_pc_building');
                $select = "Select * from rating";
                $run = mysqli_query($connect, $select) or die(mysqli_error($connect));
                $count = mysqli_num_rows($run);

                for ($i = 0; $i < $count; $i++) {
                    $row = mysqli_fetch_array($run);
                    $ratingid = $row[0];
                    $userid = $row[1];

                    $selectuser = "Select * from User WHERE UserID = '$userid'";
                    $runuser = mysqli_query($connect, $selectuser) or die(mysqli_error($connect));
                    $rowuser = mysqli_fetch_array($runuser);

                    $username = $rowuser[1];
                    $rating = $row[2];
                    $text = $row[3];

                    echo "
                    <tr class='tr'>
			 			<td>$ratingid</td>
			 			<td>$username</td>
			 			<td>$rating</td>
			 			<td>$text</td>
			 		</tr>
                    ";
                }
                ?>
            </table>
        </div>
    </div>

</body>

</html>