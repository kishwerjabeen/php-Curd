<?php
session_start();
include '../links.php';
include '../conn.php';

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    $updateQuery = "UPDATE emailreg SET status = 'active' where token = '$token'";
    $query = mysqli_query($conn, $updateQuery);
    if ($query) {
        if (isset($_SESSION['msg'])) {
            $_SESSION['msg'] = "Account updated Successfully";
            header('location:email-login.php');
        } else {
            $_SESSION['msg'] = "You are logout";
            header('location:email-login.php');
        }
    } else {
        $_SESSION['msg'] = "Account not updated";
        header('location:email-reg.php');
    }
}
