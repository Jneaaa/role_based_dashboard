<?php
session_start();
if (!isset($_SESSION['email']) || $_SESSION['role'] != 1) {
    header('Location: ../index.php');
    exit();
}
echo "Welcome, User " . $_SESSION['username'] . "!";
?>