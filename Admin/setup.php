<?php
$connect = mysqli_connect('localhost', 'root', '', 'hexa_pc_building');
// drop tables
// $dropOrder = "Drop Table OrderPC";
// $runDrop = mysqli_query($connect, $dropOrder);
// if ($runDrop) {
//     echo "Order Table Dropped <br>";
// } else {
//     mysqli_error($connect);
// }

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
// $createUser = "CREATE TABLE User
// (
//     UserID int Auto_Increment not null primary key,
//     UserName Varchar(50),
//     Email Varchar(60),
//     PhoneNumber Varchar(30),
//     Password Varchar(60)
// )";

// $run = mysqli_query($connect, $createUser);
// if ($run) {
//     echo "User Table Created <br>";
// } else {
//     mysqli_error($connect);
// }

// $createAdmin = "CREATE TABLE Admin
// (
//     AdminID int Auto_Increment not null primary key,
//     AdminName Varchar(50),
//     Email Varchar(60),
//     PhoneNumber Varchar(30),
//     Password Varchar(60)
// )";

// $run = mysqli_query($connect, $createAdmin);
// if ($run) {
//     echo "Admin Table Created <br>";
// } else {
//     mysqli_error($connect);
// }

// $password = 12345;
// $password_hash = md5($password);

// $insertAdmin = "INSERT INTO Admin (AdminID, AdminName, Email, PhoneNumber, Password)
// VALUES (NULL, 'Nyi Nyi Lwin', 'nyinyilwin356@gmail.com', '09267481856', '$password_hash')";

// $runinsert = mysqli_query($connect, $insertAdmin);
// if ($runinsert) {
//     echo "Admin Data Inserted <br>";
// } else {
//     mysqli_error($connect);
// }

// $createProduct = "CREATE TABLE Product
// (
//     ProductID int Auto_Increment not null primary key,
//     ProductType Varchar(30),
//     ProductName Varchar(100),
//     CoreCount int,
//     CoreClock float,
//     BoostClock float,
//     TDP int,
//     Memory int,
//     FanRPM int,
//     Price float,
//     NoiceLevel float,
//     Socket Varchar(30),
//     FormFactor Varchar(30),
//     MemoryMax int,
//     MemorySlots int,
//     Speed Varchar(30),
//     Modules Varchar(30),
//     Price(per)GB int,
//     Capacity int,
//     Type Varchar(30),
//     Cache int,
//     Interface Varchar(30),
//     EfficiencyRating Varchar(30),
//     Wattage int,
//     Modular Varchar(30),
//     Color Varchar(30),
//     SidePanelWindow Varchar(100),
//     Image Varchar(200)
// )";

// $run = mysqli_query($connect, $createProduct);
// if ($run) {
//     echo "Product Table Created <br>";
// } else {
//     mysqli_error($connect);
// }

// $createOrder = "CREATE TABLE OrderPC
// (
// OrderID int Auto_Increment not null primary key,
// UserID int,
// FOREIGN KEY (UserID) REFERENCES User(UserID),
// FirstName Varchar(100),
// LastName Varchar(100),
// Address Text,
// Price int,
// CPUID int,
// CPUCoolerID int,
// MotherBoardID int,
// MemoryID int,
// PowerSupplyID int,
// GPUID int,
// CaseID int,
// StorageID int
// )";

// $runorder = mysqli_query($connect, $createOrder);
// if ($runorder) {
//     echo "Order Table Created <br>";
// } else {
//     mysqli_error($connect);
// }

$createRating = "CREATE TABLE Rating(
    RatingID int Auto_Increment not null primary key,
    UserID int,
    FOREIGN KEY (UserID) REFERENCES User(UserID),
    Rating int,
    RatingText Text
)";

$runrating = mysqli_query($connect, $createRating);
if ($runrating) {
    echo "Rating Table Created <br>";
} else {
    mysqli_error($connect);
}
