<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ../login.php');
    exit;
}

if ($_SESSION['role'] != 1) {
    echo 'Access denied. User only.';
    exit;
}

echo 'Welcome to User Dashboard!';
?>