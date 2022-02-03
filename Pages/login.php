<?php
session_start();
$connect = mysqli_connect('localhost', 'root', '', 'hexa_pc_building');
if (isset($_POST['btnLogin'])) {
    $name = $_POST['txtName'];
    $pass = $_POST['txtPass'];
    $password_hash = md5($pass);
    $select = "Select * from user where UserName='$name' and Password='$password_hash'";
    $run = mysqli_query($connect, $select);

    $count = mysqli_num_rows($run);
    if ($count > 0) {
        $data = mysqli_fetch_array($run);
        $UserID = $data[0];
        $_SESSION['UserID'] = $UserID;

        echo "<script>   
    		alert('Login Successful');
    		window.location.assign('profile.php');
    	</script>";
    } else {
        echo "<script>   
    		alert('Incorrect UserName or Password');
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
    <link rel="stylesheet" href="./styles/style.css?v=1.4">
    <title>User Login</title>
</head>

<body>
    <div class="container login-wrap">
        <?php
        include 'header.php'
        ?>

        <form method="POST" class="login-form">
            <h2>Sign In</h2>
            <div class="inputs">
                <label for="txtName">User Name</label> <br>
                <input type="text" id="txtName" name="txtName" required>
            </div>

            <div class="inputs">
                <label for="txtPass">Password</label> <br>
                <input type="password" name="txtPass" id="txtPass" required>
            </div>

            <div class="remember-forget">
                <div class="remember">
                    <input type="checkbox" name="txtRemember" id="remember">
                    <label for="remember">Remember me</label>
                </div>

                <a href="">Forget password?</a>
            </div>

            <button name="btnLogin" type="submit">Login</button>

            <div class="not-register">
                <label for="">Not registered yet?</label>
                <a href="register.php">Create an Account</a>
            </div>
        </form>
    </div>

    <script src="./js/redirect.js"></script>
</body>

</html>