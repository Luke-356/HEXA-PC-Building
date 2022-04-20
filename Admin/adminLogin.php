<?php
session_start();
$connect = mysqli_connect('localhost', 'root', '', 'hexa_pc_building');
if (isset($_POST['btnLogin'])) {
    $name = $_POST['txtName'];
    $pass = $_POST['txtPass'];
    $password_hash = md5($pass);
    $select = "Select * from admin where AdminName='$name' and Password='$password_hash'";
    $run = mysqli_query($connect, $select);

    $count = mysqli_num_rows($run);
    if ($count > 0) {
        $data = mysqli_fetch_array($run);
        $AdminID = $data[0];
        $_SESSION['AdminID'] = $AdminID;

        echo "<script>   
    		alert('Login Successful');
    		window.location.assign('index.php');
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
    <link rel="stylesheet" href="./adminStyle.css">
    <title>User Login</title>
    <style>
        .aregister {
            background: #464646;
            text-align: center;
            pointer-events: none;
        }

        .aregister a {
            color: white;
            text-align: center;
        }

        .register-form,
        .login-form {
            width: 100%;
            margin: 4rem auto 0 auto;
        }

        .register-form h2,
        .login-form h2 {
            text-align: center;
            font-size: 34px;
            color: #464646;
        }

        .register-form button,
        .register-form .edit-profile button,
        .login-form button,
        .login-form .edit-profile button {
            border: none;
            cursor: pointer;
            padding: 1.2rem 2rem 1.2rem 2rem;
            background-color: #464646;
            font-size: 18px;
            color: white;
            border-radius: 14px;
            width: 100%;
        }

        .register-form button:hover,
        .register-form .edit-profile button:hover,
        .login-form button:hover,
        .login-form .edit-profile button:hover {
            background-color: #3b3b3b;
        }

        .login-wrap {
            max-width: 400px;
            margin: 0 auto;
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

        .remember-forget {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            margin-bottom: 1.4rem;
        }

        .remember-forget a {
            color: #0080ff;
            font-weight: 500;
        }

        .remember-forget input[type="checkbox"],
        .remember-forget .remember label {
            cursor: pointer;
        }

        .not-register {
            margin-top: 1.4rem;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            gap: 4px;
        }

        .not-register a {
            color: #0080ff;
            font-weight: 500;
        }
    </style>
</head>

<body>
    <div class="container login-wrap">
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

            <button name="btnLogin" type="submit">Login</button>
        </form>
    </div>

    <script src="./js/redirect.js"></script>
</body>

</html>