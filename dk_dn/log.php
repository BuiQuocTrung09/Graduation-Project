<?php
include 'connect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $identifier = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($identifier) || empty($password)) {
        header("Location: login.html?error=emptyfields");
        exit();
    }

    // Tìm theo username hoặc email
    $sql = "SELECT id, username, password FROM users WHERE username = ? OR email = ? LIMIT 1";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        header("Location: login.html?error=dberror");
        exit();
    }

    $stmt->bind_param("ss", $identifier, $identifier);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // So sánh hash mật khẩu
        if (password_verify($password, $user['password'])) {
            session_regenerate_id(true);
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: index.html");
            exit();
        } else {
            header("Location: login.html?error=wrongpassword");
            exit();
        }
    } else {
        header("Location: login.html?error=nouser");
        exit();
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: login.html");
    exit();
}
?>