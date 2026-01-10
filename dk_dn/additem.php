<?php
$host = "localhost";
$user = "root";
$pass = "";
$database = "products";

$conn = new mysqli($host, $user, $pass);
if($conn->connect_error){
    die("Lỗi kết nối database" .$conn->connect_error);
}

$database_sql = "CREATE DATABASE IF NOT EXISTS $database";

if($conn->query($database_sql)){
    echo "Tạo database thành công";
}else{
    die("Tạo database thất bại" .$conn->error);
}

$conn->select_db($database);

$datatable_sql = "CREATE TABLE IF NOT EXISTS items(
    id INT(10) AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(60),
    product_price VARCHAR(60),
    product_image VARCHAR(255),
    product_describe VARCHAR(60)
)";

if($conn->query($datatable_sql)){
    echo "Tạo datatable thành công";
}else{
    die("Tạo datatable thất bại" .$conn->error);
}

$p_name = $_POST['product_name'];
$p_price = $_POST['product_price'];
$p_image = $_POST['product_image'];
$p_describe = $_POST['product_describe'];

$data = "INSERT INTO items(`product_name`,`product_price`,`product_image`,`product_describe`) VALUES('$p_name','$p_price','$p_image','$p_describe')";


if($conn->query($data)){
    echo "Thêm dữ liệu thành công \t $data";
}else{
    die("Thêm dữ liệu thất bại" .$conn->error);
}

$conn->close();
?>