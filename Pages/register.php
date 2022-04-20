<?php
session_start();
$connect = mysqli_connect('localhost', 'root', '', 'hexa_pc_building');
if (isset($_POST['btnRegister'])) {
    $name = $_POST['txtName'];
    $email = $_POST['txtMail'];
    $tel = $_POST['txtTel'];
    $pass = $_POST['txtPass'];

    $select1 = "SELECT * FROM user WHERE UserName='$name'";
    $select2 = "SELECT * FROM user WHERE Email='$email'";

    $run1 = mysqli_query($connect, $select1);
    $run2 = mysqli_query($connect, $select2);

    if (mysqli_num_rows($run1) > 0) {
        echo "<script> alert ('This Username is already taken');</script>";
    } elseif (mysqli_num_rows($run2) > 0) {
        echo "<script> alert ('This Email is already taken');</script>";
    } else {
        $password_hash = md5($pass);
        $insert = "INSERT INTO `user`(`UserID`, `UserName`, `Email`, `PhoneNumber`, `Password`) 
        VALUES (NULL,'$name','$email','$tel','$password_hash')";
        $run = mysqli_query($connect, $insert);
        if ($run) {
            $select = "Select * from user where UserName='$name'";
            $run = mysqli_query($connect, $select);

            $count = mysqli_num_rows($run);
            if ($count > 0) {
                $data = mysqli_fetch_array($run);
                $UserID = $data[0];
                $_SESSION['UserID'] = $UserID;

                echo "<script>
                alert('Register Successful');
                window.location.assign('profile.php');
                </script>";
            }
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
    <link rel="stylesheet" href="./styles/style.css">
    <title>User Register</title>
    <style>
        .container {
            margin-bottom: 6rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        include 'header.php'
        ?>
        <div class="login-wrap">
            <form method="POST" class="register-form">
                <h2>Sign Up</h2>
                <div class="inputs">
                    <label for="txtName">User Name</label> <br>
                    <input type="text" id="txtName" name="txtName" required>
                </div>

                <div class="inputs">
                    <label for="txtMail">Email</label> <br>
                    <input type="email" id="txtMail" name="txtMail" required>
                </div>

                <div class="inputs">
                    <label for="txtTel">Phone Number</label> <br>
                    <input type="tel" id="txtTel" name="txtTel" required>
                </div>

                <div class="inputs">
                    <label for="txtPass">Password</label> <br>
                    <input type="password" name="txtPass" id="txtPass" required>
                </div>

                <div class="inputs">
                    <label for="txtCon">Confirm Password</label> <br>
                    <input type="password" name="txtPass" oninput="check(this)" required>
                </div>

                <button name="btnRegister" type="submit">Register</button>

                <div class="not-register">
                    <label for="">Already have account?</label>
                    <a href="login.php">Login</a>
                </div>
            </form>
        </div>
    </div>

    <?php
    include("footer.php");
    ?>

    <script language='javascript' type='text/javascript'>
        check = (input) => {
            if (input.value != document.getElementById('txtPass').value) {
                input.setCustomValidity('Password Must be Matching.');
            } else {
                // input is valid -- reset the error message
                input.setCustomValidity('');
            }
        }
    </script>
</body>

</html>