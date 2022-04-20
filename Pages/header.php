<?php
$connect = mysqli_connect('localhost', 'root', '', 'hexa_pc_building');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
    <style>
        body {
            font-family: "Lato", sans-serif;
        }

        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #ededed;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: black;
            display: block;
            transition: 0.3s;
            margin-top: 1rem;
        }

        .sidenav a:hover {
            color: #f1f1f1;
        }

        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 15px;
            }

            .sidenav a {
                font-size: 18px;
            }
        }
    </style>
</head>

<body>
    <div class="nav">
        <div class="nav-links">
            <a href="index.php"><img src="../Images/Logo.svg" alt="HEXA Logo" id="logo" /></a>

            <ul>
                <li class="home-link desk-link">
                    <a href="index.php">Home</a>
                </li>
                <li class="builder-link desk-link">
                    <a href="builder.php">PC Builder</a>
                </li>
                <li class="term-link desk-link">
                    <a href="https://www.termsandcondiitionssample.com/live.php?token=X4KWWV5gZ6GKZfXv1SWbZHtjXRp5pWAA" target="_blank">Terms</a>
                </li>
                <li class="rate-link desk-link">
                    <a href="rating.php">Rating</a>
                </li>
                <li class="mobile-link" onclick="openNav()">
                    <img src="../Images/bars-solid.svg">
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

                echo '<a href="profile.php" class="sign-btn profile-btn"> Profile </a>';
                echo ' <a href="" class="search-btn"><img src="../Images/search.svg" alt="search-icon"></a>';
            } else {
                echo '<a href="login.php" class="sign-btn sign-in">Sign In</a>';
                echo '<a href="register.php" class="sign-btn sign-in">Sign Up</a>';
                echo '<a href="" class="search-btn"><img src="../Images/search.svg" alt="search-icon"></a>';
            }
            ?>
        </div>
    </div>

    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="index.php">Home</a>
        <a href="builder.php">PC Builder</a>
        <a href="https://www.termsandcondiitionssample.com/live.php?token=X4KWWV5gZ6GKZfXv1SWbZHtjXRp5pWAA" target="_blank">Terms</a>
        <a href="rating.php">Rating</a>
        <?php
        if (isset($_SESSION['UserID'])) {
            echo '<a href="profile.php" class="sign-btn"> Profile </a>';
        } else {
            echo '<a href="login.php" class="sign-btn sign-in">Sign In</a>';
            echo '<a href="register.php" class="sign-btn sign-in">Sign Up</a>';
        }
        ?>
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

        const termLink = document.getElementsByClassName("term-link");
        termLink[0].addEventListener("click", () => {
            // window.location.href = "https://www.termsandcondiitionssample.com/live.php?token=X4KWWV5gZ6GKZfXv1SWbZHtjXRp5pWAA";
            window.open("https://www.termsandcondiitionssample.com/live.php?token=X4KWWV5gZ6GKZfXv1SWbZHtjXRp5pWAA", "_blank");
        });

        const rateLink = document.getElementsByClassName("rate-link");
        rateLink[0].addEventListener("click", () => {
            window.location.href = "rating.php";
        });

        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>
</body>

</html>