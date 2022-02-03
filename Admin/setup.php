<?php
$connect = mysqli_connect('localhost', 'root', '', 'hexa_pc_building');
//drop tables
// $dropUser = "Drop Table User";
// $runDrop = mysqli_query($connect, $dropUser);
// if ($runDrop) {
//     echo "User Table Dropped <br>";
// } else {
//     mysqli_error($connect);
// }

// $dropAdmin = "Drop Table Admin";
// $runDrop = mysqli_query($connect, $dropAdmin);
// if ($runDrop) {
//     echo "Admin Table Dropped <br>";
// } else {
//     mysqli_error($connect);
// }

// $dropProduct = "Drop Table Product";
// $runDrop = mysqli_query($connect, $dropProduct);
// if ($runDrop) {
//     echo "Product Table Dropped <br>";
// } else {
//     mysqli_error($connect);
// }

//create tables
$createUser = "CREATE TABLE User
(
    UserID int Auto_Increment not null primary key,
    UserName Varchar(50),
    Email Varchar(60),
    PhoneNumber Varchar(30),
    Password Varchar(60)
)";

$run = mysqli_query($connect, $createUser);
if ($run) {
    echo "User Table Created <br>";
} else {
    mysqli_error($connect);
}

$createAdmin = "CREATE TABLE Admin
(
    AdminID int Auto_Increment not null primary key,
    AdminName Varchar(50),
    Email Varchar(60),
    PhoneNumber Varchar(30),
    Password Varchar(60)
)";

$run = mysqli_query($connect, $createAdmin);
if ($run) {
    echo "Admin Table Created <br>";
} else {
    mysqli_error($connect);
}

$createProduct = "CREATE TABLE Product
(
    ProductID int Auto_Increment not null primary key,
    ProductType Varchar(30),
    ProductName Varchar(100),
    CoreCount int,
    CoreClock float,
    BoostClock float,
    TDB int,
    Memory int,
    Price float,
    Image Varchar(200)
)";

$run = mysqli_query($connect, $createProduct);
if ($run) {
    echo "Product Table Created <br>";
} else {
    mysqli_error($connect);
}
