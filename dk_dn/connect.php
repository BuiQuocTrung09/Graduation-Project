<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "login_register";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function createUsersTable($connection) {
    $sql = "CREATE TABLE IF NOT EXISTS users (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL UNIQUE,
        email VARCHAR(100) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    
    if ($connection->query($sql) === TRUE) {
        return true;
    } else {
        return "Error creating table: " . $connection->error;
    }
}

function logout() {
    session_start();
    session_unset();
    session_destroy();
    header("Location: 29-9-login.html");
    exit();
}

function testDatabaseConnection() {
    global $host, $username, $password, $database;
    
    $test_conn = new mysqli($host, $username, $password, $database);
    
    if ($test_conn->connect_error) {
        return "Connection failed: " . $test_conn->connect_error;
    } else {
        $message = "Database connected successfully!<br>";
        
        $result = $test_conn->query("SHOW TABLES LIKE 'users'");
        if ($result->num_rows > 0) {
            $structure = $test_conn->query("DESCRIBE users");
            $message .= "Table 'users' exists!<br>Table structure:<br>";
            while ($row = $structure->fetch_assoc()) {
                $message .= " - " . $row['Field'] . " (" . $row['Type'] . ")<br>";
            }
            
            $data = $test_conn->query("SELECT * FROM users");
            $message .= "<br>Total users: " . $data->num_rows . "<br>";
        } else {
            $message .= "Table 'users' does NOT exist!<br>";
            $create_result = createUsersTable($test_conn);
            if ($create_result === true) {
                $message .= "Table 'users' has been created successfully!";
            } else {
                $message .= $create_result;
            }
        }
        
        $test_conn->close();
        return $message;
    }
}

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'test_db':
            echo testDatabaseConnection();
            exit();
            
        case 'logout':
            logout();
            exit();
            
        case 'create_table':
            $result = createUsersTable($conn);
            if ($result === true) {
                echo "Table 'users' created successfully!";
            } else {
                echo $result;
            }
            exit();
    }
}

createUsersTable($conn);
?>