<?php
require 'connect.php';
session_start();

if (isset($_POST['bt_dangky'])) {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    // $phone = trim($_POST['phone'] ?? '');

    if (!empty($name) && !empty($email) && !empty($password)) {
        // Kiểm tra email đã tồn tại
        $check_sql = "SELECT id FROM users WHERE email = ?";
        $check_stmt = $conn->prepare($check_sql);
        if (!$check_stmt) {
            echo "<script>alert('Lỗi database.'); window.location.href='register.html';</script>";
            exit();
        }
        $check_stmt->bind_param("s", $email);
        $check_stmt->execute();
        $result = $check_stmt->get_result();
        
        if ($result && $result->num_rows > 0) {
            echo "<script>
                alert('Email đã tồn tại!');
                window.location.href = 'register.html';
            </script>";
            $check_stmt->close();
            $conn->close();
            exit();
        }
        $check_stmt->close();

        // Hash mật khẩu trước khi lưu
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            echo "<script>alert('Lỗi database: " . addslashes($conn->error) . "'); window.location.href='register.html';</script>";
            $conn->close();
            exit();
        }
        $stmt->bind_param("sss", $name, $email, $hashed_password);
        
        if ($stmt->execute()) {
            // Đăng ký thành công -> chuyển tới login
            header("Location: login.html");
            exit();
        } else {
            echo "<script>
                alert('Lỗi database: " . addslashes($stmt->error) . "');
                window.location.href = 'register.html';
            </script>";
        }
        $stmt->close();
        $conn->close();
    } else {
        echo "<script>
            alert('Vui lòng điền đầy đủ thông tin!');
            window.location.href = 'register.html';
        </script>";
        exit();
    }
} else {
    echo "<script>
        alert('Không có dữ liệu form!');
        window.location.href = 'register.html';
    </script>";
    exit();
}
?>