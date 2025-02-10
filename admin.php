<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ../login.php');
    exit;
}

if ($_SESSION['role'] != 0) {
    echo 'Access denied. Admin only.';
    exit;
}

echo 'Welcome to Admin Dashboard!';
?>