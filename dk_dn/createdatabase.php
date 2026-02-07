<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "ChillCafe_Database";


$conn = new mysqli($host, $user, $password);

if($conn->connect_error){
    die("error" .$conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS $dbname";

if($conn->query($sql)){
    echo"abc";
}else{
    echo"<script>alert('Database khởi tạo thất bại')</script>";
}
$conn->select_db($dbname);

$conn->query("CREATE TABLE IF NOT EXISTS products(
    id INT(10) AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(100),
    product_price VARCHAR(100),
    product_type VARCHAR(255),
    product_address VARCHAR(255),
    product_describe VARCHAR(255),
    product_img VARCHAR(255)
    )");
$conn->query("CREATE TABLE IF NOT EXISTS Favorite(
    id INT(10) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100),
    product_id VARCHAR(100),
    product_type ENUM('male','female','kid')
    )");
$conn->query("CREATE TABLE IF NOT EXISTS userdata(
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(40) UNIQUE NOT NULL,
    email VARCHAR(40) UNIQUE NOT NULL,
    user_password VARCHAR(255) NOT NULL,
    user_hotline VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");
    header("Location: login.html");
    exit();
?>