<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

   
    $stmt = $conn->prepare("SELECT id, username, email, password, role FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];

         
            if ($user['role'] == 0) {
                header('Location: pages/admin.php');
            } else {
                header('Location: pages/user.php');
            }
            exit;
        } else {
            echo "<script>alert('Invalid email or password.'); window.location.href='index.php';</script>";
        }
    } else {
        echo "<script>alert('Invalid email or password.'); window.location.href='index.php';</script>";
    }
}
?>