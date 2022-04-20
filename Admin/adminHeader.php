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
            <li class="user"><a href="index.php">Users</a></li>
            <li class="product"><a href="productRedirect.php">Products</a></li>
            <li class="rating"><a href="ratings.php">Ratings</a></li>
            <li class="order"><a href="orders.php">Orders</a></li>
            <li class="aregister"><a href="adminRegister.php">Register</a></li>
        </div>

        <div class="drop-down">
            <div class="admin-btn">
                <div>
                    <img src="../Images/user-alt.svg" alt="" srcset="">
                    <span><?php echo $AdminName ?></span>
                </div>
            </div>
        </div>
    </div>

    <script>
        const userLink = document.getElementsByClassName("user");
        userLink[0].addEventListener("click", () => {
            window.location.href = "index.php";
        });

        const productLink = document.getElementsByClassName("product");
        productLink[0].addEventListener("click", () => {
            window.location.href = "productRedirect.php";
        });

        const ratingLink = document.getElementsByClassName("rating");
        ratingLink[0].addEventListener("click", () => {
            window.location.href = "ratings.php";
        });

        const orderLink = document.getElementsByClassName("order");
        orderLink[0].addEventListener("click", () => {
            window.location.href = "orders.php";
        });

        const registerLink = document.getElementsByClassName("aregister");
        registerLink[0].addEventListener("click", () => {
            window.location.href = "adminRegister.php";
        });

        const profileLink = document.getElementsByClassName("admin-btn");
        profileLink[0].addEventListener("click", () => {
            window.location.href = "profile.php";
        });
    </script>
</body>

</html>