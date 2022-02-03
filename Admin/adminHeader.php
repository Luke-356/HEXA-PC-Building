<?php
$connect = mysqli_connect('localhost', 'root', '', 'hexa_pc_building');

if (isset($_SESSION['AdminID'])) {
    $AdminID = $_SESSION['AdminID'];
    $select = "Select * from admin where AdminID= '$AdminID'";
    $run = mysqli_query($connect, $select);
    $data = mysqli_fetch_array($run);
    $AdminName = $data['1'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
</head>

<body>
    <div class="side-nav">
        <div class="nav-links">
            <li class="user"><a href="manageUsers.php">Users</a></li>
            <li class="product"><a href="products.php">Products</a></li>
            <li class="question"><a href="">Questions</a></li>
            <li class="order"><a href="">Orders</a></li>
            <li class="rating"><a href="">Ratings</a></li>
        </div>

        <div class="drop-down">
            <div id="dropdown-content">
                <a href="#home">Profile</a>
                <a href="#about">Register</a>
                <a href="#contact">Logout</a>
            </div>

            <div class="admin-btn" onclick="toogle()">
                <div>
                    <img src="../Images/user-alt.svg" alt="" srcset="">
                    <span><?php echo $AdminName ?></span>
                </div>
                <img src="../Images/plus.svg" alt="" srcset="">
            </div>
        </div>

    </div>

    <script>
        function toogle() {
            document.getElementById("dropdown-content").classList.toggle("show");
        }

        const userLink = document.getElementsByClassName("user");
        userLink[0].addEventListener("click", () => {
            window.location.href = "manageUsers.php";
        });

        const productLink = document.getElementsByClassName("product");
        productLink[0].addEventListener("click", () => {
            window.location.href = "products.php";
        });
    </script>
</body>

</html>