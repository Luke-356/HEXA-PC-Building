<?php
session_start();
$connect = mysqli_connect('localhost', 'root', '', 'hexa_pc_building');
if (isset($_SESSION['AdminID'])) {
    $user = $_SESSION['AdminID'];
    $select = "Select * from Admin where AdminID= '$user'";
    $run = mysqli_query($connect, $select);
    $data = mysqli_fetch_array($run);
    $UserName = $data['1'];
    $Email = $data['2'];
    $Phone = $data['3'];
}

if (isset($_POST['btnUpdate'])) {
    $name = $_POST['txtName'];
    $email = $_POST['txtMail'];
    $tel = $_POST['txtTel'];
    if (!empty($_POST['txtCurrentPass'])) {
        $currentPass = $_POST['txtCurrentPass'];
        $currentHash = md5($currentPass);

        $newPass = $_POST['txtNewPass'];
        $newHash = md5($newPass);

        $select = "SELECT * FROM Admin where Password='$currentHash'";
        $run = mysqli_query($connect, $select);
        $count = mysqli_num_rows($run);

        if ($count > 0) {
            if (trim($newPass) == "") {
                echo "<script>
                alert('Please Add New Password');
                </script>";
            } else {
                $update = "UPDATE `Admin` SET `AdminName`='$name',`Email`='$email',`PhoneNumber`='$tel',`Password`='$newHash' 
                WHERE AdminID= '$user'";
                $run = mysqli_query($connect, $update);
                echo "<script>
                    alert('Update Successful');
                    window.location.assign('profile.php');
                </script>";
            }
        } else {
            echo "<script>
		alert('Current Password Does Not Match');
		window.location.assign('profile.php');
		</script>";
        }
    } else {

        $update = "UPDATE `Admin` SET `AdminName`='$name',`Email`='$email',`PhoneNumber`='$tel' 
            WHERE AdminID= '$user'";
        $run = mysqli_query($connect, $update);
        echo "<script>
                 alert('Update Successful');
                 window.location.assign('profile.php');
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
    <link rel="stylesheet" href="./adminStyle.css?v=1.48">
    <title>Admin Register</title>
    <style>
        .p-head-wrap {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            margin-top: 2rem;
            margin-bottom: 1.4rem;
        }

        .p-head-wrap h2 {
            color: #464646;
            font-size: 30px;
        }

        .profile-container {
            width: 90%;
            margin: 0 auto;
        }

        #updateBtn {
            border: none;
            cursor: pointer;
            padding: 1.2rem 2rem 1.2rem 2rem;
            background-color: #464646;
            font-size: 18px;
            color: white;
            border-radius: 14px;
        }

        #updateBtn:hover {
            background-color: #3b3b3b;
        }

        .logout-btn {
            border: 2px solid #464646;
            color: #464646;
            background: none;
            padding: 0.8rem 1rem 0.8rem 1rem;
            cursor: pointer;
            font-size: 1rem;
            border-radius: 1rem;
        }

        .logout-btn:hover {
            border: 2px solid #3b3b3b;
            background-color: #f3f3f3;
            color: #3b3b3b;
        }

        .inputs {
            margin-bottom: 1.6rem;
            width: 100%;
        }

        .inputs input {
            font-size: 1rem;
            width: 100%;
            margin-top: 0.5rem;
            border: none;
            background-color: #e4e4e4;
            padding: 1rem 0.5rem 1rem 0.5rem;
            border-radius: 6px;
        }

        .inputs label {
            font-size: 18px;
        }

        .inputs p {
            font-size: 0.9rem;
        }
    </style>
</head>

<body>

    <div class="admin-wrap">
        <?php
        include 'adminHeader.php'
        ?>

        <div class="admin-content">
            <div class="add-product-wrap">
                <div class="profile-container">
                    <div class="p-head-wrap">
                        <h2 class="profile-header">Admin Profile</h2>
                        <button onclick="logConfirm()" class="logout-btn">Logout</button>
                    </div>

                    <form method="POST" class="edit-profile" id="form">
                        <div class="inputs">
                            <label for="txtName">User Name</label> <br>
                            <input type="text" id="txtName" name="txtName" value="<?php echo $UserName; ?>" required>
                        </div>

                        <div class="inputs">
                            <label for="txtMail">Email</label> <br>
                            <input type="email" id="txtMail" name="txtMail" value="<?php echo $Email; ?>" required>
                        </div>

                        <div class="inputs">
                            <label for="txtTel">Phone Number</label> <br>
                            <input type="tel" id="txtTel" name="txtTel" value="<?php echo $Phone; ?>" required>
                        </div>

                        <div class="inputs">
                            <label for="txtPass">Current Password</label> <br>
                            <input type="password" name="txtCurrentPass" id="txtPass">
                        </div>

                        <div class="inputs">
                            <label for="txtCon">New Password</label> <br>
                            <input type="password" name="txtNewPass" id="newPass">
                            <p>Ignore password fields if you don't want to change.</p>
                        </div>

                        <button name="btnUpdate" type="submit" id="updateBtn">Update</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script>
        logConfirm = () => {
            if (confirm("Are you sure you want to logout?")) {
                window.location.assign("logout.php");
            } else {
                return;
            }
        };
    </script>
</body>

</html>