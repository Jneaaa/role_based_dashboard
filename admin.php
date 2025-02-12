<?php
session_start();
if (!isset($_SESSION['email']) || $_SESSION['role'] != 0) {
    header('Location: ../index.php');
    exit();
}
echo "Welcome, Admin " . $_SESSION['username'] . "!";
?>