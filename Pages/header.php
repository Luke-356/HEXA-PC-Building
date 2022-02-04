<?php
$connect = mysqli_connect('localhost', 'root', '', 'hexa_pc_building');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="nav">
        <div class="nav-links">
            <a href="index.php"><img src="../Images/Logo.svg" alt="HEXA Logo" id="logo" /></a>

            <ul>
                <li class="home-link">
                    <a href="index.php">Home</a>
                </li>
                <li class="builder-link">
                    <a href="builder.php">PC Builder</a>
                </li>
                <li>
                    <a href="">About</a>
                </li>
                <li>
                    <a href="">Support</a>
                </li>
            </ul>
        </div>
        <div class="nav-buttons">
            <?php
            if (isset($_SESSION['UserID'])) {
                $user = $_SESSION['UserID'];
                $select = "Select * from user where UserID= '$user'";
                $run = mysqli_query($connect, $select);
                $data = mysqli_fetch_array($run);
                $UserName = $data['1'];

                echo '<a href="profile.php" class="sign-btn"> Profile </a>';
                echo ' <a href="" class="search-btn"><img src="../Images/search.svg" alt="search-icon"></a>';
            } else {
                echo '<a href="login.php" class="sign-btn">Sign In</a>';
                echo '<a href="register.php" class="sign-btn">Sign Up</a>';
                echo '<a href="" class="search-btn"><img src="../Images/search.svg" alt="search-icon"></a>';
            }
            ?>
        </div>
    </div>

    <script>
        //redirect to new URL for li elements (client header)
        const homeLink = document.getElementsByClassName("home-link");
        homeLink[0].addEventListener("click", () => {
            window.location.href = "index.php";
        });

        const builderLink = document.getElementsByClassName("builder-link");
        builderLink[0].addEventListener("click", () => {
            window.location.href = "builder.php";
        });
    </script>
</body>

</html>