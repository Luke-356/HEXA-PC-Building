<?php
session_start();
$connect = mysqli_connect('localhost', 'root', '', 'hexa_pc_building');
if (isset($_POST['btnRegister'])) {
    $name = $_POST['txtName'];
    $email = $_POST['txtMail'];
    $tel = $_POST['txtTel'];
    $pass = $_POST['txtPass'];

    $select1 = "SELECT * FROM admin WHERE AdminName='$name'";
    $select2 = "SELECT * FROM admin WHERE Email='$email'";

    $run1 = mysqli_query($connect, $select1);
    $run2 = mysqli_query($connect, $select2);

    if (mysqli_num_rows($run1) > 0) {
        echo "<script> alert ('This Name is already existed');</script>";
    } elseif (mysqli_num_rows($run2) > 0) {
        echo "<script> alert ('This Email is already existed');</script>";
    } else {
        $password_hash = md5($pass);
        $insert = "INSERT INTO `admin`(`AdminID`, `AdminName`, `Email`, `PhoneNumber`, `Password`) 
        VALUES (NULL,'$name','$email','$tel','$password_hash')";
        $run = mysqli_query($connect, $insert);
        if ($run) {
            $select = "Select * from admin where AdminName='$name'";
            $run = mysqli_query($connect, $select);

            $count = mysqli_num_rows($run);
            if ($count > 0) {
                $data = mysqli_fetch_array($run);
                $AdminID = $data[0];
                $_SESSION['AdminID'] = $AdminID;

                echo "<script>
                alert('Register Successful');
                window.location.assign('manageUsers.php');
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
    <link rel="stylesheet" href="../Pages/styles/style.css?v=1.45">
    <title>Admin Register</title>
</head>

<body>
    <div class="container">
        <form method="POST" class="register-form">
            <h2 style="margin-bottom: 3rem;">Admin Register</h2>
            <div class="inputs">
                <label for="txtName">Admin Name</label> <br>
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
        </form>
    </div>

    <script src="./js/redirect.js"></script>
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